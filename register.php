<?php require("register_class.php")?>
<?php
    if(isset($_POST['submit'])){

        $user = new RegisterUser($_POST['username'], $_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['gender'], $_POST['birthday'], $_POST['password']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/register.css">
    <link rel="icon" href="images/logo2.png" type="image">
    <title>Register</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
    <div class="register">
        <div class="box form-box">
            <div class="image-box">
                <img src="images/coffee.png" alt="coffee">
            </div>
            <div class="register_form">
                <header>Sign Up</header>
                <form action="" method="post">
                    <p style="color: red;"><?php echo @$user->error?></p>
                    <p style="color: green;"><?php echo @$user->success?></p>
                    <div class="column">
                        <div class="field input">
                            <label for="fir">First Name</label>
                            <input type="text" name="firstname" id="firstname" value="<?= htmlspecialchars(($_GET["firstname"] ?? "")) ?>" required>
                        </div>
                        <div class="field input">
                            <label for="lastname">Last Name</label>
                            <input type="text" name="lastname" id="lastname" value="<?= htmlspecialchars(($_GET["lastname"] ?? "")) ?>" required>
                        </div>
                    </div>
                    <div class="field input">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="<?= htmlspecialchars(($_GET["email"] ?? "")) ?>" required>
                    </div>
                    <div class="column">
                        <div class="field input">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender" size="1" required>
                                <option value="">Please Select</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="field input">
                            <label for="birthday">Birthday</label>
                            <input type="date" name="birthday" id="birthday" value="<?= htmlspecialchars(($_GET["birthday"] ?? "")) ?>" required>
                        </div>
                    </div>
                    <div class="field input">  
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" value="<?= htmlspecialchars(($_GET["username"] ?? "")) ?>" required>
                    <div class="column">
                        <div class="field input">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" value="<?= htmlspecialchars(($_GET["password"] ?? "")) ?>" required>
                        </div>
                        <div class="field input">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" name="confirm_password" id="confirm_password" value="<?= htmlspecialchars(($_GET["confirm_password"] ?? "")) ?>" required>
                    </div>
                    </div>
                    <div class="field">
                        <input type="submit" class="button" name="submit" value="Sign Up" required>
                    </div>
                    <div class="links">
                        Already have an account yet? <a href="index.php">Login here!</a>
                    </div>

                    
                </form>
            </div>
        </div>
    </div>
</body>
</html>
