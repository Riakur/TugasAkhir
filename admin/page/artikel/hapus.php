<?php 
   $hapus= $koneksi->query("select*from artikel where id_artikel='$_GET[id]'");
    // memilih gambar1 untuk dihapus
    $nama_gambar1=mysqli_fetch_array($hapus);
    // nama field gambar1
    $lokasi=$nama_gambar1['foto'];
    // alamat tempat gambar1
    $hapus_gambar1="../images/artikel/$lokasi";
    // script delete gambar1 dari folder
    unlink($hapus_gambar1);
     $koneksi->query("DELETE FROM artikel WHERE id_artikel='$_GET[id]'");
 echo"<script>alert('Data Berhasil di Hapus !!!'); window.location = '?page=page/artikel/index&id=Data artikel'</script>";
?>