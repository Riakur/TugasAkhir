<nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            
            <li class="nav-item">
              <a class="nav-link" href="?page=page/home">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <?php if($_SESSION['level']=="Admin Bidang"){?>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Instansi Pengaduan</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-contact-mail menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                 
                  <li class="nav-item"> <a class="nav-link" href="?page=page/adminbidang/index&id=Admin Bidang Pengaduan">Admin Bidang Pengaduan</a></li>
                  
                </ul>
              </div>
            </li>
             <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Data Pengaduan</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-account-switch menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic1">
                <ul class="nav flex-column sub-menu">
                 
                  <li class="nav-item"> <a class="nav-link" href="?page=page/pengaduan/index&status=Sedang di Proses Oleh Admin Bidang
">Pengaduan Baru</a></li>
                  <li class="nav-item"> <a class="nav-link" href="?page=page/pengaduan/index&status=di Terima">Pengaduan diterima</a></li>
                  <li class="nav-item"> <a class="nav-link" href="?page=page/pengaduan/index&status=di Tolak">Pengaduan ditolak</a></li>
                </ul>
              </div>
            </li>
            
          <?php }elseif($_SESSION['level']=='Kepala Bidang'){?>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Data Pengaduan</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-account-switch menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic1">
                <ul class="nav flex-column sub-menu">
                 
                  <li class="nav-item"> <a class="nav-link" href="?page=page/pengaduan/index&status=Sedang di Proses Oleh Kepala Bidang">Pengaduan Baru</a></li>
                  <li class="nav-item"> <a class="nav-link" href="?page=page/pengaduan/index&status=di Terima">Pengaduan diterima</a></li>
                  <li class="nav-item"> <a class="nav-link" href="?page=page/pengaduan/index&status=di Tolak">Pengaduan ditolak</a></li>
                </ul>
              </div>
            </li>

          <?php }else{?>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Data Pengaduan</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-account-switch menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic1">
                <ul class="nav flex-column sub-menu">
                 
                  <li class="nav-item"> <a class="nav-link" href="?page=page/pengaduan/index&status=Sedang di Proses Oleh Admin">Pengaduan Baru</a></li>
                  <li class="nav-item"> <a class="nav-link" href="?page=page/pengaduan/index&status=Sedang di Proses Oleh Admin Bidang
">Diproses Admin Bidang</a></li>
                  
                  <li class="nav-item"> <a class="nav-link" href="?page=page/pengaduan/index&status=di Terima">Pengaduan diterima</a></li>
                  <li class="nav-item"> <a class="nav-link" href="?page=page/pengaduan/index&status=di Tolak">Pengaduan ditolak</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Instansi Pengaduan</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-contact-mail menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="?page=page/bidang/index&id=Bidang Pengaduan">Bidang Pengaduan</a></li>
                  <li class="nav-item"> <a class="nav-link" href="?page=page/adminbidang/index&id=Admin Bidang Pengaduan">Admin Bidang Pengaduan</a></li>
                  
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?page=page/alurpengaduan/index&data=Data Alur Pengaduan">
                <span class="menu-title">Alur Pengaduan</span>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
            </li>
           <!--  <li class="nav-item">
              <a class="nav-link" href="?page=page/artikel/index&id=Data Artikel">
                <span class="menu-title">Artikel</span>
                <i class="mdi mdi mdi-book-open menu-icon"></i>
              </a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link" href="?page=page/kritikandansaran/index">
                <span class="menu-title">Keritikan dan Saran</span>
                <i class="mdi mdi-account-network menu-icon"></i>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
                <span class="menu-title">Managemen Web</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-web menu-icon"></i>
              </a>
              <div class="collapse" id="general-pages">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="?page=page/tentangkami/index">Tentang Kami</a></li>
                  <li class="nav-item"> <a class="nav-link" href="?page=page/tentangkami/kontak"> Kontak Kami </a></li>
                  <li class="nav-item"> <a class="nav-link" href="?page=page/slider/index&id=Data Slider"> Slider </a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?page=page/admin/index&id=Data Admin">
                <span class="menu-title">Data Administrator</span>
                <i class="mdi mdi-account menu-icon"></i>
              </a>
            </li>
           <?php }?>
          </ul>
        </nav>