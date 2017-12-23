  <!-- START MAIN -->
    <div id="main">
        <!-- START WRAPPER -->
        <div class="wrapper">

            <!-- START LEFT SIDEBAR NAV-->
            <?php $this->load->view('admin/common/left_side_nav'); ?>
            <!-- END LEFT SIDEBAR NAV-->

            <!-- //////////////////////////////////////////////////////////////////////////// -->

            <!-- START CONTENT -->
            
            <section id="content">        
                <!--breadcrumbs start-->
                    <div id="breadcrumbs-wrapper">
                        <!-- Search for small screen -->
                        <?php $this->load->view('admin/common/top_search'); ?>
                      <div class="container">
                        <div class="row">
                          <div class="col s12 m12 l12">
                            <h5 class="breadcrumbs-title">Users</h5>
                            <ol class="breadcrumbs">
                                <li><a href="index.html">Dashboard</a></li>
                                <li><a href="#">Manage Users</a></li>
                                <li class="active"><?php echo $RoleID;?></li>
                            </ol>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--breadcrumbs end-->
                               
                    <!--start container-->
                    <div class="container">
                      <div class="section">
                        <div id="table-datatables">           
                          <div class="row">
                          	    
                            <div class="confirm-div"></div>
                            <div class="col m12 ">
                              <form action="<?php echo site_url('admin/role_permission/add_permission'); ?>" method="post" enctype="multipart/form-data">
                              	<input type="hidden" name="RoleID" value="<?=$RoleID?>" />
                                <table id="assign-permission-listing-table" class="responsive-table display dataTable">
                                <thead>
                                    <tr>
                                    	<th>Feature</th>                                
                                        <th>Allow Feature</th>
                                        <th>Can Add</th>
                                        <th>Can Edit</th>                                        
                                        <th>Can Delete</th>
                                        <th>Can View</th>
                                    </tr>
                                </thead>
                                <tbody>                                
                                <?php
									foreach($Feature_list as $Feature){
										
										$FeatureID_check = FALSE;										
										$r_can_add_check = FALSE;
										$r_can_edit_check = FALSE;
										$r_can_delete_check = FALSE;
										$r_can_view_check = FALSE;
										
										if(!is_null($Feature['role_permission'])){
											$FeatureID_check = ($Feature['role_permission']->FeatureID == 0)? FALSE: $Feature['role_permission']->FeatureID;											
											$r_can_add_check = ($Feature['role_permission']->r_can_add == 0)? FALSE: $Feature['role_permission']->r_can_add;
											$r_can_edit_check = ($Feature['role_permission']->r_can_edit == 0)? FALSE: $Feature['role_permission']->r_can_edit;
											$r_can_delete_check = ($Feature['role_permission']->r_can_delete == 0)? FALSE: $Feature['role_permission']->r_can_delete;
											$r_can_view_check = ($Feature['role_permission']->r_can_view == 0)? FALSE: $Feature['role_permission']->r_can_view;
										}
										
										$feature_id_data = array(
												'name'          => 'FeaturePermission['.$Feature["FeatureID"].'][FeatureID]',
												'id'            => 'FeatureID_'.$Feature["FeatureID"],
												'value'         => $Feature["FeatureID"],
												'checked'       => $FeatureID_check,
												'style'         => 'margin:10px'
										);
										
										$r_can_add_data = array(
												'name'          => 'FeaturePermission['.$Feature["FeatureID"].'][r_can_add]',
												'id'            => 'r_can_add_'.$Feature["FeatureID"],
												'value'         => '1',
												'checked'       => $r_can_add_check,
												'style'         => 'margin:10px'
										);
										
										$r_can_edit_data = array(
												'name'          => 'FeaturePermission['.$Feature["FeatureID"].'][r_can_edit]',
												'id'            => 'r_can_edit_'.$Feature["FeatureID"],
												'value'         => '1',
												'checked'       => $r_can_edit_check,
												'style'         => 'margin:10px'
										);
										
										$r_can_delete_data = array(
												'name'          => 'FeaturePermission['.$Feature["FeatureID"].'][r_can_delete]',
												'id'            => 'r_can_delete_'.$Feature["FeatureID"],
												'value'         => '1',
												'checked'       => $r_can_delete_check,
												'style'         => 'margin:10px'
										);	
										
										$r_can_view_data = array(
												'name'          => 'FeaturePermission['.$Feature["FeatureID"].'][r_can_view]',
												'id'            => 'r_can_view_'.$Feature["FeatureID"],
												'value'         => '1',
												'checked'       => $r_can_view_check,
												'style'         => 'margin:10px'
										);
											
									?>
                                    <tr>
                                       <th><?php echo $Feature["FeatureName"] ;?></th>
                                       <th><?php echo form_checkbox($feature_id_data); ?><label for="FeatureID_<?php echo $Feature["FeatureID"]; ?>"></label></th>
                                       <th><?php echo form_checkbox($r_can_add_data); ?><label for="r_can_add_<?php echo $Feature["FeatureID"]; ?>"></label></th>
                                       <th><?php echo form_checkbox($r_can_edit_data); ?><label for="r_can_edit_<?php echo $Feature["FeatureID"]; ?>"></label></th>
                                       <th><?php echo form_checkbox($r_can_delete_data); ?><label for="r_can_delete_<?php echo $Feature["FeatureID"]; ?>"></label></th>
                                       <th><?php echo form_checkbox($r_can_view_data); ?><label for="r_can_view_<?php echo $Feature["FeatureID"]; ?>"></label></th>
                                    </tr>
								<?php		
								}
								?>	
                                </tbody>
                                <tfoot>
                                    <tr>
                                    	<th>Feature</th>                                
                                        <th>Allow Feature</th>
                                        <th>Can Add</th>
                                        <th>Can Edit</th>                                        
                                        <th>Can Delete</th>
                                        <th>Can View</th>
                                    </tr>
                                </tfoot>
                              </table>
                                <div class="row">
                                  <div class="input-field col s12">
                                    <button class="btn cyan waves-effect waves-light right" type="submit">Save
                                      <i class="mdi-content-save right"></i>
                                    </button>
                                  </div>
                                </div>   
                              </form>	                              
                            </div>
                          </div>
                        </div>            
                      </div>
                      
                      <!-- Floating Action Button -->
                      <?php $this->load->view('admin/common/action_buttons')?>  
                      <!-- Floating Action Button -->
                    </div>
                    <!--end container-->
                  </section>
          
            <!-- END CONTENT -->

            <!-- //////////////////////////////////////////////////////////////////////////// -->
            <!-- START RIGHT SIDEBAR NAV-->
            <?php $this->load->view('admin/common/right_side_nav') ?>
            <!-- LEFT RIGHT SIDEBAR NAV-->

        </div>
        <!-- END WRAPPER -->

    </div>
    <!-- END MAIN -->

    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START FOOTER -->
   	<?php $this->load->view('admin/common/inner_footer'); ?>
    <!-- END FOOTER -->


    <!-- ================================================
    Scripts
    ================================================ -->
    
    <!-- jQuery Library -->
    <script type="text/javascript" src="<?php echo base_url('assets');?>/js/plugins/jquery-1.11.2.min.js"></script>    
    <!--materialize js-->
    <script type="text/javascript" src="<?php echo base_url('assets');?>/js/materialize.js"></script>
    <!--prism
    <script type="text/javascript" src="js/prism/prism.js"></script>-->
    <!--scrollbar-->
    <script type="text/javascript" src="<?php echo base_url('assets');?>/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    
    <!-- data-tables -->
    <script type="text/javascript" src="<?php echo base_url('assets');?>/js/plugins/data-tables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets');?>/js/plugins/data-tables/data-tables-script.js"></script>
    
    <!-- chartist -->
    <script type="text/javascript" src="<?php echo base_url('assets');?>/js/plugins/chartist-js/chartist.min.js"></script>   
    
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="<?php echo base_url('assets');?>/js/plugins.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="<?php echo base_url('assets');?>/js/custom-script.js"></script>
    
    <script type="text/javascript">
		// Set Tost Message afetr user Successfully Added
		
		<?php if($this->session->flashdata('success')){ ?>
			 setTimeout(function() {
			 	Materialize.toast('<span><?php echo $this->session->flashdata('success'); ?></span>', 3000);
			 }, 1500);
		<?php } ?>
		
	</script>