<?php $catKelas = $kelas->result()[0];
	$catTahun = $tahun_aktif->result()[0];
	if (!empty($wali_kelas->result())){
		$catWali = $wali_kelas->result();
		$id_wali_kelas = $catWali[0]->id_tenkepen;
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
				        <h2>Daftar Siswa Kelas <?php echo $catKelas->nama_kelas ?></h2>
				        <div class="clearfix"></div>
				      </div>
				      <div class="x_content">
				        <br />
				        <!-- tambah tahun -->
				        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal-tambah"><i class="fa fa-plus"></i> Tambah Siswa</button>
				        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#wali-kelas"> <i class="fa fa-user"> Wali Kelas</i></button>

				        <div class="modal fade" id="wali-kelas" tabindex="-1" role="dialog" aria-hidden="true">
				        	<div class="modal-dialog modal-sm">
				        		<div class="modal-content">
				        			<div class="modal-header">
				        				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
				        				<h4 class="modal-title" id="myModalLabel">Wali Kelas</h4>
				        			</div>
				        			<form method="post" action="<?php echo base_url('admin/wali-kelas') ?>">
				        				<div class="modal-body">
				        					<span class="form-horizontal form-label-left form">
				        						<label>Daftar Guru</label>
				        						<select name="id_guru" required="" class="form-control">
				        							<option value=""></option>
				        							<?php foreach ($guru->result() as $catGuru): ?>
				        								<option value="<?php echo $catGuru->id_tenkepen ?>" <?php if(!empty($id_wali_kelas) && $id_wali_kelas == $catGuru->id_tenkepen){ echo "selected"; } ?>><?php echo $catGuru->nama_lengkap ?></option>
				        							<?php endforeach ?>
				        						</select>
				        					</span>
				        				</div>
				        				<div class="modal-footer">
				        					<input type="hidden" name="id_kelas" value="<?php echo $catKelas->id_kelas ?>">
				        					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											<?php if (!empty($id_wali_kelas)){ ?>
												<input type="submit" class="btn btn-primary" name="edit" value="Ganti">
											<?php } else { ?>
												<input type="submit" class="btn btn-primary" name="add" value="Tambah">
											<?php } ?>
				        				</div>
				        			</form>
				        		</div>
				        	</div>
				        </div>

		                  <div class="modal fade modal-tambah" tabindex="-1" role="dialog" aria-hidden="true">
		                    <div class="modal-dialog modal-lg">
		                      <div class="modal-content">
		                        <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
		                          </button>
		                          <h4 class="modal-title" id="myModalLabel">Tambah Siswa</h4>
		                        </div>
		                        <div class="modal-body">
		                          <form action="add_siswa" method="post" class="form-horizontal form-label-left">
		                          	<h2>Daftar Siswa</h2>
		                          	<table id="datatable" class="table table-striped table-bordered nowrap" cellspacing="0">
		                          		<thead>
		                          			<tr>
		                          				<th>#</th>
							        			<th>NIS/NISN</th>
							        			<th>Nama Siswa</th>
							        			<th>Asal</th>
							        			<th class="col-md-3">Aksi</th>
		                          			</tr>
		                          		</thead>
		                          		<tbody>
		                          			<?php 
		                          			$n = 0;
		                          			foreach ($siswa_all->result() as $catAll){
		                          			if ($catAll->tahun_masuk == $catTahun->tahun_akademik) { 
		                          				$n++;?>
		                          				<tr>
		                          					<td><?php echo $n ?></td>
		                          					<td><b><?php echo $catAll->NIS."/".$catAll->NISN ?></b></td>
							        				<td><?php echo $catAll->nama_siswa ?></td>
							        				<td><?php echo $catAll->kecamatan.", ".$catAll->kota ?></td>
							        				<td><a class="btn btn-round btn-sm btn-primary" href="<?php echo base_url("admin/".$catKelas->id_kelas."/tambah-siswa/".$catAll->id_siswa) ?>"><i class="fa fa-plus"></i></a></td>
		                          				</tr>
		                          			<?php }} ?>
		                          		</tbody>
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
				        			<th>#</th>
				        			<th>NIS/NISN</th>
				        			<th>Nama Siswa</th>
				        			<th>Asal</th>
				        			<th class="col-md-3">Aksi</th>
				        		</tr>
				        	</thead>
				        	<tbody>
				        		<?php
				        		$catList = $kelas_siswa->result();
				        		for ($i=0; $i < $kelas_siswa->num_rows(); $i++) { 
				        			$catSiswa = $siswa[$i]->result()[0]; ?>
				        			<tr>
				        				<td><?php echo $i+1; ?></td>
				        				<td><b><?php echo $catSiswa->NIS."/".$catSiswa->NISN ?></b></td>
				        				<td><?php echo $catSiswa->nama_siswa ?></td>
				        				<td><?php echo $catSiswa->kecamatan.", ".$catSiswa->kota ?></td>
				        				<td align="center" class="col-md-1">
				        					<a class="btn btn-round btn-sm btn-danger" href="<?php echo base_url("admin/".$catKelas->id_kelas."/delete-siswa/".$catAll->id_siswa) ?>"><i class="fa fa-trash"></i></a>
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
