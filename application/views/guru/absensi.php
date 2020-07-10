<?php 
	$catMapel = $mapel->result()[0];	
	$catKelas = $kelas->result()[0];
	$catSiswKelas = $siswa_kelas->result();
	$catSiswa = $siswa->result();
	$data = [];
	for ($i=0; $i < $siswa->num_rows(); $i++) { 
		for ($j=0; $j < $siswa_kelas->num_rows(); $j++) { 
			if ($catSiswa[$i]->id_siswa == $catSiswa[$j]->id_siswa) {
				$data[$catSiswa[$i]->nama_siswa] = array(
					'id' => $catSiswa[$i]->id_siswa,
					'jk' => $catSiswa[$i]->jenis_kelamin);
			}
		}
	}

	ksort($data);
 ?>

<div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row top_tiles">
          	<div class="col-xs-12">
          		<div class="x_panel">
          			<div class="x_title">
          				<h2>Absensi Mata Pelajaran <?php echo $catMapel->nama_mapel; ?></h2>
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
				        <form method="post" action="<?php echo base_url('guru/absen?m='.$catKelas->id_kelas.'&k='.$catMapel->id_mapel) ?>">
				        	<input type="date" name="tgl_absen" class="form-control" value="<?php echo date('Y-m-d') ?>">
				        	<br />
					        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
					        	<thead>
					        		<tr>
					        			<th class="text-center">No</th>
					        			<th class="text-center">Nama</th>
					        			<th class="text-center">Jenis Kelamin</th>
					        			<th class="text-center">H</th>
					        			<th class="text-center">S</th>
					        			<th class="text-center">I</th>
					        			<th class="text-center">A</th>
					        		</tr>
					        	</thead>
					        	<tbody>
					        		<?php $i=0; foreach ($data as $key => $value){
					        			$i++;
					        		 ?>
					        		 <tr>
					        			<td class="text-center"><?php echo $i ?></td>
					        			<td class="text-center"><?php echo $key ?></td>
					        			<td class="text-center">
					        				<?php if ($value['jk'] == 1) {
					        					echo "Laki-laki";
					        				} else {
					        					echo "Perempuan";
					        				} ?>
					        			</td>
					        			<td class="text-center">
					        				<input type="radio" required="" name="absen_<?= $value['id'] ?>" value="h">
					        			</td>
					        			<td class="text-center">
					        				<input type="radio" required="" name="absen_<?= $value['id'] ?>" value="s">
					        			</td>
					        			<td class="text-center">
					        				<input type="radio" required="" name="absen_<?= $value['id'] ?>" value="i">
					        			</td>
					        			<td class="text-center">
					        				<input type="radio" required="" name="absen_<?= $value['id'] ?>" value="a">
					        			</td>
					        		</tr>
					        		<?php } ?>
					        	</tbody>
					        </table>
					        <br />
					        <div class="col align-self-end">
					        	<button type="submit" class="btn btn-sm btn-primary" name="absen">Absen</button>
					        </div>
					    </form>
				      </div>
				    </div>
				</div>
          </div>
          <br />
        </div>