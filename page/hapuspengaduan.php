<?php 
   $hapus= $koneksi->query("select*from pengaduan where id_pengaduan='$_GET[id]'");
    // memilih gambar1 untuk dihapus
    $nama_gambar1=mysqli_fetch_array($hapus);
    // nama field gambar1
    $lokasi=$nama_gambar1['file'];
    // alamat tempat gambar1
    $hapus_gambar1="images/pengaduan/$lokasi";
    // script delete gambar1 dari folder
    unlink($hapus_gambar1);
     $koneksi->query("DELETE FROM pengaduan WHERE id_pengaduan='$_GET[id]'");
 echo"<script>alert('Data Berhasil di Hapus !!!'); window.location = '?page=page/pengaduan'</script>";
?>