
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
				        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal-tambah"><i class="fa fa-plus"></i> Tambah <?php echo $title ?></button>

		                  <div class="modal fade modal-tambah" tabindex="-1" role="dialog" aria-hidden="true">
		                    <div class="modal-dialog modal-lg">
		                      <div class="modal-content">
		                        <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
		                          </button>
		                          <h4 class="modal-title" id="myModalLabel">Tambah <?php echo $title ?></h4>
		                        </div>
		                        <div class="modal-body">
		                          <form action="add_ekskul" method="post">
		                          	<table class="table">
		                          		<tr>
		                          			<td colspan="2"><?php echo $title ?></td>
		                          		</tr>
		                          		<tr>
		                          			<td>
		                          			  <div class="col-md-12 col-sm-12 col-xs-12 form-group">
							                    <input type="text" placeholder="Nama Ekskul" class="form-control" name="nama_ekskul" required="">
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
				        					<form action="update_ekskul" method="post">
				        						<input type="hidden" name="id_ekskul" value="<?php echo $catEkskul->id_ekskul ?>">
				        						<span class="input-group-btn">
				        							<?php if ($catEkskul->status == 0){ ?>
				        								<button type="submit" name="aktifkan" class="btn btn-success" value="aktifkan"><i class="fa fa-check"></i> aktifkan</button>
				        							<?php } else {?>
				        								<button type="submit" name="tutup" class="btn btn-danger" value="tutup"><i class="fa fa-close"></i> tutup</button>
				        							<?php } ?>
				        							
					        						<button type="button" name="" class="btn btn-primary" value="edit" data-toggle="modal" data-target=".modal-edit-<?php echo $catEkskul->id_ekskul?>"><i class="fa fa-pencil"></i> edit</button>
					        						<button type="submit" name="delete" class="btn btn-danger" value="delete"><i class="fa fa-trash"></i> delete</button>
					        					</span>
					        				</form>
				        					<div class="modal fade modal-edit-<?php echo $catEkskul->id_ekskul?>" tabindex="-1" role="dialog" aria-hidden="true">
							                    <div class="modal-dialog modal-lg">
							                      <div class="modal-content">
							                        <div class="modal-header">
							                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
							                          </button>
							                          <h4 class="modal-title" id="myModalLabel">Edit <?php echo $title ?></h4>
							                        </div>
							                        <div class="modal-body">
							                          <form action="edit_ekskul" method="post">
							                          	<table class="table">
							                          		<tr>
							                          			<td colspan="2"><?php echo $title ?></td>
							                          		</tr>
							                          		<tr>
							                          			<td>
							                          			  <div class="col-md-12 col-sm-12 col-xs-12 form-group">
												                    <input type="text" placeholder="Nama Ekskul" class="form-control" name="nama_ekskul" required="" value="<?php echo $catEkskul->nama_ekskul ?>">
												                  </div>
							                          			</td>
							                          		</tr>
							                          	</table>
							                        </div>
							                        <div class="modal-footer">
							                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							                          <input type="submit" class="btn btn-primary" value="Edit">
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