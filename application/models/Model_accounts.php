<?php 

class Model_accounts extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

    
    /* Get Activity Data */

    Public function getActivityData(){
        $sql = "SELECT
                   activity.id,
                   activity.activity_name 
                FROM
                activity
               ";
            $query = $this->db->query($sql);
            return $query->result();
    }

	/* get the brand data */
	public function getAccountHeadData($id = null){
		if($id) {
            $sql = "SELECT
                        acc_head.id,
                        acc_head.activity_id,
                        acc_head.acc_code,
                        acc_head.acc_head,
                        acc_head.acc_head,
                        acc_head.unit,
                        activity.activity_name
                    FROM
                        acc_head
                    LEFT JOIN activity ON activity.id = acc_head.activity_id
                    WHERE
                        acc_head.id = ?
                    ";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

     
        $sql = "SELECT
                    acc_head.id,
                    acc_head.activity_id,
                    acc_head.acc_code,
                    acc_head.acc_head,
                    acc_head.acc_head,
                    acc_head.unit,
                    activity.activity_name
                FROM
                    acc_head
                LEFT JOIN activity ON activity.id = acc_head.activity_id
               
                ";
            $query = $this->db->query($sql);
            return $query->result_array();
	}

	public function create($data)
	{
		if($data) {
			$insert = $this->db->insert('acc_head', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function update($data, $id)
	{
		if($data && $id) {
			$this->db->where('id', $id);
            $update = $this->db->update('acc_head', $data);
           /*  echo $this->db->last_query();
            exit; */
			return ($update == true) ? true : false;
		}
	}

	public function remove($id)
	{
		if($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('acc_head');
			return ($delete == true) ? true : false;
		}
	}

}