<?php 
    include 'includes/connection.php'; 

    $con = openCon();

    if (isset($_POST['placeorder'])) { // this means that if the user clicked the submit button it will run the code
        $cust_name = $_POST['cust_name'];
        $cust_email = $_POST['cust_email'];
        $cust_address = $_POST['cust_address'];
        $cust_phone = $_POST['cust_phone'];
        $cust_order = $_POST['cust_order'];

        try {
            $sql = "INSERT INTO `tbl_custinfo`(`id`, `cust_name`, `cust_email`, `cust_address`, `cust_phone`, `cust_order`)
                                    VALUES ('NULL','$cust_name','$cust_email','$cust_address','$cust_phone','$cust_order')";

            if ($con->query($sql) === true) { // to check if the insertion of data in database is successfull
                echo "Information Saved Successfully.";
            } else {
                throw new Exception("ERROR: Could not able to execute $sql. " . $con->error);
            }
        } catch (\Throwable $th) {
            $errorMessage = $th->getMessage();
            exit($errorMessage);
        }

        closeCon($con);
        header("location: checkout.php?placeorder-success"); // it will display in url
    } 

?>