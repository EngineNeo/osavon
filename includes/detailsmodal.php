<?php
require_once '../core/init.php';
$id = $_POST['id'] ;
$id = (int)$id ;
$sql = "SELECT * FROM products WHERE id = '$id'" ;
$result = $db->query($sql) ;
$product = mysqli_fetch_assoc($result) ;
?>

<!-- Details Box -->
<?php ob_start(); ?>
<div data-backdrop="static" data-keyboard="false" aria-hidden="true" aria-labelledby="details-1" class="modal fade details-1" id="details-modal" role="dialog" tabindex="-1">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><?= $product['title'] ?></h5><button aria-label="Close" class="close" onclick="closeModal()" type="button"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-6">
							<div class="center-block"><img alt="Soap1" class="details img-responsive" src="<?= $product['image'] ?>"></div>
						</div>
						<div class="col-md-6">
							<h4>Description</h4>
							<p><?= nl2br($product['description']); ?></p>
							<hr>
							<p>Price: $<?= $product['price'] ?></p>
							<form action="add_cart.php" method="post">
								<div class="form-group align-bottom">
									<div class="col-xs-3">
										<label for="quantity">Quantity:</label> <input class="form-control" id="quantity" name="quantity" type="text">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn" onclick="closeModal()">Close</button> 
					<button class="btn btn-warning" type="submit"><span class="glyphicon glyphicon-shopping-cart"></span>Add to Cart</button>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
function closeModal(){
	jQuery('#details-modal').modal('hide');
	setTimeout(function(){
		jQuery('#details-modal').remove()
	}
	,500);
}
</script>
<?php echo ob_get_clean(); ?>