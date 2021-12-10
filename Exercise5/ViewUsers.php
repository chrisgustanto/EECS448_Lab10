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
        //sql command
        $sql = "SELECT user_id FROM Users";

        $result = $conn->query($sql);
        //sets up the table for html that will display all users
        echo '<table class="users" style="outline-color: black;">
            <tr><td>Users</td></tr>';
        //if the table has contents
        if ($result->num_rows > 0) {
            // output data of each row
            //goes through sql table and for every row, creates a HTML table with the contents inside
            while($row = $result->fetch_assoc()) {
                echo "<tr><td> ". $row["user_id"]. "</tr></td>";
            }
        } else {
            //if table is empty, tell the user there are 0 results
            echo "0 results";
        }
        //closes html table
        echo '</table>';
        //closes server connection
        $conn->close();
    ?>
</body>
</html>
