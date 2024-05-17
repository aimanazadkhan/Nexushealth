<?php
session_start();
if (!isset($_SESSION['otp']) && !isset($_GET['cod'])) {
    echo "<script>alert('Not Accessible!')</script>";
    echo "<script>location.href='../Med Corner/medhome.php'</script>";
}

include '../Database/connection.php';

// Check if form is submitted for OTP verification
if (isset($_POST['verifyBtn'])) {
    $user_otp = $_POST['1'] . $_POST['2'] . $_POST['3'] . $_POST['4'];
    // Compare user inputted OTP with stored OTP
    if ($user_otp == $_SESSION['otp']) {
        echo "<script>alert('OTP verified successfully!')</script>";
    
        $cartItems = $_POST['cartItems'];

        // Perform database insert operation
        $sql = "INSERT INTO `receipt`(`orderBuyer`, `items`) VALUES ('{$_SESSION['userName']}',' $cartItems')";
        // Execute the SQL query
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Record inserted successfully')</script>";
            echo "<script>sessionStorage.clear();</script>";
            echo "<script>location.href='../Med Corner/receipt.php'</script>";
        } else {
            echo "<script>alert('Error inserting record: " . $conn->error . "');</script>";
        }
    } else {
        echo "<script>alert('Incorrect OTP! Please try again.')</script>";
    }
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Design with Logo</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Placeholder logo -->
        <img src="../logo/otp.png" alt="Logo" style="width:170px">

        <form action="otp.php" method="POST">
            <div class="container d-flex">
                <p class="mt-2 me-5">OTP: </p>

                <div class="col-lg-2 me-1 p-0">
                    <input maxlength="1" type="digit" class="form-control" name="1">
                </div>
                <div class="col-lg-2 me-1 p-0">
                    <input maxlength="1" type="digit" class="form-control" name="2">
                </div>
                <div class="col-lg-2 me-1 p-0">
                    <input maxlength="1" type="digit" class="form-control" name="3">
                </div>
                <div class="col-lg-2 m-0 p-0">
                    <input maxlength="1" type="digit" class="form-control" name="4">
                </div>
            </div>
            <input type="hidden" name="cartItems" id="cartItemsInput">

            <button type="submit" name="verifyBtn">Submit</button>
        </form>
    </div>

    <script>
        // Retrieve the data from sessionStorage
        var data = JSON.parse(sessionStorage.getItem('cartItems'));
        // Convert the JavaScript object to a JSON string
        var jsonData = JSON.stringify(data);
        // Set the JSON data as the value of a hidden input field
        document.getElementById("cartItemsInput").value = jsonData;

        console.log(JSON.parse(sessionStorage.getItem('cartItems')));

        // Function to clear sessionStorage
        function clearSessionStorage() {
            sessionStorage.clear();
        }
    </script>

</body>

</html>