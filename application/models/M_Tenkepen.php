<?php 

/**
 * 
 */
class M_Tenkepen extends CI_Model
{
	
	function getAll(){
		return $this->db->get('sia_tenkepen');
	}

	function getGuru(){
		$this->db->where('status', 1);
		return $this->db->get('sia_tenkepen');
	}

	function getStaff(){
		$this->db->where('status', 2);
		return $this->db->get('sia_tenkepen');
	}

	function add_tenkepen($data){
		$this->db->insert('sia_tenkepen', $data);
	}

	function delete($id){
		$data = array(
			'status' => 0);
		$this->db->where('id_tenkepen', $id);
		$this->db->update('sia_tenkepen');
	}
}

 ?>