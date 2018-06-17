<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/osavon/core/init.php' ;
include 'includes/head.php' ; 
$page = 'products' ;
include 'includes/navigation.php' ;
if (isset($_GET['add'])){
?>
    <div class="container">
        <h1 class="text-center display-4" style="margin: 10px 0 0 0">Add A New Product</h1><hr>
        <form action="products.php?add=1" method="POST" enctype="multipart/form-data"> 
        <div class="row">
            <div class="form-group col-md-4">
                <label for="title">Title*:</label>
                <input type="text" name="title" class="form-control" id="title" value="<?=((isset($_POST['title']))?sanitize($_POST['title']):'');?>"/>
            </div>
        </form>
            <div class="form-group col-md-4">
                <label for="price">Price*:</label>
                <input type="text" id="price" name="price" class="form-control" value="<?=((isset($_POST['price']))?sanitize($_POST['price']):'');?>">
            </div>
            <div class="form-group col-md-4">
                <label for="photo">Product Photo:</label>
                <input type="file" name="photo" id="photo" class="form-control"/>
            </div>
            <div class="form-group col-md-12">
                <label for="description">Description:</label>
                <textarea id="description" name="description" class="form-control" rows="6"><?=((isset($_POST['description']))?sanitize($_POST['description']):'');?></textarea>
            </div>
            <div class="form-group float-right">
            <input type="submit" value="Add Product" class="form-control btn btn-success float-right" />
            </div><div class="clearfix"></div>
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
            <th>In-Store</th>
            <th>Sold</th>
        </thead>
        <tbody>
            <?php while($product = mysqli_fetch_assoc($presults)): ?>
                <tr>
                    <td>
                        <a href="products.php?edit=<?=$product['id']; ?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil"></span>Edit</a>
                        <a href="products.php?delete=<?=$product['id']; ?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-remove"></span>Delete</a>
                    </td>
                    <td>
                        <?= $product['title']; ?>
                    </td>
                    <td>
                        <?=money ($product['price']); ?>
                    </td>
                    <td>
                        <a href="products.php?store=<?=(($product['store'] == 0)?'1':'0'); ?>&id=<?= $product['id']; ?>" class="btn btn-xs btn-default">
                        <span class="glyphicon glypicon-<?=(($product['store']==1)?'minus':'plus');?>">1</span>
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