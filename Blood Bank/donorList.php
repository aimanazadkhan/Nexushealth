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
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- DataTable -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" />
    <script defer src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script defer src="temp.js"></script>
</head>

<body>
    <?php include 'header.php' ?>

    <!-- Blood Group Category -->
    <div class="container">
        <form id="filterForm" method="post">
            <section class="pt-5 pb-4 d-flex flex-wrap gap-3">
                <button type="submit" class="btn btn-outline-danger rounded-pill filter-button" name="bloodGroup"
                    value="A+">A+</button>
                <button type="submit" class="btn btn-outline-danger rounded-pill filter-button" name="bloodGroup"
                    value="A-">A-</button>
                <button type="submit" class="btn btn-outline-danger rounded-pill filter-button" name="bloodGroup"
                    value="B+">B+</button>
                <button type="submit" class="btn btn-outline-danger rounded-pill filter-button" name="bloodGroup"
                    value="B-">B-</button>
                <button type="submit" class="btn btn-outline-danger rounded-pill filter-button" name="bloodGroup"
                    value="AB+">AB+</button>
                <button type="submit" class="btn btn-outline-danger rounded-pill filter-button" name="bloodGroup"
                    value="AB-">AB-</button>
                <button type="submit" class="btn btn-outline-danger rounded-pill filter-button" name="bloodGroup"
                    value="O+">O+</button>
                <button type="submit" class="btn btn-outline-danger rounded-pill filter-button" name="bloodGroup"
                    value="O-">O-</button>
            </section>
        </form>
    </div>



    <div class="container">
        <table id="donorTable" class="table align-middle mb-0 bg-white">
            <thead class="bg-light">
                <tr>
                    <th>Name</th>
                    <th>Blood Group</th>
                    <th>Address</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_POST['bloodGroup'])) {
                    $bloodGroup = $_POST['bloodGroup'];
                    $donordata = mysqli_query($conn, "SELECT * FROM `donor_list` WHERE `BloodGroup` = '$bloodGroup' ORDER By Name");
                } else {
                    $donordata = mysqli_query($conn, "SELECT * FROM `donor_list` ORDER By Name");
                }

                while ($row = mysqli_fetch_array($donordata)) {
                    echo "
                    <tr>
                        <td>
                            <div class='d-flex align-items-center'>
                                <div>
                                    <p class='fw-bold mb-1'>" . $row['Name'] . " </p>
                                    <p class='text-muted mb-0'>" . $row['Phone number'] . " </p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class='fw-normal badge text-bg-danger rounded-pill d-inline mb-1'>" . $row['BloodGroup'] . " </p>
                        </td>
                        <td>" . $row['Address'] . "</td>
                        <td>
                            <span class='badge text-bg-" . ($row['status'] == 'Available' ? "success" : "danger") . " rounded-pill d-inline'>" . $row['status'] . "</span>
                        </td>

                    </tr> ";
                }

                ?>
            </tbody>
        </table>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>