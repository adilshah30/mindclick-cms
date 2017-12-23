<div class="col s8">	
    <ul class="tabs tab-demo z-depth-1 cyan">
        <li class="tab col s3">
            <a class="active white-text waves-effect waves-light " href="#page-info">Page Information </a>
        </li>
        <li class="tab col s3">
            <a href="#cm-page-content" class="white-text waves-effect waves-light">Content</a>
        </li>
        <li class="tab col s3">
            <a href="#test3" class="white-text waves-effect waves-light">Design</a>
        </li>
        <li class="tab col s3">
            <a href="#test4" class="white-text waves-effect waves-light">Meta Data</a>
        </li>
    </ul>
    <div class="clearfix"></div>

    <div class="card-panel">
        
        <div id="page-info">          	
            <div class="row">
                <div class="input-field col s12">
                    <label for="PostTitle">Page Title*</label>
                    <input id="PostTitle" type="text" placeholder="Page Title" name="PostTitle" data-error=".errorTxt1" value="<?php echo form_value('PostTitle', $dt) ?>" />
                    <?php if (form_error('PostTitle') != "") { ?>
                        <div class="errorTxt1"><?php echo form_error('PostTitle'); ?></div>
                    <?php } else { ?>
                        <div class="errorTxt1"></div>
                    <?php } ?>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <label for="ShortDescription">Short Description</label>
                    <textarea id="ShortDescription" type="text" placeholder="Short Description" name="ShortDescription" data-error=".errorTxt2" value="" length="120" class="materialize-textarea"><?php echo form_value('ShortDescription', $dt) ?></textarea>
                    <?php if (form_error('ShortDescription') != "") { ?>
                        <div class="errorTxt2"><?php echo form_error('ShortDescription'); ?></div>
                    <?php } else { ?>
                        <div class="errorTxt2"></div>
                    <?php } ?>
                </div>
            </div>
            
            <div class="row">
                <div class="input-field col s12"> 
                    <?php
                        $Status_Options = array(
                        '' => 'Select Status',
                        'publish' => 'Publish',
                        'draft' => 'Draft',
                        );
                    $select_attributes = 'data-error=".errorTxt3"';
                    echo form_dropdown('PostStatus' , $Status_Options , form_value('PostStatus',$dt) , $select_attributes )	
                    ?>
                    <label>Page Status *</label>
                    <?php if (form_error('PostStatus') != "") { ?>
                        <div class="errorTxt3"><?php echo form_error('PostStatus'); ?></div>
                    <?php } else { ?>
                        <div class="errorTxt3"></div>
                    <?php } ?>
                </div>
            </div>
            
        </div><!--End page info tab-->
        <div id="cm-page-content">
            <div class="row">
                <div class="input-field col s12">
                    <label for="PostContent">Page Content</label>
                    <textarea id="PostContent" type="text" placeholder="Short Description" name="PostContent" data-error=".errorTxt2" value="" length="120" class="materialize-textarea"><?php echo form_value('PostContent', $dt) ?></textarea>
                    <?php if (form_error('PostContent') != "") { ?>
                        <div class="errorTxt4"><?php echo form_error('PostContent'); ?></div>
                    <?php } else { ?>
                        <div class="errorTxt4"></div>
                    <?php } ?>
                </div>
            </div>
            
            <ul class="collapsible collapsible-accordion " data-collapsible="accordion"> 
                <li>
                    <div class="collapsible-header active ">Custom Content</div>
                    <div class="collapsible-body pd-10">
                        <div class="block" id="custom-content-wrap-listing">
                            <h2 style="font-size:15px;">Custom Contents</h2>
                        <?php 
                        //Load All Post Custom Content
                        if($list_post_custom_contents->num_rows() > 0){
                            $post_custom_contents = $list_post_custom_contents->result();
                            foreach($post_custom_contents as $post_custom_content){
                            ?>    
                                <div class="custom-content-listing" id="post-custom-content-<?php echo $post_custom_content->ID; ?>">
                                    <div class="row">                               
                                        <div class="input-field col s12">
                                            <label for="post-content-key-<?php echo $post_custom_content->ID; ?>">Custom Content Name</label>
                                            <input id="post-content-key-<?php echo $post_custom_content->ID; ?>" type="text" placeholder="Name" name="PostContentKey[]" data-error=".errorTxt1" value="<?php echo form_value('Key', $post_custom_content) ?>" />
                                            <?php if (form_error('Key') != "") { ?>
                                                <div class="errorTxt1"><?php echo form_error('Key'); ?></div>
                                            <?php } else { ?>
                                                <div class="errorTxt1"></div>
                                            <?php } ?>
                                        </div> 
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <label for="post-content-value-<?php echo $post_custom_content->ID; ?>">Content</label>
                                            <textarea id="post-content-value-<?php echo $post_custom_content->ID; ?>" type="text" placeholder="Short Description" name="PostContentValue[]" data-error=".errorTxt2" value="" length="120" class="materialize-textarea"><?php echo form_value('Value', $post_custom_content) ?></textarea>
                                            <?php if (form_error('PostContentValue') != "") { ?>
                                                <div class="errorTxt4"><?php echo form_error('PostContentValue'); ?></div>
                                            <?php } else { ?>
                                                <div class="errorTxt4"></div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <input type="hidden" value="<?php echo $post_custom_content->ID; ?>" name="PostContentID[]"/>
                                    <div class="block">
                                        <div class="col s6 npl" style="padding-left:0px;">
                                            <button class="btn cyan waves-effect waves-light" type="button" style="font-size: 12px;">Delete</button>
                                        </div>
                                        <div class="col s6 npr" style="padding-right:0px; text-align: right;">
                                            <button class="btn cyan waves-effect waves-light" type="button" style="font-size: 12px;">Update </button>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                </div><!--End custom-content-wrap-listing -->
                        <?php        
                                }
                            }else{
                             echo "no related Posts";
                        }
                        ?>    

                        </div>
                        <h5 style="font-size:16px;">Add New Custom Content</h5>
                        <div class="block">
                            <div class="row custom-content-key-textfield-wrap">                               
                                <div class="input-field col s12">
                                    <label for="KeyText">Custom Content Name</label>
                                    <input id="KeyText" type="text" placeholder="Name" name="Key" data-error=".errorTxt1" value="<?php echo form_value('Key', $dt) ?>" />
                                    <?php if (form_error('Key') != "") { ?>
                                        <div class="errorTxt1"><?php echo form_error('Key'); ?></div>
                                    <?php } else { ?>
                                        <div class="errorTxt1"></div>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php
                                if(count($all_custom_content_key) > 0)
                                {
                                ?>
                                
                                <div class="row custom-content-key-selectfield-wrap">
                                    <div class="input-field col s12">                      
                                        <?php
                                            $select_attributes = 'data-error=".errorTxt2"';
                                            $First_blank_option = "Select Custom Content Name";
                                            $option = option_select($all_custom_content_key, 'Key', 'Key', $First_blank_option, FALSE);
                                            echo form_dropdown('Key', $option, form_value('Key', $dt), $select_attributes  );
                                        
                                        ?>
                                        <label>Select Custom *</label>
                                        <?php if (form_error('PostStatus') != "") { ?>
                                            <div class="errorTxt3"><?php echo form_error('PostStatus'); ?></div>
                                        <?php } else { ?>
                                            <div class="errorTxt3"></div>
                                        <?php } ?>
                                        
                                    </div>
                                </div>
                                <?php }else{ ?>
                                
                                <div class="row">                               
                                    <div class="input-field col s12">
                                        <label for="Key">Custom Content Name</label>
                                        <input id="KeyText" type="text" placeholder="Name" name="Key" data-error=".errorTxt1" value="<?php echo form_value('Key', $dt) ?>" />
                                        <?php if (form_error('Key') != "") { ?>
                                            <div class="errorTxt1"><?php echo form_error('Key'); ?></div>
                                        <?php } else { ?>
                                            <div class="errorTxt1"></div>
                                        <?php } ?>
                                    </div>
                                </div>
                            
                                <?php } ?>
                            
                                <a href="#" class="add-new-custom-content-key">Add New</a>
                                <a href="#" class="cancel-new-custom-content-key">Cancel</a>
                                
                                <div class="row">
                                    <div class="input-field col s12">
                                        <label for="Value">Content</label>
                                        <textarea id="Value" type="text" placeholder="Short Description" name="Value" data-error=".errorTxt2" value="" length="120" class="materialize-textarea"><?php echo form_value('Value', $dt) ?></textarea>
                                        <?php if (form_error('Value') != "") { ?>
                                            <div class="errorTxt4"><?php echo form_error('Value'); ?></div>
                                        <?php } else { ?>
                                            <div class="errorTxt4"></div>
                                        <?php } ?>
                                    </div>
                                </div> 
                                
                        </div><!--End Block-->
                        <div class="block">                           
                            <div class="col s6 npr" style="padding-left:0px;">
                                <button class="btn cyan waves-effect waves-light" type="button" style="font-size: 12px;" id="btn-add-custom-content">Add Custom Content </button>
                            </div>
                            <div class="clearfix"></div>
                        </div><!--End Block-->
                    </div>
                </li>
            </ul>
            
        </div>
        <div id="test3" class="col s12">
            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies
                mi vitae est. Mauris placerat eleifend leo.</p>
        </div>
        <div id="test4" class="col s12">
            <ul>
                <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
                <li>Aliquam tincidunt mauris eu risus.</li>
                <li>Vestibulum auctor dapibus neque.</li>
            </ul>
        </div>

        <div class="clearfix"></div>
    </div>                           
</div>
<div class="col s4">
    <ul class="collapsible collapsible-accordion nmt" data-collapsible="accordion"> 
        <li>
            <div class="collapsible-header active ">Save</div>
            <div class="collapsible-body pd-10">
                <div class="block">
                    <div class="col s6 npl" style="padding-left:0px;">
                        <button class="btn cyan waves-effect waves-light" type="submit" style="font-size: 12px;">Save Draft</button>
                    </div>
                    <div class="col s6 npr" style="padding-right:0px; text-align: right;">
                        <button class="btn cyan waves-effect waves-light" type="submit" style="font-size: 12px;">Preview </button>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="block mt-10">
                   Status: Draft       
                </div> 
                <div class="row mt-10">
                    <div class="input-field col s12">
                        <button class="btn cyan waves-effect waves-light right" type="submit">Save</button>
                    </div>
                </div>  
                
            </div>
        </li>
    </ul>

</div>






