<?php include 'includes/head.php';
include 'includes/navigation.php';
?>
      <!-- Contents -->
        <div class="container">
          <h1 class="display-1" style="text-align:center;word-wrap: break-word;">Contact Us</h1>
          <p class="h4" style="text-align:center">Thank you for visting O' Savon<br>Contact us if you have and questions or concerns</p>

          <hr>

      <!-- Forms -->
      <form>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inlineFormInputName">First Name</label>
            <input type="text" class="form-control" id="inlineFormInputFName" placeholder="Jane">
          </div>
          <div class="form-group col-md-6">
            <label for="inlineFormInputName">Last Name</label>
            <input type="text" class="form-control" id="inlineFormInputLName" placeholder="Doe">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail">Email Address</label>
          <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="example@example.com">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="customertextarea">Tell us what you'd like to know</label>
          <textarea class="form-control" id="customertextarea" rows="5"></textarea>
        </div>
      </div>
          <?php include 'includes/footer.php' ;
          ?>
      </body>
  </html>
