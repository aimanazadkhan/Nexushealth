<?php
session_start();
include "../Database/connection.php";
include "../Database/sessionUserData.php";

if (isset($_POST['updateProfile'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    // Repeat similar lines to get other form fields

    // Prepare the SQL statement
    $update_profile = "UPDATE `register` SET `firstName`='$firstName',`lastName`='$lastName',`pNumber`='$phone',
        `dob`='$dob',`weight`='$weight',`height`='$height',`address`='$address',`city`='$city' WHERE userName='{$row['userName']}'";
    // Execute the SQL statement
    if (mysqli_query($conn, $update_profile)) {
        // Profile updated successfully
        header("Location: profile.php"); // Redirect back to profile page
        exit();
    } else {
        // Error occurred while updating profile
        echo "Error: " . mysqli_error($conn);
    }
}

if (isset($_FILES['photo'])) {
    $tempLoc = $_FILES['photo']['tmp_name'];
    $imgName = $_FILES['photo']['name'];
    $imageDestination = "../ProfilePictures/" . $imgName;

    move_uploaded_file($tempLoc, $imageDestination);

    $query = mysqli_query($conn, "UPDATE `register` SET `profilepic`='$imageDestination' WHERE userName = '{$row['userName']}'");
    header("Location: profile.php");
}

if (isset($_POST['notificationSwitch'])) {
    if ($_POST['notificationSwitch'] == 'on') {
    

    } else {
        // Off->On

        $query0 = mysqli_query($conn, "SELECT * FROM donor_list WHERE (Name = '{$_SESSION['fullName']}' AND `Phone number`= '{$row['pNumber']}' AND status='Unavailable')");
        $query1 = mysqli_query($conn, "SELECT * FROM donor_list WHERE (Name = '{$_SESSION['fullName']}' AND `Phone number`= '{$row['pNumber']}')");
        if (mysqli_num_rows($query0) > 0) {
            $update = mysqli_query($conn, "UPDATE donor_list SET status='Available' WHERE Name = '{$_SESSION['fullName']}'");
            header("Location: profile.php");
        } else if (!mysqli_num_rows($query1) > 0) {
            $query2 = mysqli_query($conn, "INSERT INTO `donor_list`(`Name`, `BloodGroup`, `Phone number`, `Address`, `status`) 
            VALUES ('{$_SESSION['fullName']}','{$row['bloodGroup']}','{$row['pNumber']}','{$row['address']}','Available')");
            header("Location: profile.php");
        } else {
            
        }
    }
} else {
    $update = mysqli_query($conn, "UPDATE donor_list SET status='Unavailable' WHERE Name = '{$_SESSION['fullName']}'");
    header("Location: profile.php");
}


?>