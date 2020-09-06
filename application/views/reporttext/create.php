

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Report Text
        <small>Report Text</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Report Text</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">
          
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
              <h3 class="box-title">Add Report Text</h3>
            </div>
            <form role="form" action="<?php base_url('reporttext/create') ?>" method="post">
            <div class="box-body">

            <div class="row">
              <div class="col-md-12">
                  <?php echo validation_errors('<h5 class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></h5>'); ?>
              </div>
            </div>
                    <div class="form-group">
                        <label for="name">Report Text Name</label>
                        <input  type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="header1">Report Header1</label>
                                <textarea  rows="4" placeholder="Report Header 1" class="form-control" id="header1" name="header1">

                                </textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="header2">Report Header2</label>
                                <textarea  rows="4"  placeholder="Report Header 2" class="form-control" id="header2" name="header2">

                                </textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                                <div class="form-group">
                                    <label for="header1">Report Footer1</label>
                                    <textarea   rows="4"  placeholder="Report Footer 1" class="form-control" id="footer1" name="footer1">
                            
                                    </textarea>
                                </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="header1">Report Footer2</label>
                                <textarea   rows="4"  placeholder="Report Footer 2" class="form-control" id="footer2" name="footer2">

                                </textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="signature_left">Report Signature Left</label>
                                <textarea  rows="4"  placeholder="Report Signature Left" class="form-control" id="signature_left" name="signature_left">

                                </textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="signature_right">Report Signature Right</label>
                                <textarea   rows="4"  placeholder="Report Signature Right" class="form-control" id="signature_right" name="signature_right">
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save Changes</button>
              </div>
            </form>
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
  $(document).ready(function() {
    $("#mainPreSetupMenu").addClass('active');
    $("#createReportText").addClass('active');
    //$("#message").wysihtml5();
    $("#header1").wysihtml5();
    $("#header2").wysihtml5();
    $("#footer1").wysihtml5();
    $("#footer2").wysihtml5();
    $("#signature_left").wysihtml5();
    $("#signature_right").wysihtml5();
  });
</script>

