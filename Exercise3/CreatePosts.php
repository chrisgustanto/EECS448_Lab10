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
        //variable for login info
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
        //if the server request is a "POST", it will assign the values that the user gave from form
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // collect value of input field
            $usrName = $_REQUEST['userName'];
            $usrContent = $_REQUEST['userpost'];
            //checks if fields are empty
            if (empty($usrName) || empty($usrContent)) {
                echo "Input fields cannot be blank.";
            }else{
                //sql command to add to db
                $sql = "INSERT INTO Posts (content, author_id) VALUES ('$usrContent', '$usrName')";
                //if command works and meets fields, displays successful, if not displays error
                if ($conn->query($sql) === TRUE) {
                    echo "New post submitted successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }
        //close connection
        $conn->close();
    ?>
</body>
</html>
