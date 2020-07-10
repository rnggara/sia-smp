<?php
$catJadwal = $guru_ampu->result(); 
$catHari = $hari->result();

?>
<div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row top_tiles">
          	<div class="col-xs-12">
          		<div class="x_panel">
          			<div class="x_title">
          				<h2>Jadwal Mata Pelajaran</h2>
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
				        <h2>Absensi Mata Pelajaran</h2>
				        <div class="clearfix"></div>
				      </div>
				      <div class="x_content">
				        <br />
				        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
				        	<thead>
				        		<tr>
				        			<th class="text-center">#</th>
				        			<th class="text-center">SENIN</th>
				        			<th class="text-center">SELASA</th>
				        			<th class="text-center">RABU</th>
				        			<th class="text-center">KAMIS</th>
				        			<th class="text-center">JUMAT</th>
				        			<th class="text-center">SABTU</th>
				        		</tr>
				        	</thead>
				        	<tbody>
				        		<?php foreach ($jam_pel->result() as $keyJam => $catJam) { ?>
				        			<tr>
				        				<td class="text-center"><?php echo $catJam->jam_pelajaran ?></td>
				        				<?php
				        				for ($i=0; $i < $hari->num_rows() - 1; $i++) { ?> 
				        				 	<td class="text-center" rowspan="">
				        				 		<?php for ($j=0; $j < $guru_ampu->num_rows(); $j++) { 
				        				 		if ($catHari[$i]->id_hari == $catJadwal[$j]->id_hari){ 
				        				 			if ($catJam->id_jam == $catJadwal[$j]->jam_mulai || $catJam->id_jam == $catJadwal[$j]->jam_selesai){
				        				 				foreach ($mapel->result() as $keyMapel => $catMapel) {
				        				 					if ($catMapel->id_mapel == $catJadwal[$j]->id_mapel) {
				        				 						$strMapel = $catMapel->nama_mapel;
				        				 						$idMapel = $catMapel->id_mapel;
				        				 					}
				        				 				}
				        				 				foreach ($kelas->result() as $keyKelas => $catKelas) {
				        				 					if ($catKelas->id_kelas == $catJadwal[$j]->id_kelas) {
				        				 						$strKelas = $catKelas->nama_kelas;
				        				 						$idKelas = $catKelas->id_kelas;
				        				 					}
				        				 				} ?>
				        				 				<a href="<?php echo base_url('guru/absensi?m='.$idMapel.'&k='.$idKelas) ?>" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title data-original-title="Klik disini untuk absensi"><?php echo $strMapel." ".$strKelas; ?></a>
				        				 			<?php }
				        				 			}
				        				 		} ?>
				        				 	</td>
				        				 <?php } ?>
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