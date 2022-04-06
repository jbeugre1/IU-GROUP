<?php
session_start();

include 'dbconnection.php';
mysqli_select_db($conn,'leegudur_db');
$name=$_POST['user'];
$pass=$_POST['password'];

$s="select * from usertable where name ='$name' && password = '$pass'";

$result = mysqli_query($conn, $s);

$num = mysqli_num_rows ($result) ;

if ($num==1){
    header('location:lab1.php');
}else {
    header('location:login.php');
}
?>