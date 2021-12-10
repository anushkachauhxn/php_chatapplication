<?php 
    session_start();
    include_once 'config.php';

    $sql = mysqli_query($conn, "SELECT * FROM users");
    $output = "";

    if (mysqli_num_rows($sql) == 1) {
        // If there is only one row in the database, then it is the currently logged in user
        // So, there are no others to chat with
        $output .= "No users are available to chat";
    }
    elseif (mysqli_num_rows($sql) > 0) {
        // Other users are present
        while ($row = mysqli_fetch_assoc($sql)) {
            $output .= '<a href="#">
                            <div class="content">
                            <img src="uploaded_images/' . $row['img'] . '" alt="" />
                            <div class="details">
                                <span>'. $row['fname'] . ' ' . $row['lname'] .'</span>
                                <p>This is a test</p>
                            </div>
                            </div>
                            <div class="status-dot"><i class="fas fa-circle"></i></div>
                        </a>';
        }
    }
    echo $output;

?>