<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "j487h218", "ohK4zeso", "j487h218");

    /* check connection */
if ($mysqli->connect_error) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
$username = (string)$_POST['username'];
$post = $_POST['post'];
$addPost = false;

$query = "SELECT * FROM Posts";
$result = $mysqli->query($query);
$rowCount = 0;
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $rowCount++;
    }
} 

$query = "SELECT * FROM Users";
$result = $mysqli->query($query);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if($row['user_id'] == $username){
            $addPost = true;
            break;
        }
    }
} 

$index = $rowCount + 1;

$sql = "INSERT INTO Posts (post_id, content, author_id) VALUES ('$index', '$post', '$username')";
if($addPost && !empty($post)){
    $mysqli->query($sql);
    echo "sucess!";
} else {
    echo "Post failed";
}

// if($addPost && $post != ''){
//     $mysqli->query($sql);
//     echo "successfully executed ";
// }
// else{
//     echo "failed ";
// }    /* close connection */
$mysqli->close();

?>