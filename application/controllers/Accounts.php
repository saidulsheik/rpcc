<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Accounts extends Admin_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->not_logged_in();
		$this->data['page_title'] = 'Account Head';
		$this->load->model('model_accounts');
	}

	/* 
	* It only redirects to the manage product page and
	*/
	public function index()
	{
		if(!in_array('viewAccountHead', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$result = $this->model_accounts->getActivityData();

		$this->data['activities'] = $result;

		$this->render_template('accounts/index', $this->data);
	}

	/*
	* Fetches the brand data from the brand table 
	* this function is called from the datatable ajax function
	*/
	public function fetchAccountHeadData()
	{
		$result = array('data' => array());

        $data = $this->model_accounts->getAccountHeadData();
        $i=0;
		foreach ($data as $key => $value) {
            $i++;
			// button
			$buttons = '';

			if(in_array('viewAccountHead', $this->permission)) {
				$buttons .= '<button type="button" class="btn btn-warning" onclick="editAccountHead('.$value['id'].')" data-toggle="modal" data-target="#editAccountHeadModal"><i class="fa fa-pencil"></i></button>';	
			}
			
			if(in_array('deleteAccountHead', $this->permission)) {
				$buttons .= ' <button type="button" class="btn btn-danger" onclick="removeAccountHead('.$value['id'].')" data-toggle="modal" data-target="#removeAccountHeaddModal"><i class="fa fa-trash"></i></button>
				';
			}
			$result['data'][$key] = array(
                $i,
				$value['activity_name'],
				$value['acc_code'],
				$value['acc_head'],
				$value['unit'],
				$buttons
			);
		} // /foreach

		echo json_encode($result);
	}

	/*
	* It checks if it gets the brand id and retreives
	* the brand information from the brand model and 
	* returns the data into json format. 
	* This function is invoked from the view page.
	*/
	public function fetchAccountHeadDataById($id)
	{
		if($id) {
			$data = $this->model_accounts->getAccountHeadData($id);
			echo json_encode($data);
		}

		return false;
	}

	/*
	* Its checks the brand form validation 
	* and if the validation is successfully then it inserts the data into the database 
	* and returns the json format operation messages
	*/
	public function create()
	{

		if(!in_array('createAccountHead', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

        
		$response = array();

		$this->form_validation->set_rules('activity_id', 'Activity Name', 'trim|required');
		$this->form_validation->set_rules('acc_code', 'Account Code', 'trim|required');
		$this->form_validation->set_rules('acc_head', 'Account Head', 'trim|required');
		$this->form_validation->set_rules('unit', 'Unit', 'trim|required');

		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

        if ($this->form_validation->run() == TRUE) {
        	$data = array(
        		'activity_id' => $this->input->post('activity_id'),
        		'acc_code' => $this->input->post('acc_code'),	
        		'acc_head' => $this->input->post('acc_head'),	
        		'unit' => $this->input->post('unit'),	
        	);
        	$create = $this->model_accounts->create($data);
        	if($create == true) {
        		$response['success'] = true;
        		$response['messages'] = 'Succesfully created';
        	}
        	else {
        		$response['success'] = false;
        		$response['messages'] = 'Error in the database while creating the brand information';			
        	}
        }
        else {
        	$response['success'] = false;
        	foreach ($_POST as $key => $value) {
        		$response['messages'][$key] = form_error($key);
        	}
        }

        echo json_encode($response);

	}

	/*
	* Its checks the brand form validation 
	* and if the validation is successfully then it updates the data into the database 
	* and returns the json format operation messages
	*/
	public function update($id)
	{
		if(!in_array('updateAccountHead', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$response = array();

		if($id) {
			$this->form_validation->set_rules('edit_activity_id', 'Activity Name', 'trim|required');
            $this->form_validation->set_rules('edit_acc_code', 'Account Code', 'trim|required');
            $this->form_validation->set_rules('edit_acc_head', 'Account Head', 'trim|required');
            $this->form_validation->set_rules('edit_unit', 'Unit', 'trim|required');

			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

	        if ($this->form_validation->run() == TRUE) {
	        	$data = array(
                    'activity_id' => $this->input->post('edit_activity_id'),
                    'acc_code' => $this->input->post('edit_acc_code'),	
                    'acc_head' => $this->input->post('edit_acc_head'),	
                    'unit' => $this->input->post('edit_unit'),	
                );

	        	$update = $this->model_accounts->update($data, $id);
	        	if($update == true) {
	        		$response['success'] = true;
	        		$response['messages'] = 'Succesfully updated';
	        	}
	        	else {
	        		$response['success'] = false;
	        		$response['messages'] = 'Error in the database while updated the brand information';			
	        	}
	        }
	        else {
	        	$response['success'] = false;
	        	foreach ($_POST as $key => $value) {
	        		$response['messages'][$key] = form_error($key);
	        	}
	        }
		}
		else {
			$response['success'] = false;
    		$response['messages'] = 'Error please refresh the page again!!';
		}

		echo json_encode($response);
	}

	/*
	* It removes the brand information from the database 
	* and returns the json format operation messages
	*/
	public function remove()
	{
		if(!in_array('deleteAccountHead', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		
		$brand_id = $this->input->post('brand_id');
		$response = array();
		if($brand_id) {
			$delete = $this->model_accounts->remove($brand_id);

			if($delete == true) {
				$response['success'] = true;
				$response['messages'] = "Successfully removed";	
			}
			else {
				$response['success'] = false;
				$response['messages'] = "Error in the database while removing the brand information";
			}
		}
		else {
			$response['success'] = false;
			$response['messages'] = "Refersh the page again!!";
		}

		echo json_encode($response);
	}

}