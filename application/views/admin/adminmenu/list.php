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
                            <h5 class="breadcrumbs-title">Admin Menu Management</h5>
                            <ol class="breadcrumbs">
                                <li><a href="index.html">Dashboard</a></li>
                                <li><a href="#">Manage Admin Menu</a></li>
                                <li class="active">Admin Menu</li>
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
                          	<div class="col m12 mb-5">
                          		<a href="<?php echo site_url('admin/adminmenu/new_record/'); ?>" class="btn waves-effect waves-light pull-right" type="submit" name="action">Add New</a>
                            </div>    
                            <div class="confirm-div"></div>
                            <div class="col m12 ">
                              <table id="adminmenu-listing-table" class="responsive-table display dataTable">
                                <thead>
                                    <tr>
                                    	<th>Sr.No</th> 
                                        <th>Menu Item</th>  
                                        <th>Feature</th>                              
                                        <th>Parent ID</th>
                                        <th>Display Order</th>
                                        <th>Show In Nav</th>                                        
                                        <th>Icon Class Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                    	<th>Sr.No</th>
                                        <th>Menu Item</th> 
                                        <th>Feature</th> 
                                        <th>Parent ID</th>
                                        <th>Display Order</th>
                                        <th>Show In Nav</th>                                        
                                        <th>Icon Class Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                              </table>
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