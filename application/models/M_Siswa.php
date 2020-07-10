<?php 

/**
 * 
 */
class M_Siswa extends CI_Model
{

	function login($user, $pass){
		$this->db->where('user_siswa', $user);
		$this->db->where('pass_siswa', $pass);
		$this->db->where('status', 1);
		return $this->db->get('sia_siswa');
	}

	function getAll(){
		$this->db->order_by('nama_siswa', 'asc');
		return $this->db->get('sia_siswa');
	}

	function getActiveSiswa(){
		$this->db->where('status', 1);
		return $this->db->get('sia_siswa');
	}

	function getByAngkatan($tahun){
		$this->db->where('tahun_masuk', $tahun);
		return $this->db->get('sia_siswa');
	}

	function add_siswa($data){
		$this->db->insert('sia_siswa', $data);
	}

	function getByID($id){
		$this->db->where('id_siswa', $id);
		return $this->db->get('sia_siswa');
	}
}

 ?>
