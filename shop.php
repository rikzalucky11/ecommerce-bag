<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shop</title>

    <link rel="icon" type="image/png" href="public/images/logo/logo-arvene-ver.png" />
    <link rel="stylesheet" href="public/css/catalog.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
    <!-- HEADER -->
    <header>
        <!-- NAV -->
        <nav class="sticky">
            <div class="container navbar">
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
                            <div class="sign-in">
                                <button class="btn-signIn">
                                    <a href="sign-up.php">sign in</a>
                                </button>
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
                    <div class="navbar-button hamburger"></div>
                </div>
            </div>
        </nav>
    </header>

    <!-- CATALOG-->
    <section class="shop">
        <div class="container">
            <div id="title">Shop</div>
            <div id="subtitle">Backpack</div>
            <div class="cards">
            
            </div>
            <div class="shop">
                <input type="button" class="btn-shop" id="loadBtn" value="Load More">
                <input type="hidden" id="row" value="0">
                <input type="hidden" id="postCount" value="<?php echo $postCount; ?>">
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php' ?>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="public/js/hamburger.js"></script>

<script>

    $(document).ready(function(){

    catalog();
    
    function catalog(){
        $.ajax({
            method: "POST",
            url:"catalog.php",
            success:function(data){
                $(".cards").html(data);
            }
        });
    }

    $(document).on("click",".addtocart",function(){
        var id = $(this).attr("id");
        var product_name = $("#product_name"+id+"").val();
        var product_price = $("#product_price"+id+"").val();
        var quantity = $("#quantity"+id+"").val();
 
        $.ajax({
            method: 'POST',
            url:'add_to_cart.php',
            data:{id:id,product_name:product_name,product_price:product_price,quantity:quantity},
            success:function(data){
                alert("You have added a new item to your bag.");
            }
        });
     });
    });
    
      $(document).ready(function () {
        $(document).on('click', '#loadBtn', function () {
          var row = Number($('#row').val());
          var count = Number($('#postCount').val());
          var limit = 6;
          row = row + limit;
          $('#row').val(row);
          $("#loadBtn").val('Loading...');
        
          $.ajax({
            type: 'POST',
            url: 'loadmore-data.php',
            data: 'row=' + row,
            success: function (data) {
              var rowCount = row + limit;
              $('.cards').append(data);
              if (rowCount >= count) {
                $('#loadBtn').css("display", "none");
              } else {
                $("#loadBtn").val('Load More');
              }
            }
          });
        });
      });

</script>

</body>
</html>