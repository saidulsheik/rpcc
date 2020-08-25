

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage
      <small>Cash Grant</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Cash Grant</li>
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
			<div class="box">
			  <div class="box-header">
				<h3 class="box-title">Edit Cash Grant</h3>
			  </div>
			  <!-- /.box-header -->
			  <?php 
				/* echo '<pre>';
				print_r($cg['cg_master']);
				echo '</pre>'; */
			  ?>
			  <form role="form" action="<?php base_url('cashgrants/update') ?>"  method="post" class="form-horizontal">
              <div class="box-body">

				<div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<h4 class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></h4>'); ?>
                    </div>
                </div>

				<div class="row">
					<div class="col-md-4 col-xs-12 pull pull-left">
					  <div class="form-group">
						<label for="gross_amount" class="col-sm-5 control-label">Cash Grant Name</label>
						<div class="col-sm-7">
						  <input type="text" class="form-control" id="cg_desc" required name="cg_desc" value="<?php echo $cg['cg_master']['cg_desc']; ?>" placeholder=""  autocomplete="on">
						</div>
					  </div>
					</div>
					<?php 
						$curr_month = date('F',mktime(0, 0, 0, date('n')));
						$months = array("January","February","March","April","May","June","July","August","September","October","November","December");
					?>
					<div class="col-md-4 col-xs-12 pull pull-left">
					  <div class="form-group">
						<label for="gross_amount" class="col-sm-5 control-label">Select Month</label>
						<div class="col-sm-7">
							<select class="form-control select_group"  id="month" name="month_name" style="width:100%;" required>
								<option value="">Select a Month</option>
								<?php foreach ($months as $month): ?>
								<option <?php echo $cg['cg_master']['month_name']==$month?'selected':''; ?> value="<?php echo  $month; ?>"><?php echo $month; ?></option>
								<?php endforeach ?>
							</select>
						</div>
					  </div>
					</div>
					
					 
				</div> 
				
                <table class="table table-bordered" id="product_info_table">
                  <thead>
                    <tr>
                      <th style="width:30%">Camp Name</th>
                      <th style="width:10%">No. of Care</th>
                      <th style="width:10%">No. of Child</th>
                      <th style="width:10%">Rate</th>
                      <th style="width:20%">Amount</th>
                      <th style="width:10%"><button type="button" id="add_row" class="btn btn-default"><i class="fa fa-plus"></i></button></th>
                    </tr>
                  </thead>

					<tbody>
						<?php if(isset($cg['cg_details'])): ?>
						<?php $x = 1; ?>
						<?php foreach ($cg['cg_details'] as $key => $val): 
							/* echo '<pre>';
							print_r($val);
							echo '</pre>'; */
						
						?>
							<tr id="row_<?php echo $x; ?>">
								<td>
									<select class="form-control select_group product" data-row-id="row_<?php echo $x; ?>" id="camp_id_<?php echo $x; ?>" name="camp_id[]" style="width:100%;" onchange="getval(<?php echo $x; ?>);" required>
										<option value="">Select a Camp</option>
										<?php foreach ($camps as $k => $v): ?>
										<option <?php echo $val['camp_id']==$v['id']?'selected':''; ?> value="<?php echo $v['id'] ?>"><?php echo $v['carea'] ?>(<?php echo $val['camp_id']; ?>)</option>
										<?php endforeach ?>
									</select>
								</td>
								<td>
									<input type="number"  name="no_of_care[]" id="no_of_care_<?php echo $x; ?>" class="form-control" value="<?php echo $val['no_of_care'];?>" required onkeyup="getTotal('<?php echo $x; ?>')">
								</td>
								<td><input type="number"  name="no_of_child[]" id="no_of_child_<?php echo $x; ?>" class="form-control" value="<?php echo $val['no_of_child'];?>" required ></td>
								<td>
								  <input type="text" name="rate[]" id="rate_<?php echo $x; ?>" class="form-control" value="2000" readonly autocomplete="off">
								  
								</td>
								<td>
									<input type="text" name="amount[]" id="amount_<?php echo $x;?>" class="form-control" readonly value="<?php echo $val['amount'];?>" autocomplete="off">
									 
								</td>
								<td><button type="button" class="btn btn-default" onclick="removeRow('<?php echo $x; ?>')"><i class="fa fa-close"></i></button></td>
							</tr>
						 <?php $x++; ?>
                     <?php endforeach; ?>
                   <?php endif; ?>
					</tbody>
                </table>

                <br /> <br/>

                <div class="col-md-6 col-xs-12 pull pull-right">
                  <div class="form-group">
                    <label for="gross_amount" class="col-sm-5 control-label">Gross Amount</label>
                    <div class="col-sm-7">
                      <input type="number" class="form-control" id="gross_amount" name="gross_amount" value="<?php  echo $cg['cg_master']['total_amout']; ?>" readonly autocomplete="off">
                      <input type="hidden" class="form-control" id="gross_amount_value" name="gross_amount_value" autocomplete="off">
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="<?php echo base_url('cashgrants/') ?>" class="btn btn-warning">Back</a>
              </div>
			 
            </form>
			
			  <!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
		<!-- col-md-12 -->
    </div>
    <!-- /.row -->
    

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<script type="text/javascript">
  var base_url = "<?php echo base_url(); ?>";

  jQuery(document).ready(function() {
    $(".select_group").select2();
    $("#mainOrdersNav").addClass('active');
    $("#manageOrdersNav").addClass('active');
    // Add new row in the table 
    $("#add_row").unbind('click').bind('click', function() {
		
      var table = $("#product_info_table");
      var count_table_tbody_tr = $("#product_info_table tbody tr").length;
      var row_id = count_table_tbody_tr + 1;
      $.ajax({
          url: base_url + '/cashgrants/getCampDataRow/',
          type: 'post',
          dataType: 'json',
          success:function(response) {
              // console.log(reponse.x);
               var html = '<tr id="row_'+row_id+'">'+
                   '<td>'+ 
                    '<select class="form-control select_group product" data-row-id="'+row_id+'" id="camp_id_'+row_id+'" name="camp_id[]" onchange="getval('+row_id+');" style="width:100%;" required>'+
                        '<option value="">Select Camp</option>';
                        $.each(response, function(index, value) {
                          html += '<option value="'+value.id+'">'+value.carea+'</option>';             
                        });
                      html += '</select>'+
                    '</td>'+ 
                    '<td><input type="number"  name="no_of_care[]" id="no_of_care_'+row_id+'" class="form-control" onkeyup="getTotal('+row_id+')" required></td>'+
                    '<td><input type="number"  name="no_of_child[]" id="no_of_child_'+row_id+'" class="form-control" required></td>'+
                    '<td><input type="text" name="rate[]" id="rate_'+row_id+'" value="2000" class="form-control" readonly>'+
                    '<td><input type="text" name="amount[]" id="amount_'+row_id+'" class="form-control" readonly></td>'+
                    '<td><button type="button" class="btn btn-default" onclick="removeRow(\''+row_id+'\')"><i class="fa fa-close"></i></button></td>'+
                    '</tr>';
                if(count_table_tbody_tr >= 1) {
					$("#product_info_table tbody tr:last").after(html);  
				}else {
					$("#product_info_table tbody").html(html);
				}

              $(".product").select2();

          }
        });

      return false;
    });







  }); // /document

  function getTotal(row = null) {
    if(row) {
	//alert(Number($("#rate_"+row).val()));
      var total = Number($("#no_of_care_"+row).val()) *  Number($("#rate_"+row).val());
     //total = total.toFixed(2);
	
      $("#amount_"+row).val(total);
      $("#amount_value_"+row).val(total);
      
      subAmount();

    } else {
      alert('no row !! please refresh the page');
    }
  }
  
  
  
 /* get product imei when select product */

 /* $('.product').on('change', function() {
  alert( this.value );
}); */
function getval(row_id){
    if(row_id > 1){
	  var options = document.getElementById("camp_id_"+row_id).getElementsByTagName("option");
	  // console.log(options);
	  var selectobject = document.getElementById("camp_id_"+row_id);
	  for(i = 1; i < row_id; i++){
		// $("#camp_id_"+row_id).
		var pre_camp_id = $("#camp_id_"+i).val();
		console.log(selectobject.length);
		for (var j=0; j<selectobject.length; j++) {
			if (selectobject.options[j].value == pre_camp_id){
				selectobject.remove(j);
				break;
			}
		}
	  }
	}
}


  // calculate the total amount of the order
  function subAmount() {
    var tableProductLength = $("#product_info_table tbody tr").length;
    var totalSubAmount = 0;
    for(x = 0; x < tableProductLength; x++) {
      var tr = $("#product_info_table tbody tr")[x];
      var count = $(tr).attr('id');
      count = count.substring(4);
      totalSubAmount = Number(totalSubAmount) + Number($("#amount_"+count).val());
    } // /for

    totalSubAmount = totalSubAmount.toFixed(2);

    // sub total
    $("#gross_amount").val(totalSubAmount);
    $("#gross_amount_value").val(totalSubAmount);

    // vat
   
    
    // total amount
    var totalAmount = (Number(totalSubAmount) + Number(vat) + Number(service));
    totalAmount = totalAmount.toFixed(2);
   

  } // /sub total amount
	//remove order table row
  function removeRow(tr_id){
    $("#product_info_table tbody tr#row_"+tr_id).remove();
    subAmount();
  }
  //remove payment table row
  function removePaymentRow(tr_id){
    $("#payment_info_table tbody tr#row_"+tr_id).remove();
  }
  
 


</script>