<?php
  session_start();
  if (!isset($_SESSION['unique_id'])) {
    // Redirect to Login Page
    header("location: login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Realtime Chat App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/chat.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" />
  </head>
  <body>
    <div class="wrapper">
      <section class="chat-area">
        <header>
          <?php
            include_once "php/config.php";
            $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
            // Select all data of current logged in user using session
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
            if (mysqli_num_rows($sql) > 0) {
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
          <img src="uploaded_images/<?php echo $row['img'] ?>" alt="" />
          <div class="details">
            <span><?php echo $row['fname'] . " " . $row['lname'] ?></span>
            <p><?php echo $row['status'] ?></p>
          </div>
        </header>
            
        <div class="chat-box">
          <!-- Dynamic Data -->
        </div>

        <form action="#" class="typing-area" autocomplete="off">
          <!-- Hidden inputs to send msg_sender_id and msg_receiver_id -->
          <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden> 
          <input type="text" name="incoming_id" value="<?php echo $user_id; ?>" hidden>

          <input type="text" name="message" class="input-field" placeholder="Type a message here" />
          <button><i class="fab fa-telegram-plane"></i></button>
        </form>
      </section>
    </div>

    <script src="javascript/chat.js"></script>
  </body>
</html>
