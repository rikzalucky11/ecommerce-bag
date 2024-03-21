<?php 
    include 'includes/connection.php'; 

    $con = openCon();

    if (isset($_POST['sign-up'])) { // this means that if the user clicked the submit bottom it will run the code
        $first_name = $_POST['fname'];
        $last_name = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        try {
            $sql = "INSERT INTO `tbl_accounts`(`id`, `first_name`, `last_name`, `email`, `password`)
                                    VALUES ('NULL','$first_name','$last_name','$email','$password')";

            if ($con->query($sql) === true) { // to check if the insertion of data in database is successfull
                echo "Records inserted successfully.";
            } else {
                throw new Exception("ERROR: Could not able to execute $sql. " . $con->error);
            }
        } catch (\Throwable $th) {
            $errorMessage = $th->getMessage();
            exit($errorMessage);
        }

        closeCon($con);
        header("location: sign-up.php?sign-up-success"); // it will display in url
    } 

?>