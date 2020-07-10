<?php 

/**
 * 
 */
class Guru extends CI_Controller
{
	private $tahun_akademik;
	private $id;
	function __construct()
		{
			parent::__construct();
			$this->load->model('M_Sekolah');
			$this->load->model('M_Tahun_Akademik');
			$this->load->model('M_Kelas');
			$this->load->model('M_Mapel');
			$this->load->model('M_Siswa');
			$this->load->model('M_Other');
			$this->load->model('M_Ekskul');
			$this->load->model('M_Tenkepen');
			$this->load->helper('login');
			isAccessible(array('2'));
			$data = $this->M_Tahun_Akademik->getTahunActive();
			$tahun = $data->result()[0];
			$this->tahun_akademik = $tahun->id_akademik;
			$this->id = $this->session->id;
		}

	function index(){
		// used by all pages
		$data['identitas'] = $this->M_Sekolah->get_identitas();
		$data['guru'] = $this->M_Tenkepen->getByID($this->id);
		$data['wali_kelas'] = $this->M_Kelas->get_wali_kelas($this->id, $this->tahun_akademik);
		$data['ekstrakulikuler'] = $this->M_Ekskul->get_pembina_ekskul($this->id, $this->tahun_akademik);
		$data['guru_ampu'] = $this->M_Tenkepen->get_guru_ampu($this->id, $this->tahun_akademik);
		// end here
		$this->template->set('title','Dashboard');
		$this->template->load('template/main', 'guru/index', $data);
	}

	function kelas(){
		// used by all pages
		$data['identitas'] = $this->M_Sekolah->get_identitas();
		$data['guru'] = $this->M_Tenkepen->getByID($this->id);
		$data['wali_kelas'] = $this->M_Kelas->get_wali_kelas($this->id, $this->tahun_akademik);
		$data['ekstrakulikuler'] = $this->M_Ekskul->get_pembina_ekskul($this->id, $this->tahun_akademik);
		$data['guru_ampu'] = $this->M_Tenkepen->get_guru_ampu($this->id, $this->tahun_akademik);
		// end here
		$id_kelas = $data['wali_kelas']->result()[0]->id_kelas;
		$data['absen'] = $this->M_Kelas->get_absen_id($id_kelas);
		$data['kelas'] = $this->M_Kelas->getByID($id_kelas);
		$data['siswa_kelas'] = $this->M_Kelas->getKelasSiswa($id_kelas, $this->tahun_akademik);
		$data['siswa'] = $this->M_Siswa->getAll();
		$this->template->set('title','Kelas');
		$this->template->load('template/main', 'guru/kelas', $data);
	}

	function mapel(){
		// used by all pages
		$data['identitas'] = $this->M_Sekolah->get_identitas();
		$data['guru'] = $this->M_Tenkepen->getByID($this->id);
		$data['wali_kelas'] = $this->M_Kelas->get_wali_kelas($this->id, $this->tahun_akademik);
		$data['ekstrakulikuler'] = $this->M_Ekskul->get_pembina_ekskul($this->id, $this->tahun_akademik);
		$data['guru_ampu'] = $this->M_Tenkepen->get_guru_ampu($this->id, $this->tahun_akademik);
		// end here
		$data['jam_pel'] = $this->M_Other->getJam();
		$data['hari'] = $this->M_Other->getHari();
		$data['mapel'] = $this->M_Mapel->getAll();
		$data['kelas'] = $this->M_Kelas->getAll();
		$this->template->set('title','Jadwal Mata Pelajaran');
		$this->template->load('template/main', 'guru/mapel', $data);
	}

	function absensi(){
		$id_mapel = $_GET['m'];
		$id_kelas = $_GET['k'];
		// used by all pages
		$data['identitas'] = $this->M_Sekolah->get_identitas();
		$data['guru'] = $this->M_Tenkepen->getByID($this->id);
		$data['wali_kelas'] = $this->M_Kelas->get_wali_kelas($this->id, $this->tahun_akademik);
		$data['ekstrakulikuler'] = $this->M_Ekskul->get_pembina_ekskul($this->id, $this->tahun_akademik);
		$data['guru_ampu'] = $this->M_Tenkepen->get_guru_ampu($this->id, $this->tahun_akademik);
		// end here
		$data['mapel'] = $this->M_Mapel->getByID($id_mapel);
		$data['kelas'] = $this->M_Kelas->getByID($id_kelas);
		$data['siswa_kelas'] = $this->M_Kelas->getKelasSiswa($id_kelas, $this->tahun_akademik);
		$data['siswa'] = $this->M_Siswa->getAll();

		$this->template->load('template/main', 'guru/absensi', $data);
	}

	function absen(){
		if (isset($_POST['absen'])) {
			$id_mapel = $_GET['m'];
			$id_kelas = $_GET['k'];
			$siswa = array();
			$list_siswa = $this->M_Kelas->getKelasSiswa($id_kelas, $this->tahun_akademik)->result();
			foreach ($list_siswa as $key => $value) {
				$siswa[$key]['id_user'] = $value->id_siswa;
				$siswa[$key]['absen'] = $_POST['absen_'.$value->id_siswa];
			}

			$data = array(
				'tgl_absensi' => $_POST['tgl_absen'],
				'id_kelas'	  => $id_kelas,
				'id_mapel'    => $id_mapel,
				'list_siswa'  => json_encode($siswa));
			$this->M_Kelas->init_absen($data);
			echo "<script>alert('absen berhasil')</script>";
			redirect_to('guru/mata-pelajaran');
		}
	}

	function rekap(){
		// used by all pages
		$data['identitas'] = $this->M_Sekolah->get_identitas();
		$data['guru'] = $this->M_Tenkepen->getByID($this->id);
		$data['wali_kelas'] = $this->M_Kelas->get_wali_kelas($this->id, $this->tahun_akademik);
		$data['ekstrakulikuler'] = $this->M_Ekskul->get_pembina_ekskul($this->id, $this->tahun_akademik);
		$data['guru_ampu'] = $this->M_Tenkepen->get_guru_ampu($this->id, $this->tahun_akademik);
		// end here
		$id_kelas = $data['wali_kelas']->result()[0]->id_kelas;
		$data['kelas'] = $this->M_Kelas->getByID($id_kelas);
		$data['absen'] = $this->M_Kelas->get_absen_id($id_kelas);
		$data['mapel'] = $this->M_Mapel->getAll();
		$data['siswa_kelas'] = $this->M_Kelas->getKelasSiswa($id_kelas, $this->tahun_akademik);
		$data['siswa'] = $this->M_Siswa->getAll();
		$this->template->load('template/main', 'guru/rekap', $data);
	}

	function update_rekap(){
		if (isset($_POST['rekap'])) {
			$id = $_POST['id_absen'];
			$data = array(
				'status' => 1);
			$this->M_Kelas->update_absen($id, $data);
			echo "<script>alert('Rekap Berhasil')</script>";
			redirect_to('guru/kelas');
		}
	}

}

 ?>