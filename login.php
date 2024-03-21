<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>

    <link rel="icon" type="image/png" href="public/images/logo/logo-arvene-ver.png">
    <link rel="stylesheet" href="public/css/log-in.css">
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

    <section class="logIn">
        <div class="container">
            <h1 class="title">Login</h1>
            <hr class="line">
            <form class="form" action="verify.php" method="POST">
                <div class="top">
                    <div class="left">
                        <label for="email">Email</label><br>
                        <input type="email" name="email" id="email" required><br>
                    </div>
                    <div class="right">
                        <label for="password">Password</label><br>
                        <input type="password" name="password" id="password" required><br>
                    </div>
                </div>
                <div class="btns">
                    <div class="left">
                        <button class="btn-logIn" type="submit" name="login" value="login">Login</button> 
                    </div>
                    <div class="right">
                        <p>New Customer?<a href="sign-up.php" class="sign-up">Sign up</a></p>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <?php include 'includes/footer.php' ?>

    <script src="public/js/hamburger.js"></script>
    
</body>
</html>