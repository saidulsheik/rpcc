<?php 

class Model_uniceffund extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	
	
	
	/* get Unicef Master data */
	public function getUnicefFundData($id = null){
		if($id) {
			$sql = "SELECT * FROM unief_fund_master WHERE unicef_fund_id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM unief_fund_master ORDER BY unicef_fund_id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	/* get Unicef fund details data */
	public function getUnicefFundDetailsData($unicef_fund_id = null){
		if($unicef_fund_id) {
			$sql = "
				SELECT
					uncef_fund_details.id,
					uncef_fund_details.acc_id,
					uncef_fund_details.acc_code,
					uncef_fund_details.unicef_fund_id,
					uncef_fund_details.qty,
					uncef_fund_details.no_of_month,
					acc_head.acc_head,
					acc_head.unit,
					budget_details.unit_cost
				FROM
					`uncef_fund_details`
				LEFT JOIN acc_head ON acc_head.id = uncef_fund_details.acc_id
				LEFT JOIN budget_details ON budget_details.acc_id = uncef_fund_details.acc_id
				WHERE
					uncef_fund_details.unicef_fund_id = ? AND budget_details.budget_id =(
					SELECT
						budget_master.budget_id
					FROM
						budget_master
					WHERE
						budget_master.status = 0
				)
			";
			$query = $this->db->query($sql, array($unicef_fund_id));
			return $query->result_array();
		}

		
	}

	




	/* Get unicef fund details and and acc_head with joining data */
	public function getUnicefDetailsReport($id = null){
		if(!$id) {
			return false;
		}
			$sql ="SELECT
					uncef_fund_details.id,
					uncef_fund_details.acc_id,
					uncef_fund_details.acc_code,
					uncef_fund_details.unicef_fund_id,
					uncef_fund_details.qty,
					uncef_fund_details.no_of_month,
					acc_head.activity_id,
					acc_head.acc_head,
					acc_head.unit,
					budget_details.unit_cost,
					activity.output_id,
					activity.activity_code,
					activity.activity_name,
					output.output_name
				FROM
					`uncef_fund_details`
				LEFT JOIN acc_head ON acc_head.id = uncef_fund_details.acc_id
				LEFT JOIN budget_details ON budget_details.acc_id = uncef_fund_details.acc_id
				LEFT JOIN activity ON activity.id=acc_head.activity_id
				LEFT JOIN output ON output.id=activity.output_id
				WHERE
					uncef_fund_details.unicef_fund_id = 3 AND budget_details.budget_id =(
					SELECT
						budget_master.budget_id
					FROM
						budget_master
					WHERE
						budget_master.status = 0
				)";
		$query = $this->db->query($sql, array($id));
		return $query->result_array();
	}

	
	/* Create new Unicef Fund */
	public function create(){

		
		$this->db->trans_begin();
		$user_id = $this->session->userdata('id');
    	$data = array(
    		'unicef_fund_desc' => $this->input->post('unicef_fund_desc'),
    		'start_month' => $this->input->post('start_month'),
    		'end_month' => $this->input->post('end_month'),
			'status' => 1
    	);

		$insert = $this->db->insert('unief_fund_master', $data);
		$unicef_fund_id = $this->db->insert_id();
		$count_acc_id = count($this->input->post('acc_id'));
    	for($x = 0; $x < $count_acc_id; $x++) {
				$details = array(
					'acc_id' => $this->input->post('acc_id')[$x],
					'acc_code' => $this->input->post('acc_code')[$x],
					'unicef_fund_id' => $unicef_fund_id,
					'qty' => $this->input->post('qty')[$x],
					'no_of_month' => $this->input->post('no_of_month')[$x],
				);
				$this->db->insert('uncef_fund_details', $details);
    	}

		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
		}else{
			$this->db->trans_commit();
		}
		
		return ($unicef_fund_id) ? $unicef_fund_id : false;
	}


	/* update budget*/
	public function update($unicef_fund_id){
		if($unicef_fund_id) {
			$this->db->trans_begin();
			$user_id = $this->session->userdata('id');
			$data = array(
				'unicef_fund_desc' => $this->input->post('unicef_fund_desc'),
				'start_month' => $this->input->post('start_month'),
				'end_month' => $this->input->post('end_month'),
				'status' => 1
			);

			$this->db->where('unicef_fund_id', $unicef_fund_id);
			$update = $this->db->update('unief_fund_master', $data);
			$this->db->where('unicef_fund_id', $unicef_fund_id);
			$this->db->delete('uncef_fund_details');
			$count_acc_id = count($this->input->post('acc_id'));
			for($x = 0; $x < $count_acc_id; $x++) {
					$details = array(
						'acc_id' => $this->input->post('acc_id')[$x],
						'acc_code' => $this->input->post('acc_code')[$x],
						'unicef_fund_id' => $unicef_fund_id,
						'qty' => $this->input->post('qty')[$x],
						'no_of_month' => $this->input->post('no_of_month')[$x],
					);
					$this->db->insert('uncef_fund_details', $details);
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