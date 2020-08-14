<?php 

class Model_budget extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/* get cash grant master data */
	public function getBudgetData($id = null){
		if($id) {
			$sql = "SELECT * FROM budget_master WHERE budget_id = ?";
			$query = $this->db->query($sql, array($budget_id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM budget_master ORDER BY budget_id DESC";
		$query = $this->db->query($sql);
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
		$this->db->trans_begin();
    	$data = array(
    		'budget_desc' => $this->input->post('budget_desc'),
    		'start_month' => $this->input->post('from_date'),
    		'end_month' => $this->input->post('to_date'),
    		'status' => 1
    	);

		$insert = $this->db->insert('budget_master', $data);
		$budget_id = $this->db->insert_id();
		$count_acc_id = count($this->input->post('acc_id'));
    	for($x = 0; $x < $count_acc_id; $x++) {
    		$details = array(
    			'acc_id' => $this->input->post('acc_id')[$x],
    			'acc_code' => $this->input->post('acc_code')[$x],
    			'budget_id' =>$budget_id,
    			'qty' => $this->input->post('qty')[$x],
    			'no_of_month' => $this->input->post('no_of_month')[$x],
    			'unit_cost' => $this->input->post('unit_cost')[$x],
    		);

    		$this->db->insert('budget_details', $details);
    	}

		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
		}else{
			$this->db->trans_commit();
		}
		
		return ($budget_id) ? $budget_id : false;
	}


	/* update budget*/
	public function update($id){
		if($id) {
			$this->db->trans_begin();
			$user_id = $this->session->userdata('id');
			$data = array(
				'cg_desc' => $this->input->post('cg_desc'),
				'month_name' => $this->input->post('month_name'),
				'total_amout' => $this->input->post('gross_amount'),
				'status' => 1,
				'updated_by' => $user_id
			);

			$this->db->where('id', $id);
			$update = $this->db->update('cg_master', $data);
			$this->db->where('cg_id', $id);
			$this->db->delete('cg_details');
			$count_camp_id = count($this->input->post('camp_id'));
			for($x = 0; $x < $count_camp_id; $x++) {
				$details = array(
					'cg_id' => $id,
					'camp_id' => $this->input->post('camp_id')[$x],
					'no_of_child' => $this->input->post('no_of_child')[$x],
					'no_of_care' => $this->input->post('no_of_care')[$x],
					'amount' => $this->input->post('amount')[$x]
				);

				$this->db->insert('cg_details', $details);
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