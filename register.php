<?php


include 'dbconnection.php';
mysqli_select_db($conn,'jbeugre_db');
$last_name=$_POST['last_name'];
$first_name=$_POST['first_name'];
$birthday=$_POST['birthday'];
$user=$_POST['user'];
$email=$_POST['email'];
$pass=$_POST['password'];
$confirm_password=$_POST['confirm_password'];
$U_Type= "User";


$s="select * from USER where U_Username ='$user'";

$result = mysqli_query($conn, $s);

$num = mysqli_num_rows ($result) ;

if ($num==1){   
    echo"<script>alert('Username already taken')
    window.location.replace('Register.html') </script>";
}
else {
    if ($pass == $confirm_password) {
        $sql = "insert into `USER`(`U_LastName`, `U_FirstName`, `U_Username`, `U_Email`, `U_Password`, `U_Birthday`, `U_Type`) VALUES ('$last_name','$first_name','$user','$email','$pass','$birthday','$U_Type')";
        if (mysqli_query($conn, $sql)) {

            $getid = "select `User_ID` from USER where U_Username ='$user'";
            $result = mysqli_query($conn, $getid);
            $row = mysqli_fetch_assoc($result);
            $idvalue = $row["User_ID"];
            $sql2 = "insert into `USER_NORM`(`User_ID`, `User_RegistrationDate`, `User_NumberofGroup`, `User_NumberofGroupcreated`, `User_NumberofEventCreated`) VALUES ($idvalue,'" . date("Y-m-d") . "', 0 , 0 , 0 )";
            echo $sql2;
            if(mysqli_query($conn, $sql2)){
                echo"<script>alert('Registration Successful');
                window.location.replace('Main.html')</script>";
            }
            else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }
            
        }
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
          
          
        
    }
    else{
        echo"<script>alert('Passwords do not match')
        window.location.replace('Register.html')
        </script>"; 
        
    }
     
}
mysqli_close($conn);
?>