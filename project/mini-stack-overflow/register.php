<?php
include('inc/header.php');
?>
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header">
                    <h2>Register now</h2>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <form action="" method="POST">
                            <?php
                            if(isset($_POST['submit'])){
                                include('core/user.php');
                                $user= new User;
                                $userCount= $user->userExists($_POST['uname'],$_POST['email']);
                                if($userCount > 0){
                                    echo "<p class='alert alert-warning'>User/Email alrady exist</p>";
                                }else{
                                    $user->insert($_POST['uname'],$_POST['email'],$_POST['password']);
                                }
                            }
                            ?>
                            <label for="email">Inter your username</label>
                            <input class="form-control mb-3" type="text" name="uname">
                            <label for="email">Inter your email</label>
                            <input class="form-control mb-3" type="email" name="email">
                            <label for="password">Password</label>
                            <input class="form-control" type="password" name="password">
                            <input class="form-control btn btn-success mt-3" type="submit" value="Register" name="submit">
                            <span><a href="login.php">Log in</a></span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('inc/footer.php');