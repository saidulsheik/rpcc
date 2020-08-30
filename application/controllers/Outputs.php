<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Outputs extends Admin_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->not_logged_in();
		$this->data['page_title'] = 'Output';
		$this->load->model('model_output');
	}

	/* 
	* It only redirects to the manage product page and
	*/
	public function index()
	{
		if(!in_array('viewOutput', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$result = $this->model_output->getOutputData();

		$this->data['outputs'] = $result;

		$this->render_template('output/index', $this->data);
	}

	/*
	* Fetches the brand data from the brand table 
	* this function is called from the datatable ajax function
	*/
	public function fetchOutputData()
	{
		$result = array('data' => array());

        $data = $this->model_output->getOutputData();
        $i=0;
		foreach ($data as $key => $value) {
            $i++;
			// button
			$buttons = '';

			if(in_array('viewOutput', $this->permission)) {
				$buttons .= '<button type="button" class="btn btn-warning" onclick="editOutput('.$value['id'].')" data-toggle="modal" data-target="#editOutputModal"><i class="fa fa-pencil"></i></button>';	
			}
			
			if(in_array('deleteOutput', $this->permission)) {
				$buttons .= ' <button type="button" class="btn btn-danger" onclick="removeOutput('.$value['id'].')" data-toggle="modal" data-target="#removeOutputModal"><i class="fa fa-trash"></i></button>
				';
			}
			$result['data'][$key] = array(
                $i,
				$value['output_name'],
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
	public function fetchOutputDataById($id)
	{
		if($id) {
			$data = $this->model_output->getOutputData($id);
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

		if(!in_array('createOutput', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

        
		$response = array();

		$this->form_validation->set_rules('output_name', 'Output Name', 'trim|required');
		

		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

        if ($this->form_validation->run() == TRUE) {
        	$data = array(
        		'output_name' => $this->input->post('output_name')
        	);
        	$create = $this->model_output->create($data);
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
		if(!in_array('updateOutput', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$response = array();
		if($id) {
			$this->form_validation->set_rules('edit_output_name', 'Output Name', 'trim|required');
			
			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

	        if ($this->form_validation->run() == TRUE) {
				
	        	$data = array(
                    'output_name' => $this->input->post('edit_output_name')
                );

	        	$update = $this->model_output->update($data, $id);
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
			$delete = $this->model_output->remove($brand_id);

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