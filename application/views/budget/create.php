
 <!--style>
  .table-bordered>thead>tr>th, 
  .table-bordered>tbody>tr>th, 
  .table-bordered>thead>tr>td, 
  .table-bordered>tbody>tr>td
  {
	border: 1px solid #337ab7 !important;
  }
  
  .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
	   padding: 2px !important;
  }
</style-->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Add
      <small>Budget</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Budget</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div id="messages"></div>
        <?php if($this->session->flashdata('success')): ?>
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('success'); ?>
          </div>
        <?php elseif($this->session->flashdata('error')): ?>
          <div class="alert alert-error alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('error'); ?>
          </div>
        <?php endif; ?>

	<form role="form" action="<?php base_url('budgets/create') ?>"  method="post" class="">
		 <div class="row">
			  <div class="col-md-12">
				  <?php echo validation_errors('<h4 class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></h4>'); ?>
			  </div>
		  </div>
			<div class="row">
				<div class="col-md-12">
					<div class="box box-primary">
						
						<div class="box-body">
							<div class="form-group col-sm-4">
							 <label for="budget_desc" class="col-sm-5 control-label">Budget Description</label>
							 <input type="text" class="form-control" id="budget_desc" required name="budget_desc" placeholder=""  autocomplete="on">
							</div>
							 
							<div class="form-group col-sm-2">
							  <label for="from_date" class="control-label">From Date</label>
							  <input type="date"  name="from_date" value="<?php echo !empty($from_date)?$from_date:date('Y-m-d'); ?>"   class="form-control">
							</div>

							<div class="form-group col-sm-2">
							  <label for="to_date" class="control-label">To Date</label>
							  <input type="date" name="to_date" value="<?php echo !empty($to_date)?$to_date:date('Y-m-d'); ?>"  class="form-control">
							</div>
						</div>	
					</div>	
				</div>	
			</div>	
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-body">	
						<table class="table table-bordered" id="product_info_table">
							<thead>
								<tr>
									<th style="width:10%">Sl No</th>
									<th style="width:30%">Account Head</th>
									<th style="width:15%">Unit</th>
									<th style="width:15%">Quantity</th>
									<th style="width:15%">No. of Month</th>
									<th style="width:15%">Unit Cost</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								/*    echo '<pre>';
									print_r($account_head);
									echo '</pre>';  */
									$i=0;
									foreach($account_head as $account_head_value):
									  $i++;
								  ?>
								  <input type="hidden" name="acc_id[]" value="<?php echo $account_head_value['acc_id']; ?>">
								  <input type="hidden" name="acc_code[]" value="<?php echo $account_head_value['acc_code']; ?>">
								  <tr>
									<td><?php echo $i;?></td>
									<td><?php echo $account_head_value['acc_head'];?></td>
									<td><?php echo $account_head_value['unit'];?></td>
									<td><input type="number"  name="qty[]" value="0" id="qty_<?php echo $i; ?>" class="form-control" required ></td>
									<td><input type="number"  name="no_of_month[]" id="no_of_month_<?php echo $i; ?>" value="0" class="form-control" required ></td>
									<td><input type="number"  name="unit_cost[]" id="unit_cost_<?php echo $i; ?>" value="0" class="form-control" required ></td>
								  </tr>
								  <?php  endforeach; ?>
							</tbody>
						</table>
					</div>
					  <div class="box-footer">
						<button type="submit" class="btn btn-primary">Submit</button>
						<a href="<?php echo base_url('budgets/') ?>" class="btn btn-warning">Back</a>
					  </div>
				</div>
			</div>
		</div>
    </form>
       
    

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
  var base_url = "<?php echo base_url(); ?>";

  jQuery(document).ready(function() {
    $(".select_group").select2();
	$("#mainBudgetsNav").addClass('active');
    $("#addBudgetNav").addClass('active');
  }); 

</script>