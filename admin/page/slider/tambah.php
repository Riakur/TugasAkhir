<div class="main-panel">
          <div class="content-wrapper">
           
            <div class="row">
            
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"> <h1 class="h3 mb-2 text-gray-800"><?php echo $_GET['id'];?></h1></h4>
                   
                    <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="exampleInputName1">judul</label>
                        <input type="text"  name="judul" class="form-control" id="exampleInputName1" placeholder="judul" required="">
                      </div>
                      <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="foto" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" name="foto" class="form-control file-upload-info" disabled placeholder="Upload Image" required="">
                          <span class="input-group-append">
                            <button name="foto"class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                          </span>
                        </div>
                      </div>
                      
                      <button type="submit" name="simpan" class="btn btn-gradient-primary me-2">Submit</button>
                      <a href="?page=page/slider/index&id=Data slider"class="btn btn-light">Cancel</a>
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


        $query_simpan =$koneksi->query( "INSERT INTO slider SET 
        judul='$judul',
        foto='$file_name'
        ");
        move_uploaded_file($tmp_name, "../images/slider/".$file_name);

    if ($query_simpan) {
      echo"<script>alert('Selamat Data slider Berhasil di tambah !!!'); window.location = '?page=page/slider/index&id=Data slider'</script>";
      }else{
      echo"<script>alert('Mohon Ma'af Data slider Gagal di Simpan !!!'); window.location = '?page=page/slider/tambah'</script>";
    }}?>