<?php 

class Model_camps extends CI_Model
{
	public function __construct(){
		parent::__construct();
	}
	/* Count Total No. of Camps */
	public function countTotalCamps(){
		$sql = "SELECT * FROM camp_info";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
	
	
	/* Count Total No. of Upzilla */
	public function countTotalUpzilla(){
		$sql = "SELECT DISTINCT(upailla) as total_upzilla FROM camp_info";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
	
	
	public function getActiveCampsData($id = null){
		if($id) {
			$sql = "SELECT * FROM camp_info where id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM camp_info ORDER BY id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
}