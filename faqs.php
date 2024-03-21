<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>

    <link rel="icon" type="image/png" href="public/images/logo/logo-arvene-ver.png">
    <link rel="stylesheet" href="public/css/faqs.css">
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

    <!-- FAQ -->
    <section class="faqs">
        <div class="container">
               
            <div class="hero row">
                <div class="intro">

                    <div class="heading">
                        <h2>FAQs</h2>
                    </div>

                    <div class="faq">
                        <div class="question">
                            <h3 class="ques">HOW DO I PLACE AN ORDER?</h3>
                            <svg width="15" height="10" viewBox="0 0 42 25">
                                <path d="M3 3L21 21L39 3" 
                                    stroke="black" 
                                    stroke-width="7" 
                                    stroke-linecap="round"/>
                            </svg>
                        </div>
                        <div class="answer">
                            <p>
                                Go to the SHOP section & browse through selection of available products. 
                                Add & manage desired items into your cart.Proceed to checkout and fill out the form before your screen.
                                Wait for an email confirmation from our online sales rep and your orders will be prepared and will be shipped soon
                            </p>
                        </div>
                    </div>

                    <div class="faq">
                        <div class="question">
                            <h3 class="ques">I'VE PLACE AN ORDER, WHAT NEXT?</h3>
                            <svg width="15" height="10" viewBox="0 0 42 25">
                                <path d="M3 3L21 21L39 3" 
                                    stroke="black" 
                                    stroke-width="7" 
                                    stroke-linecap="round"/>
                            </svg>
                        </div>
                        <div class="answer">
                            <p>
                                Once you’ve placed an order with us, you will receive an e-mail with your order details. 
                                This will outline when your order will be dispatched, along with details including garment ordered, size and delivery address. 
                            </p>
                        </div>
                    </div>

                    <div class="faq">
                        <div class="question">
                            <h3 class="ques">HOW MANY DAYS WILL IT TAKE TO RECEIVE MY ORDER(S)?</h3>
                            <svg width="15" height="10" viewBox="0 0 42 25">
                                <path d="M3 3L21 21L39 3" 
                                    stroke="black" 
                                    stroke-width="7" 
                                    stroke-linecap="round"/>
                            </svg>
                        </div>
                        <div class="answer">
                            <p>
                                You can expect to have your orders after 7-14 working days from the date of receiving your email confirmation. 
                                You may track your orders through the email confirmation that will be sent to you.

                            **Your orders may take longer than expected come peak season**
                            </p>
                        </div>
                    </div>

                    <div class="faq">
                        <div class="question">
                            <h3 class="ques">I STILL HAVEN'T RECEIVED MY SHIPMENT. WHAT DO I DO WITH THIS?</h3>
                            <svg width="15" height="10" viewBox="0 0 42 25">
                                <path d="M3 3L21 21L39 3" 
                                    stroke="black" 
                                    stroke-width="7" 
                                    stroke-linecap="round"/>
                            </svg>
                        </div>
                        <div class="answer">
                            <p>
                                Once the orders are shipped out. What we can do is help you guys track your parcels and monitor
                                 its current location - but with regards to the date on when you’ll receive the items ordered is already out of our control.
                                 For this matter, you can verify and ask for a follow-up of the parcel with the courier chosen.

                            </p>
                        </div>
                    </div>

                    <div class="faq">
                        <div class="question">
                            <h3 class="ques">WHAT IS YOUR RETURN & EXCHANGE POLICY?</h3>
                            <svg width="15" height="10" viewBox="0 0 42 25">
                                <path d="M3 3L21 21L39 3" 
                                    stroke="black" 
                                    stroke-width="7" 
                                    stroke-linecap="round"/>
                            </svg>
                        </div>
                        <div class="answer">
                            <p>
                                We hope that you’ll be happy with any item you purchase from us, but if you’re unsatisfied for any reason once it arrives, 
                                you have 30 days to return your item in exchange for a full refund. This means that – whether you’re based in the UK, EU, USA or anywhere else
                                 in the world – your item must be returned to us within 30 days after your order has been delivered or is available for collection.

                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php' ?>

    <script src="public/js/hamburger.js"></script>
    <script src="public/js/span-youthden.js"></script>
    <script src="public/js/faq.js"></script>
</body>
</html>