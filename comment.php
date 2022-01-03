<?php
    
include_once 'configure.php';

session_start();
    
 $username = NULL ;
 $pid = NULL;
 $comment = NULL;
 $category = NULL;

 if(!isset($_SESSION['username'])){
    echo "<p>You need to be logged in to be able to make comments</p>";
    echo "<p><a href = 'login.html'>Log In Now</a></p>";
    echo "<p><a href = 'signup.html'>Register Now</a><p>";
    echo "<p><a href = 'guest_homepage.html'>Go to Guest Homepage</a></p>";

    }
else{


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['comment'])) {
        $username = $_SESSION['username'];
        $comment = $_POST['comment'];
        $pid = $_SESSION['pid'];
        $category = $_SESSION['category'];
    } 


    
    
    else {
        $output = "<p>Invalid data input.</p>";
        exit($output);
    }



    $sql = "SELECT * FROM User WHERE username = '$username'";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);
    $sql_1 = "INSERT INTO comment (`content`,`pid`, `username`,`category`) VALUES ('$comment', '$pid', '$username','$category');";
    if (mysqli_query($connection, $sql_1)) {
        echo "<p>A comment has been created:</p>";
        echo "<table>";
        echo "<tr><td>Category:</td><td>'$category'</td></tr>";
        echo "<tr><td>Comment:</td><td>'$comment'</td></tr>";
        echo "<tr><td>Username:</td><td>'$username'</td></tr>";
        echo "</table>";
      
        echo "<br><br>";
        echo "<p><a href = 'index.html'>Go to Home Page</a></p>";
        echo "<p><a href = 'logout.php'> Log out</a></p>";
    
    } else {
        echo "<p>Unable to create comment";
      
    }
    

    
}


else {

    $output = "<p>Wrong Connection Method</p>";
    exit($output);
    }


    mysqli_close($connection);
}

?>

