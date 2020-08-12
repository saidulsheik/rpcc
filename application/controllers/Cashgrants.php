<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cashgrants extends Admin_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->not_logged_in();
		$this->data['page_title'] = 'Add Cash Grants';
		$this->load->model('model_orders');
		$this->load->model('model_cashgrant');
		$this->load->model('model_camps');
		$this->load->model('model_company');
	}

	/* 
	* It only redirects to the manage order page
	*/
	public function index(){
		if(!in_array('viewOrder', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
		$this->data['page_title'] = 'Manage Cash Grants';
		$this->render_template('cashgrant/index', $this->data);		
	}

	/*
	* Fetches the orders data from the orders table 
	* this function is called from the datatable ajax function
	*/
	public function fetchCashGrantData(){
		$result = array('data' => array());
		$data = $this->model_cashgrant->getCashGrantData();
		foreach ($data as $key => $value) {
			$buttons = '';
			if(in_array('viewOrder', $this->permission)) {
				//.base_url('orders/printDiv/'.$value['id']).
				$buttons.= '<a target="__blank" href="'.base_url('cashgrants/printDiv/'.$value['id']).'" class="btn btn-default"><i class="fa fa-print"></i></a>';
			}

			if(in_array('updateOrder', $this->permission)) {
				$buttons .= ' <a href="'.base_url('cashgrants/update/'.$value['id']).'" class="btn btn-default"><i class="fa fa-pencil"></i></a>';
			}

			if(in_array('deleteOrder', $this->permission)) {
				$buttons .= ' <button type="button" class="btn btn-default" onclick="removeFunc('.$value['id'].')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
			}

			

			$result['data'][$key] = array(
				$value['month_name'],
				$value['cg_desc'],
				$value['total_amout'],
				$value['status'],
				$value['created_at'],
				$buttons
			);
		} // /foreach

		echo json_encode($result);
	}

	/*
	* If the validation is not valid, then it redirects to the create page.
	* If the validation for each input field is valid then it inserts the data into the database 
	* and it stores the operation message into the session flashdata and display on the manage group page
	*/
	public function create(){
		if(!in_array('createOrder', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
		$this->data['page_title'] = 'Add Cash Grant';
		$this->form_validation->set_rules('camp_id[]', 'Camp name', 'trim|required');
		$this->form_validation->set_rules('no_of_care[]', 'No of Care name', 'trim|required');
		$this->form_validation->set_rules('no_of_child[]', 'No of Child', 'trim|required');
        if ($this->form_validation->run() == TRUE) { 
        	$success_id = $this->model_cashgrant->create();
        	if($success_id) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('cashgrants/', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('cashgrants/', 'refresh');
        	} 
        }
        else {
        	$company = $this->model_company->getCompanyData(1);
        	$this->data['company_data'] = $company;
        	$this->data['camps'] = $this->model_camps->getActiveCampsData(); 
            $this->render_template('cashgrant/create', $this->data);
        }	
	}

	/*
	* It gets the product id passed from the ajax method.
	* It checks retrieves the particular product data from the product id 
	* and return the data into the json format.
	*/
	public function getProductValueById()
	{
		$product_id = $this->input->post('product_id');
		if($product_id) {
			$product_data = $this->model_products->getProductData($product_id);
			echo json_encode($product_data);
		}
	}

	/*
	* It gets the all the active product inforamtion from the product table 
	* This function is used in the order page, for the product selection in the table
	* The response is return on the json format.
	*/
	public function getCampDataRow()
	{
		$products = $this->model_camps->getActiveCampsData();
		echo json_encode($products);
	}
	


	/*
	* If the validation is not valid, then it redirects to the edit orders page 
	* If the validation is successfully then it updates the data into the database 
	* and it stores the operation message into the session flashdata and display on the manage group page
	*/
	public function update($id){
		if(!in_array('updateOrder', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
		if(!$id) {
			redirect('dashboard', 'refresh');
		}
		
		$this->data['page_title'] = 'Update Cash Grant';
		$this->form_validation->set_rules('camp_id[]', 'Camp name', 'trim|required');
		$this->form_validation->set_rules('no_of_care[]', 'No of Care name', 'trim|required');
		$this->form_validation->set_rules('no_of_child[]', 'No of Child', 'trim|required');
		
        if ($this->form_validation->run() == TRUE) {  
        	$update = $this->model_cashgrant->update($id);
        	if($update == true) {
        		$this->session->set_flashdata('success', 'Successfully updated');
        		redirect('cashgrants/update/'.$id, 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('cashgrants/update/'.$id, 'refresh');
        	}
        }
        else {
            // false case
        	$company = $this->model_company->getCompanyData(1);
        	$this->data['company_data'] = $company;
        	$result = array();
        	$cg_master = $this->model_cashgrant->getCashGrantData($id);
    		$result['cg_master'] = $cg_master;
    		$cg_details = $this->model_cashgrant->getcgDetailsData($cg_master['id']);
			
    		foreach($cg_details as $k => $v) {
    			$result['cg_details'][] = $v;
    		}
    		$this->data['cg'] = $result;
        	$this->data['camps'] = $this->model_camps->getActiveCampsData(); 
            $this->render_template('cashgrant/edit', $this->data);
        }
	}

	/*
	* It removes the data from the database
	* and it returns the response into the json format
	*/
	public function remove()
	{
		if(!in_array('deleteOrder', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		$order_id = $this->input->post('order_id');

        $response = array();
        if($order_id) {
            $delete = $this->model_orders->remove($order_id);
            if($delete == true) {
                $response['success'] = true;
                $response['messages'] = "Successfully removed"; 
            }
            else {
                $response['success'] = false;
                $response['messages'] = "Error in the database while removing the product information";
            }
        }
        else {
            $response['success'] = false;
            $response['messages'] = "Refersh the page again!!";
        }

        echo json_encode($response); 
	}

	/*
	* It gets the product id and fetch the order data. 
	* The order print logic is done here 
	*/
	public function printDiv($id)
	{
		if(!in_array('viewOrder', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        
		if($id) {
			$cashgrant_master=$this->db->query(" SELECT * FROM cg_master WHERE id = $id")->result();
			$cashgrant_data=$this->db->query("
									SELECT
										cg_details.no_of_child,
										cg_details.no_of_care,
										cg_details.amount,
										camp_info.camp_id,
										camp_info.upailla,
										camp_info.carea
									FROM
										cg_details
									LEFT JOIN camp_info ON camp_info.id = cg_details.camp_id
									WHERE
										cg_details.cg_id =	$id
							")->result();
							
							echo '<pre>';
							print_r($cashgrant_master);
							echo '</pre>';
							
			?>
			<!DOCTYPE html>
			<html lang="en">
			<head>
			  <title>Cash Grant Report</title>
			  <meta charset="utf-8">
			  <meta name="viewport" content="width=device-width, initial-scale=1">
			  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
			  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
			  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
			</head>
			<body>
			<div class="container center">
			  <div class="row">
				<table class="table table-border">
					<tr>
						<td><img src="<?php echo base_url();?>/assets/images/cashgrants/image001.jpg"></td>
						<td>
							<p>
								গণপ্রজাতন্ত্রীবাংলাদেশ সরকার<br>
								সমাজসেবা অধিদপ্তর<br>
								রোহিঙ্গা শিশুসুরক্ষা কার্যক্রম<br>
								সোনারপাড়া, উখিয়া কক্সবাজার
							</p>  
						</td>
						<td><img src="<?php echo base_url();?>/assets/images/cashgrants/image002.jpg"></td> 
						
					</tr>
				</table>
				
				<!--table class="table table-border">
					<thead>
						<tr>
							<th>ক্রমিক নং</th>
							<th>ক্যাম্প নং</td>
							<th>উপকারভোগী  শিশুর সংখ্যা</th> 
							<th>ফোস্টার  কেয়ারগিবার সংখ্যা</th> 
							<th>নগদ সহায়তার পরিমান</th>  
							<th>মাসের সংখ্যা</th> 
							<th>নগদ সহায়তার বিতরনের জন্য অর্থ সহায়তা</th>   
						</tr> 
					</thead>
					<tbody>
						<tr>
							<td>ক্রমিক নং</td>
							<td>ক্যাম্প নং</td>
							<td>উপকারভোগী  শিশুর সংখ্যা</td> 
							<td>ফোস্টার  কেয়ারগিবার সংখ্যা</td> 
							<td>নগদ সহায়তার পরিমান</td>  
							<td>মাসের সংখ্যা</td> 
							<td>নগদ সহায়তার বিতরনের জন্য অর্থ সহায়তা</td>   
						</tr>
					</tbody>
				</table-->
				<table class="table table-border">
					
					<thead>
						<tr>
							<td>
						</tr>
					</thead>
					<thead>
						<tr></tr>
					</thead>
					<tbody>
						
					</tbody>
				</table>
			</div>
			</body>
			</html>
			<?php 
		}
	}

}
