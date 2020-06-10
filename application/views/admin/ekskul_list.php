
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row top_tiles">
          	<div class="col-xs-12">
          		<div class="x_panel">
          			<div class="x_title">
          				<h2><?= strtoupper($title) ?></h2>
          				<div class="clearfix"></div>
          			</div>
          		</div>
          	</div>
              
            </div>
          <!-- /top tiles -->

          <div class="row">
            <div class="col-md-12 col-xs-12">
					<div class="x_panel">
				      <div class="x_title">
				        <h2>Daftar <?php echo $title ?></h2>
				        <div class="clearfix"></div>
				      </div>
				      <div class="x_content">
				        <br />
				        <!-- tambah tahun -->
                  		 <!-- tutup tahun -->
				        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
				        	<thead>
				        		<tr>
				        			<th>Nama Ekskul</th>
				        			<th>Status</th>
				        			<th class="col-md-3">Aksi</th>
				        		</tr>
				        	</thead>
				        	<tbody>
				        		<?php foreach ($ekskul->result() as $catEkskul) { ?>
				        			<tr>
				        				<td><?php echo $catEkskul->nama_ekskul ?></td>
				        				<td>
				        					<?php 
				        						if ($catEkskul->status == 0) {
				        							echo "Tidak Aktif";
				        						} elseif ($catEkskul->status == 1) {
				        							echo "Aktif";
				        						}
				        					 ?>
				        				</td>
				        				<td align="center">
				        					<a href="<?php echo base_url('admin/'.$catEkskul->id_ekskul.'/ekstrakulikuler') ?>" class="btn btn-info"><i class="fa fa-eye"> lihat data</i></a>
				        				</td>
				        			</tr>
				        		<?php } ?>
				        	</tbody>
				        </table>
				      </div>
				    </div>
				</div>
          </div>
          <br />
        </div>		
</body>
</html>