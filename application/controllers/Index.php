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
	}

	function index(){
		$data['sekolah'] = $this->M_Sekolah->get_identitas();
		if (isset($_POST['login'])){
			$username = $_POST['username'];
			$pass = $_POST['pass'];
			$type = $_POST['type'];
			print_r($_POST);
			if ($type == 1){
				$siswaExist = $this->M_Siswa->login($username, $pass);
				if ($siswaExist->num_rows() > 0){
					print_r($siswaExist->result());
				} else {
					print_r($_POST);
//					$this->redirect_to("Username atau Password yang anda masukkan salah", "");
				}
			} elseif ($type == 2){
				$guruExist = $this->M_Tenkepen->login($username, $pass, 'status = 1');
				if ($guruExist->num_rows() > 0){
					print_r($guruExist->result());
				} else {
					print_r($_POST);
//					$this->redirect_to("Username atau Password yang anda masukkan salah", "");
				}
			} elseif ($type == 3){
				$guruExist = $this->M_Tenkepen->login($username, $pass, "waka_status = 1");
				if ($guruExist->num_rows() > 0){
					print_r($guruExist->result());
				} else {
					print_r($_POST);
//					$this->redirect_to("Username atau Password yang anda masukkan salah", "");
				}
			} elseif ($type == 4){
				$guruExist = $this->M_Tenkepen->login($username, $pass, "waka_status = 2");
				if ($guruExist->num_rows() > 0){
					print_r($guruExist->result());
				} else {
					print_r($_POST);
				}
			} elseif ($type == ""){
//				$this->redirect_to("Pilih login sebagai!", "");
			}
		}
		$this->load->view('index', $data);
	}

	function redirect_to($message, $link){
		echo "<script>
				alert ('".$message."');
				window.location.replace('".base_url($link)."');
			</script>";
	}
}


?>
