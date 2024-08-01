<?php require("login_class.php")?>
<?php
    if(isset($_POST['submit'])){

        $user = new LoginUser($_POST['username'], $_POST['password']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-COmpatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="icon" href="images/logo2.png" type="image">
    <title>Login</title>

</head>
<body>
    <div class="container">
        <div class="welcome-box">
            <h1>Welcome to <br><span>Jake's Coffee Shop</span>!</h2>
        </div>
        <div class="box form-box">
            <header>Log In</header>
            <form  method="post">
                <p style="color: red;"><?php echo @$user->error?></p>
                <p style="color: green;"><?php echo @$user->success?></p>
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>

                <div class="field">
                    <input type="submit" class="login button" name="submit" value="Login" required>
                </div>

                <div class="links">
                    Don't have an account yet? <a href="register.php">Register here!</a>
                </div>

                
            </form>
        </div>
    </div>
</body>
</html>