<?php	
/**
* 
*/
class Time extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}


	public function provide_timezone_list(){

		$query=$this->db->get('timezones');
		if($query->num_rows()>0){

			return $query->result();
		}else{
			return FALSE;
		}
	}
}