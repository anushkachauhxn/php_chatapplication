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
    <link rel="stylesheet" href="css/users.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" />
  </head>
  <body>
    <div class="wrapper">
      <section class="users">
        <header>
          <?php
            include_once "php/config.php";
            // Select all data of current logged in user using session
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if (mysqli_num_rows($sql) > 0) {
              $row = mysqli_fetch_assoc($sql);
            }
          ?>

          <div class="content">
            <img src="uploaded_images/<?php echo $row['img'] ?>" alt="" />
            <div class="details">
              <span><?php echo $row['fname'] . " " . $row['lname'] ?></span>
              <p><?php echo $row['status'] ?></p>
            </div>
          </div>
          <a href="php/logout.php?logout_id=<?php echo $row['unique_id'] ?>" class="logout">Logout</a>
        </header>

        <div class="search">
          <span class="text">Select a user to start chat</span>
          <input type="text" placeholder="Enter name to search" />
          <button><i class="fas fa-search"></i></button>
        </div>

        <div class="users-list">
          <!-- Dynamic Data -->
        </div>
      </section>
    </div>
  </body>

  <script src="javascript/users.js"></script>
</html>
