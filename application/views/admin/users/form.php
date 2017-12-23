<div class="row">
  <div class="input-field col s12">
  	<label for="FirstName">First Name *</label>
    <input id="FirstName" type="text" placeholder="First Name" name="FirstName" data-error=".errorTxt1" value="<?php echo form_value('FirstName', $dt) ?>" />
    <?php if(form_error('FirstName') != ""){ ?>
    	 <div class="errorTxt1"><?php echo form_error('FirstName');?></div>
    <?php }else{ ?>
    	<div class="errorTxt1"></div>
    <?php } ?>
  </div>
</div>
<div class="row">
  <div class="input-field col s12">
  	<label for="LastName">Last Name *</label>
    <input id="LastName" type="text" placeholder="Last Name" name="LastName" data-error=".errorTxt2" value="<?php echo form_value('LastName', $dt) ?>">
    <?php if(form_error('LastName') != ""){ ?>
    	 <div class="errorTxt2"><?php echo form_error('LastName');?></div>
    <?php }else{ ?>
    	<div class="errorTxt2"></div>
    <?php } ?>
  </div>
</div>
<div class="row">
  <div class="input-field col s12">
  	<label for="Username">Username *</label>
    <input id="Username" type="text" placeholder="Username" name="Username" data-error=".errorTxt3" value="<?php echo form_value('Username', $dt) ?>">
    <?php if(form_error('Username') != ""){ ?>
    	 <div class="errorTxt3"><?php echo form_error('Username');?></div>
    <?php }else{ ?>
    	<div class="errorTxt3"></div>
    <?php } ?>
  </div>
</div>
<div class="row">
  <div class="input-field col s12">
  	<label for="Email">Email *</label>
    <input id="Email" type="email" placeholder="Email" name="Email" data-error=".errorTxt4" value="<?php echo form_value('Email', $dt) ?>">
    <?php if(form_error('Email') != ""){ ?>
    	 <div class="errorTxt4"><?php echo form_error('Email');?></div>
    <?php }else{ ?>
    	<div class="errorTxt4"></div>
    <?php } ?>
  </div>
</div>
<div class="row">
  <div class="input-field col s12">
  	<label for="Password">Password *</label>
    <input id="Password" type="Password" placeholder="Password" name="Password" data-error=".errorTxt5" value="<?php echo form_value('Username', $dt) ?>">
    <?php if(form_error('Password') != ""){ ?>
    	 <div class="errorTxt5"><?php echo form_error('Password');?></div>
    <?php }else{ ?>
    	<div class="errorTxt5"></div>
    <?php } ?>
  </div>
</div>
<div class="row">
  <div class="input-field col s12">
  	<label for="ConfirmPassword">Confirm Password *</label>
    <input id="ConfirmPassword" type="Password" placeholder="Confirm Password" name="ConfirmPassword" data-error=".errorTxt6">
    <?php if(form_error('ConfirmPassword') != ""){ ?>
    	 <div class="errorTxt6"><?php echo form_error('ConfirmPassword');?></div>
    <?php }else{ ?>
    	<div class="errorTxt6"></div>
    <?php } ?>    
  </div>
</div>
<div class="row">
    <div class="input-field col s12">      
      <select name="Type" data-error=".errorTxt7">
        <option disabled selected>Select User Type</option>
        <option value="Admin">Admin</option>
        <option value="User">User</option>
        <option value="InActive">InActive</option>
      </select>     
      <label>Select Type *</label>
      <?php if(form_error('Type') != ""){ ?>
    	 <div class="errorTxt7"><?php echo form_error('Type');?></div>
      <?php }else{ ?>
    	 <div class="errorTxt7"></div>
      <?php } ?>
    </div>
</div> 
<div class="row">
    <div class="input-field col s12">     
      <select name="Status" data-error=".errorTxt8">
        <option disabled selected>Select Status</option>
        <option value="Active">Active</option>
        <option value="InActive">InActive</option>
      </select>
      <label>Select Status *</label>
      <?php if(form_error('Status') != ""){ ?>
    	 <div class="errorTxt8"><?php echo form_error('Status');?></div>
      <?php }else{ ?>
    	 <div class="errorTxt8"></div>
      <?php } ?>
    </div>
</div>