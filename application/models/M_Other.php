<?php 

/**
 * 
 */
class M_Other extends CI_Model
{
	
	function getAll(){
		return $this->db->get('t_agama');
	}

	function getHari(){
		return $this->db->get('t_hari');
	}

	function getJam(){
		return $this->db->get('t_jam_pelajaran');
	}
}

 ?>