  <style>
  	.input-field div.error{
    position: relative;
    top: -1rem;
    left: 0rem;
    font-size: 0.8rem;
    color:#FF4081;
    -webkit-transform: translateY(0%);
    -ms-transform: translateY(0%);
    -o-transform: translateY(0%);
    transform: translateY(0%);
  }
  </style>
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
                                <li><a href="">Dashboard</a></li>
                                <li><a href="#">Manage Users</a></li>
                                <li class="active">Users</li>
                            </ol>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--breadcrumbs end-->
                               
                    <!--start container-->
                    <div class="container">
                      <div class="section">
                        <!--Basic Form-->
                        <div id="basic-form" class="section">
                          <div class="row">
                            <div class="col s12 m12 l6">
                              <div class="card-panel">
                                <h4 class="header2 nmt"><button class="btn-floating btn-small waves-effect waves-light "><i class="mdi-content-add"></i></button> &nbsp; Add New User</h4>
                                <div class="row">                                	
                                  <form class="col s12 formValidate" id="admin-user-form" role="form" action="<?php echo site_url('admin/users/update'); ?>" method="post" enctype="multipart/form-data">
                                    <input type="hidden" value="<?php echo $dt->ID ?>" name="ID">
                                  	<?php $this->load->view('admin/users/form'); ?>                                    
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
    <script type="text/javascript" src="<?php echo base_url('assets');?>/js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets');?>/js/plugins/chartist-js/chartist.min.js"></script>   
    
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="<?php echo base_url('assets');?>/js/plugins.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="<?php echo base_url('assets');?>/js/custom-script.js"></script>