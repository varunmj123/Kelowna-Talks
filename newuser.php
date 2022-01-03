<!DOCTYPE html>
<html>
    <?php 
    include 'configure.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['username'])){
            $username = $_POST['username'];
        }
        if(isset($_POST['email'])){
            $email = $_POST['email'];
        }
        if(isset($_POST['firstname'])){
            $firstname = $_POST['firstname'];   
        }
        if(isset($_POST['lastname'])){
            $lastname = $_POST['lastname'];
        }
        if(isset($_POST['password'])){
            $password = $_POST['password'];
        }
        

        else{
            $output = "<p>Invalid data input.</p>";
            exit($output);
        }
    }


    else {

    $output = "<p>Wrong Connection Method</p>";
    exit($output);
    }

        $sql = "SELECT * FROM User WHERE username = '$username' OR email = '$email';";
        $result = mysqli_query($connection, $sql);
        
        if(mysqli_num_rows($result)){
         echo "<p> User already exists with this name and/or email address</p>";
         echo "<p><a href = 'login.html'>Log In Page </a></p>";

        }

        else{
             
            $sql_1 = "INSERT INTO User (`username`,`password`, `firstName`, `lastName` , `email`) values ('$username', md5('$password'), '$firstname', '$lastname', '$email');";
            if(mysqli_query($connection, $sql_1)) {
                echo "<p>An account for the user '$username' has been created</p>";
                echo "<p><a href = 'index.html'>Main Page</a></p>";
            }
            else {
                $output = "<p>Unable to add data to the database. </p>";
                exit($output);
            }
        }
        sqli_free_result($result);
        sqli_close($connection);
        ?>
</html>


