<?php
   include_once 'configure.php';
session_start();

// function randomPassword() Sourced from "https://stackoverflow.com/questions/6101956/generating-a-random-password-in-php"
function randomPassword() {
  $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
  $pass = array(); 
  $alphaLength = strlen($alphabet) - 1; 
  for ($i = 0; $i < 8; $i++) {
      $n = rand(0, $alphaLength);
      $pass[] = $alphabet[$n];
  }
  return implode($pass); 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['email'])){
        $email = $_POST['email'];
    }

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo "<p>email is not valid.</p>";
  echo "<p><a href='forgotPassword.html'> Forgot Password Page</a></p>";
  echo "<p><a href = 'guest_homepage.html'>Guest Home Page </a></p>";

}   
  
  $newPassword = randomPassword();

  $hash_password = md5($newPassword);
 
  $sql = "SELECT * FROM User WHERE email = '$email';";
  $result = mysqli_query($connection, $sql);
  $row = mysqli_fetch_assoc($result);
  if(isset($row)){
    
  $sql_1 = "UPDATE User set password = '$hash_password' WHERE email = '$email';";
  if(mysqli_query($connection, $sql_1)) {
    $subject = "Your Recovered Password";
    $message = "Please use this password to login " . $newPassword . ". You can login to Kelowna Talks and change your password to something more secure! ";
    $message = wordwrap($message,70);
    $headers = "From : kelownaTalks@forum.com";
    mail($email, $subject, $message, $headers);

    if(mail($email, $subject, $message, $headers)){
			echo "Your Password has been sent to your email id";
            echo "<p><a href = 'login.html'>  Log In with recovered password </a></p>";
		}
  
  else {
    echo "<p>The email was not delivered due to an error.</p>";
    echo "<p><a href='forgotPassword.php'>Return to the forgot password page.</a></p>";
  }
  
}
  }

else{
  echo "<p>Email Id not registered in the database</p>";
  echo "<p><a href = 'forgotPassword.html'>Return to forgot password page</a></p>";
  echo "<p><a href = 'signup.html'>Sign Up Page </a></p>";
}
}
else {
    echo "<p>Wrong Connection Method </p>";
}
?>