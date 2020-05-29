<?php 

/**
 * 
 */
class M_Siswa extends CI_Model
{
	
	function getAll(){
		return $this->db->get('sia_siswa');
	}

	function getByAngkatan($tahun){
		$this->db->where('tahun_masuk', $tahun);
		return $this->db->get('sia_siswa');
	}

	function add_siswa($data){
		$this->db->insert('sia_siswa', $data);
	}
}

 ?>