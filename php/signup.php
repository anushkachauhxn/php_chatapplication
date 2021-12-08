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