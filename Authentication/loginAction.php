<?php

if (isset($_POST['btn_signIn'])) {
    include '../Database/connection.php';

    $log_user_email = $_POST['l_username'];
    $log_password = $_POST['l_pass'];

    $result = mysqli_query($conn, "SELECT * FROM `register` 
        WHERE (userName = '$log_user_email' OR email = '$log_user_email') AND BINARY pass = '$log_password' AND verifystatus = '1'");
    if ($log_user_email === 'admin' && $log_password === 'admin') {
        session_start();
        $_SESSION['userName'] = $log_user_email;
        echo "<script>location.href='../AdminPanel/'</script>";
    } else if (mysqli_num_rows($result) > 0) {
        session_start();
        $_SESSION['userName'] = $log_user_email;
        echo "<script>location.href='../Homepage/index.php'</script>";
    } else {
        $result1 = mysqli_query($conn, "SELECT * FROM `register` 
            WHERE (userName = '$log_user_email' OR email = '$log_user_email') AND BINARY pass = '$log_password' AND verifystatus = '0'");
        if (mysqli_num_rows($result1) > 0) {

        
            echo "<script>alert('Your Account has not been verified yet. A verification link has been sent to your registered email address!')</script>";
            echo "<script>location.href='login.php.php'</script>";
        } else {
            echo "<script>alert('Invalid Username or Password.Please Try Again!')</script>";
            echo "<script>location.href='login.php'</script>";
        }
    }
} else {
    echo "<script>alert('Not Accessible!')</script>";
    echo "<script>location.href='login.php'</script>";
}

?>