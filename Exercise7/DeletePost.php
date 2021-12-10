<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Posts</title>
</head>
<body>
    <?php
    $servername = "mysql.eecs.ku.edu";
    $username = "c356g399";
    $password = "Ahk7yeek";
    $dbname = "c356g399";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    while(!empty($_POST['toDelete'])){
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $lang = implode(",",$_POST['toDelete']);

        $sql = 'DELETE FROM Posts WHERE post_id IN (' . $lang . ');';
        if($result = $conn->query($sql)){
            echo "Post(s): " . $lang . " were successfully deleted!";
            $result->free();
        }else{
            echo "Post " . $post . " enountered an error while being deleted. Try again";
        }

    }
    $conn->close();
    ?>
</body>
</html>
