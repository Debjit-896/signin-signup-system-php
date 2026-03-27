<?php include "config.php";
$message = "";

if (isset($_POST['signin'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $connection->query("SELECT * FROM users WHERE email='$email'");

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['email'];
            header("Location: dashboard.php");

        } else {
            $message = "<p class='error'>Wrong Password!</p>";
        }

    } else {
        $message = "<p class='error'>User not found!</p>";
    }
}
?>

<link rel="stylesheet" href="style.css">

<form method="POST">
    <h2>Sign In</h2>

    <input type="email" name="email" placeholder="Enter your email" required>
    <input type="password" name="password" placeholder="Eneter Password" required>

    <button name="signin">Sign In</button>

    <p>New user? <a href="signup.php">Sign Up</a></p>
</form>

