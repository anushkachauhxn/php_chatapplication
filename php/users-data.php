<?php
    while ($row = mysqli_fetch_assoc($sql)) {

        // Selecting last message between current user (logged in) and this user (in row)
        $query2 = "SELECT * FROM messages 
                   WHERE (incoming_msg_id = {$row['unique_id']} OR outgoing_msg_id = {$row['unique_id']})
                   AND (incoming_msg_id = {$outgoing_id} OR outgoing_msg_id = {$outgoing_id})
                   ORDER BY msg_id DESC LIMIT 1";
        $sql2 = mysqli_query($conn, $query2);

        if (mysqli_num_rows($sql2) > 0) {
            $row2 = mysqli_fetch_assoc($sql2);
            $result = $row2['msg'];
        }
        else {
            $result = "No messages available";
        }

        $output .= '<a href="chat.php?user_id='. $row['unique_id'] .'">
                        <div class="content">
                        <img src="uploaded_images/' . $row['img'] . '" alt="" />
                        <div class="details">
                            <span>'. $row['fname'] . ' ' . $row['lname'] .'</span>
                            <p>'. $result .'</p>
                        </div>
                        </div>
                        <div class="status-dot"><i class="fas fa-circle"></i></div>
                    </a>';
    }
?>