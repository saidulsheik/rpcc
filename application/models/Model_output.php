<?php 

class Model_output extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

    /* Get Output data */
	
	public function getOutputData($id = null){
		
		if($id) {
			$sql = "SELECT * FROM output WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM output";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	
	public function create($data)
	{
		if($data) {
			$insert = $this->db->insert('output', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function update($data, $id)
	{
		if($data && $id) {
			$this->db->where('id', $id);
            $update = $this->db->update('output', $data);
           /*  echo $this->db->last_query();
            exit; */
			return ($update == true) ? true : false;
		}
	}

	public function remove($id)
	{
		if($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('output');
			return ($delete == true) ? true : false;
		}
	}

}