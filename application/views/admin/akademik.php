<?php 
function format_date($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

function format_sql($tanggal){
	$pecahkan = explode('/', $tanggal);

	return $pecahkan[2].'-'.$pecahkan[0].'-'.$pecahkan[1];
}

if (!empty($tahun_aktif)) {
	$catTahunAktif = $tahun_aktif->result();
}

 ?>
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
				        <h2>Daftar Tahun Akademik</h2>
				        <div class="clearfix"></div>
				      </div>
				      <div class="x_content">
				        <br />
				        <!-- tambah tahun -->
				        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal-tambah"><i class="fa fa-plus"></i> Tambah Tahun Akademik</button>

		                  <div class="modal fade modal-tambah" tabindex="-1" role="dialog" aria-hidden="true">
		                    <div class="modal-dialog modal-lg">
		                      <div class="modal-content">
		                        <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
		                          </button>
		                          <h4 class="modal-title" id="myModalLabel">Tambah Tahun Akademik</h4>
		                        </div>
		                        <div class="modal-body">
		                          <form action="add_tahun" method="post">
		                          	<table class="table">
		                          		<tr>
		                          			<td colspan="2">Tahun Akademik</td>
		                          			<td>Tanggal Mulai</td>
		                          			<td>Tanggal Berakhir</td>
		                          		</tr>
		                          		<tr>
		                          			<td>
		                          			  <div class="col-md-12 col-sm-12 col-xs-12 form-group">
							                    <input type="text" placeholder="Contoh: 2020" class="form-control" name="tahun_akademik">
							                  </div>
		                          			</td>
		                          			<td>
		                          			  <select class="form-control" required="" name="tahun">
					                            <option value=""></option>
					                            <option value="1">Ganjil</option>
					                            <option value="2">Genap</option>
					                          </select>
		                          			</td>
		                          			<td>
		                          			  <div class="col-md-11 xdisplay_inputx form-group has-feedback">
				                                <input type="date" class="form-control "  placeholder="First Name" aria-describedby="inputSuccess2Status4" name="tgl_mulai">
				                                <!-- <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
				                                <span id="inputSuccess2Status4" class="sr-only">(success)</span> -->
				                              </div>
		                          			</td>
		                          			<td>
		                          			  <div class="col-md-11 xdisplay_inputx form-group has-feedback">
				                                <input type="date" class="form-control "  placeholder="First Name" aria-describedby="inputSuccess2Status5" name="tgl_selesai">
				                                <!-- <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
				                                <span id="inputSuccess2Status5" class="sr-only">(success)</span> -->
				                              </div>
		                          			</td>
		                          		</tr>
		                          	</table>
		                        </div>
		                        <div class="modal-footer">
		                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		                          <input type="submit" class="btn btn-primary" value="Tambah">
		                        </div>
		                        </form>
		                      </div>
		                    </div>
                  		</div>
                  		 <!-- tutup tahun -->
				        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
				        	<thead>
				        		<tr>
				        			<th>Tahun Akademik</th>
				        			<th>Mulai - Berakhir</th>
				        			<th>Status</th>
				        			<th>Aksi</th>
				        		</tr>
				        	</thead>
				        	<tbody>
				        		<?php foreach ($tahun_akademik->result() as $catAkademik) { ?>
				        			<tr>
				        				<td><?php echo $catAkademik->tahun_akademik ?>/<?php if($catAkademik->tahun == 1){echo"Ganjil";} else{echo"Genap";} ?></td>
				        				<td>
				        					<?php 
				        						echo format_date($catAkademik->tgl_mulai)." s.d ".format_date($catAkademik->tgl_selesai);
				        					 ?>
				        				</td>
				        				<td>
				        					<?php if ($catAkademik->status == 0){ ?>
				        						<code>Tidak Aktif</code>
				        					<?php } else{?>
				        						<code>Aktif</code>
				        					<?php } ?>
				        				</td>
				        				<td>
				        					<form action="update_akademik" method="post">
				        						<span class="input-group-btn">
				        							<input type="hidden" name="id_aktif" value="<?php echo $catAkademik->id_akademik ?>">
					        						<?php if (!empty($catTahunAktif)) {
					        							if ($catTahunAktif[0]->status == $catAkademik->status) {?>
						        							<button type="submit" class="btn btn-danger" name="close"><i class="fa fa-close"></i> Tutup</button>
						        						<?php } else {?>
						        							<button type="submit" class="btn btn-success" name="active"><i class="fa fa-check"></i> Aktifkan</button>
					        						<?php }} else {?>
					        							<button type="submit" class="btn btn-success" name="active"><i class="fa fa-check"></i> Aktifkan</button>
					        						<?php } ?>
					        						<button type="button" name="" class="btn btn-primary" value="edit" data-toggle="modal" data-target=".modal-edit-<?php echo $catAkademik->id_akademik?>"><i class="fa fa-pencil"></i> edit</button>
					        					</span>
					        				</form>
				        					<div class="modal fade modal-edit-<?php echo $catAkademik->id_akademik?>" tabindex="-1" role="dialog" aria-hidden="true">
							                    <div class="modal-dialog modal-lg">
							                      <div class="modal-content">
							                        <div class="modal-header">
							                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
							                          </button>
							                          <h4 class="modal-title" id="myModalLabel">Edit Tahun Akademik</h4>
							                        </div>
							                        <div class="modal-body">
							                          <form action="add_tahun" method="post">
							                          	<table class="table">
							                          		<tr>
							                          			<td colspan="2">Tahun Akademik</td>
							                          			<td>Tanggal Mulai</td>
							                          			<td>Tanggal Berakhir</td>
							                          		</tr>
							                          		<tr>
							                          			<td>
							                          			  <div class="col-md-12 col-sm-12 col-xs-12 form-group">
												                    <input type="text" placeholder="Contoh: 2020" class="form-control" name="tahun_akademik" value="<?php echo $catAkademik->tahun_akademik ?>">
												                  </div>
							                          			</td>
							                          			<td>
							                          			  <select class="form-control" required="" name="tahun">
										                            <option value=""></option>
										                            <option value="1" <?php if($catAkademik->tahun==1){echo "selected";} ?>>Ganjil</option>
										                            <option value="2" <?php if($catAkademik->tahun==2){echo "selected";} ?>>Genap</option>
										                          </select>
							                          			</td>
							                          			<td>
							                          			  <div class="col-md-11 xdisplay_inputx form-group has-feedback">
									                                <input type="date" class="form-control "  placeholder="First Name" aria-describedby="inputSuccess2Status4" name="tgl_mulai" value="<?php echo $catAkademik->tgl_mulai ?>">
									                              </div>
							                          			</td>
							                          			<td>
							                          			  <div class="col-md-11 xdisplay_inputx form-group has-feedback">
									                                <input type="date" class="form-control "  placeholder="First Name" aria-describedby="inputSuccess2Status5" name="tgl_selesai" value="<?php echo $catAkademik->tgl_selesai ?>">
									                              </div>
							                          			</td>
							                          		</tr>
							                          	</table>
							                        </div>
							                        <div class="modal-footer">
							                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							                          <input type="submit" class="btn btn-primary" value="Tambah">
							                        </div>
							                        </form>
							                      </div>
							                    </div>
					                  		</div>
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