<?php
session_start();
header('location:login.php');

include 'dbconnection.php';
mysqli_select_db($conn,'jbeugre_db');
$name=$_POST['user'];
$pass=$_POST['password'];

$s="select * from usertable where name ='$name'";

$result = mysqli_query($conn, $s);


$num = mysqli_num_rows ($result) ;
echo $num;

if ($num==1){
    echo"Username already taken";
}else {
    $reg="insert into usertable(name,password) values ('$name' , '$pass')";
    mysqli_query($conn,$reg);
    echo" Registration Successful";
}
?>