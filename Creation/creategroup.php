<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("location: Login.html");
}

include 'dbconnection.php';

mysqli_select_db($conn,'jbeugre_db');

$GroupName=$_POST['GroupName'];
$GroupTopic=$_POST['GroupTopic'];
$GroupMaxuser=$_POST['GroupMaxuser'];
$GroupDescription= $_POST['GroupDescription'];
$Creator = $_SESSION['id'];

$sql = "insert into `GROUPS` (`Group_CreatorID`, `Group_Name`, `Group_Topic`, `Group_NumberofUser`, `Group_MaxUser`, `Group_Description`) VALUES ($Creator, '$GroupName','$GroupTopic', 1 , $GroupMaxuser , '$GroupDescription')";

    if (mysqli_query($conn, $sql)) {
        $sql2 = "select `Group_ID` FROM `GROUPS` WHERE `Group_CreatorID`= $Creator AND `Group_Name`= $GroupName ";
        $result2 = mysqli_query($conn, $sql2);

        $sql3 = "insert INTO `USER_GROUP`(`User_ID`, `Group_ID`) VALUES ($Creator, (SELECT MAX(`Group_ID`) FROM `GROUPS`))";
        mysqli_query($conn, $sql3);
        

        echo"<script>alert('$sql3');
         window.location.replace('https://in-info-web4.informatics.iupui.edu/~jbeugre/PROJECT/Main.php')</script>";
    }
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

mysqli_close($conn);
?>