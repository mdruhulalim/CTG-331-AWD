<?php
$error=[];
if(isset($_POST['submit'])){
    $name = trim(htmlentities($_POST['name']));
    $username = trim(htmlentities($_POST['username']));
    $email = trim(htmlentities($_POST['email']));
    $password = $_POST['password'];
    if(empty($name)){
        $error['errorname']='Inter your name';
    }
    if(empty($username)){
        $error['errorusername']='Inter your user name';
    }
    if(empty($email)){
        $error['erroremail']='Inter your email';
    }
    if(empty($password)){
        $error['errorpassword']='Inter your password';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <div class="md-5">
        <div class="containter">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card mt-5">
                        <div class="card-header">
                            <h2>Sign up</h2>
                        </div>
                        <div class="card-body">
                            <form method="post">
                                <input class="form-control" type="text" name="name" placeholder="Inter your name">
                                <?php
                                if(isset($error['errorname'])){
                                    ?>
                                    <p class="text-danger">  <?=$error['errorname']?>   </p>
                                    <?php
                                }
                                ?>
                                <input class="form-control" type="text" name="username" placeholder="Inter your user name">
                                <?php
                                if(isset($error['errorusername'])){
                                    ?>
                                    <p class="text-danger"><?=$error['errorusername']?></p>
                                    <?php
                                }
                                ?>
                                <input class="form-control" type="email" name="email" placeholder="Inter your email here">
                                <?php
                                if(isset($error['erroremail'])){
                                    ?>
                                    <p class="text-danger"><?=$error['erroremail']?></p>
                                    <?php
                                }
                                ?>
                                <input class="form-control" type="password" name="password" placeholder="Inter a strong password">
                                <?php
                                if(isset($error['errorpassword'])){
                                    ?>
                                    <p class="text-danger"><?=$error['errorpassword']?></p>
                                    <?php
                                }
                                ?>
                                <input class="form-control" type="submit" name="submit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>