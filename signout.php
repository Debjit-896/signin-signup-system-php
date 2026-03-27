<?php
include "config.php";

session_destroy();
header("Location: signin.php");
?>