<?php 

    include 'includes/connection.php'; 

    $con = openCon(); // open connection
    $dbSelected = $con->select_db('youthden_ecommerce'); // select database
    if (!$dbSelected) {
        die("Can\'t use test_db : " . mysql_error());
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" href="public/images/logo/logo-arvene-ver.png">
    <link rel="stylesheet" href="public/css/main.css">

    <title>Kelompok 4 | E-Commerce</title>
</head>
<body>

    <!-- HEADER -->
    <header>
        <!-- NAV -->
        <nav>
            <div class="container navbar">
                <div class="navbar-left">
                    <div class="navbar-logo">
                        <a href="#"><img src="public/images/logo/logo-arvene-ver.png" alt="logo"></a>
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

        <!-- HERO SECTION -->
        <section class="hero">
            <div class="container">
                <div class="heading">
                    <h1>Get your Backpack a new Style! </h1>
                </div>
                <div class="bottom">
                    <h2>WINTER 2023</h2>
                    <p>Designed and created using extraordinary technology and the best trends of street 
                        fashion of the 20th century. A colection for the young, stylish and brave.</p>
                    <div class="explore">
                        <button class="btn-explore"><a class="nav-link" href="shop.php">Explore</a></button>
                    </div>
                </div>
            </div>
        </section>
    </header>

    <!-- COLLECTION -->
    <section class="collection">
        <div class="container">
            <div class="heading">
                <h2>new collection</h2>
                <button class="btn-explore2"><a class="nav-link" href="shop.php">Explore & Shop</a></button>
            </div>
            <div class="carousel">
                <?php
                    $count_query = "SELECT count(*) FROM tbl_products";
                    $count_result = $con->query($count_query);
                    $count_fetch = mysqli_fetch_array($count_result);
                    $postCount = $count_fetch;
                    $limit = 8;

                    $query = "SELECT * FROM `tbl_products` ORDER BY `id` ASC LIMIT 0, " . $limit;  
                    $result = $con->query($query);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_array()){ 
                            echo "<div class=\"slides item1\">";
                                $img = "admin/images/" . $row['img_name'];
                                echo "<img src=$img alt=\"\" class=\"card__image\" />";
                                echo "<div class=\"details\">";
                                    echo "<p class=\"item-title\">Backpack " . $row['product_name'] . "</p>";
                                    echo "<p class=\"price\">Rp. " . $row['product_price'] . "</p>";
                                echo "</div>";
                            echo "</div>";
                        }
                    }

                ?>
                
                <div class="next-prev">
                    <a class="prev" onclick="plusSlides(-1)">
                        <img src="public/images/icons/prev.png" alt="">
                    </a>
                    <a class="next" onclick="plusSlides(1)">
                        <img src="public/images/icons/next.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ABOUT US -->
    <section class="about-us">
        <h2 class="heading">about us</h2>
        <div class="container">
            <div class="left">
                <h2>Backpack E-Commerce.</h2>
                <p>Backpack E-Commerce, established in 2022, which carries "Vintage enthusiasm" in the 60-70s era which includes the sub-cultures "Rockabilly", "Custom culture", "Vintage fashion", "Vintage Adventure", "Photography"</p>
                <img src="public/images/pics/aboutus2.jpg" alt="">
            </div>
            <div class="right">
                <img src="public/images/pics/aboutus1.jpg" alt="">
                <div class="read">
                    <h2>Backpack E-Commerce.</h2>
                    <p>At the beginning of the formation of the brand, Divinces gave birth to bag products, and over time Divinces will produce products with a "Vintage/Classic" nuance, with the aim that anyone who has a "vintage" enthusiasm can be treated with the products that Backpack E-Commerce creates.</p>
                </div>
                <button class="btn-read"><a href="about.php">read</button>
            </div>
        </div>
    </section>

    <!-- GALLERY -->
    <section class="gallery">
        <div class="container">
            <div class="pic">
                <img src="public/images/pics/pic1.jpg" alt="">
            </div>
            <div class="pic">
                <img src="public/images/pics/pic2.jpg" alt="">
            </div>
            <div class="pic">
                <img src="public/images/pics/pic3.jpg" alt="">
            </div>
            <div class="span2">
                <p>"CULTURE
                    Product Creativity
                    Our product culture includes, “vintage” , classic and retro, relating to custom subcultures, covering Driving Culture, “Traveling and Photography."</p>
            </div>
            <div class="pic">
                <img src="public/images/pics/pic4.jpg" alt="">
            </div>
            <div class="pic">
                <img src="public/images/pics/pic5.jpg" alt="">
            </div>
            <div class="span2"></div>
            <div class="pic">
                <img src="public/images/pics/pic6.jpg" alt="">
            </div>
            <div class="pic">
                <img src="public/images/pics/pic7.jpg" alt="">
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php' ?>

    <?php
        closeCon($con); // close connection
    ?>

    <script src="public/js/app.js"></script>
    <script src="public/js/hamburger.js"></script>
</body>
</html>