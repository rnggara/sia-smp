<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <h3>Menu Siswa</h3>
    <ul class="nav side-menu">
      <li><a href="<?php echo base_url('admin') ?>"><i class="fa fa-home"></i> Home</a>
      </li>
      <li><a><i class="fa fa-edit"></i> Data Pengguna <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="<?php echo base_url('admin/staff') ?>">Staff</a></li>
          <li><a href="<?php echo base_url('admin/guru') ?>">Guru</a></li>
          <li><a href="<?php echo base_url('admin/siswa') ?>">Siswa</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-desktop"></i> Data Master <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="<?php echo base_url('admin/identitas') ?>">Identitas Sekolah</a></li>
          <li><a href="<?php echo base_url('admin/tahun_akademik') ?>">Tahun Akademik</a></li>
          <li><a href="<?php echo base_url('admin/kelas') ?>">Kelas</a></li>
          <li><a href="<?php echo base_url('admin/mata-pelajaran') ?>">Mata Pelajaran</a></li>
          <li><a href="<?php echo base_url('admin/ekstrakulikuler') ?>">Ekstrakulikuler</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-book"></i> Data Akademik <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="<?php echo base_url('admin/daftar-kelas') ?>">Daftar Kelas</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-book"></i> Data Non Akademik <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="<?php echo base_url('admin/daftar-ekstrakulikuler') ?>">Daftar Ekstrakulikuler</a></li>
        </ul>
      </li>
      <li><a href="logout"><i class="fa fa-power-off"></i> Logout</a></li>
    </ul>
  </div>