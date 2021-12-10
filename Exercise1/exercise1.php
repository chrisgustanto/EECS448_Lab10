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

        /* create connection */
        $conn = new mysqli($servername, $username, $password, $dbname);
        /* check connection */
        if($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }

        /* create table */
        $sqlUser = "CREATE TABLE Users (
            user_id INT NOT NULL AUTO_INCREMENT,
            PRIMARY KEY(user_id)
            )";

        $sqlPosts = "CREATE TABLE Posts (
            post_id INT,
            content VARCHAR(255),
            author_id INT,
            INDEX (author_id),
            FOREIGN KEY (author_id)
                REFERENCES Users(user_id)
            )";

        /*  */
        if($conn->query($sqlUser) == TRUE){
            echo "Table Users created successfully";
        }else{
            echo "Error creating table: " . $conn->error;
        }

        if($conn->query($sqlPosts) == TRUE){
            echo "Table Posts created successfully";
        }else{
            echo "Error creating table: " . $conn->error;
        }
        /* close connection */
        $conn->close();
    ?>
</body>
</html>
