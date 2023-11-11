<?php 
// Logout untuk menghilangkan Session
session_start();
$_SESSION = [];
session_unset();
session_destroy();

header("Location: ../sign/member/sign_in.php");
  exit;
?>