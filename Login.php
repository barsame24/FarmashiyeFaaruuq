  <h4 style="color:#353232;  position: absolute; bottom: 197px; z-index: 10;  font-size: 20px;"> 
      <?php 
      session_start();
      $conn=mysqli_connect('localhost','root','','Faaruuq');?>
      <?php 
      if(isset($_POST['submit'])){
          $username=$_POST['username'];
          $password=$_POST['password'];
          $username=stripcslashes($username);
          $password=stripcslashes($password);
          $username=mysqli_real_escape_string($conn, $username);
          $password=mysqli_real_escape_string($conn, $password);
          $query=mysqli_query($conn,"SELECT * FROM users WHERE username ='$username' AND passwordhash = '$password'");
          
          if(mysqli_num_rows($query)< 1){
              echo "Username or password mismatch!";
          }else{
              echo "Login success";
              $_SESSION['username']=$username;
              header("Location: index.php");
          }
      }
      ?>
  </h4>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login Farmashiye Faaruuq</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/ff logo.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <style>
    .login-page{
        background: linear-gradient(rgba(255, 255, 255, 0.904), rgba(255, 255, 255, 0.779)), url(assets/img/background.webp);
        background-size: cover;   
    }
    .logo img{
      max-height: 40px;
    }
  </style>
</head>

<body class="login-page bg-body-secondary">
  <main class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6">
          <div class="text-center mb-4">
            <a href="index.php" class="logo">
              <img src="assets/img/ff logo.png" alt="Logo">
              <span>Farmashiye Faaruuq</span>
            </a>
          </div>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title text-center pb-0">Ener Username and Password</h5>
              <form class="needs-validation" action="login.php" method="POST">
                <div class="mb-3">
                  <label for="username" class="form-label">Username</label>
                  <input type="text" name="username" class="form-control" id="username" required>
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" id="password" required>
                </div>
                <button class="btn btn-dark w-100" type="submit" name="submit">Login</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/main.js"></script>
</body>

</html>
