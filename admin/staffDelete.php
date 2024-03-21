<?php 

    include 'connection.php';

    $con = openCon();

    $id = $_GET['id']; // get id through query string
    $del = "DELETE FROM tbl_staff WHERE id='$id'";
    $result = $con->query($del);

    if ($del) {
        closeCon($con);
        header("location: staff.php?deletesuccess"); // it will redirect to products.php
    } else {
        echo "Error deleting record"; // display error message if not delete
    }

?>