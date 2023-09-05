 

<?php 
             $pa=mysqli_num_rows($koneksi->query("select * from pengaduan  "));
             $pt=mysqli_num_rows($koneksi->query("select * from pengaduan where status='di Tolak'  "));
             $pd=mysqli_num_rows($koneksi->query("select * from pengaduan  where status='di Terima'  "));

              ?>
  <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard
              </h3>
             
            </div>
            <div class="row">
              
              <div class="col-md-4 stretch-card grid-margin">
                
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3"><a href="?page=page/pengaduan/index&status=Sedang%20di%20Proses%20Oleh%20Admin
" style="color: white;">Baru Data Pengaduan </a><i class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5"><?= $pa;?></h2>
                  </div>
                </div>
              
              </div>
              
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3"><a href="?page=page/pengaduan/index&status=di Tolak" style="color: white;">Data Pengaduan Ditolak </a> <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                    </h4>
                     <h2 class="mb-5"><?= $pt;?></h2>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3"> <a href="?page=page/pengaduan/index&status=di Terima" style="color: white;">Pengaduan Di Terima </a> <i class="mdi mdi-diamond mdi-24px float-right"></i>
                    </h4>
                     <h2 class="mb-5"><?= $pd;?></h2>
                  </div>
                </div>
              </div>
            </div>
         
           
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         <?php include"tampilan/footer.php";?>
          <!-- partial -->
        </div>