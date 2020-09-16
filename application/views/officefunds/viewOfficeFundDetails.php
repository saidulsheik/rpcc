

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Office Fund 
      <small>Report</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Office Fund Report</li>
    </ol>
  </section>
  <style>
         tr, th, td {
        border: 1px  solid black;
		text-align:center; 
        }
        table{
            width:100%;
        }
		
    </style>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="box">
					<div class="box-header">
						<h3 class="box-title">Office Fund Report</h3>
					</div>
                    <div class="box-body">
                        <div class="col-sm-2">
                            <a href="<?php echo base_url('officefunds/') ?>" class="btn btn-warning">Back</a>
                        </div>
                        <div class="col-sm-10">
                            <button id="button" class="btn btn-info  pull-right" onclick="printData()"><i class="fa fa-print" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
				
                <div class="row">
					
					
				
				
                    <div class="col-md-12 col-xs-12">
                        <div class="box">
                            
                            <div class="box-body" id="tbl_office_fund_report">
                                <div class="table-responsive">
								<?php  if(!empty($officefunds)){ ?>
								<?php 
									/* echo '<pre>';
									print_r($officefunds);
									echo '</pre>';   */
								?>
                                    <table  style="">
											<tr>
												<td colspan="2" style=" border: 0px; text-align:center;"><img src="<?php echo base_url();?>assets/images/cashgrants/officefund.jpg"></td>
												<td colspan="3" style=" border: 0px; text-align:center;">
													গণপ্রজাতন্ত্রী বাংলাদেশ সরকার <br>
													সমাজসেবা অধিদফতর, সমাজকল্যান মন্ত্রনালয়<br>
													রোহিঙ্গা শিশু সুরক্ষা কার্যক্রম<br>
													সোনারপাড়া, উখিয়া, কক্সবাজার-৪৭০০
												</td>
											</tr>
											<tr>
												<td colspan="2" style=" border: 0px; text-align:center;">স্মারক নং:  <?php echo $officefunds['of_master']['sarok_no']?>   </td>
												<td colspan="3" style=" border: 0px; text-align:center;">তারিখ:  <?php echo date('d/m/Y', strtotime($officefunds['of_master']['date'])); ?> </td>
											</tr>
											
											<tr>
												<td colspan="5" style=" border: 0px; text-align:left;"><br> &nbsp;&nbsp;&nbsp; বিষয়: <?php echo $officefunds['of_master']['subject']; ?>  <br>&nbsp;</td>
											</tr>
											<tr>
												<td colspan="5" style=" border: 0px; text-align:center;">
												<p><?php echo $officefunds['of_master']['header1'];?></p> &nbsp;</td>
											</tr>
										
                                       
                                            <tr>
                                                <th style="border: 1px  solid black; text-align:center;">Sl No</th>
                                                <th style="border: 1px  solid black; text-align:center;">Bill No.</th>
                                                <th style="border: 1px  solid black; text-align:center;">Account Code</th>
                                                <th style="border: 1px  solid black; text-align:center;">Activity name</th>
                                                <th style="border: 1px  solid black; text-align:center;">Amount</th>
                                            </tr>
                                       
                                        <tbody>
                                            <?php 
                                                $gross_total=0;
                                                $i=0; 
                                            ?>
                                            <?php foreach($officefunds['of_details'] as $value): ?>
                                                <tr>
                                                    <td><?php $i++; echo $i; ?></td>
                                                   <td><?php echo $value['bill_no'];?></td>
                                                    <td><?php echo $value['acc_code'];?></td>
                                                    <td><?php echo $value['activity_name'];?></td>
                                                    <td><?php echo $value['amount'];?></td>
                                                </tr>
                                                <?php 
                                                    $gross_total+=$value['amount'];
                                                ?>
                                                
                                            <?php endforeach; ?>
                                            <tr>
                                                <th colspan="4"> Gross Total</th>
                                                <th><?php echo $gross_total; ?></th>
                                            </tr>
											<tr>
                                                <td colspan="5">কথায়ঃ <?php echo number_to_bangla($gross_total); ?>  টাকা। </td>
                                            </tr>
											<tr>
												<td colspan="5">
													<p>
														
														<br>
														<?php echo $officefunds['of_master']['footer1'];?>
													</p>
												</td>
											</tr>
											<tr>
												<td colspan="3"  style=" border: 0px; text-align:center;">
													<?php echo $officefunds['of_master']['signature_left'];?>
												</td>
												<td colspan="2"  style=" border: 0px; text-align:center;">
													<?php echo $officefunds['of_master']['signature_right'];?>
												</td>
											</tr>
                                        </tbody>
                                       
                                    </table>
									<?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script type="text/javascript">
    $(document).ready(function() {
        $("#mainOfficeFundNav").addClass('active');
        $("#manageOfficeFundNav").addClass('active');
	   $(".select_group").select2(); 
    }); 
  </script>
  <script>
    function printData(){
       var divToPrint=document.getElementById("tbl_office_fund_report");
	   
       var htmlToPrint = '' +
          '<style type="text/css">' +
          'table {' +
          'border-collapse: collapse;' +
          '}' +
          'table, tr, td, td {' +
          'border: 1px solid black;' +
		  'text-align: center;' +
          '}' +
          '</style>';
		  
		  htmlToPrint += divToPrint.outerHTML;
		  newWin = window.open("");
		  newWin.document.write(htmlToPrint);
		  newWin.print();
		  newWin.close();
			
			
    }
</script>
