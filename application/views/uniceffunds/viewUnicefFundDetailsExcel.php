
<?php 

	header("Content-type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=excel.xls"); 

?>


<div class="row">
	<div class="col-md-12 col-xs-12">
		<div class="box">
			
			<div class="box-body">
				<div class="table-responsive">
					<table id="tbl_budget_report" style="">
						<strong><caption style="border: 1px  solid black; text-align:center; "><?php echo $uniceffunds['unief_fund_master']['unicef_fund_desc'];?> for <?php  echo date('F Y', strtotime($uniceffunds['unief_fund_master']['start_month']));?> to  <?php  echo date('F Y', strtotime($uniceffunds['unief_fund_master']['end_month']));?></caption></strong>
						<thead>
							<tr>
								<th  style="border: 1px  solid black; ">Output Name</th>
								<th  style="border: 1px  solid black; ">Activity Name</th>
								<th  style="border: 1px  solid black; ">Account Code</th>
								<th  style="border: 1px  solid black; ">Account Head</th>
								<th  style="border: 1px  solid black; ">Unit Name</th>
								<th  style="border: 1px  solid black; ">Quantity</th>
								<th  style="border: 1px  solid black; ">No. of Month</th>
								<th  style="border: 1px  solid black; ">Unit Cost</th>
								<th  style="border: 1px  solid black; ">Total(Qty*Month*Unit Cost)</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$dataArray=array();
								$outputArray=array();
								$activityArray=array();
								foreach($uniceffunds['uncef_fund_details'] as $value):
								/* echo '<pre>';
								print_r($value);
								echo '</pre>'; */
								$outputArray[$value['output_id']][]=$value['acc_code'];
								$activityArray[$value['output_id']][$value['activity_code']][]=$value['activity_code'];
								$dataArray[$value['output_id']][$value['activity_code']][$value['acc_code']]['output_id']=$value['output_id'];
								$dataArray[$value['output_id']][$value['activity_code']][$value['acc_code']]['output_name']=$value['output_name'];
								$dataArray[$value['output_id']][$value['activity_code']][$value['acc_code']]['activity_code']=$value['activity_code'];
								$dataArray[$value['output_id']][$value['activity_code']][$value['acc_code']]['activity_name']=$value['activity_name'];
								$dataArray[$value['output_id']][$value['activity_code']][$value['acc_code']]['acc_code']=$value['acc_code'];
								$dataArray[$value['output_id']][$value['activity_code']][$value['acc_code']]['acc_head']=$value['acc_head'];
								$dataArray[$value['output_id']][$value['activity_code']][$value['acc_code']]['unit']=$value['unit'];
								$dataArray[$value['output_id']][$value['activity_code']][$value['acc_code']]['qty']=$value['qty'];
								$dataArray[$value['output_id']][$value['activity_code']][$value['acc_code']]['no_of_month']=$value['no_of_month'];
								$dataArray[$value['output_id']][$value['activity_code']][$value['acc_code']]['unit_cost']=$value['unit_cost'];
								endforeach;
								$i=1;
								$pre_output_id='';
								$gross_total_qty=0;
								$gross_total_month=0;
								$gross_total_cost=0;
								$gross_total_amount=0;
								foreach($dataArray as $key1=>$dataValues1):
									$outputRowspan=count($outputArray[$key1]);
										$addOutputRow=count($dataValues1);
										$output_total_qty=0;
										$output_total_month=0;
										$output_total_cost=0;
										$output_total_amount=0;
									foreach($dataValues1 as $key2=>$dataValues2):
										$activityRowspan=count($activityArray[$key1][$key2]);
										$pre_activity_code='';
										$total_qty=0;
										$total_month=0;
										$total_cost=0;
										$total_amount=0;
										foreach($dataValues2 as $key3=>$dataValues3):
										$amount=$dataValues3['qty']*$dataValues3['no_of_month']*$dataValues3['unit_cost'];
										$total_qty+=$dataValues3['qty'];
										$total_month+=$dataValues3['no_of_month'];
										$total_cost+=$dataValues3['unit_cost'];
										$total_amount+=$amount;
											if($pre_output_id!=$dataValues3['output_id']){
												$pre_output_id=$dataValues3['output_id'];
												if($pre_activity_code!=$dataValues3['activity_code']){
													$pre_activity_code=$dataValues3['activity_code'];
												?>
												<tr>
													<td rowspan="<?php echo $outputRowspan+$addOutputRow; ?>"><?php echo $dataValues3['output_name']; ?></td>
													<td rowspan="<?php echo $activityRowspan+1; ?>"><?php echo $dataValues3['activity_name']; ?></td>
													<td><?php echo $dataValues3['acc_code']; ?></td>
													<td><?php echo $dataValues3['acc_head']; ?></td>
													<td><?php echo $dataValues3['unit']; ?></td>
													<td><?php echo $dataValues3['qty']; ?></td>
													<td><?php echo $dataValues3['no_of_month']; ?></td>
													<td><?php echo $dataValues3['unit_cost']; ?></td>
													<td><?php echo $amount; ?></td>
												</tr>
												<?php 
												}else{
												?>
												<tr>
													<td rowspan="<?php echo $outputRowspan+$addOutputRow; ?>"><?php echo $dataValues3['output_name']; ?></td>
													<td><?php echo $dataValues3['acc_code']; ?></td>
													<td><?php echo $dataValues3['acc_head']; ?></td>
													<td><?php echo $dataValues3['unit']; ?></td>
													<td><?php echo $dataValues3['qty']; ?></td>
													<td><?php echo $dataValues3['no_of_month']; ?></td>
													<td><?php echo $dataValues3['unit_cost']; ?></td>
													<td><?php echo $amount; ?></td>
												</tr>
												<?php 
												}
											?>
												
											<?php 
											}else{
												if($pre_activity_code!=$dataValues3['activity_code']){
													$pre_activity_code=$dataValues3['activity_code'];
												?>
													<tr>
														<td rowspan="<?php echo $activityRowspan+1; ?>"><?php echo $dataValues3['activity_name']; ?></td>
														<td><?php echo $dataValues3['acc_code']; ?></td>
														<td><?php echo $dataValues3['acc_head']; ?></td>
														<td><?php echo $dataValues3['unit']; ?></td>
														<td><?php echo $dataValues3['qty']; ?></td>
														<td><?php echo $dataValues3['no_of_month']; ?></td>
														<td><?php echo $dataValues3['unit_cost']; ?></td>
														<td><?php echo $amount; ?></td>
													</tr>
												<?php 
												}else{
												?>
													<tr>
														<td><?php echo $dataValues3['acc_code']; ?></td>
														<td><?php echo $dataValues3['acc_head']; ?></td>
														<td><?php echo $dataValues3['unit']; ?></td>
														<td><?php echo $dataValues3['qty']; ?></td>
														<td><?php echo $dataValues3['no_of_month']; ?></td>
														<td><?php echo $dataValues3['unit_cost']; ?></td>
														<td><?php echo $amount; ?></td>
													</tr>
												<?php
												}
											
											}
										endforeach;
										$output_total_qty+=$total_qty;
										$output_total_month+=$total_month;
										$output_total_cost+=$total_cost;
										$output_total_amount+=$total_amount;
										?>
											<tr>
												<th colspan="3">Total Activity</th>
												<th><?php echo $total_qty; ?></th>
												<th><?php echo $total_month; ?></th>
												<th><?php echo $total_cost; ?></th>
												<th><?php echo $total_amount; ?></th>
											</tr>
										<?php
									endforeach;
										$gross_total_qty+=$output_total_qty;
										$gross_total_month+=$output_total_month;
										$gross_total_cost+=$output_total_cost;
										$gross_total_amount+=$output_total_amount;
									?>
										<tr>
											<th colspan="5">Total Output</th>
											<th><?php echo $output_total_qty; ?></th>
											<th><?php echo $output_total_month; ?></th>
											<th><?php echo $output_total_cost; ?></th>
											<th><?php echo $output_total_amount; ?></th>
										</tr>
										<?php 
									$i++;
								endforeach;
							?>
							<tr>
								<th colspan="5">Gross Total</th>
								<th><?php echo $gross_total_qty; ?></th>
								<th><?php echo $gross_total_month; ?></th>
								<th><?php echo $gross_total_cost; ?></th>
								<th><?php echo $gross_total_amount; ?></th>
							</tr>
						</tbody>
					   
					</table>
				</div>
			</div>
		</div>
	</div>
</div>