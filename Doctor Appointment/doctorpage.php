<?php
session_start();
if (!isset($_SESSION['userName'])) {
    echo "<script>alert('Please Login First!')</script>";
    echo "<script>location.href='../Homepage/index.php'</script>";
}
include "../Database/connection.php";
include "../Database/sessionUserData.php";

$id = $_GET['id'];
$indidoctordata = mysqli_query($conn, "SELECT * FROM `doctorList` WHERE id = '$id'");
$row1 = mysqli_fetch_array($indidoctordata);

unset($_SESSION['doctorHome']);
$_SESSION['doctorList'] = 1;
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

    <link rel="stylesheet" href="styles.css">
    <style>
        .dashicon {
            color: #0d6efd;
        }

        body {
            background-color: #f2f5fa;
        }

        .profile-preview {
            width: 12.5rem;
            height: 16rem;
            /* background-color: grey; */
            background-position: center;
            background-size: cover;
            overflow: hidden;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="d-flex flew-row">
            <?php include 'sidebar.php'; ?>

            <section class="w-100">
                <div class="container mt-5">
                    <div class="d-flex">
                        <div>
                            <div class="profile-preview mt-5">
                                <img src="<?php echo $row1['doctorPhoto'] ?>" class="img-fluid" style="object-fit: fit;"
                                    alt="">
                            </div>
                        </div>
                        <div class="ms-5 ps-5">
                            <div>
                                <h3 class="dark-color mt-5">
                                    <?php echo $row1['doctorName'] ?>
                                </h3>
                                <br>
                                <p>
                                    <?php echo $row1['qualification'] ?>
                                </p>
                                <div class="row mb-0"> <!-- Added mb-0 class to remove bottom margin -->
                                    <div class="col-md-6">
                                        <div class="media">
                                            <label>Department</label>
                                            <p>
                                                <?php echo $row1['department'] ?>
                                            </p>
                                        </div>

                                        <div class="media">
                                            <label>Address</label>
                                            <p>
                                                <?php echo $row1['hospital/chamber'] ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="media">
                                            <label>E-mail</label>
                                            <p>info@email.com</p>
                                        </div>
                                        <div class="media">
                                            <label>Phone</label>
                                            <p>
                                                <?php echo $row1['phoneNumber'] ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <form action="appointAction.php" method="POST">
                        <div class="mt-4 px-4 py-3 rounded" style="background-color: #fff;">
                            <div class="d-flex">
                                <h4>Book Appointment</h4>
                                <div class="col-lg-3 ms-5">
                                    <input type="date" id="appointmentDate" class="form-control" name="date" value=""
                                        onchange="handleDateChange()">
                                </div>
                            </div>

                            <div id="radios" style="display: none;">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="radioTime" value="<?php echo $row1['time1'] ?>"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        <?php echo $row1['time1'] ?>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="radioTime" value="<?php echo $row1['time2'] ?>"
                                        id="flexRadioDefault2">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        <?php echo $row1['time2'] ?>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="radioTime" value="<?php echo $row1['time3'] ?>"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        <?php echo $row1['time3'] ?>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="radioTime" value="<?php echo $row1['time4'] ?>"
                                        id="flexRadioDefault2">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        <?php echo $row1['time4'] ?>
                                    </label>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" name="appoint" class="btn btn-outline-primary">Book Appointment</button>
                                </div>
                            </div>

                            <input type="hidden" name="docName" value="<?php echo $row1['doctorName'] ?>">
                            <input type="hidden" name="docID" value="<?php echo $row1['id'] ?>">
                            <input type="hidden" name="userName" value="<?php echo $row['userName'] ?>">
                            <input type="hidden" name="patientNumber" value="<?php echo $row['pNumber'] ?>">
                            <input type="hidden" name="patientFName" value="<?php echo $row['firstName'] ?>">
                            <input type="hidden" name="patientLName" value="<?php echo $row['lastName'] ?>">
                            <input type="hidden" name="patientAge" value="<?php echo $row['dob'] ?>">
                        </div>
                    </form>

                </div>
            </section>


        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>

    <script>
        function handleDateChange() {
            var selectedDate = document.getElementById('appointmentDate').value;
            var radioContainer = document.getElementById('radios');

            if (selectedDate !== '') {
                var today = new Date();
                today.setHours(0, 0, 0, 0);

                var selected = new Date(selectedDate);
                selected.setHours(0, 0, 0, 0);
                // console.log('1');
                if (selected >= today) {
                    radioContainer.style.display = 'block';
                } else {
                    alert('Please select a date that is today or in the future.');
                    radioContainer.style.display = 'none';
                }
            } else {
                radioContainer.style.display = 'none';
            }

            // Update the value of the input field to the selected date
            document.getElementById('appointmentDate').setAttribute('value', selectedDate);
        }
    </script>
</body>

</html>