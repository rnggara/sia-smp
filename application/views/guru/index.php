<?php $catIdentitas = $identitas->result()[0];
      $catGuru = $guru->result()[0];
      if ($catGuru->jenis_kelamin == 1) {
          $jk = "Bapak. ";
      } else {
        $jk = "Ibuk. ";
      }
      ?>
<div class="right_col" role="main">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    </div>
      <div class="x_panel">
        <div class="x_title">
          <h1 class="text-center">Selamat datang di <br> <?php echo $catIdentitas->nama ?></h1>
          <h3 class="text-center"><?= $jk.$catGuru->nama_lengkap ?></h3>
          <div class="filter">
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
  </div>
</div>