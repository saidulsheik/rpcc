<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Uniceffunds extends Admin_Controller
{
	public function __construct(){
		parent::__construct();
		$this->not_logged_in();
		$this->data['page_title'] = 'Unicef Fund';
		$this->load->model('model_uniceffund');
		$this->load->model('model_budget');
	}

	/*
	* It only redirects to the manage budgets page
	*/
	public function index(){
		if(!in_array('viewUnicefFund', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
		$this->data['page_title'] = 'Manage Unicef Fund';
		$this->render_template('uniceffunds/index', $this->data);
	}

	/*
	* Fetch Budget  data
	* this function is called from the datatable ajax function
	*/
	public function fetchUnicefFundData(){
		$result = array('data' => array());
        $data = $this->model_uniceffund->getUnicefFundData();
        $i=0;
		foreach ($data as $key => $value) {
            $i++;
			$buttons = '';
			if(in_array('viewUnicefFund', $this->permission)) {
				//.base_url('orders/printDiv/'.$value['id']).
				$buttons.= '<a target="__blank" href="'.base_url('uniceffunds/uniceffundsDetails/'.$value['unicef_fund_id']).'" title="View Details" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>';
			}

			if(in_array('updateUnicefFund', $this->permission)) {
				$buttons .= ' <a href="'.base_url('uniceffunds/update/'.$value['unicef_fund_id']).'"  title="Edit"  class="btn btn-warning"><i class="fa fa-pencil"></i></a>';
			}

			if(in_array('deleteUnicefFund', $this->permission)) {
				$buttons .= ' <button type="button" class="btn btn-danger" onclick="removeFunc('.$value['unicef_fund_id'].')" title="Delete Budget" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
			}

			$result['data'][$key] = array(
				$i,
                $value['unicef_fund_desc'],
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
		if(!in_array('createUnicefFund', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
		
		$this->data['page_title'] = 'Add Unicef Fund';
		$this->form_validation->set_rules('unicef_fund_desc', 'Unicef Fund Description', 'trim|required');
		$this->form_validation->set_rules('start_month', 'Start Month', 'trim|required');
		$this->form_validation->set_rules('end_month', 'End Month', 'trim|required');
        if ($this->form_validation->run() == TRUE) {
        	$success_id = $this->model_uniceffund->create();
        	if($success_id) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('uniceffunds/', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('uniceffunds/', 'refresh');
        	}
        }
        else {
			$result = $this->db->query("SELECT budget_id FROM budget_master WHERE status = ?", array(0))->result();
        	$this->data['account_head'] = $this->model_budget->getBudgetDetailsReport($result[0]->budget_id);
            $this->render_template('uniceffunds/create', $this->data);
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
		if(!in_array('updateUnicefFund', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
		if(!$id) {
			redirect('dashboard', 'refresh');
		}

		$this->data['page_title'] = 'Update Unicef Fund';
		$this->form_validation->set_rules('unicef_fund_desc', 'Unicef Fund Description', 'trim|required');
		$this->form_validation->set_rules('start_month', 'Start Month', 'trim|required');
		$this->form_validation->set_rules('end_month', 'End Month', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
        	$update = $this->model_uniceffund->update($id);
        	if($update == true) {
        		$this->session->set_flashdata('success', 'Successfully updated');
        		redirect('uniceffunds/update/'.$id, 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('uniceffunds/update/'.$id, 'refresh');
        	}
        }
        else {
            // false case

			$result = array();
			$unief_fund_master = $this->model_uniceffund->getUnicefFundData($id);
    		$result['unief_fund_master'] = $unief_fund_master;
			
			
			$unicef_fund_details = $this->model_uniceffund->getUnicefFundDetailsData($unief_fund_master['unicef_fund_id']);
    		foreach($unicef_fund_details as $k => $v) {
    			$result['unicef_fund_details'][] = $v;
			}
    		$this->data['uniceffunds'] = $result;
			
            $this->render_template('uniceffunds/edit', $this->data);
        }
	}

	public function uniceffundsDetails($id){
		if(!in_array('viewUnicefFund', $this->permission)) {
            redirect('dashboard', 'refresh');
		}

		if($id) {
			$this->data['page_title'] = 'Unicef Fund Report';
			$result = array();
        	$of_master = $this->model_Uniceffund->getUnicefFundData($id);
    		$result['of_master'] = $of_master;
			
    		$of_details = $this->model_Uniceffund->getUnicefDetailsReport($of_master['id']);
			/* echo '<pre>';
			print_r($of_details);
			echo '</pre>';
			exit;  */ 
    		foreach($of_details as $k => $v) {
    			$result['of_details'][] = $v;
    		}
			$this->data['uniceffunds'] = $result;

			$this->render_template('uniceffunds/viewUnicefFundDetails', $this->data);
		}
	}

	


	/*
	*  Print Budget  Report
	*/
	


	public function budgetDetails($id){
		if(!in_array('viewUnicefFund', $this->permission)) {
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

			$this->render_template('budget/viewUnicefFundDetails', $this->data);
		}
	}

}
