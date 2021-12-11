<?php
    session_start();
    include_once "config.php";
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    // #1 Check if all inputs are filled
    if (!empty($email) && !empty($password)) {

        // #2 Check if email and password match with any row in database
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'");
        if (mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql);

            // #3 Check if updating status after login was successful
            $status = "Active Now";
            $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
            if ($sql2) {
                $_SESSION['unique_id'] = $row['unique_id']; //using this session, we used user unique_id in other php file
                echo "SUCCESS!";
            }
        }
        else {
            echo "Email or Password is incorrect!";
        }
    }
    else {
        echo "All input fields are required";
    }
?>