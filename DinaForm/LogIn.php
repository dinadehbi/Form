<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>




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
            <label>Password</label>
            <input type="password" placeholder="****" name="NewPassword"><br>
            <br>
            <div class="Sign">
                <button type="submit" class="SignUp" name="login">Login</button>
                <a href="SignUp.php" class="LogIn">Sign Up →</a><br><br>
            </div>
        </div>
    </form>
</div>
<?php
/*
session_start();
$emailErr = $passwordErr = $loginMsg = ""; // Changed variable name to avoid conflict

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    
    $NewEmail = $_POST['newEmail']; 
    $NewPassword = $_POST['NewPassword'];
    $LogIn = $_POST['login'];

}
*/
?>

</body>
</html>
