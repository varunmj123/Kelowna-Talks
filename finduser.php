<!DOCTYPE html>
<html>
    <?php
        include_once 'configure.php';

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST['username'])){
                $username = $_POST['username'];
            }
            if(isset($_SERVER['HTTP_REFERER'])){ 
                $refer_link = $_SERVER['HTTP_REFERER']; 
              }
            $sql = "SELECT * FROM User WHERE username = '$username';";
            $result = mysqli_query($connection, $sql);
            
              
            $data = mysqli_fetch_assoc($result);
                if(isset($data)){
                    echo "<fieldset>";
                    echo "<legend>User:".$data['username']."</legend>";
                    echo "<table>";
                    echo "<tr><td>First name:</td><td>".$data['firstName']."</td></tr>";
                    echo "<tr><td>Last name:</td><td>".$data['lastName']."</td></tr>";
                    echo "<tr><td>Email:</td><td>".$data['email']."</td></tr>";
                    echo "</table>";
                    echo "</fieldset>";
                mysqli_free_result($result);
            }
               /* $sql = "SELECT contentType, image FROM userImages where userID=?";
                 $stmt = mysqli_stmt_init($connection);
                 mysqli_stmt_prepare($stmt, $sql);
                 mysqli_stmt_bind_param($stmt, "i", $userId); 
                 $result = mysqli_stmt_execute($stmt) or die(mysqli_stmt_error($stmt));
                 mysqli_stmt_bind_result($stmt, $type, $image);
                 mysqli_stmt_fetch($stmt);
                 mysqli_stmt_close($stmt);

                 echo '<br><img src="data:image/'.$type.';base64,'.base64_encode($image).'"/>';

                */
        
            else{
                echo "<p>Username Does Not Exist in Database</p>";
            }
        }

        else{
            echo "<p>Incorrect Connection Method</p>";
        }

        mysqli_close($connection);

    

    ?>
    </html>