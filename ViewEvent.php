<html>
<head>
<title> IU Group</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <div class="topnav">
        
        <a class="active" style="font-family:Luminari, fantasy" href="Main.php"> IU - Group </a>
        
        <a>Groups</a>
        <a>Events</a>
        
<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("location: Login.html");
}

$id = $_SESSION['id'];
$username = $_SESSION['username'];

    if (isset($_SESSION["id"])){
        echo "<a href='ViewEvent.php'> View My events </a>";
        echo "<a href='createeventgroup.php'> Create Event/Groups </a>";
        echo "<a href='Jointable.php'> Join Event/Groups </a>";

        echo "<div class='header-right'>";
        echo "<a href='Profil.php'>Welcome, $username</a>";
        echo "<a href='logout.php'> Logout </a>";
        echo "</div>";
    }
    else{
        echo "alert(" . isset($_SESSION["id"]) . ")";
        echo "<div class='header-right'>";
        echo "<a href='Login.html'>Login</a>";
        echo "<a href='Register.html'>Register</a>";
        echo "</div>";

    }
            
            
?>
        
    
      </div>



</header>


<div class="bodycontent">

<form action="delevent.php" method="post">
<label>ID of Event to delete: </label>
<input type="number" name="IDDELETE" class="form-control" required>
<input type="submit" value="Delete">
</form>

<?php
include 'dbconnection.php';
$sql = "select Event_Name, Event_Date, Event_Hour, Event_Place, U_Username, USER_EVENT.Event_ID FROM `USER_EVENT` INNER JOIN `EVENT` ON `USER_EVENT`.`Event_ID` = `EVENT`.`Event_ID` INNER JOIN `USER` ON `USER_EVENT`.`User_ID` = `USER`.`User_ID` WHERE USER_EVENT.User_ID = $id";
$result = mysqli_query($conn, $sql);



if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr><th>Event ID</th><th>Event Name</th><th>Event Date</th><th>Event Hour</th><th>Event Place</th><th>Username</th></tr>";
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        #echo $row['title'] . "<br>";
        echo "<tr><td>" . $row['Event_ID'] . "</td><td>" . $row['Event_Name'] . "</td><td>" . $row['Event_Date'] . "</td><td>". $row['Event_Hour'] ."</td><td>". $row['Event_Place'] . "</td><td>" . $row['U_Username'] . "</td></tr>";
        
        
    }
    
    
    
    
}
else {
    echo "You don't have any event";
}

mysqli_close($conn);
echo "</table>";




?>



</div>

<footer>


</footer>


</body>



</html>