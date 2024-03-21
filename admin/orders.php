<?php
include 'connection.php';

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$numPerPage = 10;
$startFrom = ($page - 1) * $numPerPage;

$con = openCon(); // buka koneksi
$dbSelected = $con->select_db('youthden_ecommerce'); // pilih database
if (!$dbSelected) {
    die("Can\'t use test_db : " . mysql_error());
}

// Proses pembaruan jika checkbox dicentang
if (isset($_POST['submit'])) {
    if (isset($_POST['selected_orders'])) {
        $selectedOrders = $_POST['selected_orders'];

        foreach ($selectedOrders as $orderID) {
            $orderID = intval($orderID); // pastikan orderID berupa integer

            // Perbarui status pesanan menjadi 1
            $updateQuery = "UPDATE tbl_custinfo SET status_pesanan = 1 WHERE id = $orderID";
            $con->query($updateQuery);
        }
    }
}

$query = "SELECT * FROM tbl_custinfo LIMIT $startFrom, $numPerPage";
$result = $con->query($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css" rel="stylesheet" />
    <link rel="icon" href="includes/assets/img/logo.png" type="icon" />
    <link rel="stylesheet" href="includes/assets/css/styles.css" />
    <link rel="stylesheet" href="includes/assets/css/resets.css" />
    <link rel="stylesheet" href="includes/assets/css/headerSidebar.css" />
    <title>Orders</title>
</head>

<body id="body-pd">

    <?php include 'includes/header.php' ?>
    <?php include 'includes/navBar.php' ?>

    <!-- orders-->
    <div class="container">
        <h1>Orders</h1>
        <div class="orders">
            <form method="post">
                <div class="orders-table">
                    <table>
                        <thead>
                            <tr>
                                <th class="title">ID</th>
                                <th class="title">Name</th>
                                <th class="title">Email</th>
                                <th class="title">Address</th>
                                <th class="title">Phone Number</th>
                                <th class="title">Orders</th>
                                <th class="title">Action</th> <!-- Kolom tambahan untuk checkbox -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = $result->fetch_array()) { // fetch data dari mysqli
                              echo "<tr>";
                              echo "<td class=\"data\">" . $row['id'] . "</td>";
                              echo "<td class=\"data\">" . $row['cust_name'] . "</td>";
                              echo "<td class=\"data\">" . $row['cust_email'] . "</td>";
                              echo "<td class=\"data\">" . $row['cust_address'] . "</td>";
                              echo "<td class=\"data\">" . $row['cust_phone'] . "</td>";
                              echo "<td class=\"data\">" . $row['cust_order'] . "</td>";
                          
                              $statusPesanan = $row['status_pesanan'];
                              $isChecked = $statusPesanan == 1 ? 'checked' : '';
                          
                              echo "<td class=\"data\"><input type=\"checkbox\" name=\"selected_orders[]\" value=\"" . $row['id'] . "\" $isChecked></td>"; // Checkbox
                              echo "</tr>\n";
                          }
                          
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="page-container">
                    <?php
                    $prQuery = "SELECT * FROM tbl_custinfo";
                    $prResult = $con->query($prQuery);

                    $totalRecord = $prResult->num_rows; // total jumlah baris dalam database
                    $totalPage = ceil($totalRecord / $numPerPage); // ceil akan mengonversi ke bilangan bulat, misalnya 2.4 => 3

                    echo "<ul>";
                    if ($page > 1) {
                        echo "<li><a href='orders.php?page=" . ($page - 1) . "' class='btn-page prev'></a></li>";
                    }

                    for ($i = 1; $i <= $totalPage; $i++) {
                        echo "<li><a href='orders.php?page=" . $i . "'>$i</a></li>";
                    }

                    if ($i > $page) {
                        echo "<li><a href='orders.php?page=" . ($page + 1) . "' class='btn-page next'></a></li>";
                    }
                    echo "</ul>";
                    ?>

                    <button type="submit" name="submit">Update Status Pesanan</button> <!-- Tombol submit untuk pembaruan -->
                </div>
            </form>
        </div>
    </div>

    <?php
    closeCon($con); // tutup koneksi
    ?>

    <script src="includes/assets/js/main.js"></script>
    <script src="includes/assets/js/modal.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</body>

</html>
