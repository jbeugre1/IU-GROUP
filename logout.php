<?php
session_start(); 
session_unset();
session_destroy();

echo"<script>alert('Logout')
        window.location.replace('Main.php')
        </script>"; 

?>