<?php 

/**
 * 
 */
class M_Sekolah extends CI_Model
{
	
	function get_identitas(){
		return $this->db->get('sia_sekolah');
	}
}

 ?>