<?php include "config.php";
$message = "";

if (isset($_POST['signup'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    // password validation
    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$&!%]).{8,20}$/', $password)) {
        $message = "<p class='error'>Password must be at least 8 characters with uppercase, lowercase, number & special character (@,#,$,&,!,%)</p>";
    } else {
        // Check that user already exists or not 
        $check = $connection->query("SELECT * FROM users WHERE email='$email'");

        if ($check->num_rows > 0) {
            $message = "<p class='error'>User already exists! Try another email.</p>";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (name, email, mobile, password) 
        VALUES ('$name', '$email', '$mobile', '$hashedPassword')";

            if ($connection->query($sql)) {
                $message = "<p class='success'>Sign up successfully! Redirecting...</p>";
                header("refresh:1;url=signin.php");
            } else {
                $message = "<p class='error'>Error: " . $connection->error . "</p>";
            }
        }
    }
}

?>

<link rel="stylesheet" href="style.css">

<form method="POST">
    <h2>Sign Up</h2>

    <?php echo $message; ?>

    <input type="text" name="name" placeholder="Enter your full name" required>
    <input type="email" name="email" placeholder="Enter your email" required>
    <input type="tel" name="mobile" placeholder="Enter your mobile number" required>
    <input type="password" name="password" placeholder="Enter Password" required>

    <button name="signup">Sign Up</button>

    <p>Already have account? <a href="login.php">Login</a></p>
</form>