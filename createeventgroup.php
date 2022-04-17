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
        <form action="register.php" method="post">
<?php
session_start();
$id = $_SESSION['id'];
$username = $_SESSION['username'];

    if (isset($_SESSION["id"])){
        echo "<a> View My events </a>";
        echo "<a href='createeventgroup.php'> Create Event/Groups </a>";

        echo "<div class='header-right'>";
        echo "<a>Welcome, $username</a>";
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
<form action="authenticate.php" method="post">
    <div style="margin-bottom: 30px; margin-top:120px;">
        <h1>Create a group or an event</h1>
    </div>
    <div style="margin-left:20px;">
        <div class="form-group">
            <label>Group Name: </label>
            <input type="text" name="user" class="form-control" required><br><br>
        </div>
    
        <div class="form-group">
            <label>Topic: </label>
        
            <select id="topic" name="topic" style="width:200px">
                <option value="MoviesTVShow">Movies - TV Show</option>
                <option value="Books">Books</option>
                <option value="Music">Music</option>
                <option value="VideoGames">VideoGames</option>
                <option value="Sport">Sport</option>
                <option value="Other">Other</option>
            </select><br><br>
        </div>

        <div class="form-group">
            <label>Description: </label><br>
            <textarea id="description" name="description" rows="4" cols="50">
            </textarea><br><br>
        </div>
    
        <button type="submit" class="btn btn-primary">Sign In</button>
    </div>
</form>

</div>


<form action="authenticate.php" method="post">
    <div style="margin-bottom: 30px; margin-top:120px;">
        <h1>Create a group or an event</h1>
    </div>
    <div style="margin-left:20px;">
        <div class="form-group">
            <label>Group Name: </label>
            <input type="text" name="user" class="form-control" required><br><br>
        </div>
    
        <div class="form-group">
            <label>Topic: </label>
        
            <select id="topic" name="topic" style="width:200px">
                <option value="MoviesTVShow">Movies - TV Show</option>
                <option value="Books">Books</option>
                <option value="Music">Music</option>
                <option value="VideoGames">VideoGames</option>
                <option value="Sport">Sport</option>
                <option value="Other">Other</option>
            </select><br><br>
        </div>

        <div class="form-group">
            <label>Description: </label><br>
            <textarea id="description" name="description" rows="4" cols="50">
            </textarea><br><br>
        </div>
    
        <button type="submit" class="btn btn-primary">Sign In</button>
    </div>
</form>

<footer>


</footer>


</body>



</html>