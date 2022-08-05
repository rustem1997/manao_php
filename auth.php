<?php

require_once './config/config.php';

session_start();

if(isset($_POST['submit'])){
    
   $email = mysqli_real_escape_string($conn, $_POST['usermail']);
   $pass = md5($_POST['password']);

   $select = " SELECT * FROM manao_auth WHERE email = '$email' && password = '$pass'";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $_SESSION['usermail'] = $email;
      header('location:profil.php');
   }else{
      $error[] = '<h2 style="color:red">Неправильно email или пароль.</h2>';
   }

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
    
<div class="form-container">

    <form action="" method="post">
        <h2 class="title">Авторизации</h2>
     
        <input type="email" name="usermail" placeholder="Введите email" >
        <input type="password" name="password" placeholder="Введите пароль" >
        <input type="submit" value="Отпрваить" class="form-btn" name="submit">

        <?php
         if(isset($error)){
            foreach($error as $error){
               echo '<span class="error-msg">'.$error.'</span>';
            }
         }
      ?>
        <p>У вас нет аккаунт? <a href="index.php">Регистрации</a></p>
    </form>

</div>

</body>
</html>