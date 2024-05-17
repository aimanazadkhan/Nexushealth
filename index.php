<?php

session_start();

if(isset($_SESSION['userName'])) {
    if($_SESSION['userName'] == 'admin') {
        echo "<script>location.href='AdminPanel/'</script>";
    } else {
        echo "<script>location.href='Homepage/'</script>";
    }
} else {
    echo "<script>location.href='Authentication/login.php'</script>";
}

?>