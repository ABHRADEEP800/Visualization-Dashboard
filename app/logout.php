<?php
session_start();

// destroy session for logout
session_destroy();
//destroy  cookie
setcookie("user", "", time() - 3600, "/");

// redirect to index page
echo "<script>window.location.href='../index.php'</script>";

?>