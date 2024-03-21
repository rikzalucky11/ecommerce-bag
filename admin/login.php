<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>

    <link rel="icon" type="image/png" href="public/images/logo/logo-arvene-ver.png">
    <link rel="stylesheet" href="log-in.css">
</head>
<body>
    
    <!-- HEADER -->
    <header>

    </header>

    <section class="logIn">
        <div class="container">
            <h1 class="title">Login Admin</h1>
            <hr class="line">
            <form class="form" action="verify.php" method="POST">
                <div class="top">
                    <div class="left">
                        <label for="email">Email</label><br>
                        <input type="email" name="email" id="email" required><br>
                    </div>
                    <div class="right">
                        <label for="password">Password(ID)</label><br>
                        <input type="password" name="password" id="password" required><br>
                    </div>
                </div>
                <div class="btns">
                    <div class="left">
                        <button class="btn-logIn" type="submit" name="login" value="login">Login</button> 
                    </div>
                </div>
            </form>
        </div>
    </section>
    
</body>
</html>