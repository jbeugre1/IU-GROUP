<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("location: Login.html");
}
include 'dbconnection.php';

$id = $_SESSION['id'];
$eid = $_POST['IDDELETE'];

$sql = "select * FROM `USER_EVENT` WHERE `User_ID` = $id AND `Event_ID`= $eid";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $sql2 = "delete FROM `USER_EVENT` WHERE `User_ID` = $id AND `Event_ID` = $eid";
    
    if(mysqli_query($conn, $sql2)){
        mysqli_close($conn);
        echo"<script>alert('Registration Successful');
        window.location.replace('ViewEvent.php')</script>";
    }
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }

}
else{
    echo "<script> alert(\" You don't have this event in your events \") </script>";
}


?>