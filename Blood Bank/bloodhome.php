<?php
session_start();
if (!isset($_SESSION['userName'])) {
    echo "<script>alert('You have to Login First!!!1')</script>";
    echo "<script>location.href='../Authentication/login.php'</script>";
}
include '../Database/connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Bank</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <style>
        .container1 {
            background: #fafafa;
        }

        h3 {
            color: #e74c3c;
            margin-left: 30px;
        }

        h2 {
            margin-left: 30px;
        }

        img {
            transition: transform .2s;
        }

        img:hover {
            transform: scale(1.1);
        }

        .benefits-list {
            list-style-type: none;
            padding: 0;
        }

        .benefits-list>li::before {
            content: "✔️";
            color: #2ecc71;
            margin-right: 5px;
        }

        .justify {
            text-align: justify;
        }

        .bg-image-container {
            background-image: url('../logo/Blood-Donation-1.jpg');
            background-size: 100% auto;
            height: 100vh;
            background-repeat: no-repeat;
        }

        @media (max-width: 1400px) {

            /* Adjust height for smaller screens */
            .bg-image-container {
                height: 30vh;
            }
        }

        .card1,.card2{

            margin-left:auto;
            margin-right:auto;
        }
    </style>
</head>

<body>

    <!-- Heroes Section -->
    <div class="bg-image-container img-fluid">
        <?php include 'header.php' ?>
    </div>

    <!-- Features Section -->
    <section id="features">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6 col-sm-6 mb-4 mt-2 ">
                    <a class="card1 d-flex flex-column justify-content-center align-items-center" href="donorList.php">
                        <img class="rounded-circle mb-2" src="../logo/find-a-donor.jpg" alt=""
                            style="width: 100px; height: 100px;">
                        <p class="small">Find a donor.</p>
                        <div class="go-corner">
                            <div class="go-arrow">
                                →
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 mb-4 mt-2">
                    <a class="card2 d-flex flex-column justify-content-center align-items-center" href="newdonor.php">
                        <img class="rounded-circle mb-2" src="../logo/become-a-donor.png" alt=""
                            style="width: 100px; height: 100px;">
                        <p class="small">Become a donor.</p>
                        <div class="go-corner">
                            <div class="go-arrow">
                                →
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>



    <!-- Benefits Section -->
    <div class="container1 py-5 px-5">
        <div class="row pt-lg-5 d-flex flex-lg-row flex-column align-items-center">
            <div class="col-lg-5 col-md-6 p-0 mb-4">
                <img class="rounded-lg-3 img-fluid" src="../logo/Benefitsdonation.jpg" alt="Benefits of donation">
            </div>
            <div class="col-lg-6 col-md-6">
                <h3>Key benefits of blood donation</h3>
                <ul class="benefits-list lead mt-4 justify">
                    <li>Saves Lives: Each blood donation can help up to three people who need blood or blood products.
                    </li>
                    <li>Health Checkup: Before donating blood, donors receive a mini-physical and health screening.</li>
                    <li>Promotes Cardiovascular Health: Regular blood donations may help keep iron levels in check and
                        prevent the buildup of iron in the blood.</li>
                    <li>Burns Calories: Although it's not a replacement for exercise, donating blood can burn
                        approximately 650 calories per donation according to some estimates.</li>
                    <li>Psychological Benefit: Many people report feeling a sense of satisfaction after donating blood,
                        knowing they've made a significant difference in someone's life.</li>
                    <li>Rare Blood Identification: During blood testing, if your blood is found to be a rare type, you
                        could be instrumental in saving lives of those who require that particular type.</li>
                    <li>Faster Regeneration of Blood Cells: When you donate blood, the body works to replenish the blood
                        loss which in turn stimulates the production of new blood cells.</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Post-Donation Section -->
    <div class="container1 py-5 px-5">
        <div class="row pt-lg-5 d-flex flex-lg-row flex-column align-items-center">
            <div class="col-lg-6 col-md-6">
                <h3>POST-DONATION</h3>
                <h2>Please call our Hotline immediately if you:</h2>
                <ul class="benefits-list lead mt-4 justify">
                    <li>Feel that your blood should not be given to a patient;</li>
                    <li>Are not sure that your blood is safe;</li>
                    <li>Develop a fever within 24 hours after donating;</li>
                    <li>Have any illness within two (2) weeks of your donation;</li>
                    <li>Are diagnosed by a physician as having West Nile, dengue, chikungunya, Zika, or Ebola virus
                        Infection.</li>
                </ul>
            </div>
            <div class="col-lg-5 col-md-6 p-0 mb-4">
                <img class="rounded-lg-3 img-fluid" src="../logo/after donation.jpg" alt="Benefits of donation">
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+K0NCPkk+7vMRY4g6BVCJPSL5d3c3"
        crossorigin="anonymous"></script>

</body>

</html>
