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

            <span class="font" style="font-size: 35px; padding: 10px 141px;">Forgot Your Password</span>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-4 col-lg-4">
                <div class="border border-2 border-info-subtle rounded p-4 shadow-lg">
                    <form action="forgotPassAction.php" method="POST">
                        <div class="col-lg-7">
                            <label>Email Address</label>
                            <input class="form-control mt-3" type="email" name="forgotemail" Required>
                        </div>

                        <hr class="my-4">

                        <button class="w-100 btn btn-outline-primary btn-lg" type="submit" name="forgotbtn">Send Link</button>
                    </form>
                </div>

                <h5 class="text-center mt-4">Do You Want To Sign-In?</h5>

                <a href="login.php"><button class="w-100 btn btn-outline-info btn-lg" type="submit"
                        name="signin">Sign-In</button></a>
            </div>
        </div>

        <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
            crossorigin="anonymous"></script>
</body>

</html>