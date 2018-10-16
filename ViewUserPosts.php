<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "j487h218", "ohK4zeso", "j487h218");

    /* check connection */
if ($mysqli->connect_error) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
$user = $_POST['users'];
$query = "SELECT * FROM Posts WHERE author_id = '$user'";
$result = $mysqli->query($query);
if ($result->num_rows > 0) {
    echo "<table style='border: solid black'><tr><th>Posts from " . $user . "</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row['content'] .  "</td><tr>";
    }
    echo "</table>";
}
?>