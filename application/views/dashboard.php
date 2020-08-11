

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <?php if($is_admin == true): ?>

        <div class="row">
			 <!-- ./col -->
			<div class="col-lg-3 col-xs-6">
				<div class="small-box bg-yellow">
				  <div class="inner">
					<h3><?php echo $total_users; ?></h3>
					<p>Total Users</p>
				  </div>
				  <div class="icon">
					<i class="ion ion-android-people"></i>
				  </div>
				  <a href="<?php echo base_url('users/') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			 <!-- ./col -->
			<div class="col-lg-3 col-xs-6">
				<div class="small-box bg-aqua">
				  <div class="inner">
					<h3><?php echo $total_camps ?></h3>
					<p>Total Camp</p>
				  </div>
				  <div class="icon">
					<i class="ion ion-bag"></i>
				  </div>
				  <a href="<?php echo base_url('/') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			  <!-- ./col -->
			  <!-- ./col -->
			<div class="col-lg-3 col-xs-6">
				<div class="small-box bg-green">
				  <div class="inner">
					<h3><?php echo $total_upzilla ?></h3>

					<p>Total Upzilla</p>
				  </div>
				  <div class="icon">
					<i class="ion ion-stats-bars"></i>
				  </div>
				  <a href="<?php echo base_url('/') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
        <!-- ./col -->
        </div>
        <!-- /.row -->
      <?php endif; ?>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script type="text/javascript">
    $(document).ready(function() {
      $("#dashboardMainMenu").addClass('active');
    }); 
  </script>
