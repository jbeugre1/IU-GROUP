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
        echo "<a href='logout.php'>Logout</a>";
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



<footer>


</footer>


</body>



</html>

