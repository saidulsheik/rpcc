<?php 

class Model_reporttext extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/* get the orders data */
	public function getReportTextData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM report_text WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM report_text ORDER BY id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	

	public function create(){
    	$data = array(
    		'name'=>$this->input->post('name'),
    		'header1'=>$this->input->post('header1'),
    		'header2'=>$this->input->post('header2'),
    		'footer1'=>$this->input->post('footer1'),
    		'footer2'=>$this->input->post('footer2'),
    		'signature_left'=>$this->input->post('signature_left'),
    		'signature_right'=>$this->input->post('signature_right')
    	);

		$insert = $this->db->insert('report_text', $data);
		return ($insert) ? $insert : false;
	}

	

	public function update($id)
	{
		if($id) {
			$data = array(
				'name'=>$this->input->post('name'),
				'header1'=>$this->input->post('header1'),
				'header2'=>$this->input->post('header2'),
				'footer1'=>$this->input->post('footer1'),
				'footer2'=>$this->input->post('footer2'),
				'signature_left'=>$this->input->post('signature_left'),
				'signature_right'=>$this->input->post('signature_right')
	    	);

			$this->db->where('id', $id);
			$update = $this->db->update('report_text', $data);
			return ($update) ? true : false;
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