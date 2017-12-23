<div class="row">
  <div class="input-field col s12">
  	<label for="PermissionName">Permission Name *</label>
    <input id="PermissionName" type="text" placeholder="Permission Name" name="PermissionName" data-error=".errorTxt1" value="<?php echo form_value('PermissionName', $dt) ?>" />
    <?php if(form_error('PermissionName') != ""){ ?>
    	 <div class="errorTxt1"><?php echo form_error('PermissionName');?></div>
    <?php }else{ ?>
    	<div class="errorTxt1"></div>
    <?php } ?>
  </div>
</div>