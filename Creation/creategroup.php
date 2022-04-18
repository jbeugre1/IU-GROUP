<?php
session_start();
include 'dbconnection.php';

mysqli_select_db($conn,'jbeugre_db');

$GroupName=$_POST['GroupName'];
$GroupTopic=$_POST['GroupTopic'];
$GroupMaxuser=$_POST['GroupMaxuser'];
$GroupDescription= $_POST['GroupDescription'];
$Creator = $_SESSION['id'];

$sql = "insert into `GROUPS` (`Group_CreatorID`, `Group_Name`, `Group_Topic`, `Group_NumberofUser`, `Group_MaxUser`, `Group_Description`) VALUES ($Creator, '$GroupName','$GroupTopic', 1 , $GroupMaxuser , '$GroupDescription')";

    if (mysqli_query($conn, $sql)) {
        echo"<script>alert('Registration Successful');
         window.location.replace('https://in-info-web4.informatics.iupui.edu/~jbeugre/PROJECT/Main.php')</script>";
    }
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

mysqli_close($conn);
?>