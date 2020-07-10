<?php

class Index extends CI_Controller{

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
	}

	function index(){
		is_login();
		$data['sekolah'] = $this->M_Sekolah->get_identitas();
		if (isset($_POST['login'])){
			$username = $_POST['username'];
			$pass = $_POST['pass'];
			$type = $_POST['type'];
			if ($type == 1){
				$siswaExist = $this->M_Siswa->login($username, $pass);
				if ($siswaExist->num_rows() > 0){
					$catSiswa = $siswaExist->result()[0];
					$this->session->id = $catSiswa->id_siswa;
					login($username, $type);
				} else {
					invalid_login();
				}
			} elseif ($type == 2){
				$guruExist = $this->M_Tenkepen->login($username, $pass, 'status = 1');
				if ($guruExist->num_rows() > 0){
					$catGuru = $guruExist->result()[0];
					$this->session->id = $catGuru->id_tenkepen;
					login($username, $type);
				} else {
					invalid_login();
				}
			} elseif ($type == 3){
				$guruExist = $this->M_Tenkepen->login($username, $pass, "waka_status = 1");
				if ($guruExist->num_rows() > 0){
					$catGuru = $guruExist->result()[0];
					$this->session->id = $catGuru->id_tenkepen;
					login($username, $type);
				} else {
					invalid_login();
				}
			} elseif ($type == 4){
				$guruExist = $this->M_Tenkepen->login($username, $pass, "waka_status = 2");
				if ($guruExist->num_rows() > 0){
					$catGuru = $guruExist->result()[0];
					$this->session->id = $catGuru->id_tenkepen;
					login($username, $type);
				} else {
					invalid_login();
				}
			}
		}
		$this->load->view('index', $data);
	}

	function logout(){
		logout();
	}
}


?>
