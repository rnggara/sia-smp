<?php $catGuru = $wali_kelas->result();
      $catEkskul = $ekstrakulikuler->result();
      $catAmpu = $guru_ampu->result(); ?>
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <h3>Menu Guru</h3>
    <ul class="nav side-menu">
      <li><a href="<?php echo base_url('guru') ?>"><i class="fa fa-home"></i> Beranda</a>
      </li>
      <?php if (!empty($catGuru)): ?>
        <li><a href="<?php echo base_url('guru/kelas') ?>"><i class="fa fa-users"></i> Kelas Wali</a>
        </li>
      <?php endif ?>
      <?php if (!empty($catEkskul)): ?>
        <li><a href="<?php echo base_url('guru/ekskul') ?>"><i class="fa fa-plus-square"></i> Ekstrakulikuler</a>
        </li>
      <?php endif ?>
      <?php if (!empty($catAmpu)): ?>
        <li><a href="<?php echo base_url('guru/mata-pelajaran') ?>"><i class="fa fa-book"></i> Mata Pelajaran Diampu</a>
        </li>
      <?php endif ?>
      <li><a href="<?php echo base_url('logout') ?>"><i class="fa fa-power-off"></i> Keluar</a></li>
    </ul>
  </div>