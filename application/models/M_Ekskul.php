<?php 

/**
 * 
 */
class M_Ekskul extends CI_Model
{
	
	function getAll(){
		return $this->db->get('sia_ekskul');
	}

	function add_ekskul($data){
		$this->db->insert('sia_ekskul', $data);
	}

	function update_status($id, $status){
		$data = array(
			'status' => $status);
		$this->db->where('id_ekskul', $id);
		$this->db->update('sia_ekskul', $data);
	}

	function delete($id){
		$this->db->where('id_ekskul', $id);
		$this->db->delete('sia_ekskul');
	}
}

 ?>