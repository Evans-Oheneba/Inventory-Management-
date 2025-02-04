

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

              <li class="nav-item">
                <a class="nav-link" href="Pages/computers.php">
                  <span data-feather="shopping-cart"></span>
                  Equipments
                </a>
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
        <h2 class="count">1600</h2>
            <p1 class="description">Qty</p> 
            <p class="description">Equipments Available</p> 
        </div>
    </div>

    <div class="equipment-box1">
        <div class="content">
        <h2 class="count1">50</h2>
        <p1 class="description">Qty</p> 
            <p class="description">Equipments Available</p> 
        </div>
    </div>

    <div class="equipment-box1">
        <div class="content">
        <h2 class="count2">900</h2>
        <p1 class="description">Qty</p> 
            <p class="description">Equipments In Use</p> 
        </div>
    </div>

    <div class="equipment-box1">
        <div class="content">
        <h2 class="count3">150</h2>
        <p1 class="description">Qty</p> 
            <p class="description">Under Maintenance</p> 
        </div>
    </div>
 </div>
  <!-- Equipment Box -->
<div class = "invent-sum">
  <label class = "invent-h">Inventory Summary</label>
    <div class="equipment-box4">
        <div class="description4">Equipments Received</div>
        <div class="separator4"></div>
        <div class="count4">950</div>
    </div>

    <div class="equipment-box4">
        <div class="description4">Equipments In Use</div>
        <div class="separator4"></div>
        <div class="count41">50</div>
    </div>

    <div class="equipment-box4">
        <div class="description4">Equipments Under Maintenance</div>
        <div class="separator4"></div>
        <div class="count42">50</div>
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
                <td>10</td>
                <td>5</td>
            </tr>
            <tr>
                <td>2</td>
                <td><img src="Images/scana.ico" alt="scanners/Printers"> Scanners/Printers</td>
                <td>20</td>
                <td>9</td>
            </tr>
            <tr>
                <td>3</td>
                <td><img src="Images/server.ico" alt="Network Devices"> Network Devices</td>
                <td>40</td>
                <td>5</td>
            </tr>
            <tr>
                <td>4</td>
                <td><img src="Images/access.ico" alt="Accessories"> Accessories</td>
                <td>50</td>
                <td>2</td>
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
                labels: ['In Use', 'Available'],
                datasets: [{
                    data: [500, 200],  // 500 in use, 200 available
                    backgroundColor: ['#007bff', '#ddd']
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
