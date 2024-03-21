<?php
include 'connection.php';


if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 1;
}

$numPerPage = 15 ;
$startFrom = ($page - 1) * $numPerPage;


$con = openCon(); // open connection
$dbSelected = $con->select_db('youthden_ecommerce'); // select database
if (!$dbSelected) {
  die("Can\'t use test_db : " . mysql_error());
}
$query = "SELECT * FROM tbl_custinfo LIMIT $startFrom, $numPerPage"; // LIMIT 0, 4 
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
    <title>Customers</title>
</head>

<body id="body-pd">

    <?php include 'includes/header.php' ?>
    <?php include 'includes/navBar.php' ?>

    <!-- customers-->
    <div class="container">
        <h1>Customers</h1>
        <div class="customers">
            <div class="customers-table">
                <table>
                    <thead>
                        <tr>
                            <th class="title">ID</th>
                            <th class="title">Name</th>
                            <th class="title">Email</th>
                            <th class="title">Address</th>
                            <th class="title">Phone Number</th>
                          
                    </thead>
                    <tbody>
                    <?php
              while ($row = $result->fetch_array()) { // fetch data in sqli
                  echo "<tr>";
                      
                      echo "<td class=\"data\">" . $row['id'] . "</td>";
                      echo "<td class=\"data\">" . $row['cust_name'] . "</td>";
                      echo "<td class=\"data\">" . $row['cust_email'] . "</td>";
                      echo "<td class=\"data\">" . $row['cust_address'] . "</td>";
                      echo "<td class=\"data\">" . $row['cust_phone'] . "</td>";
                   
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

          $totalRecord = $prResult->num_rows; // total number of rows in database
          $totalPage = ceil($totalRecord / $numPerPage); // ceil will convert to the whole number ex. 2.4 => 3

          echo "<ul>";
            if ($page > 1) {
                echo "<li><a href='customers.php?page=".($page-1)."' class='btn-page prev'></a></li>";
            }
          
            for ($i=1; $i < $totalPage; $i++) { 
                echo "<li><a href='customers.php?page=".$i."'>$i</a></li>";
            }
          
            if ($i > $page) {
                echo "<li><a href='customers.php?page=".($page+1)."' class='btn-page next'></a></li>";
            }
          echo "</ul>";
        ?>
      </div>
    </div>
  </div>

  <?php
    closeCon($con); // close connection
  ?>

<script src="includes/assets/js/main.js"></script>
  <script src="includes/assets/js/modal.js"></script> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</body>
</html>