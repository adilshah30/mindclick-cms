/*================================================================================
	Item Name: Mc-cms - Mind Click Content Management System
	Version: 3.0
	Author: Adil Shah
	Author URL: http://www.adilshah.com/
================================================================================

NOTE:
------
PLACE HERE YOUR OWN JS CODES AND IF NEEDED.
WE WILL RELEASE FUTURE UPDATES SO IN ORDER TO NOT OVERWRITE YOUR CUSTOM SCRIPT IT'S BETTER LIKE THIS. */

$(document).ready(function(){
	
	var mysite="http://localhost/mindclick-cms/";
	var static_url="http://localhost/mindclick-cms/assets/";
	
	
	user_listing_table(); //user Listing table
	role_listing_table(); //role Listing table
	permission_listing_table(); //permission Listing table
	feature_listing_table(); //feature Listing table
	adminmenu_listing_table(); //Admin Menu
	cmspage_listing_table(); // Admin Cms pages Listing
        add_new_custom_field_key();//Admin Page add new custom field
	//cancel_add_new_custom_field_key();//Cancel Admin Page add new custom field 
        add_ajax_custom_content();
        
        
	// Function Definition 
	// Admin user Listing Table
	function user_listing_table(){		
		if($('#user-listing-table').length > 0){			
			$('#user-listing-table').dataTable({
				  "serverSide": true,
				  "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
				  "order": [[1, "asc"]],
				  "oLanguage":{
								sProcessing: "<img src='"+static_url+"images/datatable-loader.gif' class='pre-loader'/>"
					},
				  "processing": true,
				  "paging": true,
				  "pagingType": "full_numbers",				  
				  "ajax": {
					"url": mysite + "admin/users/ajax_list",
					"type": "POST"
				  },
				  "fnDrawCallback": function(oSettings) {
					$('.needconfirm').click(function() {
					  var con = confirm('Are you sure?')
					  return con;
					})
					
					//Add the Default Browser class To Select 
					$('.dataTables_length select').addClass('browser-default');
					//initializing Dropdown after ajax row load
					$(".dropdown-button").dropdown();
				  },
				  	//Set column definition initialisation properties.
					"columnDefs": [
						{ 
							"targets": [ 0 ], //first column / numbering column
							"orderable": false, //set not orderable
						},
					],				 		
			});
		}	
	}
	
	// Form Validation
	// Admin Add User page 
	if($('#admin-user-form').length > 0){	
		$("#admin-user-form").validate({
			rules: {
				FirstName: {
					required: true
				},  
				LastName: {
					required: true
				}, 
				Username: {
					required: true,
					minlength: 5
				},  
				Email: {
					required: true,
					email:true
				},
				Password: {
					required: true,
					minlength: 5
				},
				ConfirmPassword: {
					required: true,
					minlength: 5,
					equalTo: "#Password"
				},
				Type: {
					required: true
				},
				Status: {
					required: true
				},
			},
			//For custom messages
			messages: {
				Username:{
					minlength:"Enter at least 5 characters"
				},
				Password: {
					minlength:"Enter at least 5 characters"
				},
				ConfirmPassword: {
					equalTo:"Password and confirm password must match"
				},				
			},
			errorElement : 'div',
			errorPlacement: function(error, element) {
			  var placement = $(element).data('error');
			  if (placement) {
				$(placement).append(error)
			  } else {
				error.insertAfter(element);
			  }
			}
		 });
	 }
	 
	 
	// Function Definition 
	// Admin side Role Listing Table
	function role_listing_table(){		
		if($('#role-listing-table').length > 0){			
			$('#role-listing-table').dataTable({
				  "serverSide": true,
				  "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
				  "order": [[1, "asc"]],
				  "oLanguage":{
								sProcessing: "<img src='"+static_url+"images/datatable-loader.gif' class='pre-loader'/>"
					},
				  "processing": true,
				  "paging": true,
				  "pagingType": "full_numbers",				  
				  "ajax": {
					"url": mysite + "admin/role/ajax_list",
					"type": "POST"
				  },
				  "fnDrawCallback": function(oSettings) {
					$('.needconfirm').click(function() {
					  var con = confirm('Are you sure?')
					  return con;
					})
					
					//Add the Default Browser class To Select 
					$('.dataTables_length select').addClass('browser-default');
					//initializing Dropdown after ajax row load
					$(".dropdown-button").dropdown();
				  },
				  	//Set column definition initialisation properties.
					"columnDefs": [
						{ 
							"targets": [ 0 ], //first column / numbering column
							"orderable": false, //set not orderable
						},
					],				 		
			});
		}	
	}
	
	// Form Validation
	// Admin Add Role page 
	if($('#role-form').length > 0){	
		$("#role-form").validate({
			rules: {
				RoleName:{
					required: true,
					minlength: 4
				},  
				RoleDescription:{
					required: true,
					minlength: 4
				},
				RoleCode:{
					required: true,
					minlength: 4
				}, 				
			},
			//For custom messages
			messages: {
				RoleName:{
					minlength:"Enter at least 4 characters"
				},
				RoleDescription: {
					minlength:"Enter at least 4 characters"
				},				
			},
			errorElement : 'div',
			errorPlacement: function(error, element) {
			  var placement = $(element).data('error');
			  if (placement) {
				$(placement).append(error)
			  } else {
				error.insertAfter(element);
			  }
			}
		 });
	 }
	 
	// Function Definition 
	// Admin side Role Listing Table
	function permission_listing_table(){		
		if($('#permission-listing-table').length > 0){			
			$('#permission-listing-table').dataTable({
				  "serverSide": true,
				  "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
				  "order": [[1, "asc"]],
				  "oLanguage":{
								sProcessing: "<img src='"+static_url+"images/datatable-loader.gif' class='pre-loader'/>"
					},
				  "processing": true,
				  "paging": true,
				  "pagingType": "full_numbers",				  
				  "ajax": {
					"url": mysite + "admin/permission/ajax_list",
					"type": "POST"
				  },
				  "fnDrawCallback": function(oSettings) {
					$('.needconfirm').click(function() {
					  var con = confirm('Are you sure?')
					  return con;
					})
					
					//Add the Default Browser class To Select 
					$('.dataTables_length select').addClass('browser-default');
					//initializing Dropdown after ajax row load
					$(".dropdown-button").dropdown();
				  },
				  	//Set column definition initialisation properties.
					"columnDefs": [
						{ 
							"targets": [ 0 ], //first column / numbering column
							"orderable": false, //set not orderable
						},
					],				 		
			});
		}	
	}
	
	// Form Validation
	// Admin Add Permission page 
	if($('#permission-admin-form').length > 0){	
		$("#permission-admin-form").validate({
			rules: {
				PermissionName: {
					required: true				
				},   				
			},
			//For custom messages
			messages: {
								
			},
			errorElement : 'div',
			errorPlacement: function(error, element) {
			  var placement = $(element).data('error');
			  if (placement) {
				$(placement).append(error)
			  } else {
				error.insertAfter(element);
			  }
			}
		 });
	 }
	 
	 
	// Function Definition 
	// Admin Feature Listing Table
	function feature_listing_table(){		
		if($('#feature-listing-table').length > 0){			
			$('#feature-listing-table').dataTable({
				  "serverSide": true,
				  "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
				  "order": [[1, "asc"]],
				  "oLanguage":{
								sProcessing: "<img src='"+static_url+"images/datatable-loader.gif' class='pre-loader'/>"
					},
				  "processing": true,
				  "paging": true,
				  "pagingType": "full_numbers",				  
				  "ajax": {
					"url": mysite + "admin/feature/ajax_list",
					"type": "POST"
				  },
				  "fnDrawCallback": function(oSettings) {
					$('.needconfirm').click(function() {
					  var con = confirm('Are you sure?')
					  return con;
					})
					
					//Add the Default Browser class To Select 
					$('.dataTables_length select').addClass('browser-default');
					//initializing Dropdown after ajax row load
					$(".dropdown-button").dropdown();
				  },
				  	//Set column definition initialisation properties.
					"columnDefs": [
						{ 
							"targets": [ 0 ], //first column / numbering column
							"orderable": false, //set not orderable
						},
					],				 		
			});
		}	
	}
	
	// Form Validation
	// Admin Add Feature page 
	if($('#admin-feature-form').length > 0){	
		$("#admin-feature-form").validate({
			rules: {
				FeatureName: {
					required: true				
				},
				UrlLink: {
					required: true				
				},
				FeatureDescription: {
					required: true				
				},
				   				
			},
			//For custom messages
			messages: {
								
			},
			errorElement : 'div',
			errorPlacement: function(error, element) {
			  var placement = $(element).data('error');
			  if (placement) {
				$(placement).append(error)
			  } else {
				error.insertAfter(element);
			  }
			}
		 });
	 }
	 
	// Function Definition 
	// Admin menu Listing Table
	function adminmenu_listing_table(){		
		if($('#adminmenu-listing-table').length > 0){			
			$('#adminmenu-listing-table').dataTable({
				  "serverSide": true,
				  "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
				  "order": [[1, "asc"]],
				  "oLanguage":{
								sProcessing: "<img src='"+static_url+"images/datatable-loader.gif' class='pre-loader'/>"
					},
				  "processing": true,
				  "paging": true,
				  "pagingType": "full_numbers",				  
				  "ajax": {
					"url": mysite + "admin/adminmenu/ajax_list",
					"type": "POST"
				  },
				  "fnDrawCallback": function(oSettings) {
					$('.needconfirm').click(function() {
					  var con = confirm('Are you sure?')
					  return con;
					})
					
					//Add the Default Browser class To Select 
					$('.dataTables_length select').addClass('browser-default');
					//initializing Dropdown after ajax row load
					$(".dropdown-button").dropdown();
				  },
				  	//Set column definition initialisation properties.
					"columnDefs": [
						{ 
							"targets": [ 0 ], //first column / numbering column
							"orderable": false, //set not orderable
						},
					],				 		
			});
		}	
	}
	
	// Function Definition 
	// Cms page listing table
	function cmspage_listing_table(){		
		if($('#cms-page-listing-table').length > 0){			
			$('#cms-page-listing-table').dataTable({
				  "serverSide": true,
				  "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
				  "order": [[1, "asc"]],
				  "oLanguage":{
								sProcessing: "<img src='"+static_url+"images/datatable-loader.gif' class='pre-loader'/>"
					},
				  "processing": true,
				  "paging": true,
				  "pagingType": "full_numbers",				  
				  "ajax": {
					"url": mysite + "admin/cmspage/ajax_page_list",
					"type": "POST"
				  },
				  "fnDrawCallback": function(oSettings) {
					$('.needconfirm').click(function() {
					  var con = confirm('Are you sure?')
					  return con;
					})
					
					//Add the Default Browser class To Select 
					$('.dataTables_length select').addClass('browser-default');
					//initializing Dropdown after ajax row load
					$(".dropdown-button").dropdown();
				  },
				  	//Set column definition initialisation properties.
					"columnDefs": [
						{ 
							"targets": [ 0 ], //first column / numbering column
							"orderable": false, //set not orderable
						},
					],				 		
			});
		}	
	}
        
        //Admin Cms page Form Functionality
        
        //Add New Custom Content Key       
	function add_new_custom_field_key(){		
            var admin_cms_page_form = $('#admin-cms-page-form');
            
            var add_new_custom_content_key = $('.add-new-custom-content-key');
            var cancel_new_custom_content_key = $('.cancel-new-custom-content-key');
            
            var custom_content_key_selectfield_wrap_select = $('.custom-content-key-selectfield-wrap select');
            var custom_content_key_selectfield_wrap = $('.custom-content-key-selectfield-wrap');
            var custom_content_key_textfield_wrap = $('.custom-content-key-textfield-wrap');
            
            if($(admin_cms_page_form).length > 0){
                
                //Add new custom content button Click
                $(add_new_custom_content_key).click(function(e){
                    e.preventDefault();
                    
                    //Remove Attribute name From Select Field
                    $(custom_content_key_selectfield_wrap_select).removeAttr('name');
                    
                    //hide select and Add Button 
                    $(custom_content_key_selectfield_wrap).hide();
                    $(add_new_custom_content_key).hide();
                    
                    //Show Cancel button and text field
                    $(cancel_new_custom_content_key).show();
                    $(custom_content_key_textfield_wrap).show();
                    
                    //$(custom_content_key_textfield_wrap).clone().append( custom_content_key_selectfield_wrap );

                });
                
                //Cancel Add New Custom Content Key Click
                $(cancel_new_custom_content_key).click(function(e){
                    e.preventDefault();
                    //Remove Attribute name From Select Field
                    $(custom_content_key_selectfield_wrap_select).removeAttr('name');
                    
                    //Add Attribute name From Select Field
                    $(custom_content_key_selectfield_wrap_select).attr('name','Key');
                    
                    //Hide Cancel button and text Field
                    $(cancel_new_custom_content_key).hide();
                    $(custom_content_key_textfield_wrap).hide();
                    
                    //Show add and select Field
                    $(custom_content_key_selectfield_wrap).show();
                    $(add_new_custom_content_key).show();                                   
                }); 
            }
        }
        
        function add_ajax_custom_content(){
            var admin_cms_page_form = $('#admin-cms-page-form');
            
            
            if($(admin_cms_page_form).length > 0){
               var btn_add_custom_content = $('#btn-add-custom-content')
      
                // AJAX Code To Submit Form.
               
                $(btn_add_custom_content).click(function(){
                    var KeyText = $('#KeyText').val();
                    var Value = $('#Value').val();
                    var dataString = {Key: KeyText, Value: Value};
                    var custom_content_listing_html = '';
                    $.ajax({
                        type: "POST",
                        url: mysite + "admin/cmspage/ajax_add_custom_content",
                        data: dataString,
                        dataType : "json",
                        cache: false,
                        success: function(result){                           
                            //if(result != "SUCCESS"){
                                $('#KeyText').val('');
                                $('#Value').val('');
                                console.log('Key '+ result.Key);
                                console.log('ID '+ result.ID);
                            //}
                            
                            custom_content_listing_html = '<div class="custom-content-wrap-listing" id="post-custom-content-'+result.ID+'">\n\
                             <div class="row">\n\
                                    <div class="input-field col s12">\n\
                                        <label for="post-content-key-'+result.ID+'" class="active">Custom Content Name</label>\n\
                                        <input id="post-content-key-'+result.ID+'" type="text" placeholder="Name" name="PostContentKey[]" data-error=".errorTxt1" value="'+result.Key+'" />\n\
                                    </div>\n\
                             </div>\n\
                             <div class="row">\n\
                                <div class="input-field col s12">\n\
                                        <label for="post-content-value-'+result.ID+'" class="active">Content</label>\n\
                                        <textarea id="post-content-value-'+result.ID+'" type="text" placeholder="Short Description" name="PostContentValue[]" data-error=".errorTxt2" value="'+result.Value+'" length="120" class="materialize-textarea">'+result.Value+'</textarea>\n\
                                </div>\n\
                             </div>\n\
                             <input type="hidden" value="'+result.ID+'" name="PostContentID[]"/>\n\
                             <div class="block">\n\
                                        <div class="col s6 npl" style="padding-left:0px;">\n\
                                            <button class="btn cyan waves-effect waves-light" type="button" style="font-size: 12px;">Delete</button>\n\
                                        </div>\n\
                                        <div class="col s6 npr" style="padding-right:0px; text-align: right;">\n\
                                            <button class="btn cyan waves-effect waves-light" type="button" style="font-size: 12px;">Update </button>\n\
                                        </div>\n\
                                        <div class="clearfix"></div>\n\
                                    </div>\n\
                            </div>';
                            
                            $('#custom-content-wrap-listing').append(custom_content_listing_html)
                            
                        }
                   }); 
                });              
            }
        }
        
        	 
});