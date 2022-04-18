<?php
session_start();
include 'dbconnection.php';

mysqli_select_db($conn,'jbeugre_db');

$EventName=$_POST['EventName'];
$EventDate=$_POST['EventDate'];
$EventHour=$_POST['EventHour'];
$EventAddress= $_POST['EventAddress'];
$Creator = $_SESSION['id'];

$sql = "insert into `EVENT`(`Event_CreatorID`, `Event_Name`, `Event_Date`, `Event_Hour`, `Event_Place`, `Event_Type`) VALUES ($Creator,'$EventName','$EventDate','$EventHour','$EventAddress','EVENT_INDEPENDENT')";

    if (mysqli_query($conn, $sql)) {
        echo"<script>alert('Registration Successful');
         window.location.replace('https://in-info-web4.informatics.iupui.edu/~jbeugre/PROJECT/Main.php')</script>";
    }
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

mysqli_close($conn);
?>