  <?php  if(isset($_GET['id'])){
        $sql_cek = "SELECT * FROM kritikandansaran  WHERE  id_kritikan='".$_GET['id']."'";
        $query_cek = $koneksi->query( $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
        $koneksi->query("UPDATE kritikandansaran SET 
                    status     = 'Terbaca'
                    WHERE id_kritikan = '$_GET[id]'");
    }
  ?>

  <div class="main-panel">
          <div class="content-wrapper">
           
            <div class="row">
            
              <div class="col-12 grid-margin stretch-card" >
                <div class="card">
                  <div class="card-body" style="background-color: #00ffc43b;">
                    <h4 class="card-title"> <h1 class="h3 mb-2 text-gray-800">Detail Keritikan dan Saran</h1></h4>
                   
                    <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                       <input type="hidden" name="id" value="<?=$data_cek['id_pengaduan'];?>">
                                
<table class="table table-striped">
  <tr>
    <td width="5%">Nama</td>
    <td width="75%">: <?= $data_cek['nama'];?></td>
  </tr>
  <tr>
    <td width="5%">Email</td>
    <td width="75%">: <?= $data_cek['nama'];?></td>
  </tr>
  <tr>
    <td width="5%">Keritikan dan Saran</td>
    <td width="75%">: <?= $data_cek['kritikan'];?></td>
  </tr>
</table>
                     
                      
                      
                      <a href="?page=page/kritikandansaran/index"class="btn btn-light">Kembali</a>
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