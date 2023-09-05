<div class="main-panel">
          <div class="content-wrapper">
           
            <div class="row">
            
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"> <h1 class="h3 mb-2 text-gray-800"><?php echo $_GET['id'];?></h1></h4>
                   
                    <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="exampleInputName1">Judul</label>
                        <input type="text"  name="judul" class="form-control" id="exampleInputName1" placeholder="Judul">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Keterangan </label>
                        <textarea type="text" name="keterangan" class="form-control" id="exampleInputEmail3" placeholder="Keterangan"></textarea>
                      </div>
                      
                      <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="foto" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" name="foto" class="form-control file-upload-info" disabled placeholder="Upload Image">
                          <span class="input-group-append">
                            <button name="foto"class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                          </span>
                        </div>
                      </div>
                      
                      <button type="submit" name="simpan" class="btn btn-gradient-primary me-2">Submit</button>
                      <a href="?page=page/artikel/index&id=Data artikel"class="btn btn-light">Cancel</a>
                    </form>
                  </div>
                </div>
              </div>
             
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
         <?php include"tampilan/footer.php";?>
          <!-- partial -->
        </div>

<?php

    if (isset ($_POST['simpan'])){
        $file_name = $_FILES['foto']['name'];
        $tmp_name = $_FILES['foto']['tmp_name'];
        $judul=addslashes($_POST['judul']);

$no_hp = $_POST['no_hp'];
        $keterangan=addslashes($_POST['keterangan']);

        $query_simpan =$koneksi->query( "INSERT INTO artikel SET 
        judul='$judul',
        keterangan='$keterangan',
        tgl= '$tgl_sekarang',
        jam='$jam_sekarang',
        foto='$file_name'
        ");
        move_uploaded_file($tmp_name, "../images/artikel/".$file_name);

    if ($query_simpan) {
      echo"<script>alert('Data artikel Berhasil di tambah !!!'); window.location = '?page=page/artikel/index&id=Data artikel'</script>";
      }else{
      echo"<script>alert('Data artikel Gagal di Simpan !!!'); window.location = '?page=page/artikel/tambah'</script>";
    }}?>