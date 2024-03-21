<?php 
    include 'includes/connection.php'; 

    $con = openCon();

    if (isset($_POST['login'])) { // ini berarti jika pengguna mengklik tombol submit, kode akan dijalankan
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        try {
            $sql = "SELECT `id`, `email`, `password` FROM `tbl_accounts` WHERE email = ?";
            
            if ($stmt = $con->prepare($sql)) {
                // Membind variabel ke pernyataan yang telah disiapkan sebagai parameter
                $stmt->bind_param("s", $param_email);

                $param_email = $email;

                if ($stmt->execute()) {
                    $stmt->store_result();

                    if ($stmt->num_rows == 1) { 
                        $stmt->bind_result($id, $email, $hashed_password);

                        if ($stmt->fetch()) {
                            if ($password === $hashed_password) { // password_verify($password, $hashed_password) TIDAK BERFUNGSI, JADI UNTUK SEMENTARA === AKAN DIGUNAKAN
                                session_start();
                                
                                $_SESSION["loggedin"] = true;
                                $_SESSION["id"] = $id;
                                $_SESSION["email"] = $email;  

                                if ($email === 'admin@admin.com' && $password === 'admin123') {
                                    header("location: admin/login.php"); // Arahkan ke folder admin
                                    exit;
                                } else {
                                    header("location: index.php"); // Arahkan ke index.php
                                    exit;
                                }
                            } else {
                                echo "password: " . $password . "\n\n";
                                echo "hashed password: " . $hashed_password . "\n\n";
                                throw new Exception('Email atau kata sandi salah! 1');
                            }
                        } else {
                            throw new Exception('Tidak dapat mengambil data');
                        }
                    } else {
                        throw new Exception('Email atau kata sandi salah! 2');
                    }
                } else {
                    throw new Exception('Oops! Terjadi kesalahan. Silakan coba lagi');
                }
            }

            $stmt->close();
        } catch (\Throwable $th) {
            $errorMessage = $th->getMessage();
            exit($errorMessage);
        }

        closeCon($con);
        header("location: index.php"); // Ini akan ditampilkan di URL
        exit;
    } 
?>
