<?php //error_reporting(0);
session_start();
include"../config/config.php";?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
  </head>
  <body>
    <div class="container-scroller" >
      <div class="container-fluid page-body-wrapper full-page-wrapper" >
        <div class="content-wrapper d-flex align-items-center auth" style="background-color: #0af3f1;">
          <div class="row flex-grow" >
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="../images/LOGO.png" style="width: 400px;">
                </div>
                <form class="pt-3" action="" method="post">
                  <div class="form-group">
                    <input type="text" name="username" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username" required="">
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" required="">
                  </div>
                 
                  <div class="mt-3">
                    <input class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" type="submit" name="login" value="Login">
                    
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
  </body>
</html>

<?php 

if (isset($_POST['login'])){
    //error_reporting(0);
    $username = $_POST['username'];
  $password = $_POST['password'];

   $log =  $koneksi->query( "SELECT * FROM adminbidang WHERE username='$username' AND password='$password'");
    $data = mysqli_fetch_array($log); 
if(mysqli_num_rows($log) == 1){
    session_start();
    $_SESSION['id'] = $data['id_adminbidang'];
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['foto'] = $data['foto'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['password'] = $data['password'];

    $_SESSION['level'] = 'Admin Bidang';
    echo "<script>alert('Login berhasil')</script>";
    echo "<meta http-equiv='refresh' content='0; url=beranda.php'></script>";

  }else{
    $log =  $koneksi->query( "SELECT * FROM admin WHERE username='$username' AND password='$password'");
    $data = mysqli_fetch_array($log);

  if(mysqli_num_rows($log) == 1){
    session_start();
    $_SESSION['id'] = $data['id_admin'];
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['foto'] = $data['foto'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['password'] = $data['password'];

    $_SESSION['level'] = 'Administrator';
    echo "<script>alert('Login berhasil')</script>";
    echo "<meta http-equiv='refresh' content='0; url=beranda.php'></script>";

  }else{
    echo "<script>alert('Login gagal, coba ulangi kembali.')</script>";
    echo "<meta http-equiv='refresh' content='0; url=index.php'></script>";
  } 
  } 

   
 
  
  

  


}

?>