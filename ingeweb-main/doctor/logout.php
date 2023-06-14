<?php
session_start(); // Start the session

// ... Your code ...

// To delete each variable session
session_unset();

// ... Other code ...

// Redirect to logout.php or any other desired page
header("Location: index.php");
exit();

?>
