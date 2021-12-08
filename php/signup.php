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

            // #2.2 Check if email is already in database
            $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
            if (mysqli_num_rows($sql) > 0) {
                echo "$email - This email already exists";
            }
            else {

            } // else #2.2
        }
        else {
            echo "$email - This is not a valid email";
        } // else #2.1
    }
    else {
        echo "All input fields are required";
    } // else #1
?>