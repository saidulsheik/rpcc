<?php 

class Model_officefund extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	
	
	
	/* get Office Master data */
	public function getOfficeFundData($id = null){
		if($id) {
			$sql = "SELECT * FROM of_master WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM of_master ORDER BY id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	/* get Office Master data */
	public function getOfficeFundDetailsData($id = null){
		if($id) {
			$sql = "SELECT * FROM of_details WHERE of_id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->result_array();
		}

		$sql = "SELECT * FROM of_details ORDER BY id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	/* get Office details data */
	public function getOfficeFundDetailsDataByOfidandAccid($of_id = null, $acc_h_id=null){
		if($of_id &&  $acc_h_id) {
			$sql = "SELECT * FROM of_details WHERE of_id = ? and acc_h_id=?";
			$query = $this->db->query($sql, array($of_id, $acc_h_id));
			return $query->result_array();
		}

		$sql = "SELECT * FROM of_details ORDER BY id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}




	/* Get budget details and and acc_head with joining data */
	public function getBudgetDetailsReport($id = null){
		if(!$id) {
			return false;
		}
			$sql ="SELECT
					budget_details.*,
					acc_head.acc_head,
					acc_head.unit
					FROM
						budget_details
					LEFT JOIN acc_head ON acc_head.id=budget_details.acc_id
				WHERE
					budget_details.budget_id = ?";
		$query = $this->db->query($sql, array($id));
		return $query->result_array();
	}

	/* Get acc_head data */
	public function getAccountsHeadData(){
		$sql = "SELECT acc_head.id as acc_id, acc_head.acc_code, acc_head.acc_head, acc_head.unit, activity.activity_name FROM acc_head LEFT JOIN activity on activity.id=acc_head.activity_id";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	/* Create new Budget */
	public function create(){

	/* 	echo '<pre>';
		print_r($_POST);
		echo '</pre>';
		exit; */

		$this->db->trans_begin();
		$user_id = $this->session->userdata('id');
    	$data = array(
    		'of_desc' => $this->input->post('of_desc'),
    		'month_name' => $this->input->post('month_name').','. $this->input->post('year'),
    		'total_amout' => $this->input->post('total_amout'),
			'status' => 1,
			'created_by'=>$user_id
    	);

		$insert = $this->db->insert('of_master', $data);
		$of_id = $this->db->insert_id();
		$qty_count = count($this->input->post('qty'));
    	for($x = 0; $x < $qty_count; $x++) {
			if(($this->input->post('qty')[$x]!=0)){
				$details = array(
					'of_id' =>$of_id,
					'acc_h_id' => $this->input->post('acc_id')[$x],
					'no_of_child' => $this->input->post('no_of_child')[$x],
					'qty' => $this->input->post('qty')[$x],
					'amount' => $this->input->post('amount')[$x],
				);
				$this->db->insert('of_details', $details);
			}
    		
    	}

		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
		}else{
			$this->db->trans_commit();
		}
		
		return ($of_id) ? $of_id : false;
	}


	/* update budget*/
	public function update($id){
		if($id) {
			$this->db->trans_begin();
			$user_id = $this->session->userdata('id');
			$data = array(
				'of_desc' => $this->input->post('of_desc'),
				'month_name' => $this->input->post('month_name').','. $this->input->post('year'),
				'total_amout' => $this->input->post('total_amout'),
				'status' => 1,
				'updated_by'=>$user_id
			);

			$this->db->where('id', $id);
			$update = $this->db->update('of_master', $data);
			$this->db->where('id', $id);
			$this->db->delete('of_details');
			$this->db->where('of_id', $id);
			$qty_count = count($this->input->post('qty'));
			for($x = 0; $x < $qty_count; $x++) {
				if(($this->input->post('qty')[$x]!=0)){
					$details = array(
						'of_id' =>$id,
						'acc_h_id' => $this->input->post('acc_id')[$x],
						'no_of_child' => $this->input->post('no_of_child')[$x],
						'qty' => $this->input->post('qty')[$x],
						'amount' => $this->input->post('amount')[$x],
					);
					$this->db->insert('of_details', $details);
				}
				
			}
	
			if ($this->db->trans_status() === FALSE){
				$this->db->trans_rollback();
			}else{
				$this->db->trans_commit();
			}
			
			return true;
		}
	}


}