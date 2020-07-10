<?php 

	function login($user, $type){
		$ci = & get_instance();
		$ci->session->username = $user;
		$ci->session->type = $type;
		if ($type == 1) {
			redirect_to('siswa');
		} elseif ($type == 2) {
			redirect_to('guru');
		} else {
			redirect_to('admin');
		}
	}

	function is_login(){
		$ci = & get_instance();
		if (isset($ci->session->username)) {
			if ($ci->session->type == 1) {
				redirect_to('siswa');
			} elseif ($_SESSION['type'] == 2) {
				redirect_to('guru');
			} else {
				redirect_to('admin');
			}
		}
	}

	function invalid_login(){
		echo "<script>alert('Maaf, username dan password yang anda masukkan salah');</script>";
		redirect_to('/');
	}

	function redirect_to($uri){
		$ci = & get_instance();
		echo "<script>window.location.replace('".base_url($uri)."')</script>";
	}

	function isAccessible($type){
		$ci = & get_instance();
		if (isset($ci->session->username)) {
			if (!in_array($ci->session->type, $type)) {
				echo "<script>alert('Maaf, anda tidak punya hak untuk mengakses halaman ini');</script>";
				redirect_to('/');
				$ci->session->sess_destroy();
			}
		} else {
			echo "<script>alert('Maaf, anda harus login terlebih dahulu');</script>";
			redirect_to('/');
		}
	}

	function logout(){
		$ci = & get_instance();
		$ci->session->sess_destroy();
		redirect_to('/');
	}

 ?>
