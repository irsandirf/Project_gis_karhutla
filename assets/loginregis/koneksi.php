<?php
$servername="localhost";
$username="root";
$password="";
$database="karhutla";

$con = mysqli_connect($servername,$username,$password,$database);
if (!$con){
    die("Koneksi gagal:".mysqli_connect_error());
} else {
    echo "Koneksi Berhasil";
}
?>