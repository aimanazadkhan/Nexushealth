<?php
include '../Database/connection.php';

if (isset($_POST['forgotbtn'])) {
    $_email = $_POST['forgotemail'];
    $forgetToken = md5(rand());

    $email_existQuery = mysqli_query($conn, "SELECT * FROM register WHERE email = '$_email'");

    if (mysqli_num_rows($email_existQuery) > 0) {

        $row = mysqli_fetch_array($email_existQuery);
        $name = $row['userName'];
        $email = $row['email'];
        $update_tokenQuery = mysqli_query($conn, "UPDATE register SET verifytoken = '$forgetToken' WHERE email = '{$row['email']}'");

        if ($update_tokenQuery) {
            include 'resetemail.php';
            echo "<script>alert('Password Reset Has Been Emailed')</script>";
            echo "<script>location.href='forgotpass.php'</script>";
        } else {
            echo "<script>alert('Token update went wrong. Please Try Again.!')</script>";
            echo "<script>location.href='forgotpass.php'</script>";
        }
    } else {
        echo "<script>alert('No Email Found!')</script>";
        echo "<script>location.href='forgotpass.php'</script>";
    }
}

if (isset($_POST['updatebtn'])) {
    $email = $_POST['email'];
    $pass = $_POST['newPass'];
    $conPass = $_POST['conPass'];
    $token = $_POST['token'];

    $pass_pattern = "/(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%&*()]).{6,20}/";

    if (!preg_match($pass_pattern, $pass)) { //Password check
        echo "<script>alert('Invalid Password..!!')</script>";
        echo "<script>location.href='forgotPassChange>token=$token&email=$email.php'</script>";
    } else if ($pass !== $conPass) { //Confirm password check
        echo "<script>alert('Password & Confirm Password do not match..!!')</script>";
        echo "<script>location.href='forgotPassChange>token=$token&email=$email.php'</script>";
    }

    $checkTokenQuery = mysqli_query($conn, "SELECT * FROM register WHERE verifytoken = '$token'");

    if (mysqli_num_rows($checkTokenQuery) > 0) {

        $updatePasswordQuery = mysqli_query($conn, "UPDATE register SET pass='$pass' WHERE verifytoken = '$token'");

        if ($updatePasswordQuery) {
            echo "<script>alert('Password Updated Successfully!')</script>";
            $updateToken = md5(rand());
            $updatePasswordQuery2 = mysqli_query($conn, "UPDATE register SET verifytoken = '$updateToken' WHERE email = '$email'");
            echo "<script>location.href='login.php'</script>";

        } else {
            echo "<script>alert('Something Went Wrong. Please Try Again!')</script>";
            echo "<script>location.href='forgotPassChange>token=$token&email=$email.php'</script>";
        }

    } else {
        echo "<script>alert('Invalid Token!')</script>";
        echo "<script>location.href='forgotPassChange>token=$token&email=$email.php'</script>";
    }

} else {
    echo "<script>alert('Not Accessible55!')</script>";
    echo "<script>location.href='forgotPassChange>token=$token&email=$email.php'</script>";
}


?>