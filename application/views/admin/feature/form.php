<div class="row">
  <div class="input-field col s12">
  	<label for="FeatureName">Feature Name *</label>
    <input id="FeatureName" type="text" placeholder="Feature Name" name="FeatureName" data-error=".errorTxt1" value="<?php echo form_value('FeatureName', $dt) ?>" />
    <?php if(form_error('FeatureName') != ""){ ?>
    	 <div class="errorTxt1"><?php echo form_error('FeatureName');?></div>
    <?php }else{ ?>
    	<div class="errorTxt1"></div>
    <?php } ?>
  </div>
</div>
<div class="row">
  <div class="input-field col s12">
  	<label for="UrlLink">Url Link *</label>
    <input id="UrlLink" type="text" placeholder="Url Link" name="UrlLink" data-error=".errorTxt2" value="<?php echo form_value('UrlLink', $dt) ?>" />
    <?php if(form_error('UrlLink') != ""){ ?>
    	 <div class="errorTxt2"><?php echo form_error('UrlLink');?></div>
    <?php }else{ ?>
    	<div class="errorTxt2"></div>
    <?php } ?>
  </div>
</div>
<div class="row">
  <div class="input-field col s12">
  	<label for="FeatureDescription">Feature Description *</label>
    <textarea id="FeatureDescription" type="text" class="materialize-textarea" placeholder="Feature Description" name="FeatureDescription" data-error=".errorTxt3" value="" length="120"/><?php echo form_value('FeatureDescription', $dt) ?></textarea>
    <?php if(form_error('FeatureDescription') != ""){ ?>
    	 <div class="errorTxt3"><?php echo form_error('FeatureDescription');?></div>
    <?php }else{ ?>
    	<div class="errorTxt3"></div>
    <?php } ?>
  </div>
</div>
<div class="row">
    <div class="input-field col s12">     
      <select name="Status" data-error=".errorTxt4">
        <option disabled selected>Select Status</option>
        <option value="1">Active</option>
        <option value="0">InActive</option>
      </select>
      <label>Select Status *</label>
      <?php if(form_error('Status') != ""){ ?>
    	 <div class="errorTxt4"><?php echo form_error('Status');?></div>
      <?php }else{ ?>
    	 <div class="errorTxt4"></div>
      <?php } ?>
    </div>
</div>