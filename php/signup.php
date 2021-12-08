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

                // #3.1 Check if image has been uploaded
                if (isset($_FILES['image'])) {                  //$_FILES[] returns an array with filename, filetype, error, filesize, tmp_name
                    $img_name = $_FILES['image']['name'];       //getting user uploaded image name
                    $img_type = $_FILES['image']['type'];       //getting user uploaded image type
                    $tmp_name = $_FILES['image']['tmp_name'];   //this temporary name is used to save/move file in our folder

                    // #3.2 Check if image uploaded has valid extension
                    $extensions = ['png', 'jpeg', 'jpg'];       //our valid extensions
                    
                    $img_explode = explode('.', $img_name);     //exploding image and getting the extension
                    $img_ext = end($img_explode);               //extension of the image file

                    if (in_array($img_ext, $extensions) === true) {
                        $time = time(); //current time - we rename the image file using current time so they can all have unique names
                        $new_img_name = $time.$img_name; //current time added before name of image uploaded
                        
                        // #3.3 Check if image was moved to our folder successfully
                        if (move_uploaded_file($tmp_name, '../uploaded_images/'.$new_img_name)) {
                            //After sign up
                            $status = 'Active Now';                  //status becomes active
                            $random_id = rand(time(), 10000000);     //random id for user

                            // #4.1 Check if inserting all user data inside table was successful
                            $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status)
                                                         VALUES ({$random_id}, '{$fname}', '{$lname}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')");
                            if ($sql2) {
                                
                                // #4.2 Check if there is a row with this email in database
                                $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                if (mysqli_num_rows($sql3) > 0) {
                                    $row = mysqli_fetch_assoc($sql3);
                                    $_SESSION['unique_id'] = $row['unique_id']; //using this session, we used user unique_id in other php file
                                    echo "SUCCESS!";
                                }
                                else {
                                    echo "Something went wrong!";
                                } // else #4.2
                            }
                            else {
                                echo "Something went wrong!";
                            } // else #4.1
                        }
                        else {
                            echo "Something went wrong!";
                        } // else #3.3
                    }
                    else {
                        echo "Please select an image file - jpeg, jpg, png";
                    } // else #3.2
                }
                else {
                    echo "Please select an image file";
                } // else #3.1
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