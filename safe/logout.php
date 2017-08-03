<?php
session_start();
session_destroy();
header("Location: /safe/index.php");
?>
