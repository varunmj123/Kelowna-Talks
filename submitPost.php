<?php
    
include_once 'configure.php';

session_start();
    
$username = NULL ;
$title = NULL;
$content = NULL;
$category = NULL;

if(!isset($_SESSION['username'])){
    echo "<p>You need to be logged in to be able to create posts</p>";
    echo "<p><a href = 'login.html' >Log In Now</a></p>";
    echo "<p><a href = 'guest_homepage.html'>Go to Guest Home Page</a></p>";
    echo "<p><a href = 'signup.html'>Register Now</a></p>";
}

else{

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['title']) && isset($_POST['content']) && isset($_POST['category'])) {
        $username = $_SESSION['username'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $category = $_POST['category'];
      
    } else {
        $output = "<p>Invalid data input.</p>";
        exit($output);
    }



    $sql = "SELECT * FROM User WHERE username = '$username'";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);

    $currentDate= date("Y-m-d H:i:s");
    $sql_1 = "INSERT INTO posts (`title`, `content`, `username`, `category`) VALUES ('$title', '$content', '$username', '$category');";
    if (mysqli_query($connection, $sql_1)) {
        echo "<p>A post has been created:</p>";
        echo "<fieldset>";
        echo "<legend>Title:'$title'</legend>";
        echo "<table>";
        echo "<tr><td>Category:</td><td>'$category'</td></tr>";
        echo "<tr><td>Content:</td><td>'$content'</td></tr>";
        echo "<tr><td>Username:</td><td>'$username'</td></tr>";
        echo "</table>";
        echo "</fieldset>";

        echo "<br><br>";
        echo "<p><a href = 'index.html'>Go to Home Page</a></p>";
        echo "<p><a href = 'logout.php'> Log out</a></p>";
    
    } else {
        echo "<p>Unable to create post, try again!";
        echo "<p><a href = 'newPost.html'> Try Again</a></p>";
        
    }
    

    
}


else {

    $output = "<p>Wrong Connection Method</p>";
    exit($output);
    }


    mysqli_close($connection);
}

?>

