<?php

$loggedInUser = mysqli_query($conn, "SELECT * FROM `register` WHERE userName = '{$_SESSION['userName']}' OR email = '{$_SESSION['userName']}'");
$row = mysqli_fetch_assoc($loggedInUser);

?>