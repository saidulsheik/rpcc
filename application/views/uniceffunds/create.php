

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Add
      <small>Unicef Fund</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Unicef Fund</li>
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

	<form role="form" action="<?php base_url('Uniceffunds/create') ?>"  method="post" class="">
		 <div class="row">
			  <div class="col-md-12">
				  <?php echo validation_errors('<h4 class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></h4>'); ?>
			  </div>
		  </div>
			<div class="row">
				<div class="col-md-12">
					<div class="box box-primary">
						
						<div class="box-body">
							<div class="form-group col-sm-3">
								<label for="unicef_fund_desc" class="col-sm-5 control-label">Description</label>
								<input type="text" class="form-control" id="unicef_fund_desc" required name="unicef_fund_desc" placeholder="Unicef Fund Description"  autocomplete="on">
							</div>

							<div class="form-group col-sm-3">
								<label for="start_month" class="col-sm-5 control-label">Start Month</label>
								<input type="date" class="form-control" id="start_month" required name="start_month"   autocomplete="on">
							</div>

							<div class="form-group col-sm-3">
								<label for="end_month" class="col-sm-5 control-label">End Month</label>
								<input type="date" class="form-control" id="end_month" required name="end_month"   autocomplete="on">
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
									/* foreach($account_head as $value):
										echo '<pre>';
										print_r($value);
										echo '</pre>';
									endforeach; */
									$i=0;
									foreach($account_head as $account_head_value):

										
									  $i++;
								  ?>
								  <input type="hidden" name="acc_id[]" value="<?php echo $account_head_value['acc_id']; ?>">
								  <input type="hidden" name="acc_code[]" value="<?php echo $account_head_value['acc_code']; ?>">
								  <tr id="row_<?php echo $i; ?>">
									<td><?php echo $i;?></td>
									<td><?php echo $account_head_value['acc_head'];?></td>
									<td><input type="text"  name="unit[]" id="unit_<?php echo $i; ?>" value="<?php echo $account_head_value['unit'];?>" class="form-control" readonly ></td>
									<td><input type="number"  name="unit_cost[]" id="unit_cost_<?php echo $i; ?>" value="<?php echo $account_head_value['unit_cost']; ?>" class="form-control" readonly ></td>
									<td><input type="number"  name="qty[]" value="0" id="qty_<?php echo $i; ?>" class="form-control" required></td>
									<td><input type="text"  name="no_of_month[]" id="no_of_month_<?php echo $i; ?>" value="0" class="form-control" required ></td>
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
	$("#mainUnicefFundNav").addClass('active');
    $("#addUnicefFundNav").addClass('active');

	var tableOffset = $("##header-fixed").offset().top;
	var $header = $("##header-fixed > thead").clone();
	var $fixedHeader = $("#header-fixed").append($header);

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