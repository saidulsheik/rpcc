<?php 

class Model_cashgrant extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/* get cash grant master data */
	public function getCashGrantData($id = null){
		if($id) {
			$sql = "SELECT * FROM cg_master WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM cg_master ORDER BY id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	/* Get cash grant details data */
	public function getcgDetailsData($cg_id = null){
		if(!$cg_id) {
			return false;
		}
		$sql = "SELECT * FROM cg_details WHERE cg_id = ?";
		$query = $this->db->query($sql, array($cg_id));
		return $query->result_array();
	}
	/* Create new cash grant */
	public function create(){
		$this->db->trans_begin();
		$user_id = $this->session->userdata('id');
    	$data = array(
    		'cg_desc' => $this->input->post('cg_desc'),
    		'month_name' => $this->input->post('month_name'),
    		'total_amout' => $this->input->post('gross_amount_value'),
			'report_text_id' => $this->input->post('report_text_id'),
			'sarok_no' => $this->input->post('sarok_no'),
			'date' => $this->input->post('date'),
			'subject' => $this->input->post('subject'),
    		'status' => 1,
    		'created_by' => $user_id
    	);

		$insert = $this->db->insert('cg_master', $data);
		$cg_id = $this->db->insert_id();
		$count_camp_id = count($this->input->post('camp_id'));
    	for($x = 0; $x < $count_camp_id; $x++) {
    		$details = array(
    			'cg_id' => $cg_id,
    			'camp_id' => $this->input->post('camp_id')[$x],
    			'no_of_child' => $this->input->post('no_of_child')[$x],
    			'no_of_care' => $this->input->post('no_of_care')[$x],
    			'amount' => $this->input->post('amount_value')[$x]
    		);

    		$this->db->insert('cg_details', $details);
    	}

		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
		}else{
			$this->db->trans_commit();
		}
		
		return ($cg_id) ? $cg_id : false;
	}


	/* update cash grant */
	public function update($id){
		if($id) {
			$this->db->trans_begin();
			$user_id = $this->session->userdata('id');
			$data = array(
				'cg_desc' => $this->input->post('cg_desc'),
				'month_name' => $this->input->post('month_name'),
				'total_amout' => $this->input->post('gross_amount'),
				'report_text_id' => $this->input->post('report_text_id'),
				'sarok_no' => $this->input->post('sarok_no'),
				'date' => $this->input->post('date'),
				'subject' => $this->input->post('subject'),
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