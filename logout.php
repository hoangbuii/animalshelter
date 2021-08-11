<?php session_start(); 
include('ketnoi.php');
$username = $_SESSION['username'];
$result = $conn->query("UPDATE thongtintnv 
    SET trangthaihoatdong = 14
    WHERE tendangnhap = '$username'");
if (isset($_SESSION['username'])){
    unset($_SESSION['username']); 
}
header("Location: index.php");
?>
