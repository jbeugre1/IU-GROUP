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

<div class= 'bodycontent'>
        <div class= 'side'>
            <h3>Create Event for your Group</h3>

            <?php
            include 'dbconnection.php';

            $sqlgroup = "select * FROM `GROUPS` WHERE Group_CreatorID = $id";
            $result = mysqli_query($conn, $sqlgroup);
            $numb = mysqli_num_rows($result) > 0;

            if (mysqli_num_rows($result) > 0) {
                echo "<form action='Creation/addeventgroup.php' method='post'>";
                echo "<label> Group: </label>";
                echo "<select id='Eventsearch' name='Eventsearch' style='width:200px'>";
                
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='". $row['Group_ID'] . "'>" . $row['Group_Name'] . "</option>";
                    
                }
                echo "</select><br><br>";
                

                echo "<label>Event Name: </label>";
                echo "<input type=\"text\" name=\"EventGroupName\" class=\"form-control\" required><br><br>";
                echo "<label>Event Date: </label>";
                echo "<input type=\"date\" name=\"EventGroupDate\" class=\"form-control\" required><br><br>";
                echo "<label>Event Hour: </label>";
                    
                echo "<select id=\"EventGroupHour\" name=\"EventGroupHour\" style=\"width:200px\">
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
                </select><br><br>";

                echo "<label>Event Address: </label>";
                echo "<input type=\"text\" name=\"EventGroupAddress\" class=\"form-control\" required><br><br>";

                echo "<label>Event Importance: </label>";
                echo "<select id='Event_Importance' name='Event_Importance' style='width:200px'>";
                echo "<option value='Very Important'> Very Important</option>";
                echo "<option value='Important'> Important </option>";
                echo "<option value='Optional'> Optional </option>";
                echo "</select><br><br>";

                echo "<input type='submit' value='Create Event' >";
                echo "</form>";
            }
            else{
                echo "You don't have any Group";
                
            }

            ?>
            <h3>Delete your group</h3>
            <form action='Delete/deletegroup.php' method='post'>
                <label>Group</label>
                <?php
                    include 'dbconnection.php';
                    $sqlgroup = "select * FROM `GROUPS` WHERE Group_CreatorID = $id"; 
                    $result = mysqli_query($conn, $sqlgroup);
                    echo "<select id='Groupdel' name='Groupdel' style='width:200px'>";
                    if (mysqli_num_rows($result) > 0) {  
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='". $row['Group_ID'] . "'>" . $row['Group_Name'] . "</option>";                    
                        }
                    }
                    else{
                        echo "<option value='No Group'> You don't have a group </option>"; 
                        
                    }
                    echo "</select><input type='submit' value='Delete'>";
                ?>
            </form>
            

        </div>

        <div class= 'side'>
            <h3>View and Delete group you are member of</h3>

            <?php

            $sql = "select * FROM `USER_GROUP` INNER JOIN GROUPS ON USER_GROUP.Group_ID = GROUPS.Group_ID WHERE Group_CreatorID = $id";
            $result = mysqli_query($conn, $sql);



            if (mysqli_num_rows($result) > 0) {
                echo "<table>";
                echo "<tr><th>Group Name</th><th>Group Topic</th><th>Group Description</th></tr>";
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    #echo $row['title'] . "<br>";
                    echo "<tr><td>" . $row['Group_Name'] . "</td><td>" . $row['Group_Topic'] . "</td><td>" . $row['Group_Description'] . "</td></tr>";
                    
                    
                }
                mysqli_close($conn);
                echo "</table>";
                
                
                
                
            }
            else {
                echo "You don't have any event";
            }



            ?>
        </div>
</div>

<footer>


</footer>


</body>
</html>