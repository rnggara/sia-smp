<?php 

/**
 * 
 */
class M_Ekskul extends CI_Model
{
	
	function getAll(){
		return $this->db->get('sia_ekskul');
	}

	function getActive(){
		$this->db->where('status', 1);
		return $this->db->get('sia_ekskul');
	}

	function getByID(){
		$this->db->where('id_ekskul', 1);
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

	function get_ekskul_sisw($id, $tahun){
		$this->db->where('id_ekskul', $id);
		$this->db->where('id_akademik', $tahun);
		return $this->db->get('t_ekskul_siswa');
	}

	function add_ekskul_siswa($data){
		$this->db->insert('t_ekskul_siswa', $data);
	}

	function get_pembina_ekskul(){
		return $this->db->get('t_pembina_ekskul');
	}

	function set_pembina_ekskul($data){
		$this->db->insert('t_pembina_ekskul', $data);
	}
}

 ?>