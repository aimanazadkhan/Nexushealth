<?php

session_start();
include "../Database/connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
        integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Oswald:wght@500&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="styles.css">
    <style>
        .carousel-image {
            object-fit: contain;
            height: 500px;
            padding: 2% 5%;
        }

        .transparent-input {
            background-color: transparent;
            outline: none;
        }

        .font {
            font-family: 'Dancing Script', cursive;
            font-family: 'Oswald', sans-serif;
        }

        .card {
            opacity: .8;
        }

        .img1 {
            transition: transform .2s;

        }

        .img1:hover {
            transform: scale(1.1);
        }
    </style>


</head>

<body>
    <!-- Heroes Section -->
    <section>
        <div id="heroes">
            <header class="p-3">
                <div class="container">
                    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                        <a href="index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-decoration-none">
                            <img src="../logo/reglogo.png" alt="logo1" style="width: 250px;">
                        </a>

                        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                            <li><a href="#features" class="nav-link px-2 text-dark">Features</a></li>
                            <li><a href="about.php" class="nav-link px-2 text-dark">About</a></li>
                        </ul>



                        <!-- Login-Signup visible when there is no session. -->
                        <?php
                        if (!isset($_SESSION['userName'])) {
                            echo "<div class='text-end'>
                            <a href='../Authentication/login.php'><button type='button'
                                    class='btn me-2' style='background-color: #2fbfbf;'>Login</button></a>
                            <a href='../Authentication/register.php'><button type='button' class='btn btn-warning'>Sign-up</button></a>
                        </div>";
                            // Profile Section appear when there is session.
                        } else {
                            include "../Database/sessionUserData.php";
                            echo "
                                <div class='dropdown text-end'>
                                    <a href='#' class='d-block link-body-emphasis text-decoration-none dropdown-toggle'
                                        data-bs-toggle='dropdown' aria-expanded='false'>
                                        <img src='" . $row['profilepic'] . "' alt='' width='32' height='32' class='rounded-circle'>
                                    </a>
                                    <ul class='dropdown-menu text-small'>
                                        <li><a class='dropdown-item' href='profile.php'>Profile</a></li>
                                        <li><hr class='dropdown-divider'></li>";

                            if (isset($_SESSION['userName']) && $_SESSION['userName'] == 'admin') {
                                echo "<li><a class='dropdown-item' href='../AdminPanel'>Admin Panel</a></li>";
                            }

                            echo "
                                        <li><a class='dropdown-item' href='../Authentication/logout.php'>Sign out</a></li>
                                    </ul>
                                </div>
                            ";
                        }
                        ?>
                    </div>
                </div>
            </header>

            <!-- Welcome Section -->
            <div class="container my-5">
                <div class="row pb-0 pe-lg-0 pt-lg-5 align-items-center">
                    <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
                        <h1 class="font slide-in-from-left">Welcome to NexusHealth, your one-stop destination for
                            comprehensive healthcare services</h1>

                        <p class="lead slide-in-from-bottom">Discover a world of convenience at your fingertips, where
                            you can seamlessly
                            book doctor appointments, access a well-stocked pharmacy, and find vital support from our
                            blood bank. Our user-friendly platform is designed to simplify your healthcare journey,
                            ensuring prompt and reliable care. Trust in our commitment to providing top-notch medical
                            services, expert guidance, and a seamless user experience.</p>
                    </div>
                    <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden">
                        <img class="rounded-lg-3" src="../logo/17715715-removebg.png" alt="" width="400">
                    </div>
                </div>
            </div>
    </section>
    <hr>

    <!-- Feature Section v2 -->
    <section id="features">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Column for Horizontal Cards -->
            <div class="col-12 col-lg-6 mb-3 horizontal-column">
                <!-- Horizontal Cards -->
                <div class="mb-3">
                    <a href="../Doctor Appointment/doctorhome.php" class="text-decoration-none">
                        <div class="card horizontal-card mb-3 rounded-5" style="width: 100%;">
                            <div class="row g-0">
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="cardh card-title text-primary">Doctor Appointment</h5>
                                        <p class="cardp card-text text-dark">Offer dedicated time with medical professionals for comprehensive health assessments, diagnosis, and treatment recommendations.</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <img src="../logo/3.jpg" class="img-fluid rounded-start" alt="Doctor Appointment">
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="mb-3">
                    <a href="../Blood Bank/bloodhome.php" class="text-decoration-none">
                        <div class="card horizontal-card mb-3 rounded-5" style="width: 100%;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="../logo/4.jpg" class="img-fluid rounded-start" alt="Blood Bank">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="cardh bloodh card-title text-danger">Blood Bank</h5>
                                        <p class="cardp bloodp card-text">Collect, store, and distribute donated blood to hospitals, ensuring a vital supply for surgeries, trauma care, and medical conditions.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Column for Vertical Cards -->
            <div class="col-12 col-lg-6 mb-3">
                <div class="row">
                    <div class="col-12 col-lg-6 mb-3">
                        <a href="../Med Corner/medhome.php" class="text-decoration-none">
                            <div class="card vertical-card dynamic-height rounded-5" style="width: 100%;">
                                <img src="../logo/5.jpg" class="card-img-top" alt="Med Corner">
                                <div class="card-body">
                                    <h5 class="cardh card-title text-success">Med Corner</h5>
                                    <p class="cardp card-text">Offer the convenience of ordering prescription and medications from the comfort of one's home</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-lg-6 mb-3">
                        <a href="../Self Diagonosis/SelfDiagonosis.php" class="text-decoration-none">
                            <div class="card vertical-card dynamic-height rounded-5" style="width: 100%;">
                                <img src="../logo/6.jpg" class="card-img-top" alt="Self Diagnosis">
                                <div class="card-body">
                                    <h5 class="cardh card-title text-primary">Self-Diagnosis</h5>
                                    <p class="cardp card-text">Provides individuals with digital tools to assess their symptoms and potential health conditions.</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>






   
    <!-- About us section -->
    <section id="about">
        <div class="container my-5">

            <div class="row pt-lg-3 align-items-center rounded-3 border shadow-lg">

                <h3>Currently Widespread Health Condition</h3>
                <div class="col-lg-6 ">
                    <h4>Dengue Symptoms:</h4>
                    <ul class="lead mt-4">
                        <li>High fever, which might be continuous or intermittent.
                        </li>
                        <li>Severe headaches.
                        </li>
                        <li>Pain behind the eyes </li>
                        <li>Nausea and vomiting. </li>
                        <li>Fatigue and tiredness. </li>
                        <li>Muscle, bone, and joint pain.</li>
                        <li>Skin rash, which might spread to most parts of the body. </li>
                        <li>Mild bleeding, such as nosebleeds, gum bleeding, or easy bruising.</li>
                    </ul>

                </div>
                <div class="col-lg-4 offset-lg-1 p-0 mb-4">
                    <img class="rounded-lg-3 img-fluid img1" src="../logo/dengue prevention.jpg"
                        alt="dengue prevention">
                </div>
            </div>
        </div>


    </section>
    <hr>
    <!-- Footer Section -->
    <div class="container">
        <footer class="py-3 my-4">
            <div class="row justify-content-center pb-3 mb-3">
                <a href="index.php"><img src="../logo/reglogo.png" alt="" style="width: 250px;"></a>
            </div>
            <p class="text-center text-body-secondary">© 2023 NexusHealth, Inc</p>
        </footer>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Function to adjust the height of vertical cards
    function adjustCardHeights() {
        const horizontalColumn = document.querySelector('.horizontal-column');
        
        if (window.innerWidth >= 992 && horizontalColumn) {  // 992px corresponds to the large screen breakpoint in Bootstrap
            const horizontalColumnHeight = horizontalColumn.offsetHeight;
            
            const verticalCards = document.querySelectorAll('.vertical-card.dynamic-height');
            verticalCards.forEach(card => {
                card.style.height = horizontalColumnHeight + 'px';
            });
        } else {
            // Remove the height set previously on smaller screens
            const verticalCards = document.querySelectorAll('.vertical-card.dynamic-height');
            verticalCards.forEach(card => {
                card.style.height = 'auto';
            });
        }
    }

    // Adjust card heights on page load
    adjustCardHeights();

    // Adjust card heights on window resize
    window.addEventListener('resize', adjustCardHeights);
});

</script>




</html>