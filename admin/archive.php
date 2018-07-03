<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/osavon/core/init.php';
    if(!is_logged_in()){
        login_error_redirect();
    }
    include 'includes/head.php';
    $page = 'archive' ;
    include 'includes/navigation.php';
    if(isset($_GET['archive'])) { 
    $products = sanitize($_GET['archive']); 
    $reset = "UPDATE products SET deleted = 0,featured = 1 WHERE id = '$products'"; 
    $result = $db->query($reset); 
    header('Location: archive.php'); } 
    $sql = "SELECT * FROM products WHERE deleted = 1"; 
    $products_result = $db->query($sql);
    ?> 
     
<?php
$sql = "SELECT * FROM products WHERE deleted = 1";
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
    <h1 class="display-3 text-center">Archive</h1>
    <hr>
    <table class="table table-bordered table-condensed table-striped">
        <thead>
            <th>Unarchive</th>
            <th>Product</th>
            <th>Price</th>
            <th>Sold</th>
        </thead>
        <tbody>
            <?php while($product = mysqli_fetch_assoc($presults)): ?>
                <tr>
                    <td>
                    <a href="archive.php?archive=<?=$product['id'];?>" class="btn btn-xs btn default"><i class="fas fa-sync"></i></span></a>
                    </td>
                    <td>
                        <?= $product['title']; ?>
                    </td>
                    <td>
                        <?=money ($product['price']); ?>
                    </td>
                    <td>0</td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php 
include 'includes/footer.php' ;
?>