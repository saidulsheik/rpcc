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
				$value['total_amout'],
				$value['status'],
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
	*  Print Cash Grant Report
	*/
	public function printDiv($id)
	{
		if(!in_array('viewCashgrant', $this->permission)) {
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
							
							/* echo '<pre>';
							print_r($cashgrant_data);
							echo '</pre>'; */
							
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
					<?php if(!empty($cashgrant_master)): ?>
					<thead>
						<tr>
							<th>Month Name : <?php echo $cashgrant_master[0]->month_name;?></th>
							<th>Description : <?php echo $cashgrant_master[0]->cg_desc;?></th>
							<th>Total Amount : <?php echo $cashgrant_master[0]->total_amout;?></th>
							<th>Created Date : <?php echo $cashgrant_master[0]->created_at;?></th>
							<th colspan="2"></th>
						</tr>
					</thead>
					<?php endif; ?>
					<thead>
						<tr>
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
								foreach($cashgrant_data as $cashgrant_value): 
									$total_child[]=$cashgrant_value->no_of_child;
									$total_amount[]=$cashgrant_value->amount;
									$total_care[]=$cashgrant_value->no_of_care;
									$campArray[]=$cashgrant_value->camp_id;
									//print_r($cashgrant_value);
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
									<th colspan="3">Grand Total</th>
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
							<p>উপরোক্ত <?php echo count($campArray); ?> টি ক্যাম্পে <?php echo array_sum($total_care); ?> জন কেয়ারগিভারকে 2000 টাকা করে ০২ মাসের নগদ সহায়তা প্রদানের জন্য মোট <?php echo array_sum($total_amount); ?> টাকা প্রয়োজন । </p>
						</td>
						
					</tr>
				</table>
				<br>
				<br>
				<table class="table table-border">
					<tr>
						<td>
							<p>
							মহাপরিচালক	<br>						                   
							সমাজসেবা অধিদফতর	<br>							
							ই-৮/বি-১, আগারগাও,  শেরেবাংলা নগর <br>
							ঢাকা-১২০৭ <br>
							</p>  
						</td>
						<td class="pull-right">
							<p>মোহা: আল-আমিন জামালী <br>
								বিকল্প ফোকাল পয়েন্ট</p>
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
