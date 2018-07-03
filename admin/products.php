<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/osavon/core/init.php';
    if(!is_logged_in()){
        login_error_redirect();
    }
    include 'includes/head.php';
    $page = 'products' ;
    include 'includes/navigation.php';
    //Delete Product
    if(isset($_GET['delete'])){
        $id = santitize($_GET['delete']);
        $db->query("UPDATE products SET deleted = 1 WHERE id = 'id'");
        header('Location: products.php');
    }

    $dbpath = '';
	if(isset($_GET['add']) || isset($_GET['edit'])) {
        $title = ((isset($_POST['title']) && $_POST['title'] != '')?sanitize($_POST['title']) : '');
        $price = ((isset($_POST['price']) && $_POST['price'] != '')?sanitize($_POST['price']) : '');
        $quantity = ((isset($_POST['quantity']) && $_POST['quantity'] != '')?sanitize($_POST['quantity']) : '');
        $description = ((isset($_POST['description']) && $_POST['description'] != '')?sanitize($_POST['description']) : '');
        $saved_image = '';
    if(isset($_GET['edit'])) {
        $edit_id = (int)$_GET['edit'];
        $productResults = $db->query("SELECT * FROM products WHERE id = '{$edit_id}'");
        $product = mysqli_fetch_assoc($productResults);
        if(isset($_GET['delete_image'])){
            $image_url = $_SERVER['DOCUMENT_ROOT'].$product['image'];echo $image_url;
            unlink($image_url);
            $db->query("UPDATE products SET image = '' WHERE id = '$edit_id'");
            header('Location: products.php?edit='.$edit_id);
        }
        $title = ((isset($_POST['title']) && !empty($_POST['title']))?sanitize($_POST['title']) : $product['title']);
        $price = ((isset($_POST['price']) && !empty($_POST['price']))?sanitize($_POST['price']) : $product['price']);
        $quantity = ((isset($_POST['quantity']) && !empty($_POST['quantity']))?sanitize($_POST['quantity']) : $product['quantity']);
        $description = ((isset($_POST['description']) && !empty($_POST['description']))?sanitize($_POST['description']) : $product['description']);
        $saved_image = (($product['image'] != '')?$product['image']:'');
        $dbpath = $saved_image;
		}
		if($_POST) {
			$title = sanitize($_POST['title']);
            $price = sanitize($_POST['price']);
            $quantity = sanitize($_POST['quantity']);
			$description = sanitize($_POST['description']);
			$dbpath = '';
			$errors = array();
			$required = array('title', 'price');
			foreach($required as $field) {
				if($_POST[$field] == '') {
					$errors[] = 'All fields with an anterisk are required!';
					break;
				}
			}
			if(!empty($_FILES)) {
				$photo = $_FILES['photo'];
				$name = $photo['name'];
				$nameArray = explode('.', $name);
				$fileName = $nameArray[0];
				$fileExt = $nameArray[1];
				$mime = explode('/', $photo['type']);
				$mimeType = $mime[0];
				$mimeExt = $mime[1];
				$tmpLoc = $photo['tmp_name'];
				$fileSize = $photo['size'];
				$allowed = array('png', 'jpg', 'jpeg', 'gif');
				$uploadName = md5(microtime()).'.'.$fileExt;
				$uploadPath = BASEURL.'img/products/'.$uploadName;
				$dbpath = '/osavon/img/products/'.$uploadName;
				if($mimeType != 'image') {
					$errors[] .= 'The file must be an image.';
				}
				if(!in_array($fileExt, $allowed)) {
					$errors[] .= 'The file extension must be a png, jpg, jpeg, or gif.';
				}
				if($fileSize > 15000000) {
					$errors[] .= 'The file size must be under 15 megabytes.';
				}
				if($fileExt != $mimeExt && ($mimeExt == 'jpeg' && $fileExt != 'jpg')) {
					$errors[] .= 'File extension does not match the file.';
				}
			}
			
			if(!empty($errors)) {
				echo display_errors($errors);
			} else {
				/* Upload file and insert into database. */
				move_uploaded_file($tmpLoc, $uploadPath);
                $insertSql = "INSERT INTO products (title, price, image, description) VALUES ('{$title}', '{$price}', '{$quantity}', '{$dbpath}', '{$description}')";
                if(isset($_GET['edit'])){
                    $insertSql = "UPDATE products SET title = '$title', price = '$price', quantity = '$quantity', image = '$dbpath', description = 'description'
                    WHERE id = '$edit_id'";
                }
				$db->query($insertSql);
				header("Location: products.php");
			}
		}
?>
    <div class="container">
        <h1 class="text-center display-4" style="margin: 10px 0 0 0"><?= ((isset($_GET['edit']))?'Edit':'Add a New'); ?> Product</h1><hr>
        <form action="products.php?<?php echo ((isset($_GET['edit']))?'edit='.$edit_id : 'add=1'); ?>" method="POST" enctype="multipart/form-data"> 
        <div class="row">
            <div class="form-group col-md-3">
                <label for="title">Title*:</label>
                <input type="text" name="title" class="form-control" id="title" value="<?=$title;?>">
            </div>
        </form>
            <div class="form-group col-md-3">
                <label for="price">Price*:</label>
                <input type="text" id="price" name="price" class="form-control" value="<?=$price;?>">
            </div>
            <div class="form-group col-md-3">
                <label for="price">Quantity:</label>
                <input type="text" id="quantity" name="quantity" class="form-control" value="<?=$quantity;?>">
            </div>
            <div class="form-group col-md-3">
                <?php if($saved_image !=''): ?>
                    <div class="saved-image">
                        <img src="<?=$saved_image;?>" alt="saved image"/>
                        <a href="products.php?delete_image=1&edit=<?=$edit_id;?>" class="text-danger">Delete Image</a>
                    </div>
                <?php else: ?>
                    <label for="photo">Product Photo:</label>
                    <input type="file" name="photo" id="photo" class="form-control"/>
                <?php endif; ?>
            </div>
            <div class="form-group col-md-12">
                <label for="description">Description:</label>
                <textarea id="description" name="description" class="form-control" rows="6"><?=$description;?></textarea>
            </div>
            <div class="container">
                <div class="form-group">
                    <a href="products.php" class="btn btn-outline-dark">Cancel</a>
                <input type="submit" value="<?= ((isset($_GET['edit']))?'Edit':'Add' )?> Product" class="btn btn-success">
                </div><div class="clearfix"></div>
            </div>
        </div>
    </div>
<?php }else{
$sql = "SELECT * FROM products WHERE deleted = 0";
$presults = $db->query($sql);
if (isset($_GET['store'])) {
    $id = (int)$_GET['id'];
    $store = (int)$_GET['store'];
    $storeSql = "UPDATE products SET store = '$store' WHERE id = '$id'";
    $db->query($storeSql);
    header('Location: products.php');
}
?>

<div class="container">
    <h1 class="display-3 text-center">Products</h2>
    <a href="products.php?add=1" class="btn btn-success float-left" id="add-product-btn">Add Product</a><div class="clearfix"></div>
    <hr>
    <table class="table table-bordered table-condensed table-striped">
        <thead>
            <th>Control</th>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>In-Store</th>
            <th>Sold</th>
        </thead>
        <tbody>
            <?php while($product = mysqli_fetch_assoc($presults)): ?>
                <tr>
                    <td>
                        <a href="products.php?edit=<?=$product['id']; ?>" class="btn btn-xs btn-default"><i class="fas fa-edit fa-lg"></i></span></a>
                        <a href="products.php?delete=<?=$product['id']; ?>" class="btn btn-xs btn-default"><i class="fas fa-archive fa-lg"></i></span></a>
                    </td>
                    <td>
                        <?= $product['title']; ?>
                    </td>
                    <td>
                        <?=money ($product['price']); ?>
                    </td>
                    <td>
                        <?= $product['quantity']; ?>
                    </td>
                    <td>
                        <a href="products.php?store=<?=(($product['store'] == 0)?'1':'0'); ?>&id=<?= $product['id']; ?>" class="btn btn-xs btn-default">
                        <i class="fas fa-<?=(($product['store']==1)?'minus-square':'plus-square');?> fa-lg"></i>
                        </a>&nbsp <?=(($product['store'] == 1)?'Product In-Store':''); ?>
                    </td>   
                    <td>0</td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php }
include 'includes/footer.php' ;
?>