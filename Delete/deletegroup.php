<?php
include 'dbconnection.php';
session_start();

if (!isset($_SESSION["username"])) {
    header("location: Login.html");
}


$id = $_SESSION['id'];
$gid = $_POST['Groupdel'];

$sql = "delete FROM `GROUPS` WHERE `Group_ID`= $gid AND `Group_CreatorID`= $id";
mysqli_query($conn, $sql);

mysqli_close($conn);
echo"<script>alert('Action completed');
         window.location.replace('https://in-info-web4.informatics.iupui.edu/~jbeugre/PROJECT/Profil.php')</script>";

?>