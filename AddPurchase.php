<?php
session_start();
$conn=mysqli_connect('localhost','root','','Faaruuq');
?>
<?php
if(!$_SESSION['username']){
    header("Location: Login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Farmashiye Faaruuq</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/ff logo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="index.php" class="logo d-flex align-items-center">
            <img src="assets/img/ff logo.png" alt="">
            <span class="d-none d-lg-block">Farmashiye Faaruuq</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle" href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li>

            <?php
            // Database connection
            $conn = mysqli_connect('localhost', 'root', '', 'Faaruuq');

            // Check if the session for 'username' is set (user is logged in)
            if (isset($_SESSION['username'])) {
                // Fetch the current user's details using the session's username
                $username = $_SESSION['username'];
                
                // Prepare a SQL statement to get the user's data
                $sql = "SELECT * FROM users WHERE Username = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $username);
                $stmt->execute();
                $result = $stmt->get_result();
                
                // If the user data exists, fetch it
                if ($row = $result->fetch_assoc()) {
                    // Store the necessary data in variables
                    $profileImage = $row['ProfileImage'];
                    $role = $row['Role'];
                }
                $stmt->close();
            }

            $conn->close();
            ?>

            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="uploads/<?php echo htmlspecialchars($profileImage); ?>" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
                </a>
                
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h5><small style="color:#000; font-weight:bold;"><?php echo htmlspecialchars($_SESSION['username']); ?></small></h5>
                        <span><?php echo htmlspecialchars($role); ?></span>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="Logout.php">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>
</header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <!-- Medicines Section -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#medicines-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Medicines</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="medicines-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="ListMedicines.php">
              <i class="bi bi-circle"></i><span>Medicines List</span>
            </a>
          </li>
          <li>
            <a href="AddMedicine.php">
              <i class="bi bi-circle"></i><span>Add Medicine</span>
            </a>
          </li>
        </ul>
      </li><!-- End Medicines Nav -->

      <!-- Sales Section -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#sales-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-cart"></i><span>Sales</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="sales-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="ListSales.php">
              <i class="bi bi-circle"></i><span>Sales List</span>
            </a>
          </li>
          <li>
            <a href="AddSale.php">
              <i class="bi bi-circle"></i><span>Add Sale</span>
            </a>
          </li>
        </ul>
      </li><!-- End Sales Nav -->

      <!-- Purchases Section -->
      <li class="nav-item">
        <a class="nav-link" data-bs-target="#purchases-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bag"></i><span>Purchases</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="purchases-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="ListPurchases.php">
              <i class="bi bi-circle"></i><span>Purchases List</span>
            </a>
          </li>
          <li>
            <a href="AddPurchase.php" class="active">
              <i class="bi bi-circle"></i><span>Add Purchase</span>
            </a>
          </li>
        </ul>
      </li><!-- End Purchases Nav -->

      <!-- Users Section -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-people"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="users-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="ListUsers.php">
              <i class="bi bi-circle"></i><span>Users List</span>
            </a>
          </li>
          <li>
            <a href="AddUser.php">
              <i class="bi bi-circle"></i><span>Add User</span>
            </a>
          </li>
        </ul>
      </li><!-- End Users Nav -->

      <!-- Reports Section -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#reports-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Reports</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="reports-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="SalesReports.php">
              <i class="bi bi-circle"></i><span>Sales Reports</span>
            </a>
          </li>
          <li>
            <a href="PurchasesReports.php">
              <i class="bi bi-circle"></i><span>Purchases Reports</span>
            </a>
          </li>
          <li>
            <a href="MedicinesReports.php">
              <i class="bi bi-circle"></i><span>Medicines Reports</span>
            </a>
          </li>
        </ul>
      </li><!-- End Reports Nav -->

      <!-- Logout Page -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="logout.php">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Logout</span>
        </a>
      </li><!-- End Logout Page Nav -->
      
    </ul>

  </aside><!-- End Sidebar-->

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Add Purchase</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item">Purchases</li>
        <li class="breadcrumb-item active">Add Purchase</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Purchase Form</h5>

      <!-- Vertical Form -->
      <form class="row g-3" method="post">
        <div class="col-6">
          <label for="medicineID" class="form-label">Medicine</label>
          <select class="form-select" id="medicineID" name="medicineID" required>
            <option value="" disabled selected>Select Medicine</option>
            <?php
            // Database connection
            $con = mysqli_connect('localhost', 'root', '', 'Faaruuq');

            // Check if connection was successful
            if (!$con) {
              die("Connection failed: " . mysqli_connect_error());
            }

            // Fetch medicines from the medicines table
            $medicineQuery = "SELECT MedicineID, Name FROM medicines";
            $result = mysqli_query($con, $medicineQuery);

            if ($result && mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['MedicineID'] . "'>" . $row['Name'] . "</option>";
              }
            } else {
              echo "<option value=''>No medicines available</option>";
            }

            // Free result set
            mysqli_free_result($result);
            ?>
          </select>
        </div>

        <div class="col-6">
          <label for="purchaseDate" class="form-label">Purchase Date</label>
          <input type="date" class="form-control" id="purchaseDate" name="purchaseDate" required>
        </div>

        <div class="col-6">
          <label for="quantity" class="form-label">Quantity</label>
          <input type="number" class="form-control" id="quantity" name="quantity" required>
        </div>

        <div class="col-6">
          <label for="cost" class="form-label">Cost</label>
          <input type="number" class="form-control" id="cost" name="cost" required>
        </div>

        <div class="text-left">
          <button type="submit" name="save" class="btn btn-primary">Save</button>
          <button type="reset" class="btn btn-secondary">Cancel</button>
        </div>
      </form><!-- Vertical Form -->

      <?php
      // Handle form submission
      if (isset($_POST['save'])) {
        $medicine_id = $_POST['medicineID'];
        $purchase_date = $_POST['purchaseDate'];
        $quantity = $_POST['quantity'];
        $cost = $_POST['cost'];

        // Insert purchase into the Purchases table
        $sql = "INSERT INTO Purchases (MedicineID, PurchaseDate, Quantity, Cost) 
                VALUES ('$medicine_id', '$purchase_date', '$quantity', '$cost')";
        $result = mysqli_query($con, $sql);

        if ($result) {
          echo "<div class='alert alert-success'>Purchase added successfully!</div>";
        } else {
          echo "<div class='alert alert-danger'>Error! Could not save purchase.</div>";
        }
      }

      // Close the connection
      mysqli_close($con);
      ?>

    </div>
  </div>

</main><!-- End #main -->



  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Barsame</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="https://bootstrapmade.com/">Khadar Faisal</a>
    </div>
  </footer>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>