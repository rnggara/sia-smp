<?php 

/**
 * 
 */
class M_Tenkepen extends CI_Model
{

	function login($user, $pass, $type){
		$this->db->where('user_', $user);
		$this->db->where('pass_', $pass);
		$this->db->where($type);
		return $this->db->get('sia_tenkepen');
	}
	
	function getAll(){
		return $this->db->get('sia_tenkepen');
	}

	function getByID($id){
		$this->db->where('id_tenkepen', $id);
		return $this->db->get('sia_tenkepen');
	}

	function getByRole($status){
		$this->db->where('status', $status);
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
