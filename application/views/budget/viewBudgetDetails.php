

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Budget 
      <small>Report</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Budget Report</li>
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
						<h3 class="box-title">Budget Report</h3>
					</div>
                    <div class="box-body">
                        <div class="col-sm-2">
                            <a href="<?php echo base_url('budgets/') ?>" class="btn btn-warning">Back</a>
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
                                    <table id="tbl_budget_report" style="">
                                        <thead>
                                            <tr>
                                                <th colspan="8"><?php echo $budgets['budget_master']['budget_desc'];?> for <?php  echo date('F Y', strtotime($budgets['budget_master']['start_month']));?> to  <?php  echo date('F Y', strtotime($budgets['budget_master']['end_month']));?></th>
                                            </tr>
                                            <tr>
                                                <th>Sl No</th>
                                                <th>Account Code</th>
                                                <th>Account Head</th>
                                                <th>Unit Name</th>
                                                <th>Quantity</th>
                                                <th>No. of Month</th>
                                                <th>Unit Cost</th>
                                                <th>Total(Qty*Month*Unit Cost)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $gross_total=0;
                                                $i=0; 
                                            ?>
                                            <?php foreach($budgets['budget_details'] as $value): ?>
                                                <tr>
                                                    <td><?php $i++; echo $i; ?></td>
                                                    <td><?php echo $value['acc_code'];?></td>
                                                    <td><?php echo $value['acc_head'];?></td>
                                                    <td><?php echo $value['unit'];?></td>
                                                    <td><?php echo $value['qty'];?></td>
                                                    <td><?php echo $value['no_of_month'];?></td>
                                                    <td><?php echo $value['unit_cost'];?></td>
                                                    <td><?php echo $total=$value['qty']*$value['no_of_month']*$value['unit_cost'];?></td>
                                                </tr>
                                                <?php 
                                                    $gross_total+=$total;
                                                ?>
                                                
                                            <?php endforeach; ?>
                                            <tr>
                                                <th colspan="7"> Total Gross</th>
                                                <th><?php echo $gross_total; ?></th>
                                            </tr>
                                        </tbody>
                                       
                                    </table>
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
        $("#mainBudgetsNav").addClass('active');
        $("#manageBudgetsNav").addClass('active');
	   $(".select_group").select2(); 
    }); 
  </script>
  <script>
    function printData(){
       var divToPrint=document.getElementById("tbl_budget_report");
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
