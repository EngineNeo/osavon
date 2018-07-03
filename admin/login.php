<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/osavon/core/init.php';
include 'includes/head.php';

$email = ((isset($_POST['email']))?sanitize($_POST['email']):'');
$email = trim($email);
$password = ((isset($_POST['password']))?sanitize($_POST['password']):'');
$password = trim($password);
$errors = array();
?>

<?php
    if($_POST){
        if(empty($_POST['email']) || empty($_POST['password'])){
            $errors[] = 'You must provide email and password.' ;
        }
        // validate email
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors[] = 'You must enter a valid email.';
        }

        // password is more than 6 characters
        if(strlen($password) < 6){
            $errors[] = 'Password must be at least 6 characters.';
        }
        //check if email exists in database
        $query = $db->query("SELECT * FROM users WHERE email = '$email'");
        $user = mysqli_fetch_assoc($query);
        $userCount = mysqli_num_rows($query);
        if($userCount < 1){
            $errors[] = 'That email does not exist in our database';
        }

        if(!password_verify($password, $user['password'])){
            $errors[] = 'The password does not match our records, please try again.';
        }

        //check for errors
        if(!empty($errors)){
            echo display_errors($errors);
        }else{
            //log user in
            $user_id = $user['id'];
            login($user_id);
        }
    }
?>

<div class="container">
    <div id="login-form">
        <div></div>
        <h2 class="text-center">Login</h2><hr>
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" value="<?=$email;?>">
            </div>
            <div class="form-group">
                <label for="email">Password:</label>
                <input type="password" name="password" id="password" class="form-control" value="<?=$password;?>">
            </div>
            <div class="form-group">
                <input type="submit" value="Login" class="btn btn-primary">
            </div>
        </form>
        <p class="text-right"><a href="/osavon/index.php" alt="home">Back to Site</a></p>
    </div>
</div>
<?php include 'includes/footer.php' ;
?>