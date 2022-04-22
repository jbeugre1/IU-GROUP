<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("location: Login.html");
}


include 'dbconnection.php';

mysqli_select_db($conn,'jbeugre_db');

$EventName=$_POST['EventName'];
$EventDate=$_POST['EventDate'];
$EventHour=$_POST['EventHour'];
$EventAddress= $_POST['EventAddress'];
$Ismax = $_POST['Ismax'];
$Creator = $_SESSION['id'];


$sql = "insert into `EVENT`(`Event_CreatorID`, `Event_Name`, `Event_Date`, `Event_Hour`, `Event_Place`, `Event_Type`) VALUES ($Creator,'$EventName','$EventDate','$EventHour','$EventAddress','EVENT_INDEPENDENT')";

    if (mysqli_query($conn, $sql)) {

        $getid = "select `Event_ID` from EVENT where Event_Name ='$EventName' AND Event_CreatorID = $Creator";
        $result = mysqli_query($conn, $getid);
        $row = mysqli_fetch_assoc($result);
        $idvalue = $row["Event_ID"];
        $sql2 = "insert into `EVENT_INDEPENDENT` (`Event_ID`, `Event_ismaxnumberofUser`, `Event_NumberofUser`) VALUES ($idvalue,'$Ismax', 1)";
        
        if (mysqli_query($conn, $sql2)) {
            echo"<script>alert('Action Completed');
         window.location.replace('https://in-info-web4.informatics.iupui.edu/~jbeugre/PROJECT/Main.php')</script>";
        }
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

    }
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

mysqli_close($conn);
?>