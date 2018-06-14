<?php include 'includes/head.php';
include 'includes/navigation.php';
include 'includes/footer.php' ;
?>

      <!-- Carousel -->
      <div id="carouselmain" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselmain" data-slide-to="0" class="active"></li>
          <li data-target="#carouselmain" data-slide-to="1" class="active"></li>
          <li data-target="#carouselmain" data-slide-to="2" class="active"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" "active" src="./img/soap1.jpg" alt="First slide" >
              <div class="carousel-caption d-none d-md-block">
                <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="./img/soap2.jpg" alt="Second slide">
              <div class="carousel-caption d-none d-md-block">
                <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
              </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="./img/bodycream.jpg" alt="Third slide">
              <div class="carousel-caption d-none d-md-block">
                <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
              </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselmain" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselmain" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

      <div class="container">
        <hr>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <h4>Cran Pomp Soap</h4>
            <img src="img/soapbuy1.jpg" alt="Cran Pomp Soap" class="productimg"  />
            <p class="price">Price: $99</p>
            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#details-1">
              Details</button>
          </div>

          <div class="col-md-3">
            <h4>Cran Pomp Soap</h4>
            <img src="img/soapbuy1.jpg" alt="Cran Pomp Soap" class="productimg"  />
            <p class="price">Price: $99</p>
            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#details-1">
              Details</button>
          </div>

          <div class="col-md-3">
            <h4>Cran Pomp Soap</h4>
            <img src="img/soapbuy1.jpg" alt="Cran Pomp Soap" class="productimg" />
            <p class="price">Price: $99</p>
            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#details-1">
              Details</button>
          </div>
          
          <div class="col-md-3">
            <h4>Cran Pomp Soap</h4>
            <img src="img/soapbuy1.jpg" alt="Cran Pomp Soap" class="productimg" />
            <p class="price">Price: $99</p>
            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#details-1">
              Details</button>
          </div>
        </div>
      </div>            

      <?php
        include "includes/detailsmodal.php" ;
      ?>
    </body>
  </html>
