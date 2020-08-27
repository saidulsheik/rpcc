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
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM budget_master ORDER BY budget_id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	
	/* Get budget details data */
	public function getBudgetDetailsData($id = null){
		if(!$id) {
			return false;
		}
		$sql = "SELECT * FROM budget_details WHERE budget_id = ?";
		$query = $this->db->query($sql, array($id));
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
					acc_head.activity_id,
					acc_head.unit,
					activity.output_id,
					activity.activity_code,
					activity.activity_name,
					output.output_name
					FROM
						budget_details
					LEFT JOIN acc_head ON acc_head.id=budget_details.acc_id
					LEFT JOIN activity ON activity.id=acc_head.activity_id
					LEFT JOIN output ON output.id=activity.output_id
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
			$data = array(
				'budget_desc' => $this->input->post('budget_desc'),
				'start_month' => $this->input->post('from_date'),
				'end_month' => $this->input->post('to_date'),
				'status' => 1
			);

			$this->db->where('budget_id', $id);
			$update = $this->db->update('budget_master', $data);
			$this->db->where('budget_id', $id);
			$this->db->delete('budget_details');
			
			$this->db->where('budget_id', $id);
			$count_acc_id = count($this->input->post('acc_id'));
			for($x = 0; $x < $count_acc_id; $x++) {
				$details = array(
					'acc_id' => $this->input->post('acc_id')[$x],
					'acc_code' => $this->input->post('acc_code')[$x],
					'budget_id' =>$id,
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
			return true;
		}
	}


}