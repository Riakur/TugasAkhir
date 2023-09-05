
<?php

    if (isset ($_POST['simpan'])){
        $limit=10*1024*1024;
        $ekstensi= array('png','jpg');
        $file_name = $_FILES['file']['name'];
        $tmp_name = $_FILES['file']['tmp_name'];
        $judul=addslashes($_POST['judul']);
$tipe= pathinfo($file_name,PATHINFO_EXTENSION);
$ukuran = $_FILES['file']['size'];
if($ukuran > $limit){
    echo"<script>alert('Data  Gagal di Simpan, ukuran maksimum 10mb !!!'); window.location = '?page=page/home'</script>";
}else{
if(!in_array($tipe,$ekstensi)){
     echo"<script>alert('Data  Gagal di Simpan, Format foto yang anda masukan harus PNG/JPG !!!'); window.location = '?page=page/home'</script>";
}else{

        $keterangan=addslashes($_POST['keterangan']);

        $query_simpan =$koneksi->query( "INSERT INTO pengaduan SET 
        judul='$judul',
        id_user='$_SESSION[id]',
        keterangan='$keterangan',
        tgl_pengaduan='$tgl_sekarang',
        status='Sedang di Proses Oleh Admin',
        file='$file_name'
        ");
        move_uploaded_file($tmp_name, "images/pengaduan/".$file_name);

    if ($query_simpan) {
      echo"<script>alert('Data pengaduan anda berhasil disimpan !!!'); window.location = '?page=page/pengaduan'</script>";
      }else{
      echo"<script>alert('Data  Gagal di Simpan !!!'); window.location = '?page=page/home'</script>";
    }
}
}
}?>