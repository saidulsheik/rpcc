
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
      Edit
      <small>Unicef Fund</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Edit Unicef Fund</li>
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

	<form role="form" action="<?php base_url('uniceffunds/update') ?>"  method="post" class="">
		 <div class="row">
			  <div class="col-md-12">
				  <?php echo validation_errors('<h4 class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></h4>'); ?>
			  </div>
		  </div>
		  <div class="row">
				<div class="col-md-12">
					<div class="box box-primary">
						
						<div class="box-body">
							<div class="box-body">
								<div class="form-group col-sm-3">
									<label for="unicef_fund_desc" class="col-sm-5 control-label">Description</label>
									<input type="text" class="form-control" id="unicef_fund_desc" required name="unicef_fund_desc" value="<?php echo !empty($uniceffunds['unief_fund_master']['unicef_fund_desc'])?$uniceffunds['unief_fund_master']['unicef_fund_desc']:''; ?>"  autocomplete="on">
								</div>

								<div class="form-group col-sm-3">
									<label for="start_month" class="col-sm-5 control-label">Start Month</label>
									<input type="date" class="form-control" id="start_month" required name="start_month"  value="<?php echo !empty($uniceffunds['unief_fund_master']['start_month'])?$uniceffunds['unief_fund_master']['start_month']:''; ?>" >
								</div>

								<div class="form-group col-sm-3">
									<label for="end_month" class="col-sm-5 control-label">End Month</label>
									<input type="date" class="form-control" id="end_month" required name="end_month"   value="<?php echo !empty($uniceffunds['unief_fund_master']['end_month'])?$uniceffunds['unief_fund_master']['end_month']:''; ?>" >
								</div>
								
								<div class="form-group col-md-2">
								  <label for="report_text_id" class="control-label">Select Report Text</label>
								  <select id="report_text_id" name="report_text_id" class="form-control select_group" required>
										<option value="">Select Report Text<option>
										<?php 
											if(!empty($report_texts)):
												foreach($report_texts as $report_text):
										?>
												<option value="<?php echo $report_text['id']; ?>"  <?php echo $uniceffunds['unief_fund_master']['report_text_id']==$report_text['id']?'selected':''; ?>><?php echo $report_text['name']; ?></option>
										<?php 
												endforeach;
											endif;
										?>
								  </select>
								</div>
								
								<div class="form-group col-sm-3">
									<label for="button" class="col-sm-5 control-label"></label>
									<button type="submit" class="btn btn-primary">Submit</button>
									<a href="<?php echo base_url('unicefFunds/') ?>" class="btn btn-warning">Back</a>
								</div>
							</div>	
						</div>	
					</div>	
				</div>	
			</div>	
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-body">	
						<table class="table table-bordered" id="tbl_Unicef_fund">
							<thead>
								<tr>
									<th style="width:10%">Sl No</th>
									<th style="width:25%">Account Head</th>
									<th style="width:15%">Unit</th>
									<th style="width:15%">Unit Cost</th>
									<th style="width:10%">Quantity</th>
									<th style="width:10%">No. Of Month</th>

								</tr>
							</thead>

							<tbody>
								<?php 
									$i=0;
									foreach($uniceffunds['unicef_fund_details'] as $value):
									$i++;
								?>
									<input type="hidden" name="acc_id[]" value="<?php echo $value['acc_id']; ?>">
									<input type="hidden" name="acc_code[]" value="<?php echo $value['acc_code']; ?>">
									<tr id="row_<?php echo $i; ?>">
										<td><?php echo $i;?></td>
										<td><?php echo $value['acc_head'];?></td>
										<td><input type="text"  name="unit[]" id="unit_<?php echo $i; ?>" value="<?php echo $value['unit'];?>" class="form-control" readonly ></td>
										<td><input type="number"  name="unit_cost[]" id="unit_cost_<?php echo $i; ?>" value="<?php echo $value['unit_cost']; ?>" class="form-control" readonly ></td>
										<td><input type="number"  name="qty[]" value="<?php echo $value['qty']; ?>" id="qty_<?php echo $i; ?>" class="form-control" required></td>
										<td><input type="text"  name="no_of_month[]" id="no_of_month_<?php echo $i; ?>" value="<?php echo $value['no_of_month']; ?>" class="form-control" required ></td>
									</tr>
								<?php 
									endforeach;
								?>
							</tbody>
						</table>
						
						

					</div>
					  <div class="box-footer">
						<button type="submit" class="btn btn-primary">Submit</button>
						<a href="<?php echo base_url('uniceffunds/') ?>" class="btn btn-warning">Back</a>
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
    $("#mainUnicefFundNav").addClass('active');
    $("#manageUnicefFundNav").addClass('active');
  }); 

  function getTotal(row = null) {
    if(row) {
      var total = Number($("#unit_cost_"+row).val()) *  Number($("#qty_"+row).val());
      total = total.toFixed(2);
      $("#amount_"+row).val(total);
	  subAmount();
    } else {
      alert('no row !! please refresh the page');
    }
  }

  function subAmount() {
    var tableUnicefFundLength = $("#tbl_Unicef_fund tbody tr").length;
    var totalSubAmount = 0;
    for(x = 0; x < tableUnicefFundLength; x++) {
      var tr = $("#tbl_Unicef_fund tbody tr")[x];
      var count = $(tr).attr('id');
      count = count.substring(4);
      totalSubAmount = Number(totalSubAmount) + Number($("#amount_"+count).val());
    } // /for

    totalSubAmount = totalSubAmount.toFixed(2);
    $("#total_amout").val(totalSubAmount);
  
  }

</script>