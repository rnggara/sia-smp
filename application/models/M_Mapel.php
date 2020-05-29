<?php 

/**
 * 
 */
class M_Mapel extends CI_Model
{
	
	function getAll(){
		return $this->db->get('sia_mapel');
	}

	function add_mapel($nama_mapel, $tahun_akademik, $tingkat){
		$data = array(
			'nama_mapel' => $nama_mapel,
			'tahun_akademik' => $tahun_akademik,
			'tingkat' => $tingkat);
		$this->db->insert('sia_mapel', $data);
	}

	function update_mapel($id, $nama_mapel, $tahun_akademik, $tingkat){
		$data = array(
			'nama_mapel' => $nama_mapel,
			'tahun_akademik' => $tahun_akademik,
			'tingkat' => $tingkat);
		$this->db->where('id_mapel', $id);
		$this->db->insert('sia_mapel', $data);
	}

	function delete_mapel($id){
		$this->db->where('id_mapel', $id);
		$this->db->delete('sia_mapel');
	}

	function getByID($id){
		$this->db->where('id_mapel', $id);
		return $this->db->get('sia_mapel');
	}

	function getByTingkat($tingkat){
		$this->db->where('tingkat', $tingkat);
		return $this->db->get('sia_mapel');
	}
}

 ?>