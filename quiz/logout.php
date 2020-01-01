<?php
session_destroy();
$user=$_SESSION['user'];
echo $user;
header('Location: index.html');
?>
