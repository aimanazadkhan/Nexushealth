<?php
session_start();
if (!isset($_SESSION['userName'])) {
    echo "<script>alert('Please Login First!')</script>";
    echo "<script>location.href='../Homepage/index.php'</script>";
}
include "../Database/connection.php";
include "../Database/sessionUserData.php";

$doctorHome = 1;

// Total Appointment Query
$totalApp = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM appointments WHERE patientUsername = '{$_SESSION['userName']}'"));

// Upcoming Appointment
$upApp = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM appointments WHERE patientUsername = '{$_SESSION['userName']}' AND appointmentDate >= CURDATE()"));
$upAppNum = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM appointments WHERE patientUsername = '{$_SESSION['userName']}' AND appointmentDate >= CURDATE()"));

// Upcoming Doctor Information
$upcomingAppDoc = null;
if ($upApp !== null) {
    $upcomingAppDocResult = mysqli_query($conn, "SELECT * FROM doctorlist WHERE id = '{$upApp['doctorID']}'");
    if ($upcomingAppDocResult !== false) {
        $upcomingAppDoc = mysqli_fetch_assoc($upcomingAppDocResult);
    }
}

// Closest Appointment
$upcomingAppointment = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM appointments WHERE patientUsername = '{$_SESSION['userName']}' 
                                                                AND appointmentDate >= CURDATE() ORDER BY appointmentDate, appointmentTime LIMIT 1"));

// Top Doctor
if ($totalApp > 0) {
    $topDocQuery = "SELECT doctorID, COUNT(*) AS appointment_count FROM appointments WHERE patientUsername = '{$_SESSION['userName']}' 
                    GROUP BY doctorID ORDER BY appointment_count DESC LIMIT 1";
    $topDocResult = mysqli_query($conn, $topDocQuery);
    $topDoc = mysqli_fetch_assoc($topDocResult);
    if ($topDoc !== null) {
        $topDocInfoResult = mysqli_query($conn, "SELECT * FROM doctorlist WHERE id = '{$topDoc['doctorID']}'");
        if ($topDocInfoResult !== false) {
            $topDocInfo = mysqli_fetch_assoc($topDocInfoResult);
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Appointment</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
        integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <!-- Fontawesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link rel="stylesheet" href="styles.css">
    <style>
        .dashicon {
            color: #0d6efd;
        }

        body {
            background-color: #f2f5fa;
        }

        @media (max-width: 578px) {
            .display-5 {
              
                font-size: 1rem;
               
                
            }
            .date{
                    margin-top: 13px;
                }
        }
    </style>
</head>

<body>
    <div class="container-fluid ms-0">
        <div class="d-flex flex-nowrap ms-0">
            <div class="ms-0">
                <?php include 'sidebar.php'; ?>
            </div>
            <div class="content px-5 py-3" style="width: 100%;">
                <!-- Dashboard Header -->
                <div class="d-flex justify-content-between">
                    <div>
                        <i class="bi bi-capsule-pill dashicon display-6 me-2 open-btn" onclick="openSidebar()"></i>
                        <span class="display-5 slide-in-from-left">Dashboard Overview</span>
                    </div>
                    <div class="display-5 date">
                        <?php
                        $t = time();
                        echo (date("M jS", $t));
                        ?>
                    </div>
                </div>
                <hr>

                <!-- Welcome Card -->
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 ms-3 me-3 mb-3 p-3 rounded" style="background-color: #082c90;">
                            <span class="fs-2 text-light slide-in-from-bottom">Good Morning,
                                <?php echo $row['lastName'] ?></span>
                            <p class="fs-5 my-5 text-light">Appointment Statistics</p>
                            <div class="row">
                                <div class="col-lg-6 card rounded rounded-dark p-2 mb-3"
                                    style="background-color: #082c90;">
                                    <p class="text-light">Total Appointments</p>
                                    <p class="display-4 text-secondary"><?php echo $totalApp ?></p>
                                </div>
                                <div class="col-lg-6 card rounded rounded-dark p-2 mb-3"
                                    style="background-color: #082c90;">
                                    <p class="text-light">Upcoming Appointments</p>
                                    <p class="display-4 text-secondary"><?php echo $upAppNum ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-5 ms-3 me-3 mb-3 p-3  card border rounded">
                            <?php if (isset($upcomingAppointment)) { ?>
                                <span class="fs-2">Closest Appointment</span>
                                <div class="rounded p-3 my-3" style="background-color: #f2f5fa">
                                    <div class="d-flex justify-content-between">
                                        <div class="col-8 mt-4 pt-1">
                                            <h3><?php echo $upcomingAppointment['doctorName'] ?></h3>
                                            <h4><?php echo $upcomingAppDoc['department'] ?></h4>
                                        </div>
                                        <div class="col-4">
                                            <p class="fs-5 mt-3 mb-0"><?php echo $upcomingAppointment['appointmentTime'] ?>
                                            </p>
                                            <p class="fs-5">
                                                <?php echo date("F jS, l", strtotime($upcomingAppointment['appointmentDate'])); ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <p class="fw-bold fs-4 m-0">Address Information</p>
                                <p class="fs-5"><?php echo $upcomingAppDoc['hospital/chamber'] ?></p>
                                <div>
                                    <i class="bi bi-telephone-plus dashicon fs-4 me-2"></i>
                                    <span><?php echo $upcomingAppDoc['phoneNumber'] ?></span>
                                </div>
                            <?php } else { ?>
                                <div class="d-flex justify-content-center mt-5">
                                    <p class="mt-5 pt-3 fs-4">You don't have any upcoming appointments.</p>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>


                <!-- Top Doctor -->
                <!-- Top Doctor -->
                <div class="row justify-content-center ms-3">
                    <?php if ($totalApp == 0) { ?>
                        <div class="col-lg-5 card border rounded ms-3 me-5 mt-4" style="background-color: #fff;">
                            <p class="fw-bold fs-4 d-flex mx-auto mt-2">Appoint a Doctor</p>
                            <hr class="mt-0 pt-0">
                            <div class="text-center mt-3">
                                <p class="fs-5">You need to appoint a doctor first.</p>
                            </div>
                        </div>
                    <?php } else { ?>
                        <!-- Your existing code for displaying top doctor information -->

                        <div class="col-lg-5 ms-3 me-3 mb-3 p-3  card border rounded" style="background-color: #fff;">
                            <p class="fw-bold fs-4 d-flex mx-auto mt-2">Top Doctor</p>
                            <hr class="mt-0 pt-0">

                            <div class="d-flex justify-content-center">
                                <img src="<?php echo $topDocInfo['doctorPhoto'] ?>" alt="" width="150" height="200"
                                    class="img-fluid" style="">
                            </div>
                            <div class="mt-5 pt-1">
                                <div class="d-flex justify-content-center">
                                    <i class="fa-solid fa-user-doctor mt-1 me-2"></i>
                                    <p class="fw-bold fs-5 mb-2">
                                        <?php echo $topDocInfo['doctorName'] ?>
                                    </p>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <i class="fa-solid fa-stethoscope mt-1 me-2"></i>
                                    <p class="fs-6">
                                        <?php echo $topDocInfo['department'] ?>
                                    </p>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <i class="fa-solid fa-hospital mt-1 me-2"></i>
                                    <p class="fs-6">
                                        <?php echo $topDocInfo['hospital/chamber'] ?>
                                    </p>
                                </div>
                            </div>

                            <div class="ms-4 mt-4 mb-5">
                                <span class="fs-3">You Have Appointed This Doctor: </span>
                                <span class="fs-3">
                                    <?php echo $topDoc['appointment_count']; ?>
                                </span>
                                <span class="fs-3">Times</span>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
            crossorigin="anonymous"></script>
</body>

</html>