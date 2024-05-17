<?php
session_start();

include "../Database/connection.php";
include "../Database/sessionUserData.php";


if (isset($_GET['cod'])) {
    // Get the cart items from session storage
    $cartItems = $_GET['cod'];

    // Perform database insert operation
    $sql = "INSERT INTO `receipt`(`orderBuyer`, `items`) VALUES ('{$_SESSION['userName']}',' $cartItems')";
    // Execute the SQL query
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Record inserted successfully');</script>";
        echo "<script>sessionStorage.clear();</script>";
        echo "<script>location.href='../Med Corner/receipt.php'</script>";
    } else {
        echo "<script>alert('Error inserting record: " . $conn->error . "');</script>";
    }
    // Clear sessionStorage
    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Fontawesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        /* Custom Styles */
        body {
            font-family: Arial, sans-serif;
        }

        .page-section {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            height: 14rem;
        }

        .section-head {
            border-bottom: 1px solid #dee2e6;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .section-head h2 {
            font-size: 1.5rem;
            color: #333;
        }

        .form-group label {
            font-weight: bold;
            color: #555;
        }

        .checkout-data td {
            padding: 8px;
        }

        .checkout-data .name a {
            color: #007bff;
            text-decoration: none;
        }

        .checkout-data .price span {
            font-weight: bold;
        }

        .checkout-data .total td {
            font-weight: bold;
        }

        @media (max-width: 768px) {
            .page-section {
                padding: 10px;
            }

            .checkout-data td {
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="p-4">
            <h1 class="fs-3 mb-4">Checkout</h1>
            <div class="d-flex">
                <!-- Billing Information -->
                <div class="col-md-4 col-sm-12">
                    <div class="page-section" style="height: auto;">
                        <div class="section-head">
                            <h2>Customer Information</h2>
                        </div>
                        <form>
                            <div class="mb-3">
                                <label for="input-firstname" class="form-label">First Name</label>
                                <input type="text" class="form-control" value="<?php echo $row['firstName'] ?>"
                                    id="input-firstname" placeholder="First Name">
                            </div>
                            <div class="mb-3">
                                <label for="input-lastname" class="form-label">Last Name</label>
                                <input type="text" class="form-control" value="<?php echo $row['lastName'] ?>"
                                    id="input-lastname" placeholder="Last Name">
                            </div>
                            <div class="mb-3">
                                <label for="input-address" class="form-label">Address</label>
                                <input type="text" class="form-control" value="<?php echo $row['address'] ?>"
                                    id="input-address" placeholder="Address">
                            </div>
                            <div class="mb-3">
                                <label for="input-telephone" class="form-label">Mobile</label>
                                <input type="tel" class="form-control" value="<?php echo $row['pNumber'] ?>"
                                    id="input-telephone" placeholder="Mobile">
                            </div>
                            <div class="mb-3">
                                <label for="input-email" class="form-label">Email</label>
                                <input type="email" class="form-control" value="<?php echo $row['email'] ?>"
                                    id="input-email" placeholder="Email">
                            </div>
                            <div class="mb-3">
                                <label for="input-city" class="form-label">City</label>
                                <input type="text" class="form-control" value="<?php echo $row['city'] ?>"
                                    id="input-city" placeholder="City">
                            </div>
                        </form>
                    </div>
                </div>

                <div class="container ms-3">
                    <div class="row">
                        <!-- Payment Method -->
                        <div class="col-md-6">
                            <div class="page-section">
                                <div class="section-head">
                                    <h2>Payment Method</h2>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="payment_method" id="payment-cod"
                                        value="cod" checked>
                                    <label class="form-check-label">
                                        Cash on Delivery
                                    </label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="payment_method"
                                        id="payment-bkash" value="bkash">
                                    <label class="form-check-label">
                                        Bkash
                                    </label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="payment_method" id="payment-card"
                                        value="card">
                                    <label class="form-check-label">
                                        Card
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Delivery Method -->
                        <div class="col-md-6">
                            <div class="page-section">
                                <div class="section-head">
                                    <h2>Delivery Method</h2>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="shipping_method"
                                        id="shipping-home" value="flat.flat" checked>
                                    <label class="form-check-label" for="shipping-home">
                                        Regular Delivery - 60৳ (3-5 days)
                                    </label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="shipping_method"
                                        id="shipping-home" value="express.express">
                                    <label class="form-check-label" for="shipping-home">
                                        Express Delivery - 120৳ (24 hours)
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order Overview -->
                    <div class="container">
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="page-section" style="height: auto;">
                                    <div class="section-head">
                                        <h2>Order Overview</h2>
                                    </div>
                                    <table id="cartItemsTable" class="table">
                                        <thead>
                                            <tr>
                                                <th>Medicine Name</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Total Price</th>
                                            </tr>
                                        </thead>
                                        <tbody id="orderItemsTable"></tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="3" class="text-end"><strong>Sub Total:</strong></td>
                                                <td id="totalPriceColumn">0৳</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-2">
                        <button class="btn btn-outline-primary">Confirm Order</button>
                    </div>

                </div>



            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const orderItemsTable = document.getElementById('orderItemsTable');
            const totalPriceColumn = document.getElementById('totalPriceColumn');
            const deliveryRadioButtons = document.querySelectorAll('input[name="shipping_method"]');

            // Retrieve cart data from session storage
            const cartItems = JSON.parse(sessionStorage.getItem('cartItems'));
            console.log(cartItems);

            // Function to update order overview table
            function updateOrderOverview(deliveryCost) {
                let total = 0; // Initialize total price

                // Clear previous rows
                orderItemsTable.innerHTML = '';

                // Display cart items in the order overview table
                if (cartItems && cartItems.length > 0) {
                    cartItems.forEach(item => {
                        const row = orderItemsTable.insertRow();
                        const cell1 = row.insertCell(0);
                        const cell2 = row.insertCell(1);
                        const cell3 = row.insertCell(2);
                        const cell4 = row.insertCell(3);

                        cell1.textContent = item.medName;
                        cell2.textContent = item.quantity; // Quantity
                        cell3.textContent = `${item.medPrice}৳`; // Price

                        // Calculate the total price for the item
                        const totalPrice = item.medPrice * item.quantity;
                        cell4.textContent = `${totalPrice}৳`;

                        total += totalPrice; // Accumulate total price
                    });
                }

                // Add row for delivery cost
                const deliveryRow = orderItemsTable.insertRow();
                deliveryRow.innerHTML = `<td colspan="3" class="text-end"><strong>Delivery:</strong></td><td>${deliveryCost}৳</td>`;

                total += deliveryCost; // Add delivery cost to total

                totalPriceColumn.textContent = `${total}৳`; // Set total price
            }

            // Event listener for radio buttons
            deliveryRadioButtons.forEach(button => {
                button.addEventListener('change', function () {
                    let deliveryCost = 0;
                    if (button.value === 'flat.flat') {
                        deliveryCost = 60;
                    } else if (button.value === 'express.express') {
                        deliveryCost = 120;
                    }
                    updateOrderOverview(deliveryCost);
                });
            });

            // Initial update of order overview with default delivery cost
            const defaultDeliveryCost = 60; // Default delivery cost for home delivery
            updateOrderOverview(defaultDeliveryCost);
        });

        // Event listener for "Confirm Order" button
        const confirmOrderButton = document.querySelector('.btn-outline-primary');
        confirmOrderButton.addEventListener('click', function () {
            const selectedPaymentMethod = document.querySelector('input[name="payment_method"]:checked').value;

            // Perform action based on selected payment method
            if (selectedPaymentMethod === 'bkash') {
                window.location.href = 'bkash.php';
            } else if (selectedPaymentMethod === 'card') {
                window.location.href = 'card.php';
            } else {
                // Retrieve the data from sessionStorage
                var data = JSON.parse(sessionStorage.getItem('cartItems'));
                // Convert the JavaScript object to a JSON string
                var jsonData = JSON.stringify(data);
                window.location.href = 'checkoutpage.php?cod=' + encodeURIComponent(jsonData);
            }
        });

    </script>
</body>

</html>