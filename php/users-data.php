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
            
            // If message is too long to be displayed fully
            (strlen($result) > 28) ? $msg = substr($result, 0, 28).'...' : $msg = $result;
            
            // Adding who sent the message, current user or the row user
            ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
        }
        else {
            $you = "";
            $msg = "No messages available";
        }

        // Showing if user is online or offline
        ($row['status'] == "Offline Now") ? $offline = "offline" : $offline = "";

        $output .= '<a href="chat.php?user_id='. $row['unique_id'] .'">
                        <div class="content">
                        <img src="uploaded_images/' . $row['img'] . '" alt="" />
                        <div class="details">
                            <span>'. $row['fname'] . ' ' . $row['lname'] .'</span>
                            <p>'. $you . $msg .'</p>
                        </div>
                        </div>
                        <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                    </a>';
    }
?>