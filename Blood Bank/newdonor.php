<?php

session_start();

if (!isset($_SESSION['userName'])) {
    echo "<script>alert('You have to Login First!!!')</script>";
    echo "<script>location.href='../Authentication/login.php'</script>";
}

include '../Database/connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
</head>
<style>
    body {
        color: #000;
        overflow-x: hidden;
        height: 100%;
        background-image: url("../logo/donor.png");
        background-repeat: no-repeat;
        background-size: 100% 100%
    }

    .card {
        padding: 30px 40px;
        margin-top: 60px;
        margin-bottom: 60px;
        border: none !important;
        box-shadow: 0 6px 12px 0 rgba(0, 0, 0, 0.2)
    }

    .blue-text {
        color: #00BCD4
    }

    .form-control-label {
        margin-bottom: 0
    }

    input,
    textarea,
    button {
        padding: 8px 15px;
        border-radius: 5px !important;
        margin: 5px 0px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        font-size: 18px !important;
        font-weight: 300
    }

    input:focus,
    textarea:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        border: 1px solid #00BCD4;
        outline-width: 0;
        font-weight: 400
    }

    .btn-block {
        text-transform: uppercase;
        font-size: 15px !important;
        font-weight: 400;
        height: 43px;
        cursor: pointer
    }

    .btn-block:hover {
        color: #fff !important
    }

    button:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        outline-width: 0
    }
</style>

<body>
    <?php include 'header.php' ?>

    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <h3>Become a Donor</h3>
                <p class="blue-text">Put your necessary data <br> so that we can add your information in server as a donor.</p>
                <div class="card">
                    <h5 class="text-center mb-4">Blood donor form</h5>
                    <form class="form-card" action="newdonorAction.php" method="POST">
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-12 flex-column d-flex"> <label
                                    class="form-control-label px-3">Full Name</label> <input type="text" name="fname" required=""
                                    placeholder="Enter your fullname"  pattern="^[A-Za-z .]{2,}$">  </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-12 flex-column d-flex"> <label
                                    class="form-control-label px-3">Phone Number</label> <input type="text" name="phonenumber" required=""
                                    placeholder="Enter your phone number"  pattern="(\+88)?-?01[3-9]\d{8}" title="please enter a valid phonenumber"> </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-12 flex-column d-flex"> <label
                                    class="form-control-label px-3">Address</label> <input type="text" name="address" required=""
                                    placeholder="Enter your address"> </div>
                        </div>
                        <div class="form-group col-sm-12 flex-column d-flex">
                                    <label for="country" class="form-label">Blood Group</label>
                                    <select class="form-select" name="blood" required="">
                                        <option value="">Choose...</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                    </select>
                                </div>
                        <div class="row justify-content-center py-2">
                            <div class="form-group col-sm-6"> <button type="submit" name="submit"
                                    class="btn-block btn-primary">Submit</button> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>