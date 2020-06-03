
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
		                          <form action="add_staff" method="post" class="form-horizontal form-label-left">
		                          	<h2>Identitas <?php echo $title ?></h2>
		                          	<div class="form-group col-xs-12 col-md-6">
		                          		<label>NIP *</label>
		                          		<input type="text" name="nip" class="form-control" placeholder="NIP" required="">
		                          	</div>
		                          	<div class="form-group col-xs-12 col-md-6">
		                          		<label>Nama Lengkap *</label>
		                          		<input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap" required="">
		                          	</div>
		                          	<div class="form-group col-xs-12 col-md-6">
		                          		<label>Jenis Kelamin *</label>
		                          		<select class="form-control" name="jenis_kelamin" required="">
		                          			<option value="">Pilih Jenis Kelamin</option>
		                          			<option value="1">Laki-laki</option>
		                          			<option value="2">Perempuan</option>
		                          		</select>
		                          	</div>
		                          	<div class="form-group col-xs-12 col-md-6">
		                          		<label>Tempat Lahir *</label>
		                          		<input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" required="">
		                          	</div>
		                          	<div class="form-group col-xs-12 col-md-6">
		                          		<label>Tanggal Lahir *</label>
		                          		<input type="date" name="tgl_lahir" class="form-control" required="">
		                          	</div>
		                          	<div class="form-group col-xs-12 col-md-6">
		                          		<label>Agama *</label>
		                          		<select class="form-control" name="agama" required="">
		                          			<option value="">Pilih Agama</option>
		                          			<?php foreach ($agama->result() as $catAgama): ?>
		                          				<option value="<?php echo $catAgama->id_agama ?>"><?php echo ucwords($catAgama->nama_agama) ?></option>
		                          			<?php endforeach ?>
		                          		</select>
		                          	</div>
		                          	<div class="form-group col-xs-12 col-md-6">
		                          		<label>Alamat *</label>
		                          		<input type="text" name="alamat" class="form-control" placeholder="Alamat: Jalan, RT/RW, DUSUN" required="">
		                          	</div>
		                          	<div class="form-group col-xs-12 col-md-6">
		                          		<label>Kecamatan *</label>
		                          		<input type="text" name="kecamatan" class="form-control" placeholder="Kecamatan" required="">
		                          	</div>
		                          	<div class="form-group col-xs-12 col-md-6">
		                          		<label>Kota/Kabupaten *</label>
		                          		<input type="text" name="kota" class="form-control" placeholder="Kota/Kabupaten" required="">
		                          	</div>
		                          	<div class="form-group col-xs-12 col-md-6">
		                          		<label>Kode Pos *</label>
		                          		<input type="text" name="kode_pos" class="form-control" placeholder="Kode Pos" required="">
		                          	</div>
		                          	<div class="form-group col-xs-12 col-md-6">
		                          		<label>Nomor Handphone *</label>
		                          		<input type="text" name="no_hp" class="form-control" placeholder="Nomor Handphone" required="">
		                          	</div>
		                          	<div class="form-group col-xs-12 col-md-6">
		                          		<label>Email *</label>
		                          		<input type="email" name="email" class="form-control" placeholder="Email" required="">
		                          	</div>
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
				        			<th>NIP</th>
				        			<th>Nama Staff</th>
				        			<th>Asal</th>
				        			<th class="col-md-3">Aksi</th>
				        		</tr>
				        	</thead>
				        	<tbody>
				        		<?php 
				        		$catStaff = $staff->result();
				        		for ($i = 0; $i < $staff->num_rows(); $i++) { ?>
				        			<tr>
				        				<td><?php echo $i+1; ?></td>
				        				<td><b><?php echo $catStaff[$i]->NIP; ?></b></td>
				        				<td><?php echo $catStaff[$i]->nama_lengkap; ?></td>
				        				<td><?php echo $catStaff[$i]->kecamatan.", ".$catStaff[$i]->kota ?></td>
				        				<td align="center">
				        					<form action="update_siswa" method="post">
				        						<span class="input-group-btn">
					        						<button type="button" name="" class="btn btn-primary" value="edit" data-toggle="modal" data-target=".modal-edit-<?php echo $catStaff[$i]->id_tenkepen?>"><i class="fa fa-pencil"></i> edit</button>
					        						<a href="siswa/delete/<?php echo $catStaff[$i]->id_tenkepen ?>" class="btn btn-danger" name="active"><i class="fa fa-trash"></i> delete</a>
					        					</span>
					        				</form>
				        				</td>
				        			</tr>
				        		<?php } ?>
				        	</tbody>
				        </table>
				        <?php for ($i=0; $i <$staff->num_rows() ; $i++) { ?>
				        	<div class="modal fade modal-edit-<?php echo $catStaff[$i]->id_tenkepen?>" tabindex="-1" role="dialog" aria-hidden="true">
			                    <div class="modal-dialog modal-lg">
			                      <div class="modal-content">
			                        <div class="modal-header">
			                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
			                          </button>
			                          <h4 class="modal-title" id="myModalLabel">Edit Siswa</h4>
			                        </div>
			                        <div class="modal-body">
			                          <form action="edit_siswa" method="post" class="form-horizontal form-label-left">
			                          	<h2>Identitas Siswa</h2>
			                          	<div class="form-group col-xs-12 col-md-6">
			                          		<label>NIP *</label>
			                          		<input type="text" name="nip" class="form-control" placeholder="NIP" required="" value="<?php echo $catStaff[$i]->NIP ?>">
			                          	</div>
			                          	<div class="form-group col-xs-12 col-md-6">
			                          		<label>Nama Lengkap *</label>
			                          		<input type="text" name="nama_siswa" class="form-control" placeholder="Nama Lengkap" required="" value="<?php echo $catStaff[$i]->nama_siswa ?>">
			                          	</div>
			                          	<div class="form-group col-xs-12 col-md-6">
			                          		<label>Jenis Kelamin *</label>
			                          		<select class="form-control" name="jenis_kelamin" required="">
			                          			<option value="">Pilih Jenis Kelamin</option>
			                          			<option value="1" <?php if($catStaff[$i]->jenis_kelamin == 1){echo "selected";} ?>>Laki-laki</option>
			                          			<option value="2" <?php if($catStaff[$i]->jenis_kelamin == 2){echo "selected";} ?>>Perempuan</option>
			                          		</select>
			                          	</div>
			                          	<div class="form-group col-xs-12 col-md-6">
			                          		<label>Tempat Lahir *</label>
			                          		<input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" required="" value="<?php echo $catStaff[$i]->alamat ?>">
			                          	</div>
			                          	<div class="form-group col-xs-12 col-md-6">
			                          		<label>Tanggal Lahir *</label>
			                          		<input type="date" name="tgl_lahir" class="form-control" required="" value="<?php echo $catStaff[$i]->tanggal_lahir ?>">
			                          	</div>
			                          	<div class="form-group col-xs-12 col-md-6">
			                          		<label>Agama *</label>
			                          		<select class="form-control" name="agama" required="">
			                          			<option value="">Pilih Agama</option>
			                          			<?php foreach ($agama->result() as $catAgama): ?>
			                          				<option value="<?php echo $catAgama->id_agama ?>" <?php if($catStaff[$i]->agama == $catAgama->id_agama){echo "selected";} ?>><?php echo ucwords($catAgama->nama_agama) ?></option>
			                          			<?php endforeach ?>
			                          		</select>
			                          	</div>
			                          	<div class="form-group col-xs-12 col-md-6">
			                          		<label>Alamat *</label>
			                          		<input type="text" name="alamat" class="form-control" placeholder="Alamat: Jalan, RT/RW, DUSUN" required="" value="<?php echo $catStaff[$i]->alamat ?>">
			                          	</div>
			                          	<div class="form-group col-xs-12 col-md-6">
			                          		<label>Kecamatan *</label>
			                          		<input type="text" name="kecamatan" class="form-control" placeholder="Kecamatan" required="" value="<?php echo $catStaff[$i]->kecamatan ?>">
			                          	</div>
			                          	<div class="form-group col-xs-12 col-md-6">
			                          		<label>Kota/Kabupaten *</label>
			                          		<input type="text" name="kota" class="form-control" placeholder="Kota/Kabupaten" required="" value="<?php echo $catStaff[$i]->kota ?>">
			                          	</div>
			                          	<div class="form-group col-xs-12 col-md-6">
			                          		<label>Kode Pos *</label>
			                          		<input type="text" name="kode_pos" class="form-control" placeholder="Kode Pos" required="" value="<?php echo $catStaff[$i]->kode_pos ?>">
			                          	</div>
			                          	<div class="form-group col-xs-12 col-md-6">
			                          		<label>Nomor Handphone *</label>
			                          		<input type="text" name="no_hp" class="form-control" placeholder="Nomor Handphone" required="" value="<?php echo $catStaff[$i]->no_hp ?>">
			                          	</div>
			                          	<div class="form-group col-xs-12 col-md-6">
			                          		<label>Email *</label>
			                          		<input type="email" name="email" class="form-control" placeholder="Email" required="" value="<?php echo $catStaff[$i]->email ?>">
			                          	</div>
			                        </div>
			                        <div class="modal-footer">
			                          <input type="hidden" name="id_tenkepen" value="<?php echo $catStaff[$i]->id_tenkepen ?>">
			                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			                          <input type="submit" class="btn btn-primary" value="Tambah">
			                        </div>
			                    	</form>
			                      </div>
			                    </div>
	                  		</div>
	                  	</div>
				        <?php } ?>
				      </div>
				    </div>
				</div>
          </div>
          <br />
        </div>		
</body>
</html>