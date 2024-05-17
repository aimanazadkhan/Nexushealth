<?php
include '../Database/connection.php';

if (!isset($_GET['token'])) {
    echo "<script>alert('Not Accessible!')</script>";
    echo "<script>location.href='login.php'</script>";
}



$userDataQuery = mysqli_query($conn, "SELECT * FROM register WHERE email = '{$_GET['email']}'");
$row = mysqli_fetch_array($userDataQuery);

if ($_GET['token'] !== $row['verifytoken']) {
    echo "<script>alert('Link Has Been Expired. Please Reset Again!')</script>";
    echo "<script>location.href='login.php'</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container-fluid">
        <div class="py-5 text-center">
            <a href="../Homepage/index.php"><img src="../logo/reglogo.png" class="mb-4 img-fluid" alt="Logo"
                    style="width: 400px;"></a><br>

            <span class="font" style="font-size: 35px; padding: 10px 141px;">Reset Your Password</span>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-4 col-lg-4">
                <div class="border border-2 border-info-subtle rounded p-4 shadow-lg">
                    <form action="forgotPassAction.php" method="POST">
                        <input type="hidden" value="<?php echo $_GET['token'] ?>" name="token">

                        <div class="col-lg-8 mb-3">
                            <label>Email Address</label>
                            <input class="form-control mt-3" type="email" name="email"
                                value="<?php echo $_GET['email'] ?>" readonly Required>
                        </div>

                        <div class="col-lg-8 mb-3">
                            <label>New Password</label>
                            <input class="form-control mt-3" type="password" name="newPass" Required>
                        </div>

                        <div class="col-lg-8">
                            <label>Confirm Password</label>
                            <input class="form-control mt-3" type="password" name="conPass" Required>
                        </div>
                        <hr class="my-4">

                        <button class="w-100 btn btn-outline-success btn-lg" type="submit" name="updatebtn">Update
                            Password</button>
                    </form>
                </div>

            </div>
        </div>

        <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
            crossorigin="anonymous"></script>
</body>

</html>