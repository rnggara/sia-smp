<?php $catKelas = $kelas->result()[0];
	$catTahun = $tahun_aktif->result()[0]; ?>
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
				        <h2>Daftar Jadwal Kelas <?php echo $catKelas->nama_kelas ?></h2>
				        <div class="clearfix"></div>
				      </div>
				      <div class="x_content">
				        <br />
				        <!-- tambah tahun -->
				        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal-tambah"><i class="fa fa-plus"></i> Tambah Mata Pelajaran</button>

		                  <div class="modal fade modal-tambah" tabindex="-1" role="dialog" aria-hidden="true">
		                    <div class="modal-dialog modal-lg">
		                      <div class="modal-content">
		                        <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
		                          </button>
		                          <h4 class="modal-title" id="myModalLabel">Tambah Mata Pelajaran</h4>
		                        </div>
		                        <div class="modal-body">
		                          <form action="<?php echo base_url('admin/add_jadwal') ?>" method="post" class="form-horizontal form-label-left">
		                          	<input type="hidden" name="id_kelas" value="<?php echo $catKelas->id_kelas ?>">
		                          	<h2>Daftar Jadwal Mata Pelajaran</h2>
		                          	<div class="form-horizontal form-label-left form">
		                          		<div class="form-group col-md-2">
		                          			<label>Jam mulai</label>
		                          			<select class="form-control" name="jam_mulai" required="">
		                          				<option value=""></option>
		                          				<?php foreach ($jam->result() as $catJam): ?>
		                          					<option value="<?php echo $catJam->id_jam ?>"><?php echo $catJam->jam_pelajaran ?></option>
		                          				<?php endforeach ?>
		                          			</select>
		                          		</div>
		                          		<div class="form-group col-md-2">
		                          			<label>Jam Berakhir</label>
		                          			<select class="form-control" name="jam_selesai" required="">
		                          				<option value=""></option>
		                          				<?php foreach ($jam->result() as $catJam): ?>
		                          					<option value="<?php echo $catJam->id_jam ?>"><?php echo $catJam->jam_pelajaran ?></option>
		                          				<?php endforeach ?>
		                          			</select>
		                          		</div>
		                          		<div class="form-group col-md-2">
		                          			<label>Pilih Hari</label>
		                          			<select class="form-control" name="hari" required="">
		                          				<option value=""></option>
		                          				<?php foreach ($hari->result() as $catHari): ?>
		                          					<option value="<?php echo $catHari->id_hari ?>"><?php echo $catHari->nama_hari ?></option>
		                          				<?php endforeach ?>
		                          			</select>
		                          		</div>
		                          		<div class="form-group col-md-3">
		                          			<label>Pilih Mata Pelajaran</label>
		                          			<select class="form-control" name="mapel" required="">
		                          				<option value=""></option>
		                          				<?php foreach ($mapel_all->result() as $cat){
		                          					if ($cat->tingkat == $catKelas->tingkat) { ?>
		                          					<option value="<?php echo $cat->id_mapel ?>"><?php echo $cat->nama_mapel ?></option>
		                          				<?php }} ?>
		                          			</select>
		                          		</div>
		                          		<div class="form-group col-md-3">
		                          			<label>Pilih Guru Pengampu</label>
		                          			<select class="form-control" name="guru" required="">
		                          				<option value=""></option>
		                          				<?php foreach ($guru->result() as $catGuru){ ?>
		                          					<option value="<?php echo $catGuru->id_tenkepen ?>"><?php echo $catGuru->nama_lengkap ?></option>
		                          				<?php } ?>
		                          			</select>
		                          		</div>
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
                  		<div class="" role="tabpanel" data-example-id="togglable-tabs">
	                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
	                        <li role="presentation" class="active"><a href="#senin" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Senin</a>
	                        </li>
	                        <li role="presentation" class=""><a href="#selasa" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Selasa</a>
	                        </li>
	                        <li role="presentation" class=""><a href="#rabu" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Rabu</a>
	                        </li>
	                        <li role="presentation" class=""><a href="#kamis" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Kamis</a>
	                        </li>
	                        <li role="presentation" class=""><a href="#jumat" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Jumat</a>
	                        </li>
	                        <li role="presentation" class=""><a href="#sabtu" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Sabtu</a>
	                        </li>
	                      </ul>
	                      <div id="myTabContent" class="tab-content">
	                        <div role="tabpanel" class="tab-pane fade active in" id="senin" aria-labelledby="home-tab">
	                          <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
						        	<thead>
						        		<tr>
						        			<th>#</th>
						        			<th>Jam ke</th>
						        			<th>Nama Mata Pelajaran</th>
						        			<th class="col-md-2">Aksi</th>
						        		</tr>
						        	</thead>
						        	<tbody>
						        		<?php 
						        		$catList = $jadwal_kelas->result();
						        		if (empty($catList)) {?>
						        			<tr>
						        				<td colspan="4" align="center">No data available</td>
						        			</tr>
						        		<?php } else {
							        		for ($i=0; $i < $jadwal_kelas->num_rows(); $i++) { 
							        			$catMapel = $mapel[$i]->result()[0];
							        			if ($catList[$i]->id_hari == 1) { ?>
							        			 	<tr>
								        				<td><?php echo $i+1; ?></td>
								        				<td>
								        					<?php foreach ($jam->result() as $key){
								        						if ($catList[$i]->jam_mulai == $key->id_jam) {
								        							echo $key->jam_pelajaran;?>
								        						
								        					<?php }} ?> - 
								        					<?php foreach ($jam->result() as $key){
								        						if ($catList[$i]->jam_selesai == $key->id_jam) {
								        							echo $key->jam_pelajaran;?>
								        						
								        					<?php }} ?>
								        				</td>
								        				<td><?php echo $catMapel->nama_mapel ?></td>
								        				<td align="center" class="col-md-1">
								        					<a class="btn btn-round btn-sm btn-danger" href="<?php echo base_url("admin/delete-jadwal/".$catMapel->id_mapel) ?>"><i class="fa fa-trash"></i></a>
								        				</td>
								        			</tr>
							        			 <?php } else { ?>
							        			 	<tr>
								        				<td colspan="4" align="center">No data available</td>
								        			</tr>
							        			 <?php } ?>
							        		<?php }
							        		} ?>
						        	</tbody>
						        </table>
	                        </div>
	                        <div role="tabpanel" class="tab-pane fade" id="selasa" aria-labelledby="profile-tab">
	                          <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
						        	<thead>
						        		<tr>
						        			<th>#</th>
						        			<th>Jam ke</th>
						        			<th>Nama Mata Pelajaran</th>
						        			<th class="col-md-2">Aksi</th>
						        		</tr>
						        	</thead>
						        	<tbody>
						        		<?php 
						        		$catList = $jadwal_kelas->result();
						        		if (empty($catList)) {?>
						        			<tr>
						        				<td colspan="4" align="center">No data available</td>
						        			</tr>
						        		<?php } else {
							        		for ($i=0; $i < $jadwal_kelas->num_rows(); $i++) { 
							        			$catMapel = $mapel[$i]->result()[0];
							        			if ($catList[$i]->id_hari == 2) { ?>
							        			 	<tr>
								        				<td><?php echo $i+1; ?></td>
								        				<td>
								        					<?php foreach ($jam->result() as $key){
								        						if ($catList[$i]->jam_mulai == $key->id_jam) {
								        							echo $key->jam_pelajaran;?>
								        						
								        					<?php }} ?> - 
								        					<?php foreach ($jam->result() as $key){
								        						if ($catList[$i]->jam_selesai == $key->id_jam) {
								        							echo $key->jam_pelajaran;?>
								        						
								        					<?php }} ?>
								        				</td>
								        				<td><?php echo $catMapel->nama_mapel ?></td>
								        				<td align="center" class="col-md-1">
								        					<a class="btn btn-round btn-sm btn-danger" href="<?php echo base_url("admin/delete-jadwal/".$catMapel->id_mapel) ?>"><i class="fa fa-trash"></i></a>
								        				</td>
								        			</tr>
							        			 <?php } else { ?>
							        			 	<tr>
								        				<td colspan="4" align="center">No data available</td>
								        			</tr>
							        			 <?php } ?>
							        		<?php }
							        		} ?>
						        	</tbody>
						        </table>
	                        </div>
	                        <div role="tabpanel" class="tab-pane fade" id="rabu" aria-labelledby="profile-tab">
	                          <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
						        	<thead>
						        		<tr>
						        			<th>#</th>
						        			<th>Jam ke</th>
						        			<th>Nama Mata Pelajaran</th>
						        			<th class="col-md-2">Aksi</th>
						        		</tr>
						        	</thead>
						        	<tbody>
						        		<?php 
						        		$catList = $jadwal_kelas->result();
						        		if (empty($catList)) {?>
						        			<tr>
						        				<td colspan="4" align="center">No data available</td>
						        			</tr>
						        		<?php } else {
							        		for ($i=0; $i < $jadwal_kelas->num_rows(); $i++) { 
							        			$catMapel = $mapel[$i]->result()[0];
							        			if ($catList[$i]->id_hari == 3) { ?>
							        			 	<tr>
								        				<td><?php echo $i+1; ?></td>
								        				<td>
								        					<?php foreach ($jam->result() as $key){
								        						if ($catList[$i]->jam_mulai == $key->id_jam) {
								        							echo $key->jam_pelajaran;?>
								        						
								        					<?php }} ?> - 
								        					<?php foreach ($jam->result() as $key){
								        						if ($catList[$i]->jam_selesai == $key->id_jam) {
								        							echo $key->jam_pelajaran;?>
								        						
								        					<?php }} ?>
								        				</td>
								        				<td><?php echo $catMapel->nama_mapel ?></td>
								        				<td align="center" class="col-md-1">
								        					<a class="btn btn-round btn-sm btn-danger" href="<?php echo base_url("admin/delete-jadwal/".$catMapel->id_mapel) ?>"><i class="fa fa-trash"></i></a>
								        				</td>
								        			</tr>
							        			 <?php } else { ?>
							        			 	<tr>
								        				<td colspan="4" align="center">No data available</td>
								        			</tr>
							        			 <?php } ?>
							        		<?php }
							        		} ?>
						        	</tbody>
						        </table>
	                        </div>
	                        <div role="tabpanel" class="tab-pane fade" id="kamis" aria-labelledby="profile-tab">
	                          <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
						        	<thead>
						        		<tr>
						        			<th>#</th>
						        			<th>Jam ke</th>
						        			<th>Nama Mata Pelajaran</th>
						        			<th class="col-md-2">Aksi</th>
						        		</tr>
						        	</thead>
						        	<tbody>
						        		<?php 
						        		$catList = $jadwal_kelas->result();
						        		if (empty($catList)) {?>
						        			<tr>
						        				<td colspan="4" align="center">No data available</td>
						        			</tr>
						        		<?php } else {
							        		for ($i=0; $i < $jadwal_kelas->num_rows(); $i++) { 
							        			$catMapel = $mapel[$i]->result()[0];
							        			if ($catList[$i]->id_hari == 4) { ?>
							        			 	<tr>
								        				<td><?php echo $i+1; ?></td>
								        				<td>
								        					<?php foreach ($jam->result() as $key){
								        						if ($catList[$i]->jam_mulai == $key->id_jam) {
								        							echo $key->jam_pelajaran;?>
								        						
								        					<?php }} ?> - 
								        					<?php foreach ($jam->result() as $key){
								        						if ($catList[$i]->jam_selesai == $key->id_jam) {
								        							echo $key->jam_pelajaran;?>
								        						
								        					<?php }} ?>
								        				</td>
								        				<td><?php echo $catMapel->nama_mapel ?></td>
								        				<td align="center" class="col-md-1">
								        					<a class="btn btn-round btn-sm btn-danger" href="<?php echo base_url("admin/delete-jadwal/".$catMapel->id_mapel) ?>"><i class="fa fa-trash"></i></a>
								        				</td>
								        			</tr>
							        			 <?php } else { ?>
							        			 	<tr>
								        				<td colspan="4" align="center">No data available</td>
								        			</tr>
							        			 <?php } ?>
							        		<?php }
							        		} ?>
						        	</tbody>
						        </table>
	                        </div>
	                        <div role="tabpanel" class="tab-pane fade" id="jumat" aria-labelledby="profile-tab">
	                          <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
						        	<thead>
						        		<tr>
						        			<th>#</th>
						        			<th>Jam ke</th>
						        			<th>Nama Mata Pelajaran</th>
						        			<th class="col-md-2">Aksi</th>
						        		</tr>
						        	</thead>
						        	<tbody>
						        		<?php 
						        		$catList = $jadwal_kelas->result();
						        		if (empty($catList)) {?>
						        			<tr>
						        				<td colspan="4" align="center">No data available</td>
						        			</tr>
						        		<?php } else {
							        		for ($i=0; $i < $jadwal_kelas->num_rows(); $i++) { 
							        			$catMapel = $mapel[$i]->result()[0];
							        			if ($catList[$i]->id_hari == 5) { ?>
							        			 	<tr>
								        				<td><?php echo $i+1; ?></td>
								        				<td>
								        					<?php foreach ($jam->result() as $key){
								        						if ($catList[$i]->jam_mulai == $key->id_jam) {
								        							echo $key->jam_pelajaran;?>
								        						
								        					<?php }} ?> - 
								        					<?php foreach ($jam->result() as $key){
								        						if ($catList[$i]->jam_selesai == $key->id_jam) {
								        							echo $key->jam_pelajaran;?>
								        						
								        					<?php }} ?>
								        				</td>
								        				<td><?php echo $catMapel->nama_mapel ?></td>
								        				<td align="center" class="col-md-1">
								        					<a class="btn btn-round btn-sm btn-danger" href="<?php echo base_url("admin/delete-jadwal/".$catMapel->id_mapel) ?>"><i class="fa fa-trash"></i></a>
								        				</td>
								        			</tr>
							        			 <?php } else { ?>
							        			 	<tr>
								        				<td colspan="4" align="center">No data available</td>
								        			</tr>
							        			 <?php } ?>
							        		<?php }
							        		} ?>
						        	</tbody>
						        </table>
	                        </div>
	                        <div role="tabpanel" class="tab-pane fade" id="sabtu" aria-labelledby="profile-tab">
	                          <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
						        	<thead>
						        		<tr>
						        			<th>#</th>
						        			<th>Jam ke</th>
						        			<th>Nama Mata Pelajaran</th>
						        			<th class="col-md-2">Aksi</th>
						        		</tr>
						        	</thead>
						        	<tbody>
						        		<?php 
						        		$catList = $jadwal_kelas->result();
						        		if (empty($catList)) {?>
						        			<tr>
						        				<td colspan="4" align="center">No data available</td>
						        			</tr>
						        		<?php } else {
							        		for ($i=0; $i < $jadwal_kelas->num_rows(); $i++) { 
							        			$catMapel = $mapel[$i]->result()[0];
							        			if ($catList[$i]->id_hari == 6) { ?>
							        			 	<tr>
								        				<td><?php echo $i+1; ?></td>
								        				<td>
								        					<?php foreach ($jam->result() as $key){
								        						if ($catList[$i]->jam_mulai == $key->id_jam) {
								        							echo $key->jam_pelajaran;?>
								        						
								        					<?php }} ?> - 
								        					<?php foreach ($jam->result() as $key){
								        						if ($catList[$i]->jam_selesai == $key->id_jam) {
								        							echo $key->jam_pelajaran;?>
								        						
								        					<?php }} ?>
								        				</td>
								        				<td><?php echo $catMapel->nama_mapel ?></td>
								        				<td align="center" class="col-md-1">
								        					<a class="btn btn-round btn-sm btn-danger" href="<?php echo base_url("admin/delete-jadwal/".$catMapel->id_mapel) ?>"><i class="fa fa-trash"></i></a>
								        				</td>
								        			</tr>
							        			 <?php } else { ?>
							        			 	<tr>
								        				<td colspan="4" align="center">No data available</td>
								        			</tr>
							        			 <?php } ?>
							        		<?php }
							        		} ?>
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