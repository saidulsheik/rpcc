<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ReportText extends Admin_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->not_logged_in();
		$this->data['page_title'] = 'ReportText';
		$this->load->model('model_reporttext');
	}

	/* 
	* It only redirects to the manage order page
	*/
	public function index(){
		if(!in_array('viewReportText', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
		$this->data['page_title'] = 'Manage Reporttext';
		$this->render_template('reporttext/index', $this->data);		
	}

	/*
	* Fetches the reporttext data from the reporttext table 
	* this function is called from the datatable ajax function
	*/
	public function fetchReportTextsData()
	{
		$result = array('data' => array());

		$data = $this->model_reporttext->getReportTextData();
		$i=0;
		foreach ($data as $key => $value) {
			$i++;
			$count_total_item = $this->model_reporttext->countOrderItem($value['id']);
			// button
			$buttons = '';

			if(in_array('viewReportText', $this->permission)) {
				$buttons .= '<a target="__blank" href="'.base_url('reporttext/printDiv/'.$value['id']).'" class="btn btn-default"><i class="fa fa-print"></i></a>';
			}

			if(in_array('updateReportText', $this->permission)) {
				$buttons .= ' <a href="'.base_url('reporttext/update/'.$value['id']).'" class="btn btn-default"><i class="fa fa-pencil"></i></a>';
			}

			if(in_array('deleteReportText', $this->permission)) {
				$buttons .= ' <button type="button" class="btn btn-default" onclick="removeFunc('.$value['id'].')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
			}

			
			$result['data'][$key] = array(
				$i,
				$value['name'],
				$value['header1'],
				$value['header2'],
				$value['footer1'],
				$value['footer2'],
				$value['signature_left'],
				$value['signature_right'],
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
	public function create()
	{
		if(!in_array('createReportText', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		$this->data['page_title'] = 'Add Report Text';

		$this->form_validation->set_rules('name', 'Report Name', 'trim|required');
		$this->form_validation->set_rules('header1', 'Report Header 1', 'trim|required');
		$this->form_validation->set_rules('header2', 'Report Header 2', 'trim|required');
		$this->form_validation->set_rules('footer1', 'Report Footer 1', 'trim|required');
		$this->form_validation->set_rules('footer2', 'Report Footer 2', 'trim|required');
		$this->form_validation->set_rules('signature_left', 'Report Signature Left', 'trim|required');
		$this->form_validation->set_rules('signature_right', 'Report Signature Right', 'trim|required');
		
	
        if ($this->form_validation->run() == TRUE) {        	
        	
        	$order_id = $this->model_reporttext->create();
        	
        	if($order_id) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('reporttext/update/'.$order_id, 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('reporttext/create/', 'refresh');
        	}
        }
        else {

            $this->render_template('reporttext/create', $this->data);
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
	public function getTableProductRow()
	{
		$products = $this->model_products->getActiveProductData();
		echo json_encode($products);
	}

	/*
	* If the validation is not valid, then it redirects to the edit reporttext page 
	* If the validation is successfully then it updates the data into the database 
	* and it stores the operation message into the session flashdata and display on the manage group page
	*/
	public function update($id)
	{
		if(!in_array('updateCashgrant', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		if(!$id) {
			redirect('dashboard', 'refresh');
		}

		$this->data['page_title'] = 'Update Order';

		$this->form_validation->set_rules('product[]', 'Product name', 'trim|required');
		
	
        if ($this->form_validation->run() == TRUE) {        	
        	
        	$update = $this->model_reporttext->update($id);
        	
        	if($update == true) {
        		$this->session->set_flashdata('success', 'Successfully updated');
        		redirect('reporttext/update/'.$id, 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('reporttext/update/'.$id, 'refresh');
        	}
        }
        else {
            // false case
        	$company = $this->model_company->getCompanyData(1);
        	$this->data['company_data'] = $company;
        	$this->data['is_vat_enabled'] = ($company['vat_charge_value'] > 0) ? true : false;
        	$this->data['is_service_enabled'] = ($company['service_charge_value'] > 0) ? true : false;

        	$result = array();
        	$reporttext_data = $this->model_reporttext->getreporttextData($id);

    		$result['order'] = $reporttext_data;
    		$reporttext_item = $this->model_reporttext->getreporttextItemData($reporttext_data['id']);

    		foreach($orders_item as $k => $v) {
    			$result['order_item'][] = $v;
    		}

    		$this->data['order_data'] = $result;

        	$this->data['products'] = $this->model_products->getActiveProductData();      	

            $this->render_template('orders/edit', $this->data);
        }
	}

	/*
	* It removes the data from the database
	* and it returns the response into the json format
	*/
	public function remove()
	{
		if(!in_array('deleteCashgrant', $this->permission)) {
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
	

}