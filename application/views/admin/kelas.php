
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
				        <h2>Daftar Kelas</h2>
				        <div class="clearfix"></div>
				      </div>
				      <div class="x_content">
				        <br />
				        <!-- tambah tahun -->
				        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal-tambah"><i class="fa fa-plus"></i> Tambah Kelas</button>

		                  <div class="modal fade modal-tambah" tabindex="-1" role="dialog" aria-hidden="true">
		                    <div class="modal-dialog modal-lg">
		                      <div class="modal-content">
		                        <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
		                          </button>
		                          <h4 class="modal-title" id="myModalLabel">Tambah Kelas</h4>
		                        </div>
		                        <div class="modal-body">
		                          <form action="add_kelas" method="post">
		                          	<table class="table">
		                          		<tr>
		                          			<td colspan="2">Kelas</td>
		                          		</tr>
		                          		<tr>
		                          			<td>
		                          			  <div class="col-md-12 col-sm-12 col-xs-12 form-group">
							                    <input type="text" placeholder="Contoh: VII A" class="form-control" name="nama_kelas" required="">
							                  </div>
		                          			</td>
		                          			<td>
		                          			  <select class="form-control" required="" name="tingkat">
					                            <option value="">Pilih tingkat</option>
					                            <option value="1">VII</option>
					                            <option value="2">VIII</option>
					                            <option value="3">IX</option>
					                          </select>
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
				        			<th>Nama Kelas</th>
				        			<th>Tingkat</th>
				        			<th class="col-md-3">Aksi</th>
				        		</tr>
				        	</thead>
				        	<tbody>
				        		<?php foreach ($kelas->result() as $catKelas) { ?>
				        			<tr>
				        				<td><?php echo $catKelas->nama_kelas ?></td>
				        				<td>
				        					<?php 
				        						if ($catKelas->tingkat == 1) {
				        							echo "VII";
				        						} elseif ($catKelas->tingkat == 2) {
				        							echo "VIII";
				        						} elseif ($catKelas->tingkat == 3) {
				        							echo "IX";
				        						}
				        					 ?>
				        				</td>
				        				<td align="center">
				        					<form action="update_kelas" method="post">
				        						<span class="input-group-btn">
					        						<button type="button" name="" class="btn btn-primary" value="edit" data-toggle="modal" data-target=".modal-edit-<?php echo $catKelas->id_kelas?>"><i class="fa fa-pencil"></i> edit</button>
					        						<a href="kelas/delete/<?php echo $catKelas->id_kelas ?>" class="btn btn-danger" name="active"><i class="fa fa-trash"></i> delete</a>
					        					</span>
					        				</form>
				        					<div class="modal fade modal-edit-<?php echo $catKelas->id_kelas?>" tabindex="-1" role="dialog" aria-hidden="true">
							                    <div class="modal-dialog modal-lg">
							                      <div class="modal-content">
							                        <div class="modal-header">
							                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
							                          </button>
							                          <h4 class="modal-title" id="myModalLabel">Edit Kelas</h4>
							                        </div>
							                        <div class="modal-body">
							                          <form action="add_tahun" method="post">
							                          	<table class="table">
							                          		<tr>
							                          			<td colspan="2">Kelas</td>
							                          		</tr>
							                          		<tr>
							                          			<td>
							                          			  <div class="col-md-12 col-sm-12 col-xs-12 form-group">
												                    <input type="text" placeholder="Contoh: VII A" class="form-control" name="nama_kelas" value="<?php echo $catKelas->nama_kelas ?>">
												                  </div>
							                          			</td>
							                          			<td>
							                          			  <select class="form-control" required="" name="tingkat">
										                            <option value=""></option>
										                            <option value="1" <?php if($catKelas->tingkat==1){echo "selected";} ?>>VII</option>
										                            <option value="2" <?php if($catKelas->tingkat==2){echo "selected";} ?>>VIII</option>
										                            <option value="3" <?php if($catKelas->tingkat==3){echo "selected";} ?>>IX</option>
										                          </select>
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