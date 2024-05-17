<?php
session_start();
if (!isset($_SESSION['userName'])) {
    echo "<script>alert('Please Login First!')</script>";
    echo "<script>location.href='../Homepage/index.php'</script>";
}
include "../Database/connection.php";
include "../Database/sessionUserData.php";

$appointmentlist=1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment List</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
        integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">

    <link rel="stylesheet" href="styles.css">
    <style>
        .custom-container {
            outline: 1px solid;
            /* Add outline to the entire div */
            padding: 10px;
            /* Add some padding for better appearance */
            display: inline-block;
            /* Keep the div inline with its contents */
        }

        .custom-container i {
            font-size: 1.5rem;
            vertical-align: middle;
            /* Align the icon vertically in the middle */
            margin-right: 5px;
            /* Add some space between the icon and the button */
        }

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
        <div class="d-flex flex-row">
            <?php include 'sidebar.php'; ?>

            <div class="content px-5 py-3" style="width: 100%;">
                <div>
                    <i class="bi bi-activity dashicon display-6 me-2" onclick="openSidebar()"></i>
                    <span class="display-5 slide-in-from-left">Appointments</span>
                    <hr class="bg-primary">
                </div>

                <div class="container mt-5">
                    <table id="appointTable" class="table align-middle mb-0 bg-white">
                        <thead class="bg-light">
                            <tr>
                                <th>Doctor Name</th>
                                <th>Appointment date</th>
                                <th>Appointmet Time</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php


                            $patientUsername = $_SESSION['userName'];
                            $appointdata = mysqli_query($conn, "SELECT * FROM `appointments` WHERE `patientUsername` = '$patientUsername'");


                            while ($row2 = mysqli_fetch_array($appointdata)) {
                                echo "
                    <tr>
                        <td>
                            <div class='d-flex align-items-center'>
                                <div>
                                    <p class='fw-medium mb-1'>" . $row2['doctorName'] . " </p>
                                  
                                </div>
                            </div>
                        </td>
                        <td>
                        <p class='text-muted mb-0'>" . $row2['appointmentDate'] . " </p>
                          
                        </td>

                       
                        <td>
                        
                            <p class='fw-normal mb-1'>" . $row2['appointmentTime'] . " </p>
                        </td>
                       

                    </tr> ";
                            }

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>

</body>

</html>