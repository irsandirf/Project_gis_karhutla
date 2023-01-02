<?php
require 'koneksi.php';
$id = $_POST["id"];
$nama = $_POST["nama"];
$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];

$query_sql = "INSERT INTO user (id, nama, email, username, password)
                VALUES ('$id', '$nama', '$email', '$username', '$password')";

if (mysqli_query($con, $query_sql)) {
    header("Location: login.php");
} else {
    echo "Pendaftaran Gagal : " . mysqli_error($con);
}