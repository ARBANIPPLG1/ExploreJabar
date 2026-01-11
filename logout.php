<?php
session_start();

// Destroy session
session_destroy();

// Redirect to login
header('Location: index.php?logout=success');
exit();
?>
