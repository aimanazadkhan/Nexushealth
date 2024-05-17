<?php
session_start();
if (!isset($_SESSION['userName'])) {
    echo "<script>alert('Please Login First!')</script>";
    echo "<script>location.href='../Homepage/index.php'</script>";
}
include "../Database/connection.php";
include "../Database/sessionUserData.php";


$doctorList = 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor List</title>
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

            <div class="content px-5 py-3" style="width: 100%; height: 100vh;">
                <div>
                    <i class="bi bi-activity dashicon display-6 me-2" onclick="openSidebar()"></i>
                    <span class="display-5 slide-in-from-left">Doctor List</span>
                    <hr class="bg-primary">
                </div>

                <!-- Select Department -->
                <div class="custom-container mb-5">
                    <i class="bi bi-hospital"></i>
                    <div class="btn-group shadow-0">
                        <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle='dropdown'
                            aria-expanded='false'>
                            Select Department
                        </button>
                        <ul class="dropdown-menu" style="max-height: 30rem; overflow-y: auto;">
                            <li><a class="dropdown-item" value="Anesthesiology">Anesthesiology</a></li>
                            <li><a class="dropdown-item" value="Cardiac surgery">Cardiac surgery</a></li>
                            <li><a class="dropdown-item" value="Cardiology">Cardiology</a></li>
                            <li><a class="dropdown-item" value="Hematology">Hematology</a></li>
                            <li><a class="dropdown-item" value="Colorectal Surgery">Colorectal Surgery</a></li>
                            <li><a class="dropdown-item" value="Dental">Dental</a></li>
                            <li><a class="dropdown-item" value="Dermatology">Dermatology</a></li>
                            <li><a class="dropdown-item" value="Diabetes">Diabetes</a></li>
                            <li><a class="dropdown-item" value="ENT">ENT</a></li>
                            <li><a class="dropdown-item" value="Gastroenterology">Gastroenterology</a></li>
                            <li><a class="dropdown-item" value="General & Laparoscopic Surgery">General &
                                    Laparoscopic Surgery</a></li>
                            <li><a class="dropdown-item" value="Neurology">Neurology</a></li>
                            <li><a class="dropdown-item" value="Neurosurgery">Neurosurgery</a></li>
                            <li><a class="dropdown-item" value="Gynecology">Gynecology</a></li>
                            <li><a class="dropdown-item" value="Orthopedics">Orthopedics</a></li>
                            <li><a class="dropdown-item" value="Pediatrics">Pediatrics</a></li>
                            <li><a class="dropdown-item" value="Pediatric Surgery">Pediatric Surgery</a></li>
                            <li><a class="dropdown-item" value="Physical Medicine">Physical Medicine</a></li>
                            <li><a class="dropdown-item" value="Plastic Surgery">Plastic Surgery</a></li>
                            <li><a class="dropdown-item" value="Psychiatry">Psychiatry</a></li>
                            <li><a class="dropdown-item" value="Rheumatology">Rheumatology</a></li>
                            <li><a class="dropdown-item" value="Medicine">Medicine</a></li>
                            <li><a class="dropdown-item" value="Urology">Urology</a></li>
                        </ul>
                    </div>
                </div>

                <div class="d-flex flex-wrap doctor-list-container" style="height: 80vh; overflow-y: auto;">
                    <!-- Doctor List -->
                    <?php

                    if (isset($_POST['selectedDepartment'])) {
                        $selectedDepartment = $_POST['selectedDepartment'];
                        $doctordata = mysqli_query($conn, "SELECT * FROM `doctorlist` WHERE `department` = '$selectedDepartment'");
                    } else if (isset($_GET['doctor'])) {
                        $selectedDepartment = $_GET['doctor'];
                        $doctordata = mysqli_query($conn, "SELECT * FROM `doctorlist` WHERE `department` = '$selectedDepartment'");
                    } else {
                        // If no department is selected, retrieve all doctors
                        $doctordata = mysqli_query($conn, "SELECT * FROM `doctorlist`");
                    }

                    while ($row = mysqli_fetch_array($doctordata)) {
                        echo "
                            <div class='me-5'>
                                <a href='doctorpage.php?id= " . $row['id'] . "' style='text-decoration: none;'>
                                    <div class='card mb-3 rounded-5' style='width: 30rem;'>
                                        <div class='row g-0' style='height: 150px; overflow: hidden;'>
                                            <div class='col-md-4'>
                                                <img src='" . $row['doctorPhoto'] . "' class='img-fluid rounded-5' alt='...'
                                                style='object-fit: cover; max-height: 100%;'>
                                            </div>
                                            <div class='col-md-8'>
                                                <div class='card-body'>
                                                    <h5 class='card-title text-primary'>" . $row['doctorName'] . "</h5>
                                                    <p class='card-text fw-semibold'>" . $row['department'] . "</p>
                                                    <p class='card-text fw-medium' style='font-size: 0.8rem;'>" . $row['qualification'] . "</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".dropdown-item").click(function (e) {
                e.preventDefault();

                var selectedDepartment = $(this).attr('value');
                $(".btn.dropdown-toggle").text($(this).text());

                // Update the doctor list based on the selected department using AJAX
                sendAjaxRequest(selectedDepartment);

                function sendAjaxRequest(selectedDepartment) {
                    // console.log('Sending AJAX request...');
                    $.ajax({
                        type: 'POST',
                        url: 'doctorList.php',
                        data: { selectedDepartment: selectedDepartment },
                        success: function (response) {
                            // Parse the response as HTML
                            var parsedHtml = $.parseHTML(response);
                            // Find the doctor-list-container in the parsed HTML
                            var doctorListContainer = $(parsedHtml).find('.doctor-list-container');

                            // Update only the doctor-list-container with the new content
                            $('.doctor-list-container').html(doctorListContainer.html());
                        },
                        error: function (error) {
                            console.error('Error:', error);
                        }
                    });
                }
            });
        });

    </script>
</body>

</html>