<?php   //error_reporting(0);
    $username = $_POST['username'];
  $password = $_POST['password'];

   $log =  $koneksi->query( "SELECT * FROM user WHERE username='$username' AND password='$password'");
    $data = mysqli_fetch_array($log); 
if(mysqli_num_rows($log) == 1){
    session_start();
    $_SESSION['id'] = $data['id_user'];
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['foto'] = $data['foto'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['password'] = $data['password'];
    echo "<script>alert('Login berhasil')</script>";
    echo "<meta http-equiv='refresh' content='0; url=index.php'></script>";

  }else{
    echo "<script>alert('Login gagal, coba ulangi kembali.')</script>";
    echo "<meta http-equiv='refresh' content='0; url=index.php'></script>";
  } ?>