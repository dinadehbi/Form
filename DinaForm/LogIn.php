<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>

<?php

session_start();
$newemail2 = $newpassword2 = $LogInMess = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["login"])) {
        $email2 = $_POST["newEmail"];
        $password2 = $_POST['NewPassword'];
        
        $signup_email = isset($_SESSION["signup_email"]) ? $_SESSION["signup_email"] : "";
        $signup_password = isset($_SESSION["signup_password"]) ? $_SESSION["signup_password"] : "";
        
        if ($email2 == $signup_email && $password2 == $signup_password) {
            $LogInMess = "Welcome";
           
        } else {
            if ($email2 != $signup_email) {
                $newemail2 = "Invalid email. Please try again.";
            }
            if ($password2 != $signup_password) {
                $newpassword2 = "Invalid password. Please try again.";
            }
        }
    }
}
?>




<div class="container">
    <div class="Background">
        <h1 class="welcome">Welcome..</h1>
        <div class="box"></div>
    </div>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="input-container">
            <h1>Login</h1><br>
            <label>Email</label>
            <input type="email" placeholder="name@gmail.com" name="newEmail"><br>
            <span><?php echo $newemail2?></span>
            <label>Password</label>
            <input type="password" placeholder="****" name="NewPassword"><br>
            <span><?php echo $newpassword2?></span>

            <br>
            <div class="Sign">
                <button type="submit" class="SignUp" name="login">Login</button>
                <a href="SignUp.php" class="LogIn">Sign Up →</a><br><br>
            </div><br>
            <span id="span1">_____________ Or LogIn with ______________ </span><br>
            <div id="div">
                <button type="submit" name="Google" class="google">               
                <img src="google.png" height="30px" width="30px">
                <p class="para">Google</p>
                </button>
                <button type="submit" name="facebook" class="google">
                <img src="facebook.png" height="30px" width="30px">
                <p class="para">Facebook</p>

                </button>
            </div><br>
            <span id="connexion"><?php echo $LogInMess?></span>
          
        </div>
    </form>
</div>


</body>
</html>
