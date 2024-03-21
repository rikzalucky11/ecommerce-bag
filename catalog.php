<?php 

    include 'includes/connection.php'; 

    $con = openCon(); // open connection
    $dbSelected = $con->select_db('youthden_ecommerce'); // select database
    if (!$dbSelected) {
        die("Can\'t use test_db : " . mysql_error());
    }

?>

<?php
    $count_query = "SELECT count(*) FROM tbl_products";
    $count_result = $con->query($count_query);
    $count_fetch = mysqli_fetch_array($count_result);
    $postCount = $count_fetch;
    $limit = 6;
    
    $query = "SELECT * FROM `tbl_products` ORDER BY `id` ASC LIMIT 0, " . $limit;  
    $result = $con->query($query);

    $output = " ";

    if ($result->num_rows > 0) {

    while($row = $result->fetch_array()){
                    
        $output .= "
        <div class='card'>
                <img class='card__image' src='admin/images/".$row['img_name']."' width='100%' height='auto'>
            <div class='card__content'>
                <p class='name'> Backpack ".$row['product_name']."</p>
                <p class='price'>Rp. ".$row['product_price']."</p>
                <input type='hidden' name='product_name' id='product_name".$row['id']."' value=".$row['product_name'].">
                <input type='hidden' name='product_price' id='product_price".$row['id']."' value=".$row['product_price'].">
                <label for='quantity'>Quantity: </label>
                <input type='number' class='quantity'name='quantity' id='quantity".$row['id']."' value='1'>

                <a href=\"cart.php\"><input type='submit' name='addtocart' class='addtocart' value='Add to Bag' id='".$row['id']."'></a>
            </div>
       </div> ";
    
    }
        echo $output;
    } else {
        $output .= "No Item";
        echo $output;
    }
    closeCon($con); // close connection
?>