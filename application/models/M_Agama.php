<?php 

/**
 * 
 */
class M_Agama extends CI_Model
{
	
	function getAll(){
		return $this->db->get('t_agama');
	}
}

 ?>