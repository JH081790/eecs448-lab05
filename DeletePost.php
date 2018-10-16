<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "j487h218", "ohK4zeso", "j487h218");

    /* check connection */
if ($mysqli->connect_error) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT * FROM Posts";
$result = $mysqli->query($query);
$index = 1;

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if($_POST[$index] == "true"){
            $cont = $row['content'];
            echo 'Deleted post "' . $row['content'] . '"<br>';
            $sql = "DELETE FROM Posts WHERE content LIKE '$cont'";
            echo $sql;
            if ($mysqli->query($sql) === TRUE) {
            } else {
                echo "Error deleting record: " . $mysqli->error;
            }
        }
        $index++;
    }
}
?>