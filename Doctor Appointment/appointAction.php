<?php

include '../Database/connection.php';

if (isset($_POST['appoint'])) {

    $docName = $_POST['docName'];
    $doctorID = $_POST['docID'];
    $patientUserName = $_POST['userName'];
    $patientNumber = $_POST['patientNumber'];
    $patientName = $_POST['patientFName'] . " " . $_POST['patientLName'];
    $appointTime = $_POST['radioTime'];
    $appointDate = $_POST['date'];
    $patientAge = $_POST['patientAge'];

   

    $insert_query = "INSERT INTO `appointments`(`doctorName`,`doctorID`,`appointmentTime`,`appointmentDate`,`patientName`,`patientAge`,`patientNumber`,`patientUsername`) 
        VALUES ('$docName','$doctorID','$appointTime','$appointDate','$patientName','$patientAge','$patientNumber','$patientUserName')";

    $dupe_appoint = mysqli_query($conn, "SELECT * FROM `appointments` WHERE doctorName = '$docName' AND appointmentTime = '$appointTime' AND appointmentDate = '$appointDate'");

    if (mysqli_num_rows($dupe_appoint) > 0) { //Duplicate Appointment check from db
        echo "<script>alert('This appointment is already booked. Please select another appointment time..!!')</script>";
        echo "<script>location.href='doctorpage.php?id=$doctorID'</script>";
    } else if (!mysqli_query($conn, $insert_query)) {
        die("Not Inserted");
    } else {
        echo "<script>alert('Appointment Created Successfully')</script>";
        echo "<script>location.href='doctorhome.php'</script>";
    }

}

?>