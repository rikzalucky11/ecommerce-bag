<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>

    <link rel="icon" type="image/png" href="public/images/logo/logo-arvene-ver.png">
    <link rel="stylesheet" href="public/css/about.css">
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

    <!-- ABOUT -->
    <section class="about">
        <div class="container">
            <div class="hero reverse">
                <div class="intro">
                    <div class="heading">
                        <h2>OUR BRAND BEGINS AND FOCUS FROM CANVAS BAG PRODUCTS </h2>
                    </div>
                    <div class="bottom">
                        <p>Backpack E-Commerce, established in 2022, which carries "Vintage enthusiasm" in the 60-70s era which includes the sub-cultures "Rockabilly", "Custom culture", "Vintage fashion", "Vintage Adventure", "Photography</p>
                        <br>
                        <p>At the beginning of the formation of the brand, Divinces gave birth to bag products, and over time Divinces will produce products with a "Vintage/Classic" nuance, with the aim that anyone who has a "vintage" enthusiasm can be treated with the products that Backpack E-Commerce creates.</p>
                        <br>
                        <!-- <p>Founded in 2021 by Youth Den squad which is a group of college friends, Youth Den has come a long way from its beginnings in a starting location in Lipa City, Malvar Batangas. 
                        We aim to offer our customers a variety of the latest Youth Den T-shirt design. We’ve come a long way, so we know exactly which direction to take when supplying you with high quality yet budget-friendly products. 
                        We offer all of this while providing excellent customer service and friendly support. 
                        We believe passionately in great bargains and excellent service, which is why we commit ourselves to giving you the best of both. 
                        If you’re looking for something new, you’re in the right place. We strive to be industrious and innovative, offering our customers something they want, putting their desires at the top of our priority list.</p> -->
                    </div>
                </div>
                <div class="pic pic1"></div>
            </div>
            <div class="hero row">
                <div class="intro">
                    <p>CULTURE.</p>
                    <br>
                    <p>Product Creativity
                    Our product culture includes, “vintage” , classic and retro, relating to custom subcultures, covering Driving Culture, “Traveling and Photography.  </p><br>
                    <!-- <p>For us, it’s about the Youth: what the Youth wants; what the Youth needs. We’re on a mission to empower creative independence in a commercial world.</p> -->
                    
                </div>
                <div class="pic pic2"></div>
            </div>
            <div class="youth-den">
                <img class="yd-pic" src="public/images/pics/pic1.jpg" alt="">
                <img class="yd-pic" src="public/images/pics/pic6.jpg" alt="">
                <img class="yd-pic" src="public/images/pics/pic3.jpg" alt="">
                <div class="youth-den-p">
                    <div class="top">
                    </div>
                    <div class="bottom">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php' ?>

    <script src="public/js/hamburger.js"></script>
    <script src="public/js/span-youthden.js"></script>
</body>
</html>