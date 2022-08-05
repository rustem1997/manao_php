<?php
// ----------------------под бд-----------------
$conn = mysqli_connect('localhost','root','root','user_db');
if (!$conn) {
    die('Error connect to DataBase');
}
?>