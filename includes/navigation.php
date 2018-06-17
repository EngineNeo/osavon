<!-- Navbar -->
  <nav class="navbar navbar-default navbar-right navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <img src="./img/logo1.png" width="45" height="45" alt="">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item <?php if($page=='index'){echo 'active';}?>">
            <a class="nav-link" href="index.php">Store<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item <?php if($page=='about'){echo 'active';}?>">
            <a class="nav-link" href="about.php">About<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item <?php if($page=='contact'){echo 'active';}?>">
            <a class="nav-link" href="contact.php">Contact<span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>