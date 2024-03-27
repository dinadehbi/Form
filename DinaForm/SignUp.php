<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>SignUp</title>
</head>
<body>
<?php
$FnameErr = $LnameErr = $EmailErr = $PasswordErr = $Password2Err = $checkboxErr = $connection= "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signUp'])) {
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repeatPassword = $_POST['password2'];

    if (!preg_match("/^[a-zA-Z-' ]*$/", $firstName)) {
        $FnameErr = " * Only letters and white space allowed for firstname";
    }
    if (!preg_match("/^[a-zA-Z-' ]*$/", $lastName)) {
        $LnameErr = "* Only letters and white space allowed for lastname";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $EmailErr = "* Invalid email format";
    }

    if (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@#$])[A-Za-z\d@#$]{8,}$/", $password)) {
        $PasswordErr = "* Password must be at least 8 characters long ";
    }

    if ($repeatPassword !== $password) {
        $Password2Err = "* Passwords do not match";
    }
    if(empty($_POST['checkbox'])){
      $checkboxErr = 'checkbox is empty!';
    }

    if (empty($NomErr) && empty($prenomErr) && empty($EmailErr) && empty($PasswordErr) && empty($PasswordErr2) && empty($check)) {
        $email = $_POST["email"]; 
        $password = $_POST["password"]; 
        
        $_SESSION["signup_email"] = $email;
        $_SESSION["signup_password"] = $password;
        
        header("Location: LogIn.php");
        exit;
    }
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "NewForm";
    $tablename = "SignUp";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO $tablename (`FirstName`, `LastName`, `Email`, `Password`, `RepeatPassword`)
            VALUES (:firstName, :lastName, :email, :password, :repeatPassword)";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':firstName', $firstName);
        $stmt->bindParam(':lastName', $lastName);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':repeatPassword', $repeatPassword);

        $stmt->execute();

        $connection = "New record created successfully. Connection is successful.";
    } catch(PDOException $e) {
      //  echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
}
?>

<div class="container">
    <div class="Background">
        <h1 class="welcome">Welcome..</h1>
        <div class="box"></div>
    </div>

    <form action="SignUp.php" method="post">
        <div class="input-container">
            <h1>Sign Up</h1><br>
            <label>FirstName</label>
            <input type="text" placeholder="FirstName..." name="fname" value=""><br>
            <span><?php echo $FnameErr?></span>
            <label>LastName</label>
            <input type="text" placeholder="LastName..." name="lname"><br>
            <span><?php echo $LnameErr?></span>
            <label>Email</label>
            <input type="email" placeholder="name@gmail.com" name="email"><br>
            <span><?php echo $EmailErr?></span>
            <label>Password</label>
            <input type="password" placeholder="****" name="password"><br>
            <span><?php echo $PasswordErr?></span>
            <label>Repeat Password</label>
            <input type="password" placeholder="Repeat your Password..." name="password2"><br>
            <span><?php echo $Password2Err?></span>
            <div class="checkbox-container">
                <input type="checkbox" name="checkbox" class="checkbox">
                <label class="agree">I agree to the <a href="#" class="link">Terms of user </a></label>
                <span class="checkboxErr"><?php echo $checkboxErr?></span><br>
            </div>
            <br>
            <div class="Sign">
                <button type="submit" class="SignUp" name="signUp">Sign Up</button>
                <a href="LogIn.php" class="LogIn">LogIn →</a><br><br>
            </div>
            <span id="connexion"><?php echo $connection?></span>
        </div>
    </form>
</div>

</body>
</html>
