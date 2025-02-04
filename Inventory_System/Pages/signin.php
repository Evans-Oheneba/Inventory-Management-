<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../plogo.png">

    <title>Signin</title>

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../CSS/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
 
    <form class="form-signin" method="POST" action="">
      <img class="mb-4" src="../plogo.png" alt="" width="72" height="72">
      <h1 class="h3">INVENTORY MANAGEMENT </h1>
      <h1 class="h4 mb-3">ICT DEPARTMENT</h1>
   
  <div class = "labels">
      <label for="inputEmail" class="sr-only">Email Address</label>
      <input type="email" id="email" name = "email" class="form-control" placeholder="Email address" required>

      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="password" name = "password" class="form-control" placeholder="Password" required>

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
    </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name = "login" >Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; ICT Department 2025-2026</p>

    </form>
  </body>

<?php
  session_start();
require_once '../db_connection.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "SELECT id, username, profile_image, pass FROM users WHERE email = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);

        // Debugging: Check if password exists
        if (!$user || !isset($user['pass'])) {
            echo "Error: User not found or password missing.";
            exit;
        }

        if ($password == $user['pass']) {
            $_SESSION['id'] = $user['id']; 
            $_SESSION['username'] = $user['username'];
            $_SESSION['profile_image'] = $user['profile_image'];
            
            header("Location:../index.php");
            //echo "successful";
            exit();
        } else {
            echo "Invalid email or password.";
        }
    } else {
        echo "Please fill in both fields.";
    }
}
?>

</html>
