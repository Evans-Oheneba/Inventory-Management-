

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

<?php
//include 'config.php'; // Ensure database connection is included
include 'db_connection.php';

//EQUIPMENT RECEIVED
$sql = "SELECT COUNT(*) AS total_devices FROM equipment_received";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_received = $row['total_devices'];
} else {
    $total_received = 0; // If no devices exist
}

$conn->close();
?>
<?php
include 'db_connection.php';
//EQUIPMENT AVAILABLE
$sql = "SELECT  COUNT(*) AS total_devices FROM equipment_received where status = 'Available'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_available = $row['total_devices'];
} else {
    $total_available = 0; // If no devices exist
}

$conn->close();
?>

<?php
include 'db_connection.php';
//EQUIPMENT IN USE
$sql = "SELECT ((SELECT COUNT(*) FROM Computers WHERE status = 'In Use')+(SELECT COUNT(*) FROM MP_Computers WHERE status = 'In Use') + (SELECT COUNT(*) FROM Scanners_printers WHERE status = 'In Use') + (SELECT COUNT(*) FROM Accessories WHERE status = 'In Use') + (SELECT COUNT(*) FROM Network_devices WHERE status = 'In Use')) AS total_devices";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_inUse = $row['total_devices'];
} else {
    $total_inUse = 0; // If no devices exist
}

$conn->close();
?>

<?php
include 'db_connection.php';
//EQUIPMENT IN UNDER MAINTENANCE
$sql = "SELECT ((SELECT COUNT(*) FROM Computers WHERE status = 'Under Maintenance')+(SELECT COUNT(*) FROM MP_Computers WHERE status = 'Under Maintenance') + (SELECT COUNT(*) FROM Scanners_printers WHERE status = 'Under Maintenance') + (SELECT COUNT(*) FROM Accessories WHERE status = 'Under Maintenance') + (SELECT COUNT(*) FROM Network_devices WHERE status = 'Under Maintenance')) AS total_devices";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_underMaint = $row['total_devices'];
} else {
    $total_underMaint = 0; // If no devices exist
}

$conn->close();
?>


<?php
include 'db_connection.php';
//STAFF ASSIGNED
$sql = "SELECT ((SELECT COUNT(DISTINCT staff_assigned) FROM Computers) + (SELECT COUNT(distinct staff_assigned) FROM scanners_printers) + (SELECT COUNT(distinct staff_assigned) FROM Accessories) + (SELECT COUNT(distinct staff_assigned) FROM Network_devices)) AS total_devices";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_staff = $row['total_devices'];
} else {
    $total_staff = 0; // If no devices exist
}

$conn->close();
?>

<?php
include 'db_connection.php';
//MP ASSIGNED
$sql = "SELECT count( DISTINCT mp_assigned) AS total_devices from MP_computers ;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_mp = $row['total_devices'];
} else {
    $total_mp = 0; // If no devices exist
}

$conn->close();
?>


<?php
//EQUIPMENTS ASSIGNED
//include 'config.php'; // Ensure database connection is included
include 'db_connection.php';

$sql = "SELECT ((SELECT COUNT(*) FROM Computers) + (SELECT COUNT(*) FROM Scanners_printers) + (SELECT COUNT(*) FROM Accessories) + (SELECT COUNT(*) FROM Network_devices) + (SELECT COUNT(*) FROM Mp_computers))AS total_devices";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_assigned = $row['total_devices'];
} else {
    $total_assigned = 0; // If no devices exist
}
//SCANNERS IN USE
$sql1 = "SELECT COUNT(*) AS total_devices FROM Scanners_Printers where status = 'In Use'";
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
    $row = $result1->fetch_assoc();
    $total_scanners_inUse = $row['total_devices'];
} else {
    $total_scanners_inUse = 0; // If no devices exist
}

//SCANNERS UNDER MAINTENENACE
$sql2 = "SELECT COUNT(*) AS total_devices FROM Scanners_Printers where status = 'Under Maintenance'";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
    $row = $result2->fetch_assoc();
    $total_scanners_under = $row['total_devices'];
} else {
    $total_scanners_under = 0; // If no devices exist
}

//COMPUTERS IN USE
$sql3 = "SELECT COUNT(*) AS total_devices FROM computers where status = 'In Use'";
$result3 = $conn->query($sql3);

if ($result3->num_rows > 0) {
    $row = $result3->fetch_assoc();
    $total_computers_inUse = $row['total_devices'];
} else {
    $total_computers_inUse = 0; // If no devices exist
}


//COMPUTERS UNDER MAINTENANCE
$sql4 = "SELECT COUNT(*) AS total_devices FROM computers where status = 'Under Maintenance'";
$result4 = $conn->query($sql4);

if ($result4->num_rows > 0) {
    $row = $result4->fetch_assoc();
    $total_computers_under= $row['total_devices'];
} else {
    $total_computers_under = 0; // If no devices exist
}


//NETWORKS IN USE
$sql5 = "SELECT COUNT(*) AS total_devices FROM network_devices where status = 'In Use'";
$result5 = $conn->query($sql5);

if ($result5->num_rows > 0) {
    $row = $result5->fetch_assoc();
    $total_network_inUse = $row['total_devices'];
} else {
    $total_network_inUse = 0; // If no devices exist
}


//NETWORKS UNDER MAINTENANCE
$sql6 = "SELECT COUNT(*) AS total_devices FROM network_devices where status = 'Under Maintenance'";
$result6 = $conn->query($sql6);

if ($result6->num_rows > 0) {
    $row = $result6->fetch_assoc();
    $total_network_under= $row['total_devices'];
} else {
    $total_network_under = 0; // If no devices exist
}


//ACCESSORIES IN USE
$sql7 = "SELECT COUNT(*) AS total_devices FROM accessories where status = 'In Use'";
$result7 = $conn->query($sql7);

if ($result7->num_rows > 0) {
    $row = $result7->fetch_assoc();
    $total_access_inUse = $row['total_devices'];
} else {
    $total_access_inUse = 0; // If no devices exist
}


//ACCESSORIES UNDER MAINTENANCE
$sql8 = "SELECT COUNT(*) AS total_devices FROM accessories where status = 'Under Maintenance'";
$result8 = $conn->query($sql8);

if ($result8->num_rows > 0) {
    $row = $result8->fetch_assoc();
    $total_access_under= $row['total_devices'];
} else {
    $total_access_under = 0; // If no devices exist
}


$conn->close();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="plogo.png">
    <script src="https://kit.fontawesome.com/8e8d9d4713.js" crossorigin="anonymous"></script>
    <title>Inventory - Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <div class="navbar-tops">
    <label class="logo1"><img src = plogo.png></label>

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
        <img src="uploads/<?php echo $profile_image;?>" class="profile-img" alt="Profile Picture">
        <span class="status-dot active"></span>
          <a class="nav-link" href="Pages/signin.php"><?php echo htmlspecialchars($username); ?></a>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">

              <li class="nav-item">
                <a class="nav-link active" href="#">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="Pages/Stock.php">
                  <span data-feather="file"></span>
                  Stock
                </a>
              </li>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap JS (for dropdowns) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

              <li class="nav-item">
              <a class="nav-link" href="computers.php" data-bs-toggle="collapse" data-bs-target="#inventoryDropdown" style="color: white;">
                  <span data-feather="shopping-cart"></span>
                  Equipments <span class="float-end">&#9660;</span>
                </a>
        <ul class="collapse list-unstyled ps-3" id="inventoryDropdown">
            <li><a href="Pages/computers.php"  class="nav-link">Computers</a></li>
            <li><a href="Pages/scanners.php"  class="nav-link">Scanners & Printers</a></li>
            <li><a href="Pages/networks.php"  class="nav-link">Network Devices</a></li>
            <li><a href="Pages/accessories.php"  class="nav-link">Accessories</a></li>
            <li><a href="Pages/mp_computers.php"  class="nav-link">MP Computers</a></li>
        </ul>
              </li>

              
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="plus-circle"></span>
                  Assign Device
                </a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="bar-chart-2"></span>
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
                  <span data-feather="layers"></span>
                  User Management
                </a>
              </li>
            </ul>    
            
            <a class="btn btn-sm btn-outline-secondary" href = "Pages/signin.php">
        Sign Out
</a>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
 <label class = "invent-h">System Summary</label>   
<div class = "main-box">

  <div class = "dash-container">
    <div class="equipment-box">
        <div class="content">
        <h2 class="count"><?php echo $total_assigned;?></h2>
            <p1 class="description">Qty</p> 
            <p class="description">Equipments Assigned</p> 
        </div>
    </div>

    <div class="equipment-box1">
        <div class="content">
        <h2 class="count1"><?php echo $total_available;?></h2>
        <p1 class="description">Qty</p> 
            <p class="description">Equipments Available</p> 
        </div>
    </div>

    <div class="equipment-box1">
        <div class="content">
        <h2 class="count2"><?php echo $total_staff;?></h2>
        <p1 class="description">Qty</p> 
            <p class="description">Assigned Staff</p> 
        </div>
    </div>

    <div class="equipment-box1">
        <div class="content">
        <h2 class="count3"><?php echo $total_mp;?></h2>
        <p1 class="description">Qty</p> 
            <p class="description">Assigned MPs</p> 
        </div>
    </div>
 </div>
  <!-- Equipment Box -->
<div class = "invent-sum">
  <label class = "invent-h">Inventory Summary</label>
    <div class="equipment-box4">
        <div class="description4">Equipments Received</div>
        <div class="separator4"></div>
        <div class="count4"><?php echo $total_received;?></h3></div>
    </div>

    <div class="equipment-box4">
        <div class="description4">Equipments In Use</div>
        <div class="separator4"></div>
        <div class="count41"><?php echo $total_inUse;?></div>
    </div>

    <div class="equipment-box4">
        <div class="description4">Equipments Under Maintenance</div>
        <div class="separator4"></div>
        <div class="count42"><?php echo $total_underMaint;?></div>
    </div>
</div>
</div>

<!--EQUIPMENTS SUMMARY TABLE-->
<label class = "invent-h">Equipment Summary</label>
<div class = "equipment-main">

  <table class = "equip-table">

       <thead>
            <tr>
                <th>No.</th>
                <th>Equipment</th>
                <th>In Use</th>
                <th>Under Maintenance</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td><img src="Images/desktop.ico" alt="Computer"> Computers</td>
                <td><?php echo $total_computers_inUse;?></td>
                <td><?php echo $total_computers_under;?></td>
            </tr>
            <tr>
                <td>2</td>
                <td><img src="Images/scana.ico" alt="scanners/Printers"> Scanners/Printers</td>
                <td><?php echo $total_scanners_inUse?></td>
                <td><?php echo $total_scanners_under;?></td>
            </tr>
            <tr>
                <td>3</td>
                <td><img src="Images/server.ico" alt="Network Devices"> Network Devices</td>
                <td><?php echo $total_network_inUse?></td>
                <td><?php echo $total_network_under;?></td>
            </tr>
            <tr>
                <td>4</td>
                <td><img src="Images/access.ico" alt="Accessories"> Accessories</td>
                <td><?php echo $total_access_inUse?></td>
                <td><?php echo $total_access_under?></td>
            </tr>
        </tbody>
    </table>

  <div class = "graph">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="chart-container">
    <label class = "invent-h">Computers Status</label>
        <canvas id="computersChart"></canvas>
    </div>
  </div>
</div>


    <script>
        var ctx = document.getElementById('computersChart').getContext('2d');
        var computersChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['In Use', 'Under Maintenance'],
                datasets: [{
                    data: [<?php echo $total_computers_inUse?>, <?php echo $total_computers_under?>],  // 500 in use, 200 available
                    backgroundColor: [ 'rgb(238, 204, 52)', '#ddd']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom'
                    }
                }
            }
        });
    </script>


        <br>
        <br>
<label class = "invent-h">Recently Assigned Devices</label>




<!-- Display the Total Devices Count -->















</body>
</html>




























  



































<?php
// Include the database connection
require_once 'db_connection.php';
?>       
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>
