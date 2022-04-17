<?php


include 'dbconnection.php';
mysqli_select_db($conn,'jbeugre_db');
$name=$_POST['user'];
$pass=$_POST['password'];

$s="select * from USER where U_Username ='$name' && BINARY U_Password = '$pass'";

$result = mysqli_query($conn, $s);

$num = mysqli_num_rows ($result) ;

if ($num==1){
    
    session_start();
    $id="select User_ID, U_Username from USER where U_Username ='$name' && U_Password = '$pass'";
    $result = mysqli_query($conn, $id);
    $row = mysqli_fetch_assoc($result);
    echo $row["User_ID"];
    echo $row["U_Username"];

    $_SESSION["id"] = $row["User_ID"];
    $_SESSION["username"] = $row["U_Username"];

    echo "<script> alert('Successful Authentication')
    window.location.replace('Main.php')
    </script>";

}else {
    
    echo "<script> alert('Username/Password is not correct') 
    window.location.replace('Login.html')
    </script>";
}
?>