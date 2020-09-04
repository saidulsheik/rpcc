<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Budgets extends Admin_Controller
{
	public function __construct(){
		parent::__construct();
		$this->not_logged_in();
		$this->data['page_title'] = 'Budgets';
		$this->load->model('model_budget');
	}

	/*
	* It only redirects to the manage budgets page
	*/
	public function index(){
		if(!in_array('viewBudget', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
		$this->data['page_title'] = 'Manage Budget';
		$this->render_template('budget/index', $this->data);
	}

	/*
	* Fetch Budget  data
	* this function is called from the datatable ajax function
	*/
	public function fetchbudgetData(){
		$result = array('data' => array());
        $data = $this->model_budget->getbudgetData();
        $i=0;
		foreach ($data as $key => $value) {
            $i++;
			$buttons = '';
			if(in_array('viewBudget', $this->permission)) {
				//.base_url('orders/printDiv/'.$value['id']).
				$buttons.= '<a target="__blank" href="'.base_url('budgets/budgetDetails/'.$value['budget_id']).'" title="View Details" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>';
			}

			if(in_array('updateBudget', $this->permission)) {
				$buttons .= ' <a href="'.base_url('budgets/update/'.$value['budget_id']).'"  title="Edit Budget"  class="btn btn-warning"><i class="fa fa-pencil"></i></a>';
			}

			if(in_array('deleteBudget', $this->permission)) {
				$buttons .= ' <button type="button" class="btn btn-danger" onclick="removeFunc('.$value['budget_id'].')" title="Delete Budget" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
			}



			$result['data'][$key] = array(
				$i,
                $value['budget_desc'],
                $value['start_month'],
				$value['end_month'],
				$value['status'],
				$buttons
			);
		} // /foreach

		echo json_encode($result);
	}

	/*
	* Create Budget
	*/
	public function create(){
		if(!in_array('createBudget', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		$this->data['page_title'] = 'Add Budget ';
		$this->form_validation->set_rules('budget_desc', 'Budget Description', 'trim|required');
		$this->form_validation->set_rules('from_date', 'From Date', 'trim|required');
		$this->form_validation->set_rules('to_date', 'To Date', 'trim|required');
        if ($this->form_validation->run() == TRUE) {
        	$success_id = $this->model_budget->create();
        	if($success_id) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('budgets/', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('budgets/', 'refresh');
        	}
        }
        else {
        	$this->data['account_head'] = $this->model_budget->getAccountsHeadData();
            $this->render_template('budget/create', $this->data);
        }
	}



	/*
	* Get active camp data
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
		if(!in_array('updateBudget', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
		if(!$id) {
			redirect('dashboard', 'refresh');
		}

		$this->data['page_title'] = 'Update Budget ';
		$this->form_validation->set_rules('budget_desc', 'Budget Description', 'trim|required');
		$this->form_validation->set_rules('from_date', 'From Date', 'trim|required');
		$this->form_validation->set_rules('to_date', 'To Date', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
        	$update = $this->model_budget->update($id);
        	if($update == true) {
        		$this->session->set_flashdata('success', 'Successfully updated');
        		redirect('budgets/update/'.$id, 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('budgets/update/'.$id, 'refresh');
        	}
        }
        else {
            // false case

        	$result = array();
        	$budget_master = $this->model_budget->getBudgetData($id);
    		$result['budget_master'] = $budget_master;
    		$budget_details = $this->model_budget->getBudgetDetailsData($budget_master['budget_id']);

    		foreach($budget_details as $k => $v) {
    			$result['budget_details'][] = $v;
    		}
    		$this->data['budgets'] = $result;
        	$this->data['account_head'] = $this->model_budget->getAccountsHeadData();
            $this->render_template('budget/edit', $this->data);
        }
	}

	public function number_to_bangla($number=null){
		if($number){
			return $this->number_to_bangla($number);
		}
	}
	

	


	public function budgetDetails($id){
		if(!in_array('viewBudget', $this->permission)) {
            redirect('dashboard', 'refresh');
		}

		if($id) {
			$this->data['page_title'] = 'Budget Report';
			$result = array();
        	$budget_master = $this->model_budget->getBudgetData($id);
    		$result['budget_master'] = $budget_master;
    		$budget_details = $this->model_budget->getBudgetDetailsReport($id);
			/* echo '<pre>';
			print_r($result);
			echo '</pre>';
			exit;  */
    		foreach($budget_details as $k => $v) {
    			$result['budget_details'][] = $v;
    		}
			$this->data['budgets'] = $result;
			
			$this->render_template('budget/viewBudgetDetails', $this->data);
		}
	}
	
	public function excelExport($id){
		if(!in_array('viewBudget', $this->permission)) {
            redirect('dashboard', 'refresh');
		}

		if($id) {
			$this->data['page_title'] = 'Budget Report';
			$result = array();
        	$budget_master = $this->model_budget->getBudgetData($id);
    		$result['budget_master'] = $budget_master;
    		$budget_details = $this->model_budget->getBudgetDetailsReport($id);
			  
    		foreach($budget_details as $k => $v) {
    			$result['budget_details'][] = $v;
    		}
			$this->data['budgets'] = $result;
			$this->load->view('budget/viewBudgetDetailsExcel', $this->data);
			//$this->render_template('budget/viewBudgetDetailsExcel', $this->data);
		}
	}

}
