  <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="beranda.php"><img src="../images/LOGO.png" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="beranda.php"><img src="../images/LOGO.png" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="search-field d-none d-md-block">
            <form class="d-flex align-items-center h-100" action="#">
              <div class="input-group">
               </div>
            </form>
          </div>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown">
              
              <?php if($_SESSION['level']=='Administrator'){?>
                 <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              
              <i class="mdi mdi-email-outline"></i>
               <?php
                   $admi=$koneksi->query("SELECT * FROM kabid where id_kabid='$_SESSION[id]'");
                $mbi=mysqli_fetch_array($admi);
             $p=mysqli_num_rows($koneksi->query("select * from pengaduan where status='Sedang di Proses Oleh Admin' and id_bidang='$mbi[id_bidang]'"));
             if($p == 0){}else{?>  <span class="count-symbol bg-warning"></span><?php }?>
                

              
            
              </a>


              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                <h6 class="p-3 mb-0">Pengaduan</h6>
                <div class="dropdown-divider"></div>
                <?php
                   $admi=$koneksi->query("SELECT * FROM kabid where id_kabid='$_SESSION[id]'");
                $mbi=mysqli_fetch_array($admi);
             $p=mysqli_num_rows($koneksi->query("select * from pengaduan where status='Sedang di Proses Oleh Admin' "));
             if($p == 0){}else{
              ?>
                <?php
                      $no=1;
                      $admi=$koneksi->query("SELECT * FROM kabid where id_kabid='$_SESSION[id]'");
                $mbi=mysqli_fetch_array($admi);
                      $tampil = $koneksi->query("SELECT * FROM pengaduan as p, user as u where p.id_user=u.id_user and p.id_bidang='$mbi[id_bidang]' and p.status='Sedang di Proses Oleh Admin'   order by tgl_pengaduan desc limit 3  ");
                      while($m=mysqli_fetch_array($tampil)){
                        
                        
                      ?>
                <a class="dropdown-item preview-item" href="?page=page/pengaduan/detail&id=<?= $m['id_pengaduan'];?>">
                  <div class="preview-thumbnail">
                    <img src="../images/user/<?= $m['foto'];?>" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal"> <?= $m['nama'];?></h6>
                    <p class="text-gray mb-0"><?= tgl_indonesia($m['tgl_pengaduan']);?></p>
                  </div>
                </a>
              <?php }?>
               <?php }?> 
                <div class="dropdown-divider"></div>
                <h6 class="p-3 mb-0 text-center"><?= $p;?> Pengaduan Baru</h6>
              </div>
                <?php
             $p=mysqli_num_rows($koneksi->query("select * from kritikandansaran where status='Baru'"));
             if($p == 0){}else{
              ?>
                  <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-email-outline"></i>
               

                <span class="count-symbol bg-warning"></span>
            
              </a>

              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                <h6 class="p-3 mb-0">Keritikan dan Saran</h6>
                <div class="dropdown-divider"></div>
                <?php
                      $no=1;
                      $tampil = $koneksi->query("SELECT * FROM kritikandansaran where status='Baru'  order by id_kritikan desc limit 3  ");
                      while($m=mysqli_fetch_array($tampil)){
                        
                        
                      ?>
                <a class="dropdown-item preview-item" href="?page=page/kritikandansaran/detail&id=<?= $m['id_kritikan'];?>">
                  <div class="preview-thumbnail">
                    <img src="../images/pic.png" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal"> <?= $m['nama'];?></h6>
                    <p class="text-gray mb-0"><?= tgl_indonesia($m['tgl']);?> - <?= $m['jam'];?></p>
                  </div>
                </a>
              <?php }?>
               
                <div class="dropdown-divider"></div>
                <h6 class="p-3 mb-0 text-center"><?= $p;?> Keritikan dan Saran Baru</h6>
              </div>  <?php }?> 
                 
                <?php }elseif($_SESSION['level']=='Admin Bidang') {?>
                  
                  <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              
              <i class="mdi mdi-email-outline"></i>
               <?php
                   $admi=$koneksi->query("SELECT * FROM adminbidang where id_adminbidang='$_SESSION[id]'");
                $mbi=mysqli_fetch_array($admi);
             $p=mysqli_num_rows($koneksi->query("select * from pengaduan where status='Sedang di Proses Oleh Admin Bidang' and id_bidang='$mbi[id_bidang]'"));
             if($p == 0){}else{?>  <span class="count-symbol bg-warning"></span><?php }?>
                

              
            
              </a>


              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                <h6 class="p-3 mb-0">Pengaduan</h6>
                <div class="dropdown-divider"></div>
                <?php
                   $admi=$koneksi->query("SELECT * FROM adminbidang where id_adminbidang='$_SESSION[id]'");
                $mbi=mysqli_fetch_array($admi);
             $p=mysqli_num_rows($koneksi->query("select * from pengaduan where status='Sedang di Proses Oleh Admin Bidang' and id_bidang='$mbi[id_bidang]'"));
             if($p == 0){}else{
              ?>
                <?php
                      $no=1;
                      $admi=$koneksi->query("SELECT * FROM adminbidang where id_adminbidang='$_SESSION[id]'");
                $mbi=mysqli_fetch_array($admi);
                      $tampil = $koneksi->query("SELECT * FROM pengaduan as p, user as u where p.id_user=u.id_user and p.id_bidang='$mbi[id_bidang]' and p.status='Sedang di Proses Oleh Admin Bidang'   order by tgl_pengaduan desc limit 3  ");
                      while($m=mysqli_fetch_array($tampil)){
                        
                        
                      ?>
                <a class="dropdown-item preview-item" href="?page=page/pengaduan/detail&id=<?= $m['id_pengaduan'];?>">
                  <div class="preview-thumbnail">
                    <img src="../images/user/<?= $m['foto'];?>" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal"> <?= $m['nama'];?></h6>
                    <p class="text-gray mb-0"><?= tgl_indonesia($m['tgl_pengaduan']);?></p>
                  </div>
                </a>
              <?php }?>
               <?php }?> 
                <div class="dropdown-divider"></div>
                <h6 class="p-3 mb-0 text-center"><?= $p;?> Pengaduan Baru</h6>
              </div>  
                <?php }else{?>
                   
                  <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-email-outline"></i>
               
<?php
                   $admi=$koneksi->query("SELECT * FROM kabid where id_kabid='$_SESSION[id]'");
                $mbi=mysqli_fetch_array($admi);
             $p=mysqli_num_rows($koneksi->query("select * from pengaduan where status='Sedang di Proses Oleh Kepala Bidang' and id_bidang='$mbi[id_bidang]' "));
             if($p == 0){}else{
              ?>
                <span class="count-symbol bg-warning"></span>
                  <?php }?> 
            
              </a>

              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                <h6 class="p-3 mb-0">Pengaduan</h6>
                <div class="dropdown-divider"></div>
                <?php
                      $no=1;
                      $admi=$koneksi->query("SELECT * FROM kabid where id_kabid='$_SESSION[id]'");
                $mbi=mysqli_fetch_array($admi);
                      $tampil = $koneksi->query("SELECT * FROM pengaduan as p, user as u where p.id_user=u.id_user and p.id_bidang='$mbi[id_bidang]' and p.status='Sedang di Proses Oleh Kepala Bidang'   order by tgl_pengaduan desc limit 3  ");
                      while($m=mysqli_fetch_array($tampil)){
                        
                        
                      ?>
                <a class="dropdown-item preview-item" href="?page=page/pengaduan/detail&id=<?= $m['id_pengaduan'];?>">
                  <div class="preview-thumbnail">
                    <img src="../images/user/<?= $m['foto'];?>" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal"> <?= $m['nama'];?></h6>
                    <p class="text-gray mb-0"><?= tgl_indonesia($m['tgl_pengaduan']);?></p>
                  </div>
                </a>
              <?php }?>
               
                <div class="dropdown-divider"></div>
                <h6 class="p-3 mb-0 text-center"><?= $p;?> Pengaduan Baru</h6>
              </div>

                <?php } ?>
            </li>
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <?php if($_SESSION['level']=='Administrator'){?>
                  <img src="../images/adm/<?= $_SESSION['foto'];?>" alt="image">
                <?php }elseif($_SESSION['level']=='Admin Bidang') {?>
                  
                  <img src="../images/adminbidang/<?= $_SESSION['foto'];?>" alt="image">
                <?php }else{?>

                  <img src="../images/kabid/<?= $_SESSION['foto'];?>" alt="image">
                <?php } ?>
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black"><?= $_SESSION['nama']?></p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <?php if($_SESSION['level']=='Administrator'){?>
                  <a class="dropdown-item" href="?page=page/admin/edit&id=<?= $_SESSION['id'];?>&data=Update Profil">
                  <i class="mdi mdi-account-convert me-2 text-success"></i> Update Profil </a>
                <?php }elseif($_SESSION['level']=='Admin Bidang') {?>
                  <a class="dropdown-item" href="?page=page/adminbidang/edit&id=<?= $_SESSION['id'];?>&data=Update Profil">
                  <i class="mdi mdi-account-convert me-2 text-success"></i> Update Profil </a>
                <?php }else{?>

                    <a class="dropdown-item" href="?page=page/kabid/edit&id=<?= $_SESSION['id'];?>&data=Update Profil">
                  <i class="mdi mdi-account-convert me-2 text-success"></i> Update Profil </a>
                <?php } ?>
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="?page=page/logout">
                  <i class="mdi mdi-logout me-2 text-primary"></i> Logout </a>
              </div>
            </li>
            <li class="nav-item d-none d-lg-block full-screen-link">
              <a class="nav-link">
                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
              </a>
            </li>
            
            
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>