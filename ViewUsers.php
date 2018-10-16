<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "j487h218", "ohK4zeso", "j487h218");

    /* check connection */
if ($mysqli->connect_error) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT * FROM Users";
$result = $mysqli->query($query);
if ($result->num_rows > 0) {
    echo "<table style='border: solid 1px black'><tr><th>Users</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row['user_id'] . "</td></tr>";
    }
    echo "</table>";
}

?>