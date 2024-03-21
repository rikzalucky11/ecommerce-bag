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
  <link rel="icon" href="includes/assets/img/logo.png" type="icon" />
  <link rel="stylesheet" href="includes/assets/css/styles.css" />
  <link rel="stylesheet" href="includes/assets/css/resets.css" />
  <link rel="stylesheet" href="includes/assets/css/headerSidebar.css" />
  <title>Settings</title>
</head>

<body id="body-pd">
  
  <?php include 'includes/header.php' ?>
  <?php include 'includes/navBar.php' ?>

  <!-- setting-->
  <div class="container">
    <h1>Edit Profile</h1>
    <div class="setting">
      <div class="setting-table">
        <table>
          <tr>
            <th class="title-setting">Profile Picture</th>
            <td class="data-setting">
              <button class="btn-profileInput" onclick="click_the_button(files);">
                <input id="custom-profile-input" type="file" />
              </button>
            </td>
          </tr>
          <tr>
            <th class="title-setting">Name</th>
            <td class="data-setting">
              <input class="profile-input" type="text" placeholder="Your name" />
            </td>
          </tr>
          <tr>
            <th class="title-setting">Email</th>
            <td class="data-setting">
              <input class="profile-input" type="email" placeholder="Email" />
            </td>
          </tr>
          <tr>
            <th class="title-setting">Staff Role</th>
            <td class="data-setting">
              <select id="role">
                <option value="" disabled selected hidden>Staff role</option>
                <option value="admin">Admin</option>
                <option value="admin">Admin Assistant</option>
              </select>
            </td>
          </tr>
          <tr>
            <th class="title-setting"></th>
            <td class="button-setting">
              <button class="btn-upProfile">
                <a href="#" type="button">Update Profile</a>
              </button>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>

  <?php
    closeCon($con); // close connection
  ?>
  
  <script src="includes/assets/js/main.js"></script>

</body>
</html>