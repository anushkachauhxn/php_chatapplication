<?php 
    session_start();
    include_once 'config.php';

    $outgoing_id = $_SESSION['unique_id'];
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id}");
    $output = "";

    if (mysqli_num_rows($sql) == 1) {
        // If there is only one row in the database, then it is the currently logged in user
        // So, there are no others to chat with
        $output .= "No users are available to chat";
    }
    elseif (mysqli_num_rows($sql) > 0) {
        // Other users are present
        include "users-data.php";
    }
    echo $output;

?>