<?php
    session_start();
    session_destroy();
    unset($_SESSION);
    header("Location: /ingeweb-main/doctor/login.php");
    exit;
?>