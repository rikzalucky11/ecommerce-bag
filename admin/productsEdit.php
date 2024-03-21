<?php 

    include 'connection.php';

    $con = openCon();

    $id = $_GET['id']; // get id through query string
    $query = "SELECT * FROM tbl_products WHERE id='$id'";
    $result = $con->query($query);

    $data = $result->fetch_array();
    
    if(isset($_POST['update'])) // when click on Update button
    {
        $productName = $con->real_escape_string($_POST['product_name']);
        $productPrice = $_POST['product_price'];
        $description = $con->real_escape_string($_POST['description']);
        $stock = $_POST['stock'];
        $file = $_FILES['img_name']; // _FILES get all information from the files that we want to upload using an input from a form

        try {
            $fileName = $file['name']; // to get the name in variable file array
            $fileTmpName = $file['tmp_name']; // to get the temporary location of the file in variable file array
            // $fileSize = $file['size']; // to get the size in variable file array
            // $fileError = $file['error']; // to get the error in variable file array
            $fileType = $file['type']; // to get the type in variable file array
    
            $fileExt = explode('.', $fileName); // we want to separate the name and extension of the file ex. clob.jpeg => clob jpeg
            $fileActualExt = strtolower(end($fileExt)); // end() is an function to get the last piece of data in an array
            $allowed = array('jpg', 'jpeg', 'png'); // allowed extension

            if (empty($fileName) || $$fileName == "") {
                echo "asdasdasd";
                try {
                    $sql = "UPDATE `tbl_products` SET `product_name` = '$productName', `product_price` = '$productPrice',
                            `description` = '$description', `stock` = '$stock' WHERE id='$id'";
    
                    if ($con->query($sql) === true) { // to check if the insertion of data in database is successfull
                        echo "Records inserted successfully.";
                    } else {
                        throw new Exception("ERROR: Could not able to execute $sql. " . $con->error);
                    }
                } catch (Throwable $th) {
                    $errorMessage = $th->getMessage();
                    exit($errorMessage);
                }
            } else {
                echo "as2323d";

                if (in_array($fileActualExt, $allowed)) { // if $fileActualExt is in $allowed array then proceed
                    $fileNewName = uniqid('', true).".".$fileActualExt; // we want to avoid file collision, the file new name will be a time format in microseconds
                    $fileDestination = 'images/'.$fileNewName;
                    
                    if (move_uploaded_file($fileTmpName, $fileDestination)) { // to upload the file from temporary location to final destination
                        $sql = "UPDATE `tbl_products` SET `product_name` = '$productName', `product_price` = '$productPrice',
                                                        `description` = '$description', `img_name` = '$fileNewName', `stock` = '$stock' WHERE id='$id'";
    
                        if ($con->query($sql) === true) { // to check if the insertion of data in database is successfull
                            echo "Records inserted successfully.";
                        } else {
                            unlink($fileDestination);
                            throw new Exception("ERROR: Could not able to execute $sql. " . $con->error);
                        }
                    } else {
                        throw new Exception('Failed to upload image file');
                    }
                } else {
                    throw new Exception('You cannot upload files of this type!');
                }
            }
        } catch (Throwable $th) {
            $errorMessage = $th->getMessage();
            exit($errorMessage);
        }
        
        closeCon($con);
        header("location: products.php?updatesuccess"); // it will redirect to products.php
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="includes/assets/img/logo.png" type="icon" />

    <link rel="stylesheet" href="includes/assets/css/resets.css" />
    <link rel="stylesheet" href="includes/assets/css/headerSidebar.css" />
    <link rel="stylesheet" href="includes/assets/css/modal.css" />
    <link rel="stylesheet" href="includes/assets/css/modal.css" />
    <title>Edit</title>
</head>
<body id="body-pd" style="background-color: var(--white-color);">

  <?php include 'includes/header.php' ?>
  <?php include 'includes/navBar.php' ?>
  
  <!-- form -->

  <div id="modall">
    <div id="update-modal">
      <h3>Update Data</h3>
      <form method="POST" enctype="multipart/form-data">
        <div class="item">
            <label for="img">Product Image</label>
            <?php $img = "images/" . $data['img_name']; ?>
            <button class="img-input">
                <?php echo "<img id=\"img-input-display\" class=\"active\" src=\"$img\" alt=\"\" onclick=\"click_the_button(files);\">" .  $data['product_name']?></button>
            <input id="insertFile" type="file" name="img_name">
        </div>
        <div class="item">
            <label for="productName">Product Name:</label><br>
            <input id="productNameInput" type="text" name="product_name" value="<?php echo $data['product_name'] ?>">
        </div>
        <div class="item">
            <label for="price">Price:</label><br>
            <input id="productPrice" type="text" name="product_price" value="<?php echo $data['product_price'] ?>">
        </div>
        <div class="item">
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="10"><?php echo $data['description'] ?></textarea>
        </div>
        <div class="item">
            <label for="stock">Stock</label>
            <input type="text" id="productQuantity" name="stock" value="<?php echo $data['stock'] ?>">
        </div>
        
        <button id="btn-submit" type="submit" name="update" value="Update">Update</button>
      </form>
    </div>
  </div>

  <script src="includes/assets/js/main.js"></script>

</body>
</html>

