<?php
    include 'includes/connection.php'; 
    $con = openCon(); // open connection


    if (isset($_POST['row'])) {
        $start = $_POST['row'];
        $limit = 7;
        $query = "SELECT * FROM `tbl_products` ORDER BY `id` ASC LIMIT ".$start.",".$limit;
        $result = $con->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array()) { ?>


                    <?php 

                    $output = " ";

                    if (mysqli_num_rows($result) < 1) {
                        $output .= "No Item";
                    }
                    while ($row = mysqli_fetch_array($result)) { 

                        $output .= "
                        
                        <div class='card'>
                                <img class='card__image' src='admin/images/".$row['img_name']."' width='100%' height='auto'>
                            <div class='card__content'>
                                <p class='name'>Backpack ".$row['product_name']."</p>
                                <p class='price'>Rp. ".$row['product_price']."</p>
                                <input type='hidden' name='product_name' id='product_name".$row['id']."' value=".$row['product_name'].">
                                <input type='hidden' name='product_price' id='product_price".$row['id']."' value=".$row['product_price'].">
                                <label for='quantity'>Quantity: </label>
                                <input type='number' class='quantity'name='quantity' id='quantity".$row['id']."' value='1'>

                                <input type='submit' name='add_to_bag' class='addtocart' value='Add to Bag' id='".$row['id']."'>
                            </div>
                       </div> ";
                    }
                    echo $output;

                    ?>
            
           <?php  }
        }
    }
            ?> 

<?php
    closeCon($con); // close connection
?>