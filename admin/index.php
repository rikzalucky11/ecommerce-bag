<?php
    include 'connection.php'; 

    
    if(isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }

    $numPerPage = 4;
    $startFrom = ($page - 1) * $numPerPage;

    
    $con = openCon(); // open connection
    $dbSelected = $con->select_db('youthden_ecommerce'); // select database
    if (!$dbSelected) {
        die("Can\'t use test_db : " . mysql_error());
    }
    $query = "SELECT * FROM tbl_products LIMIT $startFrom, $numPerPage"; // LIMIT 0, 4 
    $result = $con->query($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css" rel="stylesheet" />
  <link rel="icon" href="includes/assets/img/profile_pic.png" type="icon" />
  <link rel="stylesheet" href="includes/assets/css/styles.css" />
  <link rel="stylesheet" href="includes/assets/css/resets.css" />
  <link rel="stylesheet" href="includes/assets/css/headerSidebar.css" />
  <title>Kelompok 5 | E-Commerce</title>
</head>

<body id="body-pd">

  <?php include 'includes/header.php' ?>
  <?php include 'includes/navBar.php' ?>

  <!-- dashboard-->
  <div class="dashboard-container">
    <h1>Dashboard</h1>
    <h4>Welcome back Admin.</h4>
    <div class="dashboard">
      <div class="dashboard-banner">
        <img src="includes/assets/img/dashboard pic.png" id="image-db" alt="" />
        <div class="banner-text">
          <h3>
            <span>Since your last login on the system, there were:</span><br />
            <ul>
              <li>Changes in the system.</li>
              <li>Updates on the products.</li>
              <li>Huge progress in the sales.</li>
            </ul>
          </h3>
        </div>
      </div>
      <div class="dashboard-statistics">
        <div class="grid-item">
          <a href="sales.php">
            <p>Total Sales</p>
            <span class="stats">40 121</span>
            <img src="includes/assets/img/graph.png" alt="">
          </a>
        </div>
        <div class="grid-item">
          <a href="order.php">
            <p>Total Order</p>
            <span class="stats">1367</span>
            <img src="includes/assets/img/order not active.png" alt="">
          </a>
        </div>
        <div class="grid-item">
          <a href="products.php">
            <p>Total Product</p>
            <?php
              $prQuery = "SELECT * FROM tbl_products"; 
              $prResult = $con->query($prQuery);         
    
              $totalRecord = $prResult->num_rows;

              echo "<span class=\"stats\">$totalRecord</span>"
            ?>
            <img src="includes/assets/img/product not active.png" alt="">
          </a>
        </div>
        <div class="grid-item">
          <a href="customers.php">
            <p>Total User</p>
            <span class="stats">40</span>
            <img src="includes/assets/img/customer not active.png" alt="">
          </a>
        </div>
      </div>
    </div>
  </div>

  <?php
    closeCon($con); // close connection
  ?>

  <script src="includes/assets/js/main.js"></script>

</body>
</html>