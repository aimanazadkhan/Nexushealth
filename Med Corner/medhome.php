<?php
session_start();
if (!isset($_SESSION['userName'])) {
    echo "<script>alert('Please Login First!')</script>";
    echo "<script>location.href='../Homepage/index.php'</script>";
}
include "../Database/connection.php";
include "../Database/sessionUserData.php";

$meddata = mysqli_query($conn, "SELECT * FROM `medcorner`");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Med corner</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
        integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <!-- Fontawesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Lemon&family=Oswald:wght@500&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <style>
        .dashicon {
            color: #0d6efd;
        }

        .bigger-currency {
            font-size: 1.7rem;
            /* Adjust the font size as needed */
        }

        body {
            background-color: #f2f5fa;
            font-family: 'Oswald', sans-serif;
        }

        .category-box {
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .category-box:hover {
            background-color: #3498db;
            cursor: pointer;
        }

        .sidebar1 {
            width: 500px;
            /* Adjust the width as needed */
            height: 100%;
            position: fixed;
            top: 0;
            right: -500px;
            /* Adjust the initial position as needed */
            background-color: #f9f9f9;
            padding: 20px;
            transition: right 0.3s ease;
            /* Adjust the transition property as needed */
            z-index: 10;
        }

        .show-sidebar1 {
            right: 0;
        }

        #cartContainer {
            position: relative;
            /* To position the count badge relative to the container */
        }

        #cartCount {
            position: absolute;
            /* To position the count badge absolute to the container */
            top: 0px;
            /* Adjust the top position as needed */
            right: 0px;
            /* Adjust the right position as needed */
        }

        #buyNowButton {
            display: block;
            margin: 0 auto;

        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            /* Center the modal vertically and horizontally */
            padding: 20px;
            border: 1px solid #888;
            width: 20%;
            /* Adjust the width of the modal as needed */
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.75);
            /* Add shadow effect */
        }

        /* Close button styles */
        #confirmYes,
        #confirmNo {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-right: 10px;
            cursor: pointer;
            border-radius: 5px;
        }

        /* Style for hovering over buttons */
        #confirmYes:hover,
        #confirmNo:hover {
            background-color: #0056b3;
        }

        
    </style>

</head>

<body>
    <div class="container-fluid">
        <div class="d-flex flex-row">
        
            <?php include 'sidebar.php'; ?>

            <!-- Dashboard Section -->
            <div class="content px-5 py-3" style="width: 100%;">
                <div>

                    <div class="d-flex justify-content-between">
                        <div>
                            <i class="bi bi-capsule-pill dashicon display-6 me-2 open-btn"  onclick="openSidebar()"></i>
                            <a href="medhome.php" style="text-decoration: none; color:black;"> <span
                                    class="display-5 slide-in-from-left">Medicine Corner</span></a>
                        </div>

                        <div id="cartContainer" class="d-flex align-items-center">
                            <a href="receipt.php"><i title="order List" class="fa-solid fa-receipt text-dark"></i></a>
                            <button id="cartButton" class="btn"><i class="fa-solid fa-cart-shopping ms-2"></i></button>
                            <span id="cartCount" class="badge bg-danger">0</span>

                        </div>

                        <!-- sidebar Design -->
                        <div id="sidebar1" class="sidebar1">
                            <p class="d-flex justify-content-center">Your Order</p>
                            <hr>
                            <table id="cartItemsTable" class="table">
                                <thead>
                                    <tr>
                                        <th>Medicine Name</th>
                                        <th>Quantity</th>
                                        <th>Action</th>
                                        <th>Price</th>
                                        <th>Total Price</th>

                                    </tr>
                                </thead>
                                <tbody></tbody>
                                <tfoot>

                                </tfoot>
                                <tbody id="cartItemsTableBody"></tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3" class="text-end"><strong>Sub Total:</strong></td>
                                        <td id="totalPriceColumn">৳0</td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>

                            <a href="../payment/checkoutpage.php"><button id="buyNowButton"
                                    class="btn btn-primary btn-block">Buy Now</button></a>
                        </div>

                    </div>

                    <hr class="bg-primary">
                </div>

                <!-- Modal POPUP -->
                <div id="confirmationModal" class="modal">
                    <div class="modal-content">
                        <p>Are you sure you want to add this item to your cart?</p>
                        <div class="d-flex justify-content-center">
                            <button id="confirmYes">Yes</button>
                            <button id="confirmNo">No</button>
                        </div>
                    </div>
                </div>

                <!-- Card Section -->
                <div class="row" style="height: 90vh; overflow-y: auto;">
                    <?php
                    if (isset($_POST['selectedcategory'])) {
                        $selectedcategory = $_POST['selectedcategory'];
                        $meddata = mysqli_query($conn, "SELECT * FROM `medcorner` WHERE `medcategory` = '$selectedcategory'");
                    } else {
                        $meddata = mysqli_query($conn, "SELECT * FROM `medcorner`");
                    }

                    while ($row = mysqli_fetch_array($meddata)) {
                        echo "
                            <div class='col-md-3 mb-4'>
                                <div class='card rounded custom-card' style='height: 400px;'> <!-- Set a fixed height -->
                                    <img src='" . $row['medpic'] . "' class='img-fluid' alt='...' style='object-fit: cover; height: 60%;'> <!-- Set height for image -->
                                    <div class='card-body'>
                                        <h5 class='card-text fw-bold'>" . $row['medname'] . "</h5>
                                        <p class='card-title text-primary'>" . $row['medgroup'] . "</p>
                                        <p class='card-title text-success'>" . $row['medcompany'] . "</p>
                                        <div class='d-flex justify-content-between'>
                                            <p class='card-text fw-semibold bigger-currency'>" . '৳' . $row['medprice'] . "</p>
                                            <button class='btn addToCart' data-medname= " . json_encode($row['medname']) . " data-medprice= " . $row['medprice'] . ">
                                                <i class='fa-solid fa-cart-plus fa-fw'></i>
                                            </button>

                                        </div>
                                        
                                    </div>
                                </div>
                            </div>";
                    }
                    ?>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>

    <script>

        document.addEventListener('DOMContentLoaded', function () {
            const addToCartButtons = document.querySelectorAll('.addToCart');
            const modal = document.getElementById('confirmationModal');
            const confirmYes = document.getElementById('confirmYes');
            const confirmNo = document.getElementById('confirmNo');
            const sidebar = document.getElementById('sidebar1');
            const cartButton = document.getElementById('cartButton');
            let cartCount = parseInt(sessionStorage.getItem('cartCount')) || 0;
            let cartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];

            // Update the sidebar when the page loads
            updateSidebar();

            cartButton.addEventListener('click', function () {
                sidebar.classList.toggle('show-sidebar1');
            });

            addToCartButtons.forEach(button => {
                button.addEventListener('click', function () {
                    modal.style.display = 'block';


                    const medName = button.getAttribute('data-medname'); // Get the value of data-medname attribute
                    const medPrice = parseFloat(button.getAttribute('data-medprice'));
                    modal.setAttribute('data-medname', medName);
                    modal.setAttribute('data-medprice', medPrice);
                });
            });

            confirmYes.addEventListener('click', function () {
                const medName = modal.getAttribute('data-medname');
                const medPrice = parseFloat(modal.getAttribute('data-medprice'));
                const existingItemIndex = cartItems.findIndex(item => item.medName === medName);
                if (existingItemIndex !== -1) {
                    cartItems[existingItemIndex].quantity++;
                } else {
                    cartItems.push({
                        medName,
                        medPrice,
                        quantity: 1
                    });
                }

                cartCount++;
                sessionStorage.setItem('cartCount', cartCount);
                sessionStorage.setItem('cartItems', JSON.stringify(cartItems));
                modal.style.display = 'none';
                updateSidebar();

            });

            confirmNo.addEventListener('click', function () {
                modal.style.display = 'none';
            });

            // Prevent closing the sidebar when interacting with the cart content
            sidebar.addEventListener('click', function (event) {
                event.stopPropagation();
            });

            window.addEventListener('click', function (event) {
                if (event.target === modal) {
                    modal.style.display = 'none';
                } else if (!sidebar.contains(event.target) && !cartButton.contains(event.target)) {
                    sidebar.classList.remove('show-sidebar1');
                }
            });

            function updateSidebar() {
                const cartCountSpan = document.getElementById('cartCount');
                cartCountSpan.innerText = cartItems.reduce((acc, item) => acc + item.quantity, 0);
                const cartItemsTableBody = document.getElementById('cartItemsTableBody');
                cartItemsTableBody.innerHTML = '';

                cartItems.forEach(item => {
                    const row = cartItemsTableBody.insertRow();
                    row.insertCell(0).textContent = item.medName;

                    const quantityCell = row.insertCell(1);
                    quantityCell.textContent = item.quantity;

                    const buttonCell = row.insertCell(2); // Create a cell for action

                    const decreaseButton = createQuantityButton('-', () => decreaseQuantity(item));
                    buttonCell.appendChild(decreaseButton);

                    const increaseButton = createQuantityButton('+', () => increaseQuantity(item));
                    buttonCell.appendChild(increaseButton);

                    row.insertCell(3).textContent = `৳${item.medPrice}`;
                    const totalPrice = item.medPrice * item.quantity;
                    row.insertCell(4).textContent = `৳${totalPrice}`;
                });

                const total = cartItems.reduce((acc, item) => acc + item.medPrice * item.quantity, 0);
                document.getElementById('totalPriceColumn').textContent = `৳${total}`;
            }

            function createQuantityButton(text, clickHandler) {
                const button = document.createElement('button');
                button.textContent = text;
                button.classList.add('btn', 'btn-outline-secondary', 'btn-sm');
                button.addEventListener('click', clickHandler);
                return button;
            }

            function increaseQuantity(item) {
                item.quantity++;
                sessionStorage.setItem('cartItems', JSON.stringify(cartItems));
                updateSidebar();
            }

            function decreaseQuantity(item) {
                if (item.quantity > 1) {
                    item.quantity--;
                } else {
                    const index = cartItems.indexOf(item);
                    if (index !== -1) {
                        cartItems.splice(index, 1);
                    }
                }
                sessionStorage.setItem('cartItems', JSON.stringify(cartItems));
                updateSidebar();
            }
        });

    </script>

</body>

</html>