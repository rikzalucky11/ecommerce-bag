<?php 

    include 'includes/connection.php'; 

    $con = openCon(); // open connection
    $dbSelected = $con->select_db('youthden_ecommerce'); // select database
    if (!$dbSelected) {
        die("Can\'t use test_db : " . mysql_error());
    }

session_start();

 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>

    <link rel="icon" type="image/png" href="public/images/logo/logo-arvene-ver.png">
    <link rel="stylesheet" href="public/css/cart.css">
</head>
<body>
    
    <!-- HEADER -->
    <header>
        <!-- NAV -->
        <nav class="sticky">
            <div class="container navbar">
                <div class="navbar-left">
                    <div class="navbar-logo">
                        <a href="index.php"><img src="public/images/logo/logo-arvene-ver.png" alt="logo"></a>
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
                            <div class="sign-in">
                                <button class="btn-signIn"><a href="sign-up.php">sign in</a></button>
                            </div>
                        </ul>
                    </div>
                </div>
                <div class="navbar-right">
                    <div class="navbar-button icon1">
                        <a href="cart.php"></a>
                    </div>
                    <div class="navbar-button icon2">
                        <a href="sign-up.php"></a>
                    </div>
                    <div class="navbar-button hamburger">
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- PRODUCT  -->
    <section class="cart">
        <div class="container">
            <div class="bag">
                <h2>your bag</h2>

                <div class="header">
                    <table class="table-item">
                         <tr>
                            <th>ID</th>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>

                        <?php 

                        $total_price = 0;

                            if (!empty($_SESSION['cart'])) {
                        
                                foreach ($_SESSION['cart'] as $key => $value) { ?>
                                <tr>
                                    <td><?php echo $value['id']; ?></td>
                                    <td><?php echo $value['product_name']; ?></td>
                                    <td><?php echo $value['quantity']; ?></td>
                                    <td><?php echo $value['product_price']; ?></td>
                                    <td>
                                        <button class="remove" id="<?php echo $value['id']; ?>">Remove</button>
                                    </td> 
                                </tr>

                             <?php $total_price = $total_price + $value['quantity'] * $value['product_price']; ?>
                        
                        <?php }
                    }else { ?>
                        <tr>
                            <td colspan="5" class="tbl-nodata">NO ITEM SELECTED</td>
                        </tr>
                    <?php }
                 ?>

            </table>
                    </table>
                </div>


                <hr class="line">
                <div class="receipt">
                    <div class="subtotal">
                        <p class="title">subtotal</p>
                        <p class="price">Rp. <?php echo number_format($total_price,2); ?></p>
                    </div>
                    <div class="shipping">
                        <p class="title">shipping</p>
                        <p>Calculated at checkout</p>
                    </div>
                </div>
                <div class="checkout">
                    <a href="checkout.php"><button class="btn-checkout">continue to checkout</button></a>
                </div>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php' ?>

    <script src="public/js/hamburger.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function(){


        $(".remove").click(function(){
           var id = $(this).attr("id");
                
           var action = "remove";

             $.ajax({
               method:"POST",
               url:"action_cart.php",
               data:{action:action,id:id},
               success:function(data){
                  alert("You have remove an item with ID "+id+".");
                  window.parent.location = window.parent.location.href;
               }
            });
        });
    });
</script>

</body>
</html>