<?php

    include 'connection.php';

    $con = openCon();

    if (isset($_POST['submit'])) { // this means that if the user clicked the submit bottom it will run the code
        $name = $_POST['staff_name'];
        $email = $_POST['email'];
        $date = $_POST['joiningDate'];
        $role = $_POST['role'];
        $file = $_FILES['img_name']; // _FILES get all information from the files that we want to upload using an input from a form

        try {
            $fileName = $file['name']; // to get the name in variable file array
            $fileTmpName = $file['tmp_name']; // to get the temporary location of the file in variable file array
            // $fileSize = $file['size']; // to get the size in variable file array
            // $fileError = $file['error']; // to get the error in variable file array
            $fileType = $file['type']; // to get the type in variable file array
    
            $fileExt = explode('.', $fileName); // we want to separate the name and extension of the file ex. clob.jpeg => clob jpeg
            $fileActualExt = strtolower(end($fileExt)); // end() is an function to get the last piece of data in an array
            $allowed = array('jpg', 'jpeg', 'png'); // allowed extension

            if (in_array($fileActualExt, $allowed)) { // if $fileActualExt is in $allowed array then proceed
                $fileNewName = uniqid('', true).".".$fileActualExt; // we want to avoid file collision, the file new name will be a time format in microseconds
                $fileDestination = 'images/'.$fileNewName;
                
                if (move_uploaded_file($fileTmpName, $fileDestination)) { // to upload the file from temporary location to final destination
                    $sql = "INSERT INTO `tbl_staff`(`id`, `name`, `email`, `date`, `role`)
                                    VALUES ('NULL','$name','$email','$date','$role')";

                    if ($con->query($sql) === true) { // to check if the insertion of data in database is successfull
                        echo "Records inserted successfully.";
                    } else {
                        unlink($fileDestination);
                        throw new Exception("ERROR: Could not able to execute $sql. " . $con->error);
                    }
                } else {
                    throw new Exception('Failed to upload image file');
                }
            } else {
                throw new Exception('You cannot upload files of this type!');
            }
        } catch (Throwable $th) {
            $errorMessage = $th->getMessage();
            exit($errorMessage);
        }
        closeCon($con);
        header("location: staff.php?uploadsuccess"); // it will display in url
    } 
?>