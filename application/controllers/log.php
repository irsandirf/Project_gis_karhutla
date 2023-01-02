<?php
require 'koneksi.php';
$email = $_POST["email"];
$password = $_POST["password"];

$query_sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";

$result = mysqli_query($con, $query_sql);

if (mysqli_num_rows($result) > 0) {
    header("Location: halamanutama.php");
} else {
    echo "<center><h1>Email atau Password Anda Salah. Silahkan Coba Login Kembali.</h1>
    <button><strong><a href='login.php'>Login</a></strong></button></center>";
}
