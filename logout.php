<?php

session_start();

//remove all session variables
session_unset();

//destroy
session_destroy();

// Redirect to the homepage (index.php)
header('Location: /index.php');
exit();

?>