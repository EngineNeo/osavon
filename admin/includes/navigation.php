<!-- Navbar -->
<nav class="navbar navbar-default navbar-right navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="./index.php">O' Savon Admin</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?php if($page=='index'){echo 'active';}?>">
              <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?php if($page=='products'){echo 'active';}?>">
              <a class="nav-link" href="products.php">Products<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?php if($page=='archive'){echo 'active';}?>">
              <a class="nav-link" href="archive.php">Archive<span class="sr-only">(current)</span></a>
            </li>
            <?php if(has_permission('admin')): ?>
            <li class="nav-item <?php if($page=='users'){echo 'active';}?>">
              <a class="nav-link" href="users.php">Users<span class="sr-only">(current)</span></a>
            </li>
            <?php endif; ?>
            <li class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hello <?=$user_data['first']; ?>!
                <span class="caret"></span>
              </a>
              <div class="dropdown-menu" role="menu">
                <a class="dropdown-item" href="change_password.php">Change password</a>
                <a class="dropdown-item" href="logout.php">Log Out</a>
              </div>
            </li>
      </div>
    </div>
  </nav>