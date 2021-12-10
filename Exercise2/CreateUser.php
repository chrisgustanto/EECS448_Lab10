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

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // collect value of input field
            $data = $_REQUEST['username'];
            //if data is empty
            if (empty($data)) {
                echo "data is empty";
            }
        }
        //sql command
        $sql = "INSERT INTO Users (user_id) VALUES ('$data')";
        //if the command works properly, displays to page that it was successful
        if ($conn->query($sql) === TRUE) {
            echo "New user created successfully";
        } else {
            //if not displays the error
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        //close connection
        $conn->close();
    ?>

</body>
</html>
