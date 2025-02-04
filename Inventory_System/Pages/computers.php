<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: Pages/signin.php"); // Redirect if not logged in
    exit();
}

$username = $_SESSION['username'];
$profile_image = $_SESSION['profile_image'];

// Set a default profile image if none exists
if (empty($profile_image)) {
    $profile_image = "uploads/user.png"; // Make sure this image exists in your project folder
}
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="https://kit.fontawesome.com/8e8d9d4713.js" crossorigin="anonymous"></script>
    <link rel="icon" href="../plogo.png">

    <title>Inventory - Equipment</title>
    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../dashboard.css" rel="stylesheet">
  </head>

  <body>
  <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <div class="navbar-tops">
    <label class="logo1"><img src = ../plogo.png></label>

      <div class="brand" href="#">Inventory Management  </div>

        <!--<input class="form-control" type="text" placeholder="Search" aria-label="Search">-->
      <div class="search-box">
    <button class="btn-search"><i class="fas fa-search"></i></button>
    <input type="text" class="input-search" placeholder=".     .search here">
  </div>

        <div class="side-item">
     
        </div>
        <div class="nav-item">

        <!-- Notification Icon -->
    <div class="notification-container">
        <i class="fa fa-bell"></i> <!-- Bell icon -->
        <span class="notification-badge" id="notification-count">2</span> <!-- Badge -->
    </div>


       <!-- <label class="logo2"><img src = Images/us.png></label>-->
       <label class="logo2"> <span data-feather="settings"></span></label>
        <img src="../uploads/<?php echo $profile_image;?>" class="profile-img" alt="Profile Picture">
        <span class="status-dot active"></span>
          <a class="nav-link" href="Pages/signin.php"><?php echo htmlspecialchars($username); ?></a>
        </div>
      </div>
    </nav>
    </nav>


    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">

              <li class="nav-item">
                <a class="nav-link" href="../index.php">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only"></span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="Stock.php">
                  <span data-feather="file"></span>
                  Stock
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link active" href="#">
                  <span data-feather="shopping-cart"></span>
                  Equipments
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="users"></span>
                 Under Maintenance
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="users"></span>
                  Staff
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="bar-chart-2"></span>
                  Reports
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="users"></span>
                  User Management
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="settings"></span>
                  Settings
                </a>
              </li>
            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>View reports</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Equipments Assigned
                </a>
              </li>
             
            </ul>
            <div class="side-item">
        <button class="btn btn-sm btn-outline-secondary">
        Sign Out
      </button>
        </div>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Computers</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
<!-- Button to Trigger Modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#assignModal">
    Assign Devices
</button>
                <button class="btn btn-sm btn-outline-secondary">Dispose Device</button>
                <button class="btn btn-sm btn-outline-secondary">Retrieve Device</button>
              </div>
           
              <button class="btn btn-sm btn-outline-secondary">Print</button>
            </div>
          </div>


<div class ="table-display">          
   
<?php
// Include the database connection
require_once '../db_connection.php';

// Query the users table
$query = "SELECT * FROM computers";
$result = $conn->query($query);

// Check if there are any results
if ($result->num_rows > 0) {
    // Start HTML table
    echo "<table class = 'styled-table' border='1'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Type</th>
                <th>Brand</th>
                <th>Serial Number</th>
                <th>Level</th>
                <th>Date Received</th>
                <th>Received From</th>
                <th>Received By</th>
                <th>Status</th>
                
            </tr>";
    
    // Loop through the results and display them
    while ($row = $result->fetch_assoc()) {

      //Assign colors based on status
      $status = $row['Status'];
      $badgeColor = '';

  if ($status == 'Available') {
      $badgeColor = 'bg-success'; // Green
  } elseif ($status == 'Assigned') {
      $badgeColor = 'bg-warning text-dark'; // Yellow with dark text
  } elseif ($status == 'Under Maintenance') {
      $badgeColor = 'bg-danger'; // Red
  }

        echo "<tr>
            <td>" . $row['computer_Id'] . "</td>
            <td>" . $row['computer_name'] . "</td>
            <td>" . $row['computer_type'] . "</td>
            <td>" . $row['computer_brand'] . "</td>
            <td>" . $row['computer_serialNumber'] . "</td>
            <td>" . $row['computer_level'] . "</td>
            <td>" . $row['Date_received'] . "</td>
            <td>" . $row['Received_from'] . "</td>
            <td>" . $row['Received_by'] . "</td>
            <td><span class = 'badge $badgeColor'>" . $row['Status'] . "</span></td>
        </tr>";

        
    }

    // End HTML table
    echo "</table>";
} else {
    echo "No Computers Assigned.";
}

// Close the connection
$conn->close();
?>
</div>



    </main>
      </div>
    </div>

























    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../assets/js/vendor/popper.min.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

</body>
</html>