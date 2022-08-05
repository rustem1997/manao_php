<?php

require_once './config/config.php';

session_start();

if (isset($_POST['submit'])) {
   $name = $_POST['name'];
   $login = $_POST['login'];
   $email = mysqli_real_escape_string($conn, $_POST['usermail']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);

   $select = " SELECT * FROM manao_auth WHERE email = '$email' && password = '$pass'";

   $result = mysqli_query($conn, $select);

   if (mysqli_num_rows($result) > 0) {
      $error[] = '<h3 style="color:red">Проверте провильность поля</h3>';
   } else {
      if ($name === '') {
         $error[] = '<h3 style="color:red">Имя пустой!</h3>';
      } elseif ($login === '') {
         $error[] = '<h3 style="color:red">Логин пустой!</h3>';
      } elseif ($email === '') {
         $error[] = '<h3 style="color:red">email пустой</h3> ';
      } elseif ($pass != $cpass) {
         $error[] = '<h3 style="color:red">Пароль не совподаеть!</h3>';
      } else {
         $insert = "INSERT INTO manao_auth(id,name,login,email, password) VALUES(NULL,'$name','$login','$email','$pass')";
         mysqli_query($conn, $insert);
         header('location:auth.php');
      }
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
      <div class="content">
         <form action="" method="post">
            <h2 class="title">Регистрации</h2>

            <input type="text" name="name" placeholder="Введите имя" 
            title=" 2 символа , только буквы" minlength="2" pattern="^(?=.*[a-z]).{2,2}">

            <input type="text" name="login" placeholder="Введите логин" 
            title="минимум 6 символов"pattern="^.{6,}$">

            <input type="email" name="usermail" placeholder="Введите email your email" 
            title="Отсутсвует символ @"  pattern="[^ @]*@[^ @]*">

            <input type="password" name="password" placeholder="Введите пароль your password"
            title="минимум 6 символов , обязательно должны состоять из цифр и букв" pattern="^(?=.*[a-z])(?=.*[0-9]).{6,}$" />

            <input type="password" name="cpassword" placeholder="Потверждения пароль your password">

            <input type="submit" value="Отпрваить" class="form-btn" name="submit">
            <?php
            if (isset($error)) {
               foreach ($error as $error) {
                  echo '<span class="error-msg">' . $error . '</span>';
               }
            }
            ?>
            <p>У вас есть уже аккаунт? <a href="/auth.php">Авторизации!</a></p>
         </form>

      </div>
   </div>
</body>

</html>