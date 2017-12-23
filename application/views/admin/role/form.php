<div class="row">
  <div class="input-field col s12">
  	<label for="RoleName">Role Name *</label>
    <input id="RoleName" type="text" placeholder="Role Name" name="RoleName" data-error=".errorTxt1" value="<?php echo form_value('RoleName', $dt) ?>" />
    <?php if(form_error('RoleName') != ""){ ?>
    	 <div class="errorTxt1"><?php echo form_error('RoleName');?></div>
    <?php }else{ ?>
    	<div class="errorTxt1"></div>
    <?php } ?>
  </div>
</div>

<div class="row">
  <div class="input-field col s12">
  	<label for="RoleDescription">Role Description *</label>
    <input id="RoleDescription" type="text" placeholder="Role Description" name="RoleDescription" data-error=".errorTxt2" value="<?php echo form_value('RoleDescription', $dt) ?>">
    <?php if(form_error('RoleDescription') != ""){ ?>
    	 <div class="errorTxt2"><?php echo form_error('RoleDescription');?></div>
    <?php }else{ ?>
    	<div class="errorTxt2"></div>
    <?php } ?>
  </div>
</div>

<div class="row">
  <div class="input-field col s12">
  	<label for="RoleCode">Role Code *</label>
    <input id="RoleCode" type="text" placeholder="Role Code" name="RoleCode" data-error=".errorTxt3" value="<?php echo form_value('RoleCode', $dt) ?>" />
    <?php if(form_error('RoleCode') != ""){ ?>
    	 <div class="errorTxt3"><?php echo form_error('RoleCode');?></div>
    <?php }else{ ?>
    	<div class="errorTxt3"></div>
    <?php } ?>
  </div>
</div>

