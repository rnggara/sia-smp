
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
				        <h2>Daftar Mata Pelajaran</h2>
				        <div class="clearfix"></div>
				      </div>
				      <div class="x_content">
				        <br />
				        <div class="col-xs-1">
	                      <!-- Nav tabs -->
	                      <ul class="nav nav-tabs tabs-left">
	                        <li class="active"><a href="#vii" data-toggle="tab">VII</a>
	                        </li>
	                        <li><a href="#viii" data-toggle="tab">VIII</a>
	                        </li>
	                        <li><a href="#ix" data-toggle="tab">IX</a>
	                        </li>
	                      </ul>
	                    </div>
	                    <div class="col-xs-11">
                      <!-- Tab panes -->
	                      <div class="tab-content">
	                        <div class="tab-pane active" id="vii">
	                           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah-vii"><i class="fa fa-plus"></i> Tambah Mata Pelajaran Tingkat VII</button>
	                           <div class="modal fade" id="modal-tambah-vii" tabindex="-1" role="dialog" aria-hidden="true">
			                    <div class="modal-dialog modal-lg">
			                      <div class="modal-content">
			                        <div class="modal-header">
			                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
			                          </button>
			                          <h4 class="modal-title" id="myModalLabel">Tambah Mata Pelajaran</h4>
			                        </div>
			                        <form action="add_mapel" method="post">
			                        	<div class="modal-body">
				                          	<table class="table">
				                          		<tr>
				                          			<td colspan="3">Mata Pelajaran</td>
				                          		</tr>
				                          		<tr>
				                          			<td>
				                          			  <div class="col-md-12 col-sm-12 col-xs-12 form-group">
									                    <input type="text" placeholder="Contoh: Matematika" class="form-control" name="nama_mapel" required="">
									                  </div>
				                          			</td>
				                          			<td>
				                          			  <select class="form-control" required="" name="tahun">
							                            <option value="">Pilih Tahun Akademik</option>
							                            <option value="1">Ganjil</option>
							                            <option value="2">Genap</option>
							                          </select>
				                          			</td>
				                          		</tr>
				                          	</table>
				                        </div>
				                        <div class="modal-footer">
				                          <input type="hidden" name="tingkat" value="1">
				                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				                          <input type="submit" class="btn btn-primary" value="Tambah">
				                        </div>
			                        </form>
			                      </div>
			                    </div>
	                  		</div>
		                  		<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
					        	<thead>
					        		<tr>
					        			<th>Nama Mata Pelajaran</th>
					        			<th>Tahun Akademik</th>
					        			<th>Aksi</th>
					        		</tr>
					        	</thead>
					        	<tbody>
					        		<?php foreach ($mapel_vii->result() as $catMapel) { ?>
					        			<tr>
					        				<td><?php echo $catMapel->nama_mapel ?></td>
					        				<td>
					        					<?php 
					        						if ($catMapel->tahun_akademik == 1) {
					        							echo "Ganjil";
					        						} elseif ($catMapel->tahun_akademik == 2) {
					        							echo "Genap";
					        						}
					        					 ?>
					        				</td>
					        				<td align="center">
					        					<form action="update_kelas" method="post">
					        						<span class="input-group-btn">
						        						<button type="button" name="" class="btn btn-primary" value="edit" data-toggle="modal" data-target=".modal-edit-<?php echo $catMapel->id_mapel?>"><i class="fa fa-pencil"></i> edit</button>
						        						<a href="mata-pelajaran/delete/<?php echo $catMapel->id_mapel ?>" class="btn btn-danger" name="active"><i class="fa fa-trash"></i> delete</a>
						        					</span>
						        				</form>
					        					<div class="modal fade modal-edit-<?php echo $catMapel->id_mapel?>" tabindex="-1" role="dialog" aria-hidden="true">
								                    <div class="modal-dialog modal-lg">
								                      <div class="modal-content">
								                        <div class="modal-header">
								                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
								                          </button>
								                          <h4 class="modal-title" id="myModalLabel">Edit Mata Pelajaran</h4>
								                        </div>
								                        <div class="modal-body">
								                          <form action="add_tahun" method="post">
								                          	<table class="table">
								                          		<tr>
								                          			<td colspan="2">Mata Pelajaran</td>
								                          		</tr>
								                          		<tr>
								                          			<td>
								                          			  <div class="col-md-12 col-sm-12 col-xs-12 form-group">
													                    <input type="text" placeholder="Contoh: Matematika" class="form-control" name="nama_mapel" value="<?php echo $catMapel->nama_mapel ?>">
													                  </div>
								                          			</td>
								                          			<td>
								                          			  <select class="form-control" required="" name="tahun">
											                            <option value=""></option>
											                            <option value="1" <?php if($catMapel->tingkat==1){echo "selected";} ?>>Ganjil</option>
											                            <option value="2" <?php if($catMapel->tingkat==2){echo "selected";} ?>>Genap</option>
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
	                        <div class="tab-pane" id="viii">
	                        	<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal-tambah-vii"><i class="fa fa-plus"></i> Tambah Mata Pelajaran Tingkat VIII</button>
	                           <div class="modal fade modal-tambah-vii" tabindex="-1" role="dialog" aria-hidden="true">
			                    <div class="modal-dialog modal-lg">
			                      <div class="modal-content">
			                        <div class="modal-header">
			                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
			                          </button>
			                          <h4 class="modal-title" id="myModalLabel">Tambah Mata Pelajaran</h4>
			                        </div>
			                        <div class="modal-body">
			                          <form action="add_mapel" method="post">
			                          	<table class="table">
			                          		<tr>
			                          			<td colspan="3">Mata Pelajaran</td>
			                          		</tr>
			                          		<tr>
			                          			<td>
			                          			  <div class="col-md-12 col-sm-12 col-xs-12 form-group">
								                    <input type="text" placeholder="Contoh: Matematika" class="form-control" name="nama_mapel" required="">
								                  </div>
			                          			</td>
			                          			<td>
			                          			  <select class="form-control" required="" name="tahun">
						                            <option value="">Pilih Tahun Akademik</option>
						                            <option value="1">Ganjil</option>
						                            <option value="2">Genap</option>
						                          </select>
			                          			</td>
			                          		</tr>
			                          	</table>
			                        </div>
			                        <div class="modal-footer">
			                          <input type="hidden" name="tingkat" value="2">
			                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			                          <input type="submit" class="btn btn-primary" value="Tambah">
			                        </div>
			                        </form>
			                      </div>
			                    </div>
	                  		</div>
		                  		<table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
					        	<thead>
					        		<tr>
					        			<th>Nama Mata Pelajaran</th>
					        			<th>Tahun Akademik</th>
					        			<th>Aksi</th>
					        		</tr>
					        	</thead>
					        	<tbody>
					        		<?php foreach ($mapel_viii->result() as $catMapel) { ?>
					        			<tr>
					        				<td><?php echo $catMapel->nama_mapel ?></td>
					        				<td>
					        					<?php 
					        						if ($catMapel->tahun_akademik == 1) {
					        							echo "Ganjil";
					        						} elseif ($catMapel->tahun_akademik == 2) {
					        							echo "Genap";
					        						}
					        					 ?>
					        				</td>
					        				<td align="center">
					        					<form action="update_kelas" method="post">
					        						<span class="input-group-btn">
						        						<button type="button" name="" class="btn btn-primary" value="edit" data-toggle="modal" data-target=".modal-edit-<?php echo $catMapel->id_mapel?>"><i class="fa fa-pencil"></i> edit</button>
						        						<a href="mata-pelajaran/delete/<?php echo $catMapel->id_mapel ?>" class="btn btn-danger" name="active"><i class="fa fa-trash"></i> delete</a>
						        					</span>
						        				</form>
					        					<div class="modal fade modal-edit-<?php echo $catMapel->id_mapel?>" tabindex="-1" role="dialog" aria-hidden="true">
								                    <div class="modal-dialog modal-lg">
								                      <div class="modal-content">
								                        <div class="modal-header">
								                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
								                          </button>
								                          <h4 class="modal-title" id="myModalLabel">Edit Mata Pelajaran</h4>
								                        </div>
								                        <div class="modal-body">
								                          <form action="add_tahun" method="post">
								                          	<table class="table">
								                          		<tr>
								                          			<td colspan="2">Mata Pelajaran</td>
								                          		</tr>
								                          		<tr>
								                          			<td>
								                          			  <div class="col-md-12 col-sm-12 col-xs-12 form-group">
													                    <input type="text" placeholder="Contoh: Matematika" class="form-control" name="nama_mapel" value="<?php echo $catMapel->nama_mapel ?>">
													                  </div>
								                          			</td>
								                          			<td>
								                          			  <select class="form-control" required="" name="tahun">
											                            <option value=""></option>
											                            <option value="1" <?php if($catMapel->tingkat==1){echo "selected";} ?>>Ganjil</option>
											                            <option value="2" <?php if($catMapel->tingkat==2){echo "selected";} ?>>Genap</option>
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
	                        <div class="tab-pane" id="ix">
	                        	<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal-tambah-vii"><i class="fa fa-plus"></i> Tambah Mata Pelajaran Tingkat IX</button>
	                           <div class="modal fade modal-tambah-vii" tabindex="-1" role="dialog" aria-hidden="true">
			                    <div class="modal-dialog modal-lg">
			                      <div class="modal-content">
			                        <div class="modal-header">
			                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
			                          </button>
			                          <h4 class="modal-title" id="myModalLabel">Tambah Mata Pelajaran</h4>
			                        </div>
			                        <div class="modal-body">
			                          <form action="add_mapel" method="post">
			                          	<table class="table">
			                          		<tr>
			                          			<td colspan="3">Mata Pelajaran</td>
			                          		</tr>
			                          		<tr>
			                          			<td>
			                          			  <div class="col-md-12 col-sm-12 col-xs-12 form-group">
								                    <input type="text" placeholder="Contoh: Matematika" class="form-control" name="nama_mapel" required="">
								                  </div>
			                          			</td>
			                          			<td>
			                          			  <select class="form-control" required="" name="tahun">
						                            <option value="">Pilih Tahun Akademik</option>
						                            <option value="1">Ganjil</option>
						                            <option value="2">Genap</option>
						                          </select>
			                          			</td>
			                          		</tr>
			                          	</table>
			                        </div>
			                        <div class="modal-footer">
			                          <input type="hidden" name="tingkat" value="3">
			                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			                          <input type="submit" class="btn btn-primary" value="Tambah">
			                        </div>
			                        </form>
			                      </div>
			                    </div>
	                  		</div>
		                  		<table id="datatable-fixed-header" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
					        	<thead>
					        		<tr>
					        			<th>Nama Mata Pelajaran</th>
					        			<th>Tahun Akademik</th>
					        			<th class="col-md-3">Aksi</th>
					        		</tr>
					        	</thead>
					        	<tbody>
					        		<?php foreach ($mapel_ix->result() as $catMapel) { ?>
					        			<tr>
					        				<td><?php echo $catMapel->nama_mapel ?></td>
					        				<td>
					        					<?php 
					        						if ($catMapel->tahun_akademik == 1) {
					        							echo "Ganjil";
					        						} elseif ($catMapel->tahun_akademik == 2) {
					        							echo "Genap";
					        						}
					        					 ?>
					        				</td>
					        				<td align="center">
					        					<form action="update_kelas" method="post">
					        						<span class="input-group-btn">
						        						<button type="button" name="" class="btn btn-primary" value="edit" data-toggle="modal" data-target=".modal-edit-<?php echo $catMapel->id_mapel?>"><i class="fa fa-pencil"></i> edit</button>
						        						<a href="mata-pelajaran/delete/<?php echo $catMapel->id_mapel ?>" class="btn btn-danger" name="active"><i class="fa fa-trash"></i> delete</a>
						        					</span>
						        				</form>
					        					<div class="modal fade modal-edit-<?php echo $catMapel->id_mapel?>" tabindex="-1" role="dialog" aria-hidden="true">
								                    <div class="modal-dialog modal-lg">
								                      <div class="modal-content">
								                        <div class="modal-header">
								                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
								                          </button>
								                          <h4 class="modal-title" id="myModalLabel">Edit Mata Pelajaran</h4>
								                        </div>
								                        <div class="modal-body">
								                          <form action="add_tahun" method="post">
								                          	<table class="table">
								                          		<tr>
								                          			<td colspan="2">Mata Pelajaran</td>
								                          		</tr>
								                          		<tr>
								                          			<td>
								                          			  <div class="col-md-12 col-sm-12 col-xs-12 form-group">
													                    <input type="text" placeholder="Contoh: Matematika" class="form-control" name="nama_mapel" value="<?php echo $catMapel->nama_mapel ?>">
													                  </div>
								                          			</td>
								                          			<td>
								                          			  <select class="form-control" required="" name="tahun">
											                            <option value=""></option>
											                            <option value="1" <?php if($catMapel->tingkat==1){echo "selected";} ?>>Ganjil</option>
											                            <option value="2" <?php if($catMapel->tingkat==2){echo "selected";} ?>>Genap</option>
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
				    </div>
				</div>
          </div>
          <br />
        </div>		
</body>
</html>