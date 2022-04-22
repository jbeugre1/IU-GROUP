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


<div class="bodycontent">
<h2> Instruction </h2>
<p> Welcome to Join Page. <br>Firstly, You need to choose If you want to join a group or an event.<br> Then you will have to enter the name of the group/event and click on search. <br> A dropdown menu will appear with matches inside, the remaining step is clicking on the Join Button  </p>




<form method="post">
<label>Name :</label>
    <input type="text" name="JoinName" class="form-control" required><br>
    <input type="radio" id="Group" name="grouporevent" value="Group" <?php if(isset($_POST['grouporevent']) && $_POST['grouporevent'] =='Group' ){echo "checked";}?> required>
    <label for="Group">Group</label>
    <input type="radio" id="Event" name="grouporevent" value="Event" <?php if(isset($_POST['grouporevent']) && $_POST['grouporevent'] =='Event' ){echo "checked";}?>>
    <label for="Event">Event</label><br>
    <input type="submit" name="Search" value="Search"/>
</form>


<?php   
        session_start();
        include 'dbconnection.php';
        $grouporevent = $_POST['grouporevent'];
        $JoinName = $_POST['JoinName'];
        if(isset($_POST['Search'])) {
            
            
            if($grouporevent == "Group"){

                $select = "group";

                $sql = "select `Group_ID`, `Group_Name`, `U_Username` ,`Group_Topic` FROM `GROUPS` INNER JOIN `USER` ON `GROUPS`.Group_CreatorID = `USER`.`User_ID` WHERE Group_Name LIKE '%" . $JoinName . "%' ";
                $result = mysqli_query($conn, $sql);
                

                if (mysqli_num_rows($result) > 0) {
                    echo "<form method='post'>";
                    echo "<select id='Groupsearch' name='Groupsearch' style='width:200px'>";
                    
                while($row = mysqli_fetch_assoc($result)) {
                    #echo $row['title'] . "<br>";
                    echo "<option value='". $row['Group_ID'] . "'> name: " . $row['Group_Name'] . ",  Owner: " . $row['U_Username'] . ", Topic: " . $row['Group_Topic'] . " </option>";
                    
                }
                
                echo "</select>";
                echo "<input type='submit' name='Add' value='Add'/>";
                echo "</form>";
                


                
            } 
            else {
                echo "No results";
            }
            mysqli_close($conn);
            
            
            }

            elseif($grouporevent == "Event"){
                
                $select = "event";

                $sql = "select Event_ID ,Event_Name, U_Username, Event_Date, Event_Hour , Event_Place  FROM `EVENT` INNER JOIN `USER` ON `EVENT`.`Event_CreatorID` = `USER`.`User_ID` WHERE Event_Name LIKE '%" . $JoinName . "%' ";
                $result = mysqli_query($conn, $sql);
                

                if (mysqli_num_rows($result) > 0) {
                    echo "<form method='post'>";
                    echo "<select id='Eventsearch' name='Eventsearch' style='width:200px'>";
                    
                while($row = mysqli_fetch_assoc($result)) {
                    #echo $row['title'] . "<br>";
                    echo "<option value='". $row['Event_ID'] . "'> name: " . $row['Event_Name'] . ",  Owner: " . $row['U_Username'] . ", Location: " . $row['Event_Place'] . ", Date: " . $row['Event_Date'] . " " . $row['Event_Hour'] . " </option>";
                    
                }
                
                echo "</select>";
                echo "<input type='submit' name='Add' value='Add'/>";
                echo "</form>";
                


                
            } 
            else {
                echo "No results";
            }
            mysqli_close($conn);
            
                
            }

        
        }

        if(isset($_POST['Add'])) {
        

            if(isset($_POST['Groupsearch'])){
                
                $gid = $_POST['Groupsearch'];
                $sql = "insert INTO `USER_GROUP`(`User_ID`, `Group_ID`) VALUES ($id,$gid)";

                $sql3 = "update `GROUPS` SET `Group_NumberofUser` = `Group_NumberofUser`+1 WHERE `Group_ID` = $gid";
                mysqli_query($conn, $sql3);

                $checker = "select * FROM `USER_GROUP` WHERE `User_ID` = $id AND `Group_ID`= $gid";
                $cresult = mysqli_query($conn, $checker);
                $count = mysqli_num_rows($cresult);
                if (mysqli_num_rows($cresult) == 0) {

                    if (mysqli_query($conn, $sql)) {
                        echo"<script>alert('Registration Successful');
                        window.location.replace('https://in-info-web4.informatics.iupui.edu/~jbeugre/PROJECT/Jointable.php')</script>";
                    }
                    else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
    
                    mysqli_close($conn);

                }
                else {
                    echo"<script>alert('Already a member of this group');
                    window.location.replace('https://in-info-web4.informatics.iupui.edu/~jbeugre/PROJECT/Jointable.php')</script>";
                }

                }



            elseif(isset($_POST['Eventsearch'])){
                $eid = $_POST['Eventsearch'];
                $sql = "Insert INTO `USER_EVENT`(`User_ID`, `Event_ID`) VALUES($id,$eid)";

                $sql3 = "update `EVENT_INDEPENDENT` SET `Event_NumberofUser`= `Event_NumberofUser`+ 1 WHERE `Event_ID` = $eid ";
                mysqli_query($conn, $sql3);

                $checker = "select * FROM `USER_EVENT` WHERE `User_ID` = $id AND `Event_ID`= $eid";
                $cresult = mysqli_query($conn, $checker);

                if (mysqli_num_rows($cresult) == 0) {
                
                    if (mysqli_query($conn, $sql)) {
                        echo"<script>alert('Registration Successful');
                        window.location.replace('https://in-info-web4.informatics.iupui.edu/~jbeugre/PROJECT/Jointable.php')</script>";
                    }
                    else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
    
                    mysqli_close($conn);


                }
                else{
                        echo"<script>alert(\"You're already registered for this event\");
                        window.location.replace('https://in-info-web4.informatics.iupui.edu/~jbeugre/PROJECT/Jointable.php')</script>";
                   
                }

                
            }
        }

        

        
        
        

        
            
            
        


           
        
    ?>

</div>








<footer>


</footer>


</body>



</html>

