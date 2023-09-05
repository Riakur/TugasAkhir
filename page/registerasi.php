<?php


        $file_name = $_FILES['foto']['name'];
        $tmp_name = $_FILES['foto']['tmp_name'];
        $file_name1 = $_FILES['ktp']['name'];
        $tmp_name1 = $_FILES['ktp']['tmp_name'];
        $file_name2 = $_FILES['suratrekom']['name'];
        $tmp_name2 = $_FILES['suratrekom']['tmp_name'];
        $nama=addslashes($_POST['nama']);
        $nik=addslashes($_POST['nik']);
        $no_hp=addslashes($_POST['no_hp']);
        $username=addslashes($_POST['username']);
        $password=addslashes($_POST['password']);
$log =  $koneksi->query( "SELECT * FROM user WHERE username='$username' AND password='$password'");
    $data = mysqli_fetch_array($log); 
if(mysqli_num_rows($log) == 1){
  echo"<script>alert('Anda Gagal melakukan Registerasi,dikarenakan usernama dan Password anda sudah ada sebelumnya !!!'); window.location = '?page=page/index'</script>";
}else{
        $query_simpan =$koneksi->query( "INSERT INTO user SET 
        nama='$nama',
        username='$username',
        no_hp='$no_hp',
        password='$password',
        nik='$nik',
        foto='$file_name',
        ktp='$file_name1',
        Surat SK Jabatan='$file_name2'
        ");
        move_uploaded_file($tmp_name, "images/user/".$file_name);
        move_uploaded_file($tmp_name1, "images/ktp/".$file_name1);
        move_uploaded_file($tmp_name2, "images/surat/".$file_name2);

    if ($query_simpan) {
      echo"<script>alert('Data Anda Berhasil Registerasi !!!'); window.location = '?page=page/index'</script>";
      }else{
      echo"<script>alert('Data Anda Gagal di Registerasi !!!'); window.location = '?page=page/index'</script>";
    }
  }
?>