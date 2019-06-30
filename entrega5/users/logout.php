<?php include('../templates/header.php');
session_destroy();
header('Location: login.php');
exit;
?>