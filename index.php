<?php 
require_once 'core/init.php' ;
include 'includes/head.php';
$page = 'index' ;
include 'includes/navigation.php';

$sql = "SELECT * FROM products WHERE store = 1" ;
$store = $db->query($sql);
?>

      <!-- Carousel -->
      <div class="carousel slide" data-ride="carousel" id="carouselmain">
      <ol class="carousel-indicators">
        <li class="active" data-slide-to="0" data-target="#carouselmain">
        </li>


        <li class="active" data-slide-to="1" data-target="#carouselmain">
        </li>


        <li class="active" data-slide-to="2" data-target="#carouselmain">
        </li>
      </ol>

      <div class="carousel-inner">
        <div class="carousel-item active">
          <img alt="First slide" class="d-block w-100" src="./img/soap1.jpg">

          <div class="carousel-caption d-none d-md-block">
            <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</h3>


            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          </div>
        </div>


        <div class="carousel-item">
          <img alt="Second slide" class="d-block w-100" src="./img/soap2.jpg">

          <div class="carousel-caption d-none d-md-block">
            <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</h3>


            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          </div>
        </div>


        <div class="carousel-item">
          <img alt="Third slide" class="d-block w-100" src="./img/bodycream.jpg">

          <div class="carousel-caption d-none d-md-block">
            <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</h3>


            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" data-slide="prev" href="#carouselmain" role="button"><span aria-hidden="true" class="carousel-control-prev-icon"></span> <span class="sr-only">Previous</span></a> <a class="carousel-control-next" data-slide="next" href="#carouselmain" role="button"><span aria-hidden="true" class="carousel-control-next-icon"></span> <span class="sr-only">Next</span></a>
    </div>


    <div class="container">
      <hr>
    </div>

    <div class="container">
      <div class="row">
      <?php while($product = mysqli_fetch_assoc($store)) : ?>
        <div class="col-md-3 text-center">
          <h4><?= $product['title']; ?></h4>
          <img src="<?= $product['image']; ?>" alt="<? $product['title'] ?>" class="productimg" />
          <p class="price">Price: $<?= $product['price']; ?></p>
          <button class="btn btn-sm btn-success" type="button" onclick="detailsmodal(<?= $product['id']; ?>)">Details</button>
        </div>
        <?php endwhile; ?>  
      </div>
    </div>


    <?php
      include 'includes/footer.php' ;
    ?>