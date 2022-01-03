<?php
    include_once 'configure.php';

session_start();

$old_username = NULL;
$new_username = NULL;
$firstname = NULL;
$lastname = NULL;
$email = NULL; 
$password = NULL;  

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['password'])) {
        $old_username = $_SESSION['username'];
        $new_username = $_POST['username'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email']; 
        $password = $_POST['password'];    
    } 
    else {
        $output = "<p>Invalid data input.</p>";
        exit($output);
    }
    $md5_password = md5($password);
    $sql = "SELECT * FROM User WHERE username='$old_username' AND password='$md5_password';";
    $result = mysqli_query($connection, $sql);
    if (mysqli_num_rows($result)) {
        $row = mysqli_fetch_assoc($result);
        $sql_1 = "UPDATE User SET username='$new_username', firstName='$firstname', lastName ='$lastname', email='$email', password='$md5_password' WHERE username='$old_username';";
        $sql_2 = "UPDATE posts SET username ='$new_username' WHERE username = '$old_username';";
        
        if (mysqli_query($connection, $sql_1) && mysqli_query($connection, $sql_2)) {
            echo "<p>Your account has been updated</p>";
            echo "<p><a href = 'index.html'>Main Page</a></p>";
            echo "<p><a href = 'logout.php'>Log Out</a></p>";

          } 
          else {
            echo  "<p>Error updating your account, please try again</p>";
            echo "<p><a href = 'editProfile.html'>Try Again.</a></p>";
            echo "<p><a href = 'index.html'>Return back to Main Page</a></p>";
          }
        
    } 
    else {
        echo "<p>Password is incorrect</p>";
        echo "<p><a href = 'forgotPassword.html'>Forgot Password?</a></p>";
        echo "<p><a href = 'guest_homepage.html'>Guest Home Page</a></p>";
       
    }
}

else{
    $output = "<p>Invalid request.</p>";
    exit($output);
} 

    mysqli_free_result($results);
    mysqli_close($connection);


?>

