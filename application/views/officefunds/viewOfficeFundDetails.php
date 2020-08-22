

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
        table, tr, th, td {
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
                            
                            <div class="box-body">
                                <div class="table-responsive">
								<?php 
									if(!empty($officefunds)){
										/* echo '<pre>';
										print_r($officefunds);
										echo '</pre>'; */ 
								?>
                                    <table id="tbl_office_fund_report" style="">
										<caption style="border: 1px  solid black; text-align:center;">
											<strong> <?php echo $officefunds['of_master']['of_desc'];?> &nbsp; Month Name : <?php $month_year=explode(',', $officefunds['of_master']['month_name']); echo !empty($month_year[0])?$month_year[0]:'';?> , Year: <?php echo !empty($month_year[1])?$month_year[1]:''; ?></strong>
										</caption>
                                        <thead>
                                            <tr>
                                                <th style="border: 1px  solid black; text-align:center;">Sl No</th>
                                                <th style="border: 1px  solid black; text-align:center;">Output Name</th>
                                                <th style="border: 1px  solid black; text-align:center;">Activity name</th>
                                                <th style="border: 1px  solid black; text-align:center;">Account Code</th>
                                                <th style="border: 1px  solid black; text-align:center;">Account Name</th>
                                                <th style="border: 1px  solid black; text-align:center;">Quantity</th>
                                                <th style="border: 1px  solid black; text-align:center;">No. of Child</th>
                                                <th style="border: 1px  solid black; text-align:center;">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $gross_total=0;
                                                $i=0; 
                                            ?>
                                            <?php foreach($officefunds['of_details'] as $value): ?>
                                                <tr>
                                                    <td><?php $i++; echo $i; ?></td>
                                                    <td><?php echo $value['output_name'];?></td>
                                                    <td><?php echo $value['activity_name'];?></td>
                                                    <td><?php echo $value['acc_code'];?></td>
                                                    <td><?php echo $value['acc_head'];?></td>
                                                    <td><?php echo $value['qty'];?></td>
                                                    <td><?php echo $value['no_of_child'];?></td>
                                                    <td><?php echo $value['amount'];?></td>
                                                </tr>
                                                <?php 
                                                    $gross_total+=$value['amount'];
                                                ?>
                                                
                                            <?php endforeach; ?>
                                            <tr>
                                                <th colspan="7"> Gross Total</th>
                                                <th><?php echo $gross_total; ?></th>
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
