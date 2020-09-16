<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cashgrants extends Admin_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->not_logged_in();
		$this->data['page_title'] = 'Add Cash Grants';
		$this->load->model('model_cashgrant');
		$this->load->model('model_camps');
		$this->load->model('model_company');
		$this->load->model('model_reporttext');
		$this->load->helper('site');
	}

	/* 
	* It only redirects to the manage cashgrants page
	*/
	public function index(){
		if(!in_array('viewCashgrant', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
		$this->data['page_title'] = 'Manage Cash Grants';
		$this->render_template('cashgrant/index', $this->data);		
	}

	/*
	* Fetch cash grant data
	* this function is called from the datatable ajax function
	*/
	public function fetchCashGrantData(){
		$result = array('data' => array());
		$data = $this->model_cashgrant->getCashGrantData();
		foreach ($data as $key => $value) {
			$buttons = '';
			if(in_array('viewCashgrant', $this->permission)) {
				//.base_url('orders/printDiv/'.$value['id']).
				$buttons.= '<a target="__blank" href="'.base_url('cashgrants/printDiv/'.$value['id']).'" class="btn btn-default"><i class="fa fa-print"></i></a>';
			}

			if(in_array('updateCashgrant', $this->permission)) {
				$buttons .= ' <a href="'.base_url('cashgrants/update/'.$value['id']).'" class="btn btn-default"><i class="fa fa-pencil"></i></a>';
			}

			if(in_array('deleteCashgrant', $this->permission)) {
				$buttons .= ' <button type="button" class="btn btn-default" onclick="removeFunc('.$value['id'].')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
			}

			

			$result['data'][$key] = array(
				$value['month_name'],
				$value['cg_desc'],
				$value['subject'],
				date('d-m-y', strtotime($value['date'])),
				$value['sarok_no'],
				$value['total_amout'],
				$value['created_at'],
				$buttons
			);
		} // /foreach

		echo json_encode($result);
	}

	/*
	* Create Cash grant
	*/
	public function create(){
		if(!in_array('createCashgrant', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
		$this->data['page_title'] = 'Add Cash Grant';
		$this->form_validation->set_rules('cg_desc', 'Cash Grant Description', 'trim|required');
		$this->form_validation->set_rules('date', 'Select Date', 'trim|required');
		$this->form_validation->set_rules('sarok_no', 'Sarok No', 'trim|required');
		$this->form_validation->set_rules('subject', 'Cash Grant Subject', 'trim|required');
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
			$this->data['report_texts'] = $this->model_reporttext->getReportTextData();
        	$this->data['camps'] = $this->model_camps->getActiveCampsData(); 
            $this->render_template('cashgrant/create', $this->data);
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
		if(!in_array('updateCashgrant', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
		if(!$id) {
			redirect('dashboard', 'refresh');
		}
		
		$this->data['page_title'] = 'Update Cash Grant';
		
		$this->form_validation->set_rules('cg_desc', 'Cash Grant Description', 'trim|required');
		$this->form_validation->set_rules('date', 'Select Date', 'trim|required');
		$this->form_validation->set_rules('sarok_no', 'Sarok No', 'trim|required');
		$this->form_validation->set_rules('subject', 'Cash Grant Subject', 'trim|required');
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
			$this->data['report_texts'] = $this->model_reporttext->getReportTextData();
            $this->render_template('cashgrant/edit', $this->data);
        }
	}

	

	/*
	*  Print Cash Grant Report
	*/
	public function printDiv($id)
	{
		if(!in_array('viewCashgrant', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        
		if($id) {
			$cashgrant_master=$this->db->query(" SELECT cg_master.*, report_text.* FROM cg_master LEFT JOIN report_text ON report_text.id=cg_master.report_text_id WHERE cg_master.id = $id")->result();
			
			/* echo '<pre>';
			print_r($cashgrant_master);
			echo '</pre>'; */
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
			<br>
			<br>
			<div class="container center">
			  <div class="row">
				<table class="table table-border">
					<tr>
						<td><img src="<?php echo base_url();?>/assets/images/cashgrants/officefund.jpg"></td>
						<td>
							গণপ্রজাতন্ত্রীবাংলাদেশ সরকার<br>
							সমাজসেবা অধিদপ্তর<br>
							রোহিঙ্গা শিশুসুরক্ষা কার্যক্রম<br>
							সোনারপাড়া, উখিয়া কক্সবাজার
						</td>
						<td></td> 
						
					</tr>
				</table>
				
				
				<table class="table">
					<?php if(!empty($cashgrant_master)): ?>
					<thead>
						<tr>
							<th>Sarok No : <?php echo $cashgrant_master[0]->sarok_no;?></th>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<th>Date : <?php echo date('d-m-Y', strtotime($cashgrant_master[0]->date));?></th>
						</tr>
						<tr>
							<td colspan="7">Subject : <?php echo $cashgrant_master[0]->subject;?></td>
						</tr>
						
						<tr>
							<td colspan="7"><?php echo $cashgrant_master[0]->header1;?></td>
						</tr>
						
					</thead>
					<?php endif; ?>
					<thead>
						<tr>
							<th>Sl#</th>
							<th>Upzilla Name</th>
							<th>Area Name</th>
							<th>Camp ID</th>
							<th>No. of Child</th>
							<th>No. of Care</th>
							<th>Amount</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							if(!empty($cashgrant_data)):
								$campArray=array();
								$total_child=array();
								$total_amount=array();
								$total_care=array();
								$i=0;
								foreach($cashgrant_data as $cashgrant_value): 
								$i++;
									$total_child[]=$cashgrant_value->no_of_child;
									$total_amount[]=$cashgrant_value->amount;
									$total_care[]=$cashgrant_value->no_of_care;
									$campArray[]=$cashgrant_value->camp_id;
									?>
										<tr>
											
											<td><?php echo $cashgrant_value->upailla; ?></td>
											<td><?php echo $cashgrant_value->carea; ?></td>
											<td><?php echo $cashgrant_value->camp_id; ?></td>	
											<td><?php echo $cashgrant_value->no_of_child; ?></td>	
											<td><?php echo $cashgrant_value->no_of_care; ?></td>	
											<td><?php echo $cashgrant_value->amount; ?></td>	
										</tr>
									<?php	
								endforeach; 
								?>
								
								<tr>
									<th colspan="4">Grand Total</th>
									<th><?php echo array_sum($total_child); ?></th>
									<th><?php echo array_sum($total_care); ?></th>
									<th><?php echo array_sum($total_amount); ?></th>
									
								</tr>
								<?php 
							else:

						?>
						<tr>
							<th colspan="6" >No Data Found</th>
						</tr>
						<?php endif; ?>
					</tbody>
				</table>
				<table class="table table-border">
					<tr>
						<td>
							কথায়ঃ  <?php echo number_to_bangla(array_sum($total_amount)); ?> 
						</td>
						
					</tr>
					<tr>
						<td>
							<?php echo $cashgrant_master[0]->footer1;?>
						</td>
						
					</tr>
				</table>
				<br>
				<br>
				<table class="table table-border">
					<tr>
						<td>
							<?php echo $cashgrant_master[0]->signature_left;?>
						</td>
						<td class="pull-right">
							<?php echo $cashgrant_master[0]->signature_right;?>
						</td> 
						
					</tr>
				</table>
			</div>
			</body>
			</html>
			<?php 
		}
	}

}
