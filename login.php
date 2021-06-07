<?php
    require_once 'config/config.php';


    $errors = ['username' => '','password1' => ''];

    $password1 = $username = '';           

    if(isset($_POST['login'])){
        
        if(empty($_POST['username'])){
            $errors['username'] = 'username can not be empty';

        }else{
            $username = htmlspecialchars($_POST['username']);
        }

        if(empty($_POST['password1'])){
            $errors['password1'] = 'Password can not be empty';
            
        }else{
            $password1 = htmlspecialchars($_POST['password1']);     
        }

        //check if more errors
        if (!array_filter($errors)) {

            //hash the password
            $password = md5($password1);

            //CHECK IF EMAIL EXISTS
            $sql = "SELECT * FROM  users WHERE username = :username AND password = :password LIMIT 1";
            $stmt = $conn->prepare($sql);
            $stmt->execute(['username'=> $username, 'password'=> $password]);

            if($stmt->rowCount()){
                $user = $stmt->fetch();
                $_SESSION['user'] = $user;
                header('Location: index.php');
                
            }else{
                $errors['username'] = "Invalid username or passowrd";
            }
        }

    }
?>


<?php include('includes/header.php'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                <h2>Login Here</h2>
                <div class="form-group">
                    <label for="username">username</label>
                    <input type="text" name="username" id="username" class="form-control" value="<?= $username; ?>">
                    <div class="text-danger"><?= $errors['username']; ?></div>
                </div>
                <div class="form-group">
                    <label for="password1">Password</label>
                    <input type="password" name="password1" id="password1" class="form-control"
                        value="<?= $password1; ?>">
                        <div class="text-danger"><?= $errors['username']; ?></div>
                </div>
                <form action="logout.php">
                    <input type="submit" name="login" value="login">
                </form>
            </form>
        </div>

    </div>

</div>



<?php include('includes/footer.php'); ?>