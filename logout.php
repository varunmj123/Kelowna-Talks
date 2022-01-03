<?php
    
session_start();
unset($_SESSION["error"]);
unset($_SESSION["username"]);

session_destroy();
echo "<p>You have been logged out!</p>";
echo "<p><a href = 'guest_homepage.html' >Go To Guest Home Page </a></p>";
echo "<p><a href = 'login.html'> Log In Page</a></p>";

?>

