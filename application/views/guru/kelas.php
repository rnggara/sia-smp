<?php 
	$catKelas = $kelas->result()[0];
	$catListSiswa = $siswa_kelas->result();
	$catSiswa = $siswa->result();
	$catAbsen = $absen->result();
	$needRecap = 0;
	foreach ($catAbsen as $key => $value) {
		if ($value->status == 0) {
			$needRecap += 1;
		}
	}

	if ($needRecap == 0) {
		$badge = "";
	} else {
		$badge = "<span class='badge bg-red' style='color: #fff'>".$needRecap."</span>";
	}
 ?>
<div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row top_tiles">
          	<div class="col-xs-12">
          		<div class="x_panel">
          			<div class="x_title">
          				<h2>Kelas <?php echo $catKelas->nama_kelas ?></h2>
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
				        <h2>Daftar Siswa</h2>
				        <div class="clearfix"></div>
				      </div>
				      <div class="x_content">
				        <br />
                  		 <a href="<?php echo base_url('guru/rekap') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Rekap Absensi&nbsp;&nbsp;&nbsp;<?= $badge ?></a>
				        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
				        	<thead>
				        		<tr>
				        			<th class="text-center">#</th>
				        			<th>NIS/NISN</th>
				        			<th>Nama Siswa</th>
				        			<th>Jenis Kelamin</th>
				        			<th>Asal</th>
				        		</tr>
				        	</thead>
				        	<tbody>
				        		<?php 
				        		$catSiswa = $siswa->result();
				        		for ($i = 0; $i < $siswa->num_rows(); $i++) {
				        			for ($j=0; $j < $siswa_kelas->num_rows(); $j++) { 
				        				if ($catSiswa[$i]->id_siswa == $catListSiswa[$j]->id_siswa) { ?>
				        					<tr>
						        				<td class="text-center"><?php echo $i+1; ?></td>
						        				<td><b><?php echo $catSiswa[$i]->NIS."/".$catSiswa[$i]->NISN ?></b></td>
						        				<td><?php echo $catSiswa[$i]->nama_siswa ?></td>
						        				<td>
						        					<?php if ($catSiswa[$i]->jenis_kelamin == 1) {
						        						echo "Laki-laki";
						        					} else {
						        						echo "Perempuan";
						        					} ?>
						        				</td>
						        				<td><?php echo $catSiswa[$i]->kecamatan.", ".$catSiswa[$i]->kota ?></td>
						        			</tr>
				        				<?php }?>
				        		<?php }
				        		} ?>
				        	</tbody>
				        </table>
				      </div>
				    </div>
				</div>
          </div>
          <br />
        </div>