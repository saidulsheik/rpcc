<?php 

class Model_cashgrant extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/* get the orders data */
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

	// get the orders item data
	public function getcgDetailsData($cg_id = null){
		if(!$cg_id) {
			return false;
		}
		$sql = "SELECT * FROM cg_details WHERE cg_id = ?";
		$query = $this->db->query($sql, array($cg_id));
		return $query->result_array();
	}

	public function create()
	{
		$this->db->trans_begin();
		$user_id = $this->session->userdata('id');
    	$data = array(
    		'cg_desc' => $this->input->post('cg_desc'),
    		'month_name' => $this->input->post('month_name'),
    		'total_amout' => $this->input->post('gross_amount_value'),
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

	public function countOrderItem($order_id)
	{
		if($order_id) {
			$sql = "SELECT * FROM orders_item WHERE order_id = ?";
			$query = $this->db->query($sql, array($order_id));
			return $query->num_rows();
		}
	}

	public function update($id)
	{
		if($id) {
			/* echo '<pre>';
			print_r($_POST);
			echo '</pre>';
			exit;   */ 
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

			// now decrease the product qty
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



	public function remove($id)
	{
		if($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('orders');

			$this->db->where('order_id', $id);
			$delete_item = $this->db->delete('orders_item');
			return ($delete == true && $delete_item) ? true : false;
		}
	}

	public function countTotalPaidOrders()
	{
		$sql = "SELECT * FROM orders WHERE paid_status = ?";
		$query = $this->db->query($sql, array(1));
		return $query->num_rows();
	}

}