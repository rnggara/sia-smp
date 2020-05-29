<?php 

/**
 * 
 */
class M_Kelas extends CI_Model
{
	
	function getAll(){
		return $this->db->get('sia_kelas');
	}

	function add_kelas($nama, $tingkat){
		$data = array(
			'nama_kelas' => $nama,
			'tingkat' => $tingkat);
		$this->db->insert('sia_kelas', $data);
	}

	function delete_kelas($id){
		$this->db->where($id);
		$this->db->delete('sia_kelas');
	}

	function update_kelas($id, $nama, $tingkat){
		$data = array(
			'nama_kelas' => $nama,
			'tingkat' => $tingkat);
		$this->db->where('id_kelas', $id);
		$this->db->insert('sia_kelas', $data);
	}

	function getByID($id){
		$this->db->where('id_kelas', $id);
		return $this->db->get('sia_kelas');
	}
}

 ?>