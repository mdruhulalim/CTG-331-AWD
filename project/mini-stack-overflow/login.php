<?php
include('inc/header.php');
if(isset($_POST['submit'])){
    include('core/user.php');
    $user = new User();
    $login = $user->login($_POST['uname'], $_POST['password']);
    if($login > 0){
        echo "Hello";
    } else {
        $error = "Invalid login credentials.";
    }

    // if ($login) {
    //     // Set session variables and redirect user to dashboard
    //     session_start();
    //     $_SESSION['user_id'] = $login['ID'];
    //     $_SESSION['username'] = $login['username'];
    //     $_SESSION['email'] = $login['email'];
    //     header('Location: index.php');
    //     exit;
    // } else {
    //     $error = "Invalid login credentials.";
    // }
}
?>

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header">
                    <h2>Log in</h2>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <form action="" method="POST">
                            <label for="uname">Username</label>
                            <input class="form-control mb-3" type="text" name="uname">
                            <label for="password">Password</label>
                            <input class="form-control" type="password" name="password">
                            <input class="form-control btn btn-success mt-3" type="submit" value="Log in" name="submit">
                            <span><a href="register.php">Register</a></span>
                        </form>
                    </div>
                    <?php if(isset($error)) { ?>
                    <div class="alert alert-danger mt-3" role="alert">
                        <?php echo $error; ?>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('inc/footer.php');
?>
