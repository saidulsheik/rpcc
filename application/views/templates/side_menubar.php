<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        
        <li id="dashboardMainMenu">
          <a href="<?php echo base_url('dashboard') ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <?php if($user_permission): ?>
          <?php if(in_array('createUser', $user_permission) || in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
            <li class="treeview" id="mainUserNav">
				<a href="#">
				  <i class="fa fa-users"></i>
				  <span>Users</span>
				  <span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				  </span>
				</a>
				<ul class="treeview-menu">
				  <?php if(in_array('createUser', $user_permission)): ?>
				  <li id="createUserNav"><a href="<?php echo base_url('users/create') ?>"><i class="fa fa-circle-o"></i> Add User</a></li>
				  <?php endif; ?>

				  <?php if(in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
				  <li id="manageUserNav"><a href="<?php echo base_url('users') ?>"><i class="fa fa-circle-o"></i> Manage Users</a></li>
				<?php endif; ?>
				</ul>
			</li>
          <?php endif; ?>

          <?php if(in_array('createGroup', $user_permission) || in_array('updateGroup', $user_permission) || in_array('viewGroup', $user_permission) || in_array('deleteGroup', $user_permission)): ?>
            <li class="treeview" id="mainGroupNav">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Groups</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <?php if(in_array('createGroup', $user_permission)): ?>
                  <li id="addGroupNav"><a href="<?php echo base_url('groups/create') ?>"><i class="fa fa-circle-o"></i> Add Group</a></li>
                <?php endif; ?>
                <?php if(in_array('updateGroup', $user_permission) || in_array('viewGroup', $user_permission) || in_array('deleteGroup', $user_permission)): ?>
                <li id="manageGroupNav"><a href="<?php echo base_url('groups') ?>"><i class="fa fa-circle-o"></i> Manage Groups</a></li>
                <?php endif; ?>
              </ul>
            </li>
          <?php endif; ?>

          <!-- Budget Start-->
		      <?php if(in_array('createBudget', $user_permission) || in_array('updateBudget', $user_permission) || in_array('viewBudget', $user_permission) || in_array('deleteBudget', $user_permission)): ?>
            <li class="treeview" id="mainBudgetsNav">
              <a href="#">
                <i class="fa fa-dollar"></i>
                <span>Budget</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <?php if(in_array('createBudget', $user_permission)): ?>
                  <li id="addBudgetNav"><a href="<?php echo base_url('budgets/create') ?>"><i class="fa fa-circle-o"></i> Add Budget</a></li>
                <?php endif; ?>
                <?php if(in_array('updateBudget', $user_permission) || in_array('viewBudget', $user_permission) || in_array('deleteBudget', $user_permission)): ?>
                <li id="manageBudgetsNav"><a href="<?php echo base_url('Budgets') ?>"><i class="fa fa-circle-o"></i> Manage Budget</a></li>
                <?php endif; ?>
              </ul>
            </li>
          <?php endif; ?>
		   <!-- Budget End-->
			
			
		<!-- Unicef Fund Start-->
		   <?php if(in_array('createOfficeFund', $user_permission) || in_array('updateOfficeFund', $user_permission) || in_array('viewOfficeFund', $user_permission) || in_array('deleteOfficeFund', $user_permission)): ?>
            <li class="treeview" id="mainOfficeFundNav">
              <a href="#">
              <i class="fa fa-briefcase" aria-hidden="true"></i>
                <span>Office Fund</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <?php if(in_array('createOfficeFund', $user_permission)): ?>
                  <li id="addOfficeFundNav"><a href="<?php echo base_url('officefunds/create') ?>"><i class="fa fa-circle-o"></i> Add Office Fund</a></li>
                <?php endif; ?>
                <?php if(in_array('updateOfficeFund', $user_permission) || in_array('viewOfficeFund', $user_permission) || in_array('deleteOfficeFund', $user_permission)): ?>
                <li id="manageOfficeFundNav"><a href="<?php echo base_url('officefunds') ?>"><i class="fa fa-circle-o"></i> Manage Office Fund</a></li>
                <?php endif; ?>
              </ul>
            </li>
          <?php endif; ?>
		 <!-- Office Fund End-->


     	<!--Unicef Fund Start-->
		   <?php if(in_array('createUnicefFund', $user_permission) || in_array('updateUnicefFund', $user_permission) || in_array('viewUnicefFund', $user_permission) || in_array('deleteUnicefFund', $user_permission)): ?>
            <li class="treeview" id="mainUnicefFundNav">
              <a href="#">
              <i class="fa fa-sitemap" aria-hidden="true"></i>
                <span>Unicef Fund</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <?php if(in_array('createUnicefFund', $user_permission)): ?>
                  <li id="addUnicefFundNav"><a href="<?php echo base_url('uniceffunds/create') ?>"><i class="fa fa-circle-o"></i> Add Unicef Fund</a></li>
                <?php endif; ?>
                <?php if(in_array('updateUnicefFund', $user_permission) || in_array('viewUnicefFund', $user_permission) || in_array('deleteUnicefFund', $user_permission)): ?>
                <li id="manageUnicefFundNav"><a href="<?php echo base_url('uniceffunds') ?>"><i class="fa fa-circle-o"></i> Manage Unicef Fund</a></li>
                <?php endif; ?>
              </ul>
            </li>
          <?php endif; ?>
		 <!-- Unicef Fund End-->



		  <!-- Cash Grant Start-->
		   <?php if(in_array('createCashgrant', $user_permission) || in_array('updateCashgrant', $user_permission) || in_array('viewCashgrant', $user_permission) || in_array('deleteCashgrant', $user_permission)): ?>
            <li class="treeview" id="mainOrdersNav">
              <a href="#">
              <i class="fa fa-money" aria-hidden="true"></i>
                <span>Cash Grant</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <?php if(in_array('createCashgrant', $user_permission)): ?>
                  <li id="addOrderNav"><a href="<?php echo base_url('Cashgrants/create') ?>"><i class="fa fa-circle-o"></i> Add Cash Grant</a></li>
                <?php endif; ?>
                <?php if(in_array('updateCashgrant', $user_permission) || in_array('viewCashgrant', $user_permission) || in_array('deleteCashgrant', $user_permission)): ?>
                <li id="manageOrdersNav"><a href="<?php echo base_url('cashgrants') ?>"><i class="fa fa-circle-o"></i> Manage Cash Grant</a></li>
                <?php endif; ?>
              </ul>
            </li>
          <?php endif; ?>
		   <!-- Cash Grant End-->

         <!-- Pre Settings Menu-->
       <?php if(
                in_array('createAccountHead', $user_permission) || 
                in_array('updateAccountHead', $user_permission) ||
                in_array('viewAccountHead', $user_permission) || 
                in_array('deleteAccountHead', $user_permission) || 
                in_array('createOutput', $user_permission) || 
                in_array('updateOutput', $user_permission) || 
                in_array('viewOutput', $user_permission) ||
                in_array('deleteOutput', $user_permission) ||
                in_array('createReportText', $user_permission) ||
                in_array('viewReportText', $user_permission) ||
                in_array('updateReportText', $user_permission) ||
                in_array('deleteReportText', $user_permission)
              ): 
        ?>
            <li class="treeview" id="mainPreSetupMenu">
              <a href="#">
              <i class="fa fa-cogs" aria-hidden="true"></i>
                <span>Pre-Setup</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">

                <?php if(in_array('createAccountHead', $user_permission)): ?>
                  <li id="manageAccountHead"><a href="<?php echo base_url('accounts/') ?>"><i class="fa fa-circle-o"></i> Manage Account Head</a></li>
                <?php endif; ?>
                
                <?php if(in_array('createOutput', $user_permission)): ?>
                  <li id="manageOutput"><a href="<?php echo base_url('outputs/') ?>"><i class="fa fa-circle-o"></i> Manage Output</a></li>
                <?php endif; ?>
                
                <?php if(in_array('createReportText', $user_permission)): ?>
                  <li id="createReportText"><a href="<?php echo base_url('reporttext/create') ?>"><i class="fa fa-circle-o"></i> Create Report Text</a></li>
                <?php endif; ?>

                <?php if(in_array('createReportText', $user_permission)||in_array('viewReportText', $user_permission) || in_array('updateReportText', $user_permission)): ?>
                  <li id="manageReportText"><a href="<?php echo base_url('reporttext/') ?>"><i class="fa fa-circle-o"></i> Manage Report Text</a></li>
                <?php endif; ?>

              </ul>
            </li>
          <?php endif; ?>
		   <!-- Pre Setting Menu End-->




          <?php if(in_array('viewReports', $user_permission)): ?>
            <li id="reportNav">
              <a href="<?php echo base_url('reports/') ?>">
                <i class="glyphicon glyphicon-stats"></i> <span>Reports</span>
              </a>
            </li>
          <?php endif; ?>

		<!-- Setting Menu Start-->
		<?php if(in_array('updateCompany', $user_permission) || in_array('viewProfile', $user_permission) || in_array('updateSetting', $user_permission) || in_array('deleteGroup', $user_permission)): ?>
            <li class="treeview" id="mainSettingNav">
              <a href="#">
              <i class="fa fa-cog" aria-hidden="true"></i>
                <span>Settings</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
				<?php if(in_array('updateCompany', $user_permission)): ?>
				<li id="companyNav"><a href="<?php echo base_url('company/') ?>"><i class="fa fa-files-o"></i> <span>Company</span></a></li>
				<?php endif; ?>
				<?php if(in_array('viewProfile', $user_permission)): ?>
				  <li id="profileNav"><a href="<?php echo base_url('users/profile/') ?>"><i class="fa fa-user-o"></i> <span>Profile</span></a></li>
				<?php endif; ?>
				<?php if(in_array('updateSetting', $user_permission)): ?>
				  <li id="updateProfile"><a href="<?php echo base_url('users/setting/') ?>"><i class="fa fa-wrench"></i> <span>Update Profile</span></a></li>
				<?php endif; ?>
              </ul>
            </li>
        <?php endif; ?>
		<?php endif; ?>
		<!-- Setting Menu End-->
        <li><a href="<?php echo base_url('auth/logout') ?>"><i class="glyphicon glyphicon-log-out"></i> <span>Logout</span></a></li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>