

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage
      <small>Accounts Head</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Accounts Head</li>
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

        <?php if(in_array('createAccountHead', $user_permission)): ?>
          <button class="btn btn-primary" data-toggle="modal" data-target="#addAccountHeadModal">Add Account Head</button>
          <br /> <br />
        <?php endif; ?>

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Manage Accounts Head</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <?php 
                
               /*  foreach($results as $value):
                    echo '<pre>';
                    print_r($value);
                    echo '</pre>';
                endforeach; */
              
               
            
            ?>
            <table id="manageTable" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th width="5%">Sl #</th>
                <th width="37%">Activity Name</th>
                <th width="5%">Account Code</th>
                <th width="40%">Account Head</th>
                <th width="5%">Unit</th>
                <?php if(in_array('updateAccountHead', $user_permission) || in_array('deleteAccountHead', $user_permission)): ?>
                  <th width="8%">Action</th>
                <?php endif; ?>
              </tr>
              </thead>

            </table>
          </div>
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

<?php if(in_array('createAccountHead', $user_permission)): ?>
<!-- create AccountHead modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="addAccountHeadModal" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add AccountHead</h4>
      </div>

      <form role="form" action="<?php echo base_url('accounts/create') ?>" method="post" id="createAccountHeadForm">

        <div class="modal-body">
            <div class="form-group">
                <label for="active">Select Activity</label>
                <select class="form-control" id="activity_id" name="activity_id">
                    <option value="">Select Activity</option>
                    <?php  foreach($activities as $activity): ?>
                    <option value="<?php echo $activity->id; ?>"><?php echo $activity->activity_name; ?></option>
                    <?php  endforeach;  ?>
                </select>
            </div>

            <div class="form-group">
                <label for="acc_code">Account Code</label>
                <input type="text" class="form-control" id="acc_code" name="acc_code" placeholder="Enter Account Code" autocomplete="off">
            </div>

            <div class="form-group">
                <label for="acc_head">AccountHead Name</label>
                <input type="text" class="form-control" id="acc_head" name="acc_head" placeholder="Enter Account Head name" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="unit">Unit Name</label>
                <input type="text" class="form-control" id="unit" name="unit" placeholder="Enter Unit" autocomplete="off">
            </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>

      </form>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php endif; ?>

<?php if(in_array('updateAccountHead', $user_permission)): ?>
<!-- edit AccountHead modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="editAccountHeadModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit AccountHead</h4>
      </div>

      <form role="form" action="<?php echo base_url('accounts/update') ?>" method="post" id="updateAccountHeadForm">

        <div class="modal-body">
          <div id="messages"></div>

        <div class="form-group">
            <label for="active">Select Activity</label>
            <select class="form-control" id="edit_activity_id" name="edit_activity_id">
                <option value="">Select Activity</option>
                <?php  foreach($activities as $activity): ?>
                <option value="<?php echo $activity->id; ?>"><?php echo $activity->activity_name; ?></option>
                <?php  endforeach;  ?>
            </select>
        </div>
        <div class="form-group">
            <label for="edit_acc_code">Account Code</label>
            <input type="text" class="form-control" id="edit_acc_code" name="edit_acc_code" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="edit_acc_head">AccountHead Name</label>
            <input type="text" class="form-control" id="edit_acc_head" name="edit_acc_head"  autocomplete="off">
        </div>

        <div class="form-group">
            <label for="edit_unit">Unit Name</label>
            <input type="text" class="form-control" id="edit_unit" name="edit_unit"  autocomplete="off">
        </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>

      </form>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php endif; ?>

<?php if(in_array('deleteAccountHead', $user_permission)): ?>
<!-- remove AccountHead modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeAccountHeadModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Remove Account Head</h4>
      </div>

      <form role="form" action="<?php echo base_url('accounts/remove') ?>" method="post" id="removeAccountHeadForm">
        <div class="modal-body">
          <p>Do you really want to remove?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php endif; ?>



<script type="text/javascript">
var manageTable;

$(document).ready(function() {
	$("#mainPreSetupMenu").addClass('active');
	$("#manageAccountHead").addClass('active');
    $(".select_group").select2();
  // initialize the datatable 
  manageTable = $('#manageTable').DataTable({
    "pageLength": 50,
    "aLengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
    'ajax': 'fetchAccountHeadData',
    'order': []
  });

  // submit the create from 
  $("#createAccountHeadForm").unbind('submit').on('submit', function() {
    var form = $(this);

    // remove the text-danger
    $(".text-danger").remove();

    $.ajax({
      url: form.attr('action'),
      type: form.attr('method'),
      data: form.serialize(), // /converting the form data into array and sending it to server
      dataType: 'json',
      success:function(response) {

        manageTable.ajax.reload(null, false); 

        if(response.success === true) {
          $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
            '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
          '</div>');


          // hide the modal
          $("#addAccountHeadModal").modal('hide');

          // reset the form
          $("#createAccountHeadForm")[0].reset();
          $("#createAccountHeadForm .form-group").removeClass('has-error').removeClass('has-success');

        } else {

          if(response.messages instanceof Object) {
            $.each(response.messages, function(index, value) {
              var id = $("#"+index);

              id.closest('.form-group')
              .removeClass('has-error')
              .removeClass('has-success')
              .addClass(value.length > 0 ? 'has-error' : 'has-success');
              
              id.after(value);

            });
          } else {
            $("#messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
              '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
            '</div>');
          }
        }
      }
    }); 

    return false;
  });


});

function editAccountHead(id)
{ 
  $.ajax({
    url: 'fetchAccountHeadDataById/'+id,
    type: 'post',
    dataType: 'json',
    success:function(response) {
      $("#edit_acc_head").val(response.acc_head);
      $("#edit_activity_id").val(response.activity_id);
      $("#edit_acc_code").val(response.acc_code);
      $("#edit_unit").val(response.unit);
      // submit the edit from 
      $("#updateAccountHeadForm").unbind('submit').bind('submit', function() {
        var form = $(this);

        // remove the text-danger
        $(".text-danger").remove();

        $.ajax({
          url: form.attr('action') + '/' + id,
          type: form.attr('method'),
          data: form.serialize(), // /converting the form data into array and sending it to server
          dataType: 'json',
          success:function(response) {

            manageTable.ajax.reload(null, false); 

            if(response.success === true) {
              $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
              '</div>');


              // hide the modal
              $("#editAccountHeadModal").modal('hide');
              // reset the form 
              $("#updateAccountHeadForm .form-group").removeClass('has-error').removeClass('has-success');

            } else {

              if(response.messages instanceof Object) {
                $.each(response.messages, function(index, value) {
                  var id = $("#"+index);

                  id.closest('.form-group')
                  .removeClass('has-error')
                  .removeClass('has-success')
                  .addClass(value.length > 0 ? 'has-error' : 'has-success');
                  
                  id.after(value);

                });
              } else {
                $("#messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
                  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
                '</div>');
              }
            }
          }
        }); 

        return false;
      });

    }
  });
}

function removeAccountHead(id)
{
  if(id) {
    $("#removeAccountHeadForm").on('submit', function() {

      var form = $(this);

      // remove the text-danger
      $(".text-danger").remove();

      $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data: { AccountHead_id:id }, 
        dataType: 'json',
        success:function(response) {

          manageTable.ajax.reload(null, false); 

          if(response.success === true) {
            $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
              '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
            '</div>');

            // hide the modal
            $("#removeAccountHeadModal").modal('hide');

          } else {

            $("#messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
              '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
            '</div>'); 
          }
        }
      }); 

      return false;
    });
  }
}


</script>
