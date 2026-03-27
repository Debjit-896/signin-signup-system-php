<?php
include "config.php";

if (!isset($_SESSION['user'])) {
    header("Location: signin.php");
}
?>

<div class="dashboard">
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['user']); ?></h2>

    <a href="signout.php">
        <button>Sign Out</button>
    </a>
</div>