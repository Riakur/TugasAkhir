<?php 
   
     $koneksi->query("DELETE FROM kritikandansaran WHERE id_kritikan='$_GET[id]'");
 echo"<script>alert('Data Berhasil di Hapus !!!'); window.location = '?page=page/kritikandansaran/index'</script>";
?>