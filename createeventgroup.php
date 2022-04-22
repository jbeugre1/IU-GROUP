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
<form action="Creation/creategroup.php" method="post">
    <div style="margin-bottom: 30px; margin-top:120px;">
        <h1>Create a group</h1>
    </div>
    <div style="margin-left:20px;">
        <div class="form-group">
            <label>Group Name: </label>
            <input type="text" name="GroupName" class="form-control" required><br><br>
        </div>
    
        <div class="form-group">
            <label>Topic: </label>
        
            <select id="GroupTopic" name="GroupTopic" style="width:200px">
                <option value="MoviesTVShow">Movies - TV Show</option>
                <option value="Books">Books</option>
                <option value="Music">Music</option>
                <option value="VideoGames">VideoGames</option>
                <option value="Sport">Sport</option>
                <option value="Other">Other</option>
            </select><br><br>
        </div>

        <div class="form-group">
            <label>Group Maximum of User: </label>
            <input type="number" name="GroupMaxuser" class="form-control" required><br><br>
        </div>

        <div class="form-group">
            <label>Description: </label><br>
            <textarea id="GroupDescription" name="GroupDescription" rows="4" cols="50"></textarea><br><br>
        </div>
    
        <button type="submit" class="btn btn-primary">Sign In</button>
    </div>
</form>

</div>

<div class="bodycontent">
<form action="Creation/createevent.php" method="post">
    <div style="margin-bottom: 30px; margin-top:120px;">
        <h1>Create an event</h1>
    </div>
    <div style="margin-left:20px;">
        <div class="form-group">
            <label>Event Name: </label>
            <input type="text" name="EventName" class="form-control" required><br><br>
        </div>

        <div class="form-group">
            <label>Event Date: </label>
            <input type="date" name="EventDate" class="form-control" required><br><br>
        </div>
    
        <div class="form-group">
            <label>Event Hour: </label>
        
            <select id="EventHour" name="EventHour" style="width:200px">
                <option value='1:00'> 1:00 </option>
                <option value='2:00'> 2:00 </option>
                <option value='3:00'> 3:00 </option>
                <option value='4:00'> 4:00 </option>
                <option value='5:00'> 5:00 </option>
                <option value='6:00'> 6:00 </option>
                <option value='7:00'> 7:00 </option>
                <option value='8:00'> 8:00 </option>
                <option value='9:00'> 9:00 </option>
                <option value='10:00'> 10:00 </option>
                <option value='11:00'> 11:00 </option>
                <option value='12:00'> 12:00 </option>
                <option value='13:00'> 13:00 </option>
                <option value='14:00'> 14:00 </option>
                <option value='15:00'> 15:00 </option>
                <option value='16:00'> 16:00 </option>
                <option value='17:00'> 17:00 </option>
                <option value='18:00'> 18:00 </option>
                <option value='19:00'> 19:00 </option>
                <option value='20:00'> 20:00 </option>
                <option value='21:00'> 21:00 </option>
                <option value='22:00'> 22:00 </option>
                <option value='23:00'> 23:00 </option>
                <option value='24:00'> 24:00 </option>
            </select><br><br>
        </div>
        

        <div class="form-group">
            <label>Event Address: </label>
            <input type="text" name="EventAddress" class="form-control" required><br><br>
        </div>

        <div class="form-group">
            <label>Is There a Maximum number of participant: </label>
            <select id="Ismax" name="Ismax" style="width:200px">
                <option value="True">True</option>
                <option value="False">False</option>        
            </select><br><br>
        </div>
    
        <button type="submit" class="btn btn-primary">Sign In</button>
    </div>
    </div>
</form>

<footer>


</footer>


</body>



</html>