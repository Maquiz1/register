<?php 

require_once 'config/config.php';
include('includes/header.php');

if($_SESSION['user']){
  $user = $_SESSION['user'];
 
}else{
  header('Location: login.php');
}
?>


  <div class="text-success">
    <h1>THIS IS THE INDEX</h1>

  </div>


<?php include('includes/footer.php'); ?>







