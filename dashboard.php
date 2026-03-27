<?php
include "config.php";

if (!isset($_SESSION['user'])) {
    header("Location: signin.php");
}
?>

<link rel="stylesheet" href="style.css">

<h2>Welcome, <?php echo $_SESSION['user']; ?></h2>

<a href="signout.php">
    <button>Sign Out</button>
</a>