<?php   
    include_once 'configure.php';
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['old-password'])){
  $oldPassword = $_POST['old-password'];
    }
    if(isset($_POST['new-password'])){ 
  $newPassword = $_POST['new-password']; 
} 
if(isset($_POST['username'])){
    $username = $_POST['username'];
} 


else {
        $output = "<p>Invalid data input.</p>";
        exit($output);

}


  $oldp_md5 = md5($oldPassword);
  
 
  
  $sql = "SELECT * FROM User WHERE username = '$username' AND password = '$oldp_md5';";
  $result = mysqli_query($connection, $sql);
  $row = mysqli_fetch_assoc($result);
  if(isset($row)){
    
    $newp_md5 = md5($newPassword);
    $sql_1 = "UPDATE User SET password = '$newp_md5' WHERE username = '$username';";
    if(mysqli_query($connection, $sql_1)) {
    echo "<p>Congratulations! The password has been successfully updated!</p>";
    echo "<p><a href = 'index.html'>Main Page </a></p>";
  }
  else {
    echo "<p>Old password was incorrect.</p>";
  }
  
 
  mysqli_close($connection);
}
}
else {

    $output = "<p>Wrong Connection Method</p>";
    exit($output);
    }
?>