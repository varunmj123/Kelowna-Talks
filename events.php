<?php
    include_once 'configure.php';
session_start();

echo "<h1>Welcome to Events Thread</h1>";


$sql = "SELECT * FROM posts WHERE category = 'Events';";
$result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result) >  0) {
    
    
     while($data = mysqli_fetch_array($result)) {
        $pid = $_SESSION['pid'];
        $_SESSION['pid'] = $data['pid'];
        $_SESSION['category'] = 'Events';
     
        
        echo "<br>";
        echo "<div class = 'forum-posts'>";
        echo "<table>";
        echo "<tr><td>Title: </td><td>".$data['title']."</td></tr>";
        echo "<tr><td>Author: </td><td>".$data['username']."</td></tr>";
        echo "<tr><td>Content: </td><td>".$data['content']."</td></tr>";
        echo"<tr><td>Post Date: </td><td>".$data['postDate']."</td></tr>";
        echo "</table>";
        
        
        $sql_1 = "SELECT * FROM comment WHERE category = 'Events' and pid = '$pid';";
        $result1 = mysqli_query($connection, $sql_1);
        if (mysqli_num_rows($result1) >  0) {

        while($row = mysqli_fetch_array($result1)){
            echo "<br>";
            echo "<div class = 'comment-posts'>";
            echo "<fieldset>";
            echo "<legend>User:".$row['username']."</legend>";
            echo "<table>";
            echo "<tr><td>Comment: </td><td>".$row['content']."</td></tr>";
            echo"<tr><td>Comment Date: </td><td>".$row['commentdate']."</td></tr>";
            echo "</table>";
            echo "</fieldset>";

        }
    }
    

    
?>

    <div>
    <form method = "post" action = "comment.php" id = "mainForm">
    <textarea type="text" name="comment" id="comment"  placeholder="Comment..." rows="4" cols = "50"></textarea>
    <br>
    <input type="submit" value="Create comment">
    </form>
    </div>

<?php
        echo "<br>";
    }
    mysqli_free_result($result);
}


else{
    echo "<p>There are no posts under Events thread right now </p>";
}


?>



