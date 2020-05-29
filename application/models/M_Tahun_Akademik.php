<?php 

/**
 * 
 */
class M_Tahun_Akademik extends CI_Model
{
	
	function saveTahun($tahun_akademik, $tahun, $tgl_mulai, $tgl_selesai){
		$data = array(
			'tahun_akademik' => $tahun_akademik,
			'tahun' => $tahun,
			'tgl_mulai' => $tgl_mulai,
			'tgl_selesai' => $tgl_selesai,
			'status' => 0);
		$this->db->insert('sia_akademik', $data);
	}

	function getAll(){
		return $this->db->get('sia_akademik');
	}

	function getByID($id){
		$this->db->where('id_akademik', $id);
		return $this->db->get('sia_akademik');
	}

	function updateAll(){
		$data = array(
			'status' => 0);
		$this->db->update('sia_akademik', $data);
	}

	function getTahunActive(){
		$this->db->where('status', 1);
		return $this->db->get('sia_akademik');
	}

	function activateTahun($id){
		$data = array(
			'status' => 1);
		$this->db->where('id_akademik', $id);
		$this->db->update('sia_akademik', $data);
	}

	function closeTahun($id){
		$data = array(
			'status' => 0);
		$this->db->where('id_akademik', $id);
		$this->db->update('sia_akademik', $data);
	}

	function getAngkatan(){
		return $this->db->get('t_angkatan');
	}

	function insertAngkatan($tahun){
		$data = array(
			'tahun_angkatan' => $tahun);
		$this->db->insert('t_angkatan', $data);
	}
}

 ?>