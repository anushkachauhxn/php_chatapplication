<?php
    session_start();
    include_once 'config.php';
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // #1 Check if all inputs are filled
    if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
        // #2.1 Email validity
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        }
        else {
            echo "$email - This is not a valid email";
        } // else #2.1
    }
    else {
        echo "All input fields are required";
    } // else #1
?>