<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $servername = "mysql.eecs.ku.edu";
        $username = "c356g399";
        $password = "Ahk7yeek";
        $dbname = "c356g399";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        //usrname from html admin selected
        $usrname = $_POST['usrname'];
        //creates a table that displays all the posts the user made
        echo "<tr><th>Posts by " . $usrname . "<br></th></tr>";
        //sql command
        $query = 'SELECT content FROM Posts WHERE author_id="' . $usrname . '";';


        if($result = $conn->query($query)){
                //creates a html table row for each post content
                while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["content"] . "<br></td></tr>";
                }
                $result->free();
        }//if the user has made not posts, display message
        else
            echo "<tr><td>No posts made by this user yet.</td></tr>";
        //closes html table
        echo "</table>";
        // Close Connection
        $conn->close();
    ?>
</body>
</html>
