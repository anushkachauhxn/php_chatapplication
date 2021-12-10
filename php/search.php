<?php
    include_once "config.php";
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
    $output = "";

    $sql = mysqli_query($conn, "SELECT * FROM users WHERE fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%'");
    if (mysqli_num_rows($sql) > 0) {
        while ($row = mysqli_fetch_assoc($sql)) {
            $output .= '<a href="chat.php?user_id='. $row['unique_id'] .'">
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
    else {
        $output .= "No user found related to your search";
    }

    echo $output;
?>