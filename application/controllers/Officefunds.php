<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Officefunds extends Admin_Controller
{
	public function __construct(){
		parent::__construct();
		$this->not_logged_in();
		$this->data['page_title'] = 'Office Fund';
		$this->load->model('model_officefund');
		$this->load->model('model_budget');
		$this->load->model('model_reporttext');
	}

	/*
	* It only redirects to the manage budgets page
	*/
	public function index(){
		if(!in_array('viewOfficeFund', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
		$this->data['page_title'] = 'Manage Office Fund';
		$this->render_template('officefunds/index', $this->data);
	}

	/*
	* Fetch Budget  data
	* this function is called from the datatable ajax function
	*/
	public function fetchOfficeFundData(){
		$result = array('data' => array());
        $data = $this->model_officefund->getOfficeFundData();
        $i=0;
		foreach ($data as $key => $value) {
            $i++;
			$buttons = '';
			if(in_array('viewOfficeFund', $this->permission)) {
				//.base_url('orders/printDiv/'.$value['id']).
				$buttons.= '<a target="__blank" href="'.base_url('officefunds/officefundsDetails/'.$value['id']).'" title="View Details" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>';
			}

			if(in_array('updateOfficeFund', $this->permission)) {
				$buttons .= ' <a href="'.base_url('officefunds/update/'.$value['id']).'"  title="Edit Budget"  class="btn btn-warning"><i class="fa fa-pencil"></i></a>';
			}

			if(in_array('deleteOfficeFund', $this->permission)) {
				$buttons .= ' <button type="button" class="btn btn-danger" onclick="removeFunc('.$value['id'].')" title="Delete Budget" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
			}

			$result['data'][$key] = array(
				$i,
                $value['month_name'],
                $value['of_desc'],
				$value['total_amout'],
				$value['status'],
				$value['created_at'],
				$buttons
			);
		} // /foreach

		echo json_encode($result);
	}

	/*
	* Create Budget
	*/
	public function create(){
		if(!in_array('createOfficeFund', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		$this->data['page_title'] = 'Add Office Fund';
		$this->form_validation->set_rules('of_desc', 'Fund Description', 'trim|required');
		$this->form_validation->set_rules('month_name', 'Month Name', 'trim|required');
		$this->form_validation->set_rules('year', 'Year', 'trim|required');
		$this->form_validation->set_rules('report_text_id', 'Select Report Text', 'trim|required');
        if ($this->form_validation->run() == TRUE) {
        	$success_id = $this->model_officefund->create();
        	if($success_id) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('officefunds/', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('officefunds/', 'refresh');
        	}
        }
        else {
			$this->data['report_texts'] = $this->model_reporttext->getReportTextData();
			$result = $this->db->query("SELECT budget_id FROM budget_master WHERE status = ?", array(0))->result();
        	$this->data['account_head'] = $this->model_budget->getBudgetDetailsReport($result[0]->budget_id);
            $this->render_template('officefunds/create', $this->data);
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
		if(!in_array('updateOfficeFund', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
		if(!$id) {
			redirect('dashboard', 'refresh');
		}

		$this->data['page_title'] = 'Update Office Fund ';
		$this->form_validation->set_rules('of_desc', 'Fund Description', 'trim|required');
		$this->form_validation->set_rules('month_name', 'Month Name', 'trim|required');
		$this->form_validation->set_rules('year', 'Year', 'trim|required');
		$this->form_validation->set_rules('report_text_id', 'Select Report Text', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
        	$update = $this->model_officefund->update($id);
        	if($update == true) {
        		$this->session->set_flashdata('success', 'Successfully updated');
        		redirect('officefunds/update/'.$id, 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('officefunds/update/'.$id, 'refresh');
        	}
        }
        else {
            // false case

			$result = array();
			$fund_master = $this->model_officefund->getOfficeFundData($id);
    		$result['fund_master'] = $fund_master;
			$fund_details = $this->model_officefund->getOfficeFundDetailsData($fund_master['id']);
    		foreach($fund_details as $k => $v) {
    			$result['fund_details'][] = $v;
			}
    		$this->data['officefunds'] = $result;
			$result = $this->db->query("SELECT budget_id FROM budget_master WHERE status = ?", array(0))->result();
			$this->data['account_head'] = $this->model_budget->getBudgetDetailsReport($result[0]->budget_id);
			$this->data['report_texts'] = $this->model_reporttext->getReportTextData();
            $this->render_template('officefunds/edit', $this->data);
        }
	}

	public function officefundsDetails($id){
		if(!in_array('viewOfficeFund', $this->permission)) {
            redirect('dashboard', 'refresh');
		}

		if($id) {
			$this->data['page_title'] = 'Office Fund Report';
			$result = array();
        	$of_master = $this->model_officefund->getOfficeFundData($id);
    		$result['of_master'] = $of_master;
			
    		$of_details = $this->model_officefund->getOfficeDetailsReport($of_master['id']);
			/* echo '<pre>';
			print_r($of_details);
			echo '</pre>';
			exit;  */ 
    		foreach($of_details as $k => $v) {
    			$result['of_details'][] = $v;
    		}
			$this->data['officefunds'] = $result;

			$this->render_template('officefunds/viewOfficeFundDetails', $this->data);
		}
	}

	


	/*
	*  Print Budget  Report
	*/
	


	public function budgetDetails($id){
		if(!in_array('viewOfficeFund', $this->permission)) {
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

			$this->render_template('budget/viewOfficeFundDetails', $this->data);
		}
	}

}
