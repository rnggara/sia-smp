<?php 

$catAbsen = $absen->result();
$catMapel = $mapel->result();
$catKelas = $kelas->result()[0];
$catListSiswa = $siswa_kelas->result();
$catSiswa = $siswa->result();

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
 ?>
<div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row top_tiles">
          	<div class="col-xs-12">
          		<div class="x_panel">
          			<div class="x_title">
          				<h2>Rekapitulasi Absensi Kelas <?php echo $catKelas->nama_kelas ?></h2>
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
				        <h2>Daftar Absensi Kelas <?php echo $catKelas->nama_kelas ?></h2>
				        <div class="clearfix"></div>
				      </div>
				      <div class="x_content">
				        <br />
				        <form method="post" action="<?php echo base_url('guru/update_rekap') ?>">
				        	<br />
					        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
					        	<thead>
					        		<tr>
					        			<th class="text-center">No</th>
					        			<th class="text-center">Tanggal Absen</th>
					        			<th class="text-center">Mata Pelajaran</th>
					        			<th class="text-center"></th>
					        		</tr>
					        	</thead>
					        	<tbody>
					        		<?php for ($i=0; $i < $absen->num_rows(); $i++) { 
					        			if ($catAbsen[$i]->status == 0) { ?>
					        				<tr>
						        				<td class="text-center"><?php echo $i+1 ?></td>
						        				<td class="text-center">
						        					<?php echo format_date($catAbsen[$i]->tgl_absensi) ?>
						        				</td>
						        				<td class="text-center">
						        					<?php for ($j=0; $j < $mapel->num_rows(); $j++) { 
						        						if ($catAbsen[$i]->id_mapel == $catMapel[$j]->id_mapel) {
						        							echo $catMapel[$j]->nama_mapel;
						        						}
						        					} ?>
						        				</td>
						        				<td class="text-center">
						        					<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-absen-<?php echo $catAbsen[$i]->id ?>"><i class="fa fa-eye"></i></button>
						        					<input type="hidden" name="id_absen" value="<?php echo $catAbsen[$i]->id ?>">
						        					<button type="submit" name="rekap" class="btn btn-sm btn-success" onclick="return confirm('Apakah data absen sudah sesuai?')"><i class="fa fa-check"></i></button>
						        				</td>
						        			</tr>
					        		<?php }
					        	} ?>
					        	</tbody>
					        </table>
					        <br />
					    </form>
				      </div>
				    </div>
				</div>
          </div>
          <br />
        </div>
        <?php for ($i=0; $i < $absen->num_rows(); $i++) {
        	for ($j=0; $j < $mapel->num_rows(); $j++) { 
				if ($catAbsen[$i]->id_mapel == $catMapel[$j]->id_mapel) {
					$nama_mapel = $catMapel[$j]->nama_mapel;
				}
			}
			$list_siswa = json_decode($catAbsen[$i]->list_siswa);
         ?>
        	<div class="modal fade" id="modal-absen-<?php echo $catAbsen[$i]->id ?>" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
		        <div class="modal-dialog modal-lg">
		          <div class="modal-content">

		            <div class="modal-header">
		              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
		              </button>
		              <h4 class="modal-title" id="myModalLabel">Absen Mata Pelajaran <?= $nama_mapel ?>, Tanggal <?php echo format_date($catAbsen[$i]->tgl_absensi) ?></h4>
		            </div>
		            <form method="post" action="<?php echo base_url('guru/update_rekap') ?>">
			            <div class="modal-body">
			              <h4>Daftar Siswa</h4>
			              <table class="display table table-hover table-bordered">
			              	<thead>
			              		<tr>
			              			<th class="text-center">No</th>
			              			<th class="text-center">Nama Siswa</th>
			              			<th class="text-center">Jenis Kelamin</th>
			              			<th class="text-center">H</th>
			              			<th class="text-center">I</th>
			              			<th class="text-center">S</th>
			              			<th class="text-center">A</th>
			              		</tr>
			              	</thead>
			              	<tbody>
			              		<?php for ($l = 0; $l < $siswa->num_rows(); $l++) {
					        			for ($m=0; $m < $siswa_kelas->num_rows(); $m++) { 
					        				if ($catSiswa[$l]->id_siswa == $catListSiswa[$m]->id_siswa) { 
					        					foreach ($list_siswa as $keyList => $catList) {
				        							if ($catList->id_user == $catSiswa[$l]->id_siswa) {
							        						$hadir = "";
							        						$sakit = "";
							        						$ijin = "";
							        						$alpha = "";
							        						if ($catList->absen == "s") {
							        							$sakit = "<i class='fa fa-check'></i>";
							        						} elseif ($catList->absen == "h") {
							        							$hadir = "<i class='fa fa-check'></i>";
							        						} elseif ($catList->absen == "i") {
							        							$ijin = "<i class='fa fa-check'></i>";
							        						} elseif ($catList->absen == "a") {
							        							$alpha = "<i class='fa fa-check'></i>";
							        						}
							        					}
				        						}?>
					        					<tr>
							        				<td class="text-center"><?php echo $i+1; ?></td>
							        				<td><?php echo $catSiswa[$l]->nama_siswa ?></td>
							        				<td>
							        					<?php if ($catSiswa[$l]->jenis_kelamin == 1) {
							        						echo "Laki-laki";
							        					} else {
							        						echo "Perempuan";
							        					} ?>
							        				</td>
							        				<td class="text-center">
							        					<?= $hadir ?>
							        				</td>
							        				<td class="text-center">
							        					<?= $ijin ?>
							        				</td>
							        				<td class="text-center">
							        					<?= $sakit ?>
							        				</td>
							        				<td class="text-center">
							        					<?= $alpha ?>
							        				</td>
							        			</tr>
					        				<?php }?>
					        		<?php }
					        		} ?>
			              	</tbody>
			              </table>
			            </div>
			            <div class="modal-footer">
			            	<input type="hidden" name="id_absen" value="<?php echo $catAbsen[$i]->id ?>">
			              <button type="submit" class="btn btn-primary" name="rekap" onclick="return confirm('Apakah data absen sudah sesuai?')">Rekap</button>
			            </div>
			        </form>
		          </div>
		        </div>
		      </div>
        <?php } ?>

        <script type="text/javascript">
        	$(document).ready(function(){
        		$('table.display').dataTable({
        			paging: false
        		});
        	});
        </script>