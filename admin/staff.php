<?php
    include 'connection.php'; 

    
    if(isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }

    $numPerPage = 10;
    $startFrom = ($page - 1) * $numPerPage;

    
    $con = openCon(); // open connection
    $dbSelected = $con->select_db('youthden_ecommerce'); // select database
    if (!$dbSelected) {
        die("Can\'t use test_db : " . mysql_error());
    }
    $query = "SELECT * FROM tbl_staff LIMIT $startFrom, $numPerPage"; // LIMIT 0, 4 
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
  <link rel="stylesheet" href="includes/assets/css/modal.css" />
  <title>Our Staff</title>
</head>

<body id="body-pd">
  
  <?php include 'includes/header.php' ?>
  <?php include 'includes/navBar.php' ?>

  <!-- staff-->
  <div class="container">
    <h1>All Staff</h1>
    <div class="staff-banner">
      <div class="search-container">
        <input class="search-input" type="text" onkeyup="searchFilter()" placeholder="Search by name/email">
      </div>
      <div class="addStaff-container">
        <button id="btn-add"><a href="" type="button">Add Staff</a></button>
      </div>
    </div>
    <div class="staff">
      <div class="staff-table table">
        <table>
          <thead>
            <tr>
              <th class="title">ID</th>
              <th class="title">Name</th>
              <th class="title">Email</th>
              <th class="title">Joining Date</th>
              <th class="title">Role</th>
              <th class="title">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
              while ($row = $result->fetch_array()) { // fetch data in sql
                  echo "<tr>";
                      echo "<td class=\"data\">" . $row['id'] . "</td>";
                      echo "<td class=\"data\">" . $row['name'] . "</td>";
                      echo "<td class=\"data\">" . $row['email'] . "</td>";
                      echo "<td class=\"data\">" . $row['date'] . "</td>";
                      echo "<td class=\"data\">" . $row['role'] . "</td>";
                      echo "<td class=\"data\"><a href=\"#\"><img id=\"shopBtn\" src=\"includes/assets/img/product.png\" alt=\"\"></a>
                              <a href=\"staffDelete.php?id=" . $row['id'] . "\"><img id=\"deleteBtn\" src=\"includes/assets/img/bin.png\" alt=\"\"></a></td>";
                  echo "</tr>\n";
              }
            ?>
            <tr>
              <!-- <td class="data">1</td>
              <td class="data">Shainne Amurao</td>
              <td class="data">shainne@example.com</td>
              <td class="data">Nov. 18, 2021</td>
              <td class="data">Admin</td>
              <td class="data">
                <a href="#"><img id="shopBtn" src="assets/img/product.png" alt=\\></a>
                <a href="#"><img id="deleteBtn" src="assets/img/bin.png" alt=\\></a>
              </td>
            </tr>
            <tr>
              <td class="data">2</td>
              <td class="data">Jhun Gutierrez</td>
              <td class="data">jhun@example.com</td>
              <td class="data">Nov. 18, 2021</td>
              <td class="data">Admin</td>
              <td class="data">
                <a href="#"><img id="shopBtn" src="assets/img/product.png" alt=\\></a>
                <a href="#"><img id="deleteBtn" src="assets/img/bin.png" alt=\\></a>
              </td>
            </tr> -->
          </tbody>
        </table>
      </div>
      <div class="page-container">
        <?php
          $prQuery = "SELECT * FROM tbl_staff"; 
          $prResult = $con->query($prQuery);         

          $totalRecord = $prResult->num_rows; // total number of rows in database
          $totalPage = ceil($totalRecord / $numPerPage); // ceil will convert to the whole number ex. 2.4 => 3

          echo "<ul>";
            if ($page > 1) {
                echo "<li><a href='../dashboard/staff.php?page=".($page-1)."' class='btn-page prev'></a></li>";
            }
          
            for ($i=1; $i < $totalPage; $i++) { 
                echo "<li><a href='../dashboard/staff.php?page=".$i."'>$i</a></li>";
            }
          
            if ($i > $page) {
                echo "<li><a href='../dashboard/staff.php?page=".($page+1)."' class='btn-page next'></a></li>";
            }
          echo "</ul>";
        ?>
      </div>
    </div>
  </div>

  <div id="modal">
    <img id="modal-close" src="includes/assets/img/cancel.png" alt="">
    <div id="addStaff-modal">
      <h3>Add Staff Member</h3>
      <h4>Add your staff necessary information from here</h4>
      <form action="staffAdd.php" method="POST" enctype="multipart/form-data"> <!--enctype="multipart/form-data is necessary to upload files in form -->
        <div class="item">
          <label for="img">Staff Image</label>
          <button class="img-input"><img id="img-input-display" src="includes/assets/img/upload.png" alt="" onclick="click_the_button(files);">Drag your image here</button>
          <input id="insertFile" type="file" name="img_name">
        </div>
        <div class="item">
          <label for="staffName">Staff Name</label>
          <input id="staffNameInput" type="text" name="staff_name" placeholder="Staff Name">
        </div>
        <div class="item">
          <label for="email">Email</label>
          <input id="email" type="email" name="email" placeholder="Email">
        </div>
        <div class="item">
          <label for="joiningDate">Joining Date</label>
          <input id="joiningDate" type="date" name="joiningDate"> <!---- placeholder="JoiningDate" -->
        </div>
        <div class="item">
          <label for="staffRole">Staff Role</label>
          <select id="staffRole" name="role">
            <option value="" disabled selected hidden>Staff role</option>
            <option value="admin">Admin</option>
            <option value="admin-assistant">Admin Assistant</option>
          </select>
        </div>
        
        <button id="btn-submit" type="submit" name="submit" value="submit">Add Staff</button>
      </form>
    </div>
  </div>

  <?php
    closeCon($con); // close connection
  ?>

  <script src="includes/assets/js/main.js"></script>
  <script src="includes/assets/js/searchFilter.js"></script>
  <script src="includes/assets/js/displayImage.js"></script> 
  <script src="includes/assets/js/modal.js"></script> 

</body>
</html>