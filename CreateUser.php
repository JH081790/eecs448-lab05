<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "j487h218", "ohK4zeso", "j487h218");

    /* check connection */
if ($mysqli->connect_error) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
$username = (string)$_POST['username'];
$query = "SELECT * FROM Users";
$addUser = false;

if ($result = $mysqli->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        if($row["user_id"] == $username){
            $addUser = false;
            break;
        }
        else{
            $addUser = true;
        }
    }
    /* free result set */
    $result->free();
}
if($username != '' && $addUser){
    $sql = "INSERT INTO Users (user_id) VALUES ( '$username' )";
    $mysqli->query($sql);
    echo "User " . $username . " was created";
}
else{
    echo "<br>invalid username, try again";
}

    /* close connection */
$mysqli->close();

?>