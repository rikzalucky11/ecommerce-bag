<?php
include 'includes/connection.php';

$con = openCon();

if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    try {
        $sql = "SELECT `id`, `email`, `id` AS `password` FROM `tbl_staff` WHERE email = ?";

        if ($stmt = $con->prepare($sql)) {
            $stmt->bind_param("s", $param_email);
            $param_email = $email;

            if ($stmt->execute()) {
                $stmt->store_result();

                if ($stmt->num_rows == 1) {
                    $stmt->bind_result($id, $email, $password);

                    if ($stmt->fetch()) {
                        if ($password === $id) {
                            session_start();

                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;

                            // Add your logic for staff login here
                            // For example:
                            header("location: index.php");
                            exit;
                        } else {
                            echo "password: " . $password . "\n\n";
                            echo "hashed password: " . $id . "\n\n";
                            throw new Exception('Email or password is incorrect! 1');
                        }
                    } else {
                        throw new Exception('Failed to fetch data');
                    }
                } else {
                    throw new Exception('Email or password is incorrect! 2');
                }
            } else {
                throw new Exception('Oops! An error occurred. Please try again.');
            }
        }

        $stmt->close();
    } catch (\Throwable $th) {
        $errorMessage = $th->getMessage();
        exit($errorMessage);
    }

    closeCon($con);
    header("location: index.php");
    exit;
}
?>
