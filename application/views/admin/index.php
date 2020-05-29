<?php $catIdentitas = $identitas->result()[0]; ?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"></div>
                  <div class="count">179</div>
                  <h3>Tahun Akademik</h3>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"></div>
                  <div class="count">179</div>
                  <h3>Staff dan Guru</h3>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"></div>
                  <div class="count">179</div>
                  <h3>Siswa</h3>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"></div>
                  <div class="count">179</div>
                  <h3>Alumni</h3>
                </div>
              </div>
            </div>
          <!-- /top tiles -->

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
            </div>
              <div class="x_panel">
                <div class="x_title">
                  <h1 class="text-center">Selamat datang di <br> <?php echo $catIdentitas->nama ?></h1>
                  <div class="filter">
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
          </div>
          <br />
        </div>
</body>
</html>