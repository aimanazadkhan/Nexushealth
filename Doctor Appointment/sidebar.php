<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collapsible Sidebar Menu</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            height: 100%;
            width: 280px;
            position: fixed;
            top: 0;
            left: -300px;
            overflow-x: hidden;
            transition: 0.5s;
            margin-left: 10px;
            margin-top: 25px;
           
        }

        .sidebar.show {
            left: 0;
        }

        .sidebar .close-btn {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 24px;
            cursor: pointer;
            color: black;
        }


        .content {
            margin-left: 0px;
            padding: 20px;
            transition: margin-left 0.5s;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div id="sidebar" class="sidebar">

        <a href="../Homepage/index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-decoration-none">
            <img src="../logo/reglogo.png" alt="logo1" style="width: 200px;">
        </a>
        <hr>
        <span class="close-btn" onclick="closeSidebar()">&times;</span>
        <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="doctorhome.php" class="nav-link <?php if (isset($doctorHome))
                echo "active" ?>" aria-current="page">
                    <i class="bi bi-speedometer me-2" width="16" height="16"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="appointmentlist.php" class="nav-link link-body-emphasis <?php if (isset($appointmentlist))
                echo "active" ?>">
                    <i class="bi bi bi-calendar3 me-2" width="16" height="16"></i>
                    Appointments
                </a>
            </li>
            <li>
                <a href="doctorList.php" class="nav-link link-body-emphasis <?php if (isset($doctorList))
                echo "active" ?>">
                    <i class="bi bi-file-medical me-2" width="16" height="16"></i>
                    Doctors
                </a>
            </li>
        </ul>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function openSidebar() {
            document.getElementById("sidebar").classList.add('show');
            document.querySelector('.content').style.marginLeft = '280px';
        }

        function closeSidebar() {
            document.getElementById("sidebar").classList.remove('show');
            document.querySelector('.content').style.marginLeft = '0';
        }
    </script>
</body>

</html>