<?php
    require_once 'config/config.php';

    $errors = ['firstName' => '','lastName' => '','username' => '',
               'password1' => '','password2' => '','email' => ''];

    $firstName = $lastName = $password1 =$password2 = $username = $email= '';           

    if(isset($_POST['register'])){
        
        if(empty($_POST['firstName'])){
            $errors['firstName'] = 'First Name can not be empty';
        }else{
            $firstName = htmlspecialchars($_POST['firstName']);
        }

        if(empty($_POST['lastName'])){
            $errors['lastName'] = 'Last Name can not be empty';

        }else{
            $lastName = htmlspecialchars($_POST['lastName']);
        }

        if(empty($_POST['username'])){
            $errors['username'] = 'username can not be empty';

        }else{
            $username = htmlspecialchars($_POST['username']);
        }

        if(empty($_POST['password1'])){
            $errors['password1'] = 'Password can not be empty';
            
        }else{
            $password1 = htmlspecialchars($_POST['password1']);
            $password2 = htmlspecialchars($_POST['password2']);

            if($password1 != $password2){
                $errors['password1'] = 'Password do not match';
                $errors['password2'] = 'Password do not match'; 
            }      
            
        }

        if(empty($_POST['password2'])){
            $errors['passwird2'] = 'Password can not be empty';

        }

        if(empty($_POST['email'])){
            $errors['email'] = 'Email can not be empty';
        }else{
            $email = htmlspecialchars($_POST['email']);

            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $errors['email'] = 'Enter a valid Email';
            }
        }
        //check if more errors
        if (!array_filter($errors)) {
            //CHECK IF EMAIL EXISTS
            $sql = "SELECT * FROM  users WHERE email = :email LIMIT 1";
            $stmt = $conn->prepare($sql);
            $stmt->execute(['email'=> $email]);
            if($stmt->rowCount()){
                $errors['email'] = "Email already exists";

            }else{
                //hash the password
            $password = md5($password1);
            //save the data
            $sql = "INSERT INTO users (firstName,lastName,username,password,email) 
                    VALUES (:firstName,:lastName,:username,:password,:email)";
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                [
                'firstName'  => $firstName,
                'lastName'   => $lastName,
                'username'   => $username,
                'password'   => $password,
                'email'      => $email
                ]
            );

            //Last inserted ID
            $last_id = $conn->lastInsertId();

            //SELECT NEW REGISTERED AND STORE IN A SESSION
            $sql = "SELECT * FROM  users WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->execute(['id'=>$last_id]);
            $user = $stmt->fetch();
            if($user){
                $_SESSION['user'] = $user;
                header('Location: login.php');
            }
            }

            
        }    

    }
?>


<?php include('includes/header.php'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                <h2>Register Here</h2>
                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input type="text" name="firstName" id="firstName" class="form-control" value="<?= $firstName; ?>">
                    <div class="text-danger"><?= $errors['firstName']; ?></div>
                </div>
                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input type="text" name="lastName" id="lastName" class="form-control" value="<?= $lastName; ?>">
                    <div class="text-danger"><?= $errors['lastName']; ?></div>
                </div>
                <div class="form-group">
                    <label for="username">username</label>
                    <input type="text" name="username" id="username" class="form-control" value="<?= $username; ?>">
                    <div class="text-danger"><?= $errors['username']; ?></div>
                </div>
                <div class="form-group">
                    <label for="password1">Password</label>
                    <input type="password" name="password1" id="password1" class="form-control" value="<?= $password1; ?>">
                    <div class="text-danger"><?= $errors['password1']; ?></div>
                </div>
                <div class="form-group">
                    <label for="password2">Confirm Password</label>
                    <input type="password" name="password2" id="password2" class="form-control">
                    <div class="text-danger"><?= $errors['password2']; ?></div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control" value="<?= $email; ?>">
                    <div class="text-danger"><?= $errors['email']; ?></div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="register" class="btn btn-primary">Register</button>
                </div>
            </form>
        </div>

    </div>

</div>



<?php include('includes/footer.php'); ?>