<?php
    require_once '../core/init.php';
    if(!is_logged_in()){
        header('Location: login.php');
    }
    include 'includes/head.php' ; 
    $page = 'index' ;
    include 'includes/navigation.php' ;
?>

<h1 class="display-3 text-center">Administrator Dashboard</h1>

<?php include 'includes/footer.php' ; ?>