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
			$this->load->model('M_Agama');
			$this->load->model('M_Ekskul');
			$this->load->model('M_Tenkepen');
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

	function daftar_kelas(){
		$data['kelas'] = $this->M_Kelas->getAll();
		$data['identitas'] = $this->M_Sekolah->get_identitas();
		$data['title'] = "Kelas";
		$this->template->set('title','Kelas');
		$this->template->load('template/main','admin/kelas_list', $data);
	}

	function kelas_siswa(){
		$id = $this->uri->segment(2);
		$data['tahun_aktif'] = $this->M_Tahun_Akademik->getTahunActive();
		$tahun = $data['tahun_aktif']->result();
		$data['kelas'] = $this->M_Kelas->getByID($id);
		$data['kelas_siswa'] = $this->M_Kelas->getKelasSiswa($id, $tahun[0]->id_akademik);
		$kelas_result = $data['kelas_siswa']->result();
		for ($i=0; $i < $data['kelas_siswa']->num_rows(); $i++) { 
			$data['siswa'][$i] = $this->M_Siswa->getByID($kelas_result[$i]->id_siswa);
		}
		$data['siswa_all'] = $this->M_Siswa->getAll();
		$data['agama'] = $this->M_Agama->getAll();
		$data['identitas'] = $this->M_Sekolah->get_identitas();
		$data['title'] = "Kelas";
		$this->template->set('title','Kelas');
		$this->template->load('template/main','admin/kelas_siswa', $data);
	}

	function tambah_kelas_siswa(){
		$id_siswa = $this->uri->segment(4);
		$id_kelas = $this->uri->segment(2);
		$tahun_aktif = $this->M_Tahun_Akademik->getTahunActive();
		$tahun = $tahun_aktif->result()[0];
		$data = array(
			'id_siswa'		=> $id_siswa,
			'id_kelas'		=> $id_kelas,
			'id_akademik'	=> $tahun->id_akademik);
		$this->M_Kelas->add_kelas_siswa($data);

		$this->redirect_to("Berhasil Menambahkan Siswa", "admin/".$id_kelas."/siswa");
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
		$data['agama'] = $this->M_Agama->getAll();
		$data['siswa'] = $this->M_Siswa->getActiveSiswa();
		$data['identitas'] = $this->M_Sekolah->get_identitas();
		$data['title'] = "Siswa";
		$this->template->set('title','Siswa');
		$this->template->load('template/main','admin/siswa', $data);
	}

	function add_siswa(){
		$tahun = $this->M_Tahun_Akademik->getTahunActive();
		$tahun_masuk = $tahun->result();
		$tgl = explode("-", $_POST['tgl_lahir']);
		$pass = $tgl[2].$tgl[1].$tgl[0];
		$data = array(
			'NIS'			=> $_POST['nis'],
			'NISN'			=> $_POST['nisn'],
			'nama_siswa'	=> $_POST['nama_siswa'],
			'tempat_lahir'	=> $_POST['tempat_lahir'],
			'tanggal_lahir'	=> $_POST['tgl_lahir'],
			'agama'			=> $_POST['agama'],
			'jenis_kelamin'	=> $_POST['jenis_kelamin'],
			'alamat'		=> $_POST['alamat'],
			'kecamatan'		=> $_POST['kecamatan'],
			'kota'			=> $_POST['kota'],
			'kode_pos'		=> $_POST['kode_pos'],
			'no_hp'			=> $_POST['no_hp'],
			'nama_ortu'		=> $_POST['nama_ortu'],
			'no_hp_ortu'	=> $_POST['no_hp_ortu'],
			'tahun_masuk'	=> $tahun_masuk[0]->tahun_akademik,
			'user_siswa'	=> $_POST['nis'],
			'pass_siswa'	=> $pass);
		$this->M_Siswa->add_siswa($data);

		$this->redirect_to('Berhasil Menambahkan Siswa', 'admin/siswa');
	}

	// Function ekstrakulikuler
	function ekstrakulikuler(){
		$data['ekskul'] = $this->M_Ekskul->getAll();
		$data['identitas'] = $this->M_Sekolah->get_identitas();
		$data['title'] = "Ekstrakulikuler";
		$this->template->set('title','Ekstrakulikuler');
		$this->template->load('template/main','admin/ekskul', $data);
	}

	function add_ekskul(){
		$data = array(
			'nama_ekskul' => ucwords($_POST['nama_ekskul']));
		$this->M_Ekskul->add_ekskul($data);

		$this->redirect_to('Berhasil Menambahkan Ekstrakulikuler', 'admin/ekstrakulikuler');
	}

	function update_ekskul(){
		if (isset($_POST['aktifkan'])) {
			$this->M_Ekskul->update_status($_POST['id_ekskul'], '1');
			$this->redirect_to('Berhasil Mengaktifkan Ekstrakulikuler', 'admin/ekstrakulikuler');
		} elseif (isset($_POST['tutup'])) {
			$this->M_Ekskul->update_status($_POST['id_ekskul'], '0');
			$this->redirect_to('Berhasil Menutup Ekstrakulikuler', 'admin/ekstrakulikuler');
		} elseif (isset($_POST['delete'])) {
			$this->M_Ekskul->delete($_POST['id_ekskul']);
			$this->redirect_to('Berhasil Menghapus Ekstrakulikuler', 'admin/ekstrakulikuler');
		}
	}

	// Function Guru

	function guru(){
		$data['agama'] = $this->M_Agama->getAll();
		$data['guru'] = $this->M_Tenkepen->getByRole(1);
		$data['identitas'] = $this->M_Sekolah->get_identitas();
		$data['title'] = "Guru";
		$this->template->set('title','Guru');
		$this->template->load('template/main','admin/guru', $data);
	}

	function add_guru(){
		$tgl = explode("-", $_POST['tgl_lahir']);
		$pass = $tgl[2].$tgl[1].$tgl[0];
		$data = array(
			'NIP'			=> $_POST['nip'],
			'nama_lengkap'	=> $_POST['nama_lengkap'],
			'tempat_lahir'	=> $_POST['tempat_lahir'],
			'tanggal_lahir'	=> $_POST['tgl_lahir'],
			'agama'			=> $_POST['agama'],
			'jenis_kelamin'	=> $_POST['jenis_kelamin'],
			'alamat'		=> $_POST['alamat'],
			'kecamatan'		=> $_POST['kecamatan'],
			'kota'			=> $_POST['kota'],
			'kode_pos'		=> $_POST['kode_pos'],
			'no_hp'			=> $_POST['no_hp'],
			'email_'		=> $_POST['email'],
			'user_'			=> $_POST['nip'],
			'pass_'			=> $pass,
			'status'		=> 1);
		$this->M_Tenkepen->add_tenkepen($data);

		$this->redirect_to('Berhasil Menambahkan Guru', 'admin/guru');

	}

	function update_guru(){

	}

	// Function Staff

	function staff(){
		$data['agama'] = $this->M_Agama->getAll();
		$data['staff'] = $this->M_Tenkepen->getByRole(2);
		$data['identitas'] = $this->M_Sekolah->get_identitas();
		$data['title'] = "Staff";
		$this->template->set('title','Staff');
		$this->template->load('template/main','admin/staff', $data);
	}

	function add_staff(){
		$tgl = explode("-", $_POST['tgl_lahir']);
		$pass = $tgl[2].$tgl[1].$tgl[0];
		$data = array(
			'NIP'			=> $_POST['nip'],
			'nama_lengkap'	=> $_POST['nama_lengkap'],
			'tempat_lahir'	=> $_POST['tempat_lahir'],
			'tanggal_lahir'	=> $_POST['tgl_lahir'],
			'agama'			=> $_POST['agama'],
			'jenis_kelamin'	=> $_POST['jenis_kelamin'],
			'alamat'		=> $_POST['alamat'],
			'kecamatan'		=> $_POST['kecamatan'],
			'kota'			=> $_POST['kota'],
			'kode_pos'		=> $_POST['kode_pos'],
			'no_hp'			=> $_POST['no_hp'],
			'email_'		=> $_POST['email'],
			'user_'			=> $_POST['nip'],
			'pass_'			=> $pass,
			'status'		=> 2);
		$this->M_Tenkepen->add_tenkepen($data);

		$this->redirect_to('Berhasil Menambahkan Staff', 'admin/staff');
	}

	function update_staff(){

	}

	function redirect_to($message, $link){
		echo "<script>
				alert ('".$message."');
				window.location.replace('".base_url($link)."');
			</script>";
	}
}

 ?>