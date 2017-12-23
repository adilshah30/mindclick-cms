<div class="row">
  <div class="input-field col s12">
  	<label for="MenuName">Menu Name *</label>
    <input id="MenuName" type="text" placeholder="Menu Name" name="MenuName" data-error=".errorTxt7" value="<?php echo form_value('MenuName', $dt) ?>"/>
    <?php if(form_error('MenuName') != ""){ ?>
    	 <div class="errorTxt7"><?php echo form_error('MenuName');?></div>
    <?php }else{ ?>
    	<div class="errorTxt7"></div>
    <?php } ?>
  </div>
</div>

<div class="row">
    <div class="input-field col s12">  
       <?php 
			$select_attributes = 'data-error=".errorTxt1"';
			$First_blank_option = "Select Feature";
			$option = option_select($MenuItemList, 'FeatureID', 'FeatureName', $First_blank_option, FALSE);
			echo form_dropdown('FeatureID', $option, form_value('FeatureID', $dt), $select_attributes  );
	  ?>         
      <label>Select Feature *</label>
      <?php if(form_error('FeatureID') != ""){ ?>
    	 <div class="errorTxt1"><?php echo form_error('FeatureID');?></div>
      <?php }else{ ?>
    	 <div class="errorTxt1"></div>
      <?php } ?>
    </div>
</div>

<div class="row">
    <div class="input-field col s12">  
       <?php 
			$select_attributes = 'data-error=".errorTxt2"';
			$First_blank_option = "Select Parent Menu Item";
			$option = option_select($ParentMenuItemList, 'AdminMenuID', 'MenuName', $First_blank_option, FALSE, 'Parent Menu Item');
			echo form_dropdown('ParentID', $option, form_value('ParentID', $dt), $select_attributes  );
      ?>         
      <label>Select Parent Menu *</label>
      <?php if(form_error('ParentID') != ""){ ?>
    	 <div class="errorTxt2"><?php echo form_error('ParentID');?></div>
      <?php }else{ ?>
    	 <div class="errorTxt2"></div>
      <?php } ?>
    </div>
</div>


<div class="row">
    <div class="input-field col s12">
       <?php
	   		$Show_Nav_Options = array(
									  '' => 'Select Show In Nav',
									  '1' => 'Yes' ,
									  '0' => 'No' ,
									 ); 
			$select_attributes = 'data-error=".errorTxt2"';
			echo form_dropdown('ShowInNav', $Show_Nav_Options, form_value('ShowInNav', $dt), $select_attributes);
	  ?>        
      <?php if(form_error('ShowInNav') != ""){ ?>
    	 <div class="errorTxt3"><?php echo form_error('ShowInNav');?></div>
      <?php }else{ ?>
    	 <div class="errorTxt3"></div>
      <?php } ?>
    </div>
</div>

<div class="row">
  <div class="input-field col s12">
  	<label for="IconClassName">Icon Class Name *</label>
    <textarea id="IconClassName" type="text" class="materialize-textarea" placeholder="Icon Class Name" name="IconClassName" data-error=".errorTxt3" value="" length="120"/><?php echo form_value('IconClassName', $dt) ?></textarea>
    <?php if(form_error('IconClassName') != ""){ ?>
    	 <div class="errorTxt4"><?php echo form_error('IconClassName');?></div>
    <?php }else{ ?>
    	<div class="errorTxt4"></div>
    <?php } ?>
  </div>
</div>

<div class="row">
  <div class="input-field col s12">
  	<label for="DisplayOrder">Display Order *</label>
    <input id="DisplayOrder" type="text" placeholder="Display Order" name="DisplayOrder" data-error=".errorTxt5" value="<?php echo form_value('DisplayOrder', $dt) ?>" />
    <?php if(form_error('DisplayOrder') != ""){ ?>
    	 <div class="errorTxt5"><?php echo form_error('DisplayOrder');?></div>
    <?php }else{ ?>
    	<div class="errorTxt5"></div>
    <?php } ?>
  </div>
</div>

<div class="row">
    <div class="input-field col s12">
      <?php 
	  	 $Status_Options = array(
		 						 ''  => 'Select Status',
		 						 '1' => 'Active',
								 '0' => 'InActive',	
		 						);
		$select_attributes = 'data-error=".errorTxt6"';
		echo form_dropdown('Status' , $Status_Options , form_value('Status',$dt) , $select_attributes )						
	  ?>    
      <label>Select Status *</label>
      <?php if(form_error('Status') != ""){ ?>
    	 <div class="errorTxt6"><?php echo form_error('Status');?></div>
      <?php }else{ ?>
    	 <div class="errorTxt6"></div>
      <?php } ?>
    </div>
</div>