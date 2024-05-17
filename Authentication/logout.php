<?php

session_start();
session_unset();
session_destroy();

echo "<script>alert('Logout successfully!')</script>"; 
echo "<script>location.href='../Homepage/index.php'</script>";

?>