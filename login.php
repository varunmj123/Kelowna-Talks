<?php
    include_once 'configure.php';

    session_start();

    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password_md5 = md5($password);
        $sql = "SELECT * FROM User WHERE username='$username' AND password= '$password_md5';";
        $result = mysqli_query($connection, $sql);
        $row = mysqli_fetch_assoc($result);
       if(isset($row)){
        $_SESSION['username'] = $username;
        
        header("Location: index.html");

        }
        else{
            echo "<p>Username or password is incorrect</p>";
            echo "<p><a href = 'login.html' > Try Again? </a></p>";
            echo "<p><a href = 'guest_homepage.html'> Guest HomePage </a></p>";
            echo "<p><a href = 'forgotPassword.html'>Forgot Password? </a></p>";
            echo "<p><a href = 'signup.html'>Sign Up</a></p>";
            //header("Location: guest_homepage.html");
        }
        mysqli_free_result($results);
        mysqli_close($connection);
      
     
}

    else{
        $output = "<p>Invalid data input.</p>";
        exit($output);
    }

?>