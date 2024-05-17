<?php
session_start();
if (!isset($_SESSION['userName'])) {
    echo "<script>alert('Please Login First!')</script>";
    echo "<script>location.href='../Homepage/index.php'</script>";
}
include "../Database/connection.php";
include "../Database/sessionUserData.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipt</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
        integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">

    <link rel="stylesheet" href="styles.css">
    <style>
        
        .dashicon {
            color: #0d6efd;
        }

        body {
            background-color: #f2f5fa;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <header class="p-3 position-relative">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-between justify-content-lg-start">

                    <div class="">
                        <a href="../Med Corner/medhome.php">
                            <img src="../logo/reglogo.png" alt="logo1" style="width: 250px;">
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <div class="px-5 py-3" style="width: 100%;">
            <div>


                <span class="display-5 ms-5 px-3">Recipts</span>
                <i class="bi bi-receipt dashicon display-6 me-2"></i>
                <hr class="bg-primary">
            </div>

            <div class="container mt-5">
                <table id="appointTable" class="table align-middle mb-0 bg-white">
                    <thead class="bg-light">
                        <tr>
                            <th>Order id</th>
                            <th>Order item</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $buyerUsername = $_SESSION['userName'];
                        $receiptdata = mysqli_query($conn, "SELECT * FROM `receipt` WHERE `orderBuyer` = '$buyerUsername'");

                        while ($row2 = mysqli_fetch_array($receiptdata)) {
                            echo "
                            <tr>
                                 <td>
                                    <div class='d-flex align-items-center'>
                                <div>
                                    <p class='fw-medium mb-1'>" . $row2['orderID'] . " </p>
                                  
                                </div>
                            </div>
                        </td>
                        <td>
                        <p class='text-muted mb-0'>" . $row2['items'] . " </p>
                          
                        </td>
                    </tr> ";
                        }

                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>

</body>

</html>