<?php
    include_once 'configure.php';
session_start();

echo "<h1>Welcome to Events Thread</h1>";


$sql = "SELECT * FROM posts WHERE category = 'Sites To See';";
$result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result) >  0) {
   
     while($data = mysqli_fetch_assoc($result)) {
        echo "<br>";
        echo "<div class = 'forum-posts'>";
        echo "<table>";
        echo "<tr><td>Title: </td><td>".$data['title']."</td></tr>";
        echo "<tr><td>Author: </td><td>".$data['username']."</td></tr>";
        echo "<tr><td>Content: </td><td>".$data['content']."</td></tr>";
        echo"<tr><td>Post Date: </td><td>".$data['postDate']."</td></tr>";
        echo "</table>";
        echo "<br>";
        
    }
    mysqli_free_result($result);
}


else{
    echo "<p>There are no posts under Events thread right now </p>";
}
?>