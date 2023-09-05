<?php 
   
     $koneksi->query("DELETE FROM bidang WHERE id_bidang='$_GET[id]'");
 echo"<script>alert('Selamat Data Berhasil di Hapus !!!'); window.location = '?page=page/bidang/index&id=Data Bidang Pengaduan'</script>";
?>