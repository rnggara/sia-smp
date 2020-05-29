<?php 

/**
 * 
 */
class Admin extends CI_Controller
{

	function __construct()
		{
			parent::__construct();
			$this->load->model('M_Sekolah');
			$this->load->model('M_Tahun_Akademik');
			$this->load->model('M_Kelas');
			$this->load->model('M_Mapel');
			$this->load->model('M_Siswa');
		}
	
	// dashboard
	function index(){
		$data['identitas'] = $this->M_Sekolah->get_identitas();
		$this->template->set('title','Dashboard');
		$this->template->load('template/main','admin/index', $data);
	}

	// Identitas
	function identitas(){
		$data['identitas'] = $this->M_Sekolah->get_identitas();
		$data['title'] = "Identitas Sekolah";
		$this->template->set('title','Identitas Sekolah');
		$this->template->load('template/main','admin/identitas', $data);
	}

	// Function akademik
	function tahun_akademik(){
		$data['tahun_aktif'] = $this->M_Tahun_Akademik->getTahunActive();
		$data['tahun_akademik'] = $this->M_Tahun_Akademik->getAll();
		$data['identitas'] = $this->M_Sekolah->get_identitas();
		$data['title'] = "Tahun Akademik";
		$this->template->set('title','Tahun Akademik');
		$this->template->load('template/main','admin/akademik', $data);
	}

	function add_tahun(){
		$tahun_akademik = $_POST['tahun_akademik'];
		$tahun = $_POST['tahun'];
		$tgl_mulai = $_POST['tgl_mulai'];
		$tgl_selesai = $_POST['tgl_selesai'];

		//save
		$this->M_Tahun_Akademik->saveTahun($tahun_akademik, $tahun, $tgl_mulai, $tgl_selesai);

		$this->M_Tahun_Akademik->insertAngkatan($tahun);

		//redirect
		$this->redirect_to('Berhasil menambahkan Tahun Akademik', 'admin/tahun_akademik');
	}

	function update_akademik(){
		$id = $_POST['id_aktif'];
		if (isset($_POST['active'])) {
			$this->M_Tahun_Akademik->updateAll();
			$this->M_Tahun_Akademik->activateTahun($id);
			$this->redirect_to('Berhasil menerapkan Tahun Akademik', 'admin/tahun_akademik');
		} elseif (isset($_POST['close'])) {
			$this->M_Tahun_Akademik->closeTahun($id);
			$this->redirect_to('Berhasil menutup Tahun Akademik', 'admin/tahun_akademik');
		}

		
	}

	function close_akademik(){
		$id = $_POST['id_aktif'];
		
	}

	// Function Kelas
	function kelas(){
		$data['kelas'] = $this->M_Kelas->getAll();
		$data['identitas'] = $this->M_Sekolah->get_identitas();
		$data['title'] = "Kelas";
		$this->template->set('title','Kelas');
		$this->template->load('template/main','admin/kelas', $data);
	}

	function detail_kelas(){
		echo "ini kelas";
	}

	function add_kelas(){
		$nama_kelas = $_POST['nama_kelas'];
		$tingkat = $_POST['tingkat'];
		$this->M_Kelas->add_kelas($nama_kelas, $tingkat);
		$this->redirect_to('Berhasil menambahkan Kelas', 'admin/kelas');
	}

	// Function Mapel
	function mapel(){
		$data['mapel_vii'] = $this->M_Mapel->getByTingkat(1);
		$data['mapel_viii'] = $this->M_Mapel->getByTingkat(2);
		$data['mapel_ix'] = $this->M_Mapel->getByTingkat(3);
		$data['identitas'] = $this->M_Sekolah->get_identitas();
		$data['title'] = "Mata Pelajaran";
		$this->template->set('title','Mata Pelajaran');
		$this->template->load('template/main','admin/mapel', $data);
	}

	function add_mapel(){
		$nama_mapel = $_POST['nama_mapel'];
		$tahun = $_POST['tahun'];
		$tingkat = $_POST['tingkat'];
		$this->M_Mapel->add_mapel($nama_mapel, $tahun, $tingkat);
		$this->redirect_to('Berhasil Menambahkan Mata Pelajaran', 'admin/mata-pelajaran');
	}

	// Function Siswa
	function siswa(){
		$data['identitas'] = $this->M_Sekolah->get_identitas();
		$data['title'] = "Siswa";
		$this->template->set('title','Siswa');
		$this->template->load('template/main','admin/siswa', $data);
	}

	function add_siswa(){
		$data = array();
		$this->M_Siswa->add_siswa($data);

		$this->redirect_to('Berhasil Menambahkan Siswa', 'admin/siswa');
	}

	function redirect_to($message, $link){
		echo "<script>
				alert ('".$message."');
				window.location.replace('".base_url($link)."');
			</script>";
	}
}

 ?>