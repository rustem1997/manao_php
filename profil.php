<?php

require_once './config/config.php';

session_start();

if(!isset($_SESSION['usermail'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
<div class="container">
   <div class="content">
      <h1 style="color:white ;">Привет</h1>
      <h1  style="color:white ;">Ваш email : <span><?php echo $_SESSION['usermail']; ?></span></h1>
      <a href="./config/logout.php" class="logout"><h1 >выйты</h1></a>
   </div>
  
</div>

</body>
</html>