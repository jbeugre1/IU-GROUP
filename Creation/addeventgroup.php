<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("location: Login.html");
}
include 'dbconnection.php';

mysqli_select_db($conn,'jbeugre_db');

$EventGroupid = $_POST['Eventsearch'];
$EventName=$_POST['EventGroupName'];
$EventDate=$_POST['EventGroupDate'];
$EventHour=$_POST['EventGroupHour'];
$EventAddress= $_POST['EventGroupAddress'];
$EventImportance = $_POST['Event_Importance'];	
$Creator = $_SESSION['id'];


echo "g";
$sql = "insert into `EVENT`(`Event_CreatorID`, `Event_Name`, `Event_Date`, `Event_Hour`, `Event_Place`, `Event_Type`) VALUES ($Creator,'$EventName','$EventDate','$EventHour','$EventAddress','EVENT_GROUP')";

    if (mysqli_query($conn, $sql)) {

        $getid = "select `Event_ID` from EVENT where Event_Name ='$EventName' AND Event_CreatorID = $Creator";
        $result = mysqli_query($conn, $getid);
        $row = mysqli_fetch_assoc($result);
        $idvalue = $row["Event_ID"];
        $sql2 = "insert into `EVENT_GROUP` (`Event_ID`, `Event_Importance`, `Event_NumberofUserEnr`) VALUES ($idvalue,'$EventImportance', 1)";

        
        if (mysqli_query($conn, $sql2)) {
            $send = "select User_ID FROM `USER_GROUP` WHERE `Group_ID`= $EventGroupid";
            $result2 = mysqli_query($conn, $send);
            while($row = mysqli_fetch_assoc($result2)) {
                $quer = "insert INTO `USER_EVENT`(`User_ID`, `Event_ID`) VALUES (" . $row['User_ID'] . ",$idvalue)";
                mysqli_query($conn, $quer); 
            }
            echo"<script>alert('Event Created');
         window.location.replace('https://in-info-web4.informatics.iupui.edu/~jbeugre/PROJECT/Profil.php')</script>";
        }
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    
        }
    }
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);

    }

   


?>