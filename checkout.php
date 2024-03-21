<?php
include 'includes/connection.php';

$con = openCon(); // open connection
$dbSelected = $con->select_db('youthden_ecommerce'); // select database
if (!$dbSelected) {
    die("Can't use  youthden_ecommerce : " . mysqli_error($con));
}

session_start();

// Periksa apakah pengguna sudah login atau belum
if (!isset($_SESSION['id'])) {
    // Pengguna belum login, arahkan mereka ke halaman login atau tampilkan pesan kesalahan
    header('Location: login.php'); // Ganti "login.php" dengan halaman login yang sesuai
    exit();
}

// Periksa apakah form telah disubmit
if (isset($_POST['placeorder'])) {
    // Mengambil nilai dari form
    $cust_name = $_POST['cust_name'];
    $cust_email = $_POST['cust_email'];
    $cust_address = $_POST['cust_address'];
    $cust_phone = $_POST['cust_phone'];
    $cust_order = $_POST['cust_order'];

    // Periksa apakah ada item di keranjang
    if (!empty($_SESSION['cart'])) {
        $items = $_SESSION['cart'];

        // Siapkan statement SQL untuk memasukkan data ke tabel tbl_custinfo
        $sql = "INSERT INTO tbl_custinfo (cust_name, cust_email, cust_address, cust_phone, cust_order) VALUES ('$cust_name', '$cust_email', '$cust_address', '$cust_phone', '$cust_order')";

        // Eksekusi statement SQL
        if ($con->query($sql) === TRUE) {
            // Mendapatkan ID terakhir yang di-generate dalam database
            $cust_id = $_SESSION['id'];

           // Siapkan statement SQL untuk memasukkan data ke tabel tbl_custinfo_barang
            $insertStmt = $con->prepare("INSERT INTO tbl_custinfo_barang (cust_id, barang_dibeli, quantity) VALUES (?, ?, ?)");

            // Bind parameter ke statement SQL
            $insertStmt->bind_param("iss", $cust_id, $barang_dibeli, $quantity);

            // Ambil cust_id dari session
            $cust_id = $_SESSION['id'];

            // Loop melalui item di keranjang dan masukkan ke database
            foreach ($_SESSION['cart'] as $item) {
                $barang_dibeli = $item['product_name'];
                $quantity = $item['quantity'];

                // Eksekusi statement SQL
                $insertStmt->execute();

            }

            // Tutup statement
            $insertStmt->close();
            $con->close();

            // Hapus keranjang belanja setelah berhasil checkout
            unset($_SESSION['cart']);

            // Redirect ke halaman berhasil checkout atau tampilkan pesan sukses
            header('Location: checkout_success.php'); // Ganti "checkout_success.php" dengan halaman sesuai kebutuhan
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Checkout</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="icon" type="image/png" href="public/images/logo/logo-arvene-ver.png" />
    <link rel="stylesheet" href="./public/css/checkout.css" />
</head>

<body>
    <!-- HEADER -->
    <header>
        <!-- NAV -->
        <nav class="sticky">
            <div class="container navbar">
                <!-- Navbar content -->
                <div class="navbar-left">
                    <div class="navbar-logo">
                        <a href="index.php"><img src="public/images/logo/logo-arvene-ver.png" alt="logo" /></a>
                    </div>
                    <div class="overlay">
                        <ul class="menu">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="shop.php">shop</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about.php">about</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="faqs.php">faq</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="navbar-right">
                    <div class="navbar-button icon1">
                        <a href="cart.php"></a>
                    </div>
                    <div class="navbar-button hamburger"></div>
                </div>
            </div>
        </nav>
    </header>

    <!-- CHECKOUT-->
    <section class="checkout">
        <div class="container">
            <div id="title">checkout</div>
            <div id="subtitle">billing details</div>
            <div class="d-flex">
                <form action="cust_info.php" method="POST" id="checkout-form">
                    <input type="text" name="cust_name" placeholder="Name" autocomplete="off" />
                    <input type="email" name="cust_email" placeholder="Email Address" autocomplete="off" />
                    <input type="text" name="cust_address" placeholder="Address" autocomplete="off" />
                    <input type="text" name="cust_phone" placeholder="Phone Number" autocomplete="off" />
                    <input type="text" name="cust_order" placeholder="confirm your order (ex.Arin(1)black(1))" autocomplete="off" />
                    <button type="submit" name="placeorder" class="placeorder">place order</button>
                </form>

                <div class="order">
                    <?php 
                    $total_price = 0;

                    if (!empty($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $key => $value) {
                            ?>
                            <tr>
                                <td><?php echo $value['id']; ?></td>
                                <td><?php echo $value['product_name']; ?></td>
                                <td><?php echo $value['quantity']; ?></td>
                                <td><?php echo $value['product_price']; ?></td>
                                <td></td>
                            </tr>
                            <?php 
                            $total_price = $total_price + $value['quantity'] * $value['product_price'];
                        }
                    } else { ?>
                        <tr>
                            <td colspan="5" class="tbl-nodata">NO ITEM SELECTED</td>
                        </tr>
                    <?php } ?>

                    <table>
                        <tr>
                            <th colspan="2">Your order</th>
                        </tr>
                        <tr>
                            <td id="total">Total</td>
                            <td id="price">Rp. <?php echo number_format($total_price, 2); ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php' ?>

    <script src="public/js/app.js"></script>
    <script src="public/js/hamburger.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            $(".placeorder").click(function() {

                var action = "success";

                $.ajax({
                    method: "POST",
                    url: "action_cart.php",
                    data: {
                        action: action
                    },
                    success: function(data) {
                        alert("Thank You! An automated payment receipt has been sent to your email. Have a nice day and stay safe fellow youth! -youthden.");
                        window.parent.location = window.parent.location.href;
                    }
                });
            });
        });

        function submit() {
            document.getElementById("checkout-form").reset();
        }
    </script>
</body>

</html>
