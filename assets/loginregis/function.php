<?php
include 'koneksi.php';
if (isset($_POST["login"])) {

    //echo 'sudah login';
    $username = $_POST['username'];
    $password = $_POST['password'];

    //menyeleksi data user dengan username dan password yang sesuai
    $login = mysqli_query($con, "select * from login where
    username='$username' and password='$password'");
    //menghitung jumlah data yang ditemukan
    $cek = mysqli_num_rows($login);

    if ($cek > 0) {
        session_start();

        $_SESSION['username'] = $username;
        header('Location:dashboard.php');
    } else {
        header("location:login.php?pesan=gagal");
    }
} elseif (isset($_POST['regis'])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $query = "INSERT INTO login (username,email,password) VALUES (
        '$username','$email','$password')";

    if (mysqli_query($con, $query)) {
        echo "<h1>Username $username berhasil terdaftar</h1>
        <a href='login.php'>Kembali Login</h1>";
    } else {
        echo "Pendaftaran Gagal : " . mysqli_error($koneksi);
    }
}
?>