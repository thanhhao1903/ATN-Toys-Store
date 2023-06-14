<?php
    session_start();
    ob_start();
    unset($_SESSION['Email']);
    header('location: homepage.php');
?>
