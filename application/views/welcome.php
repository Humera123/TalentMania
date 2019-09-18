<br /><br /><br /><h1 align="center">Welcome User</h1>
<p align="center"><a href="<?php echo base_url()?>welcome/logout">Logout</a></p>


<div id='jobseeker_dashboard'>
<?php echo form_open('welcome/validation', array('id' => 'jobseeker_info')) ?>
  <p><input placeholder="First name..." type="text" name="first_name" id="first_name" class="form-control" value="<?php echo set_value('first_name'); ?>" />
  <span class="text-danger"><?php echo form_error('first_name'); ?></span></p>
  <p><input placeholder="Last name..." type="text" name="last_name" id="last_name" class="form-control" value="<?php echo set_value('last_name'); ?>" />
  <span class="text-danger"><?php echo form_error('last_name'); ?></span></p>
  <p><input placeholder="Father Name..." type="text" name="father_name" id="father_name" class="form-control" value="<?php echo set_value('father_name'); ?>" />
  <span class="text-danger"><?php echo form_error('father_name'); ?></span></p>
  <p><input placeholder="Date of birth..." type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="<?php echo set_value('date_of_birth'); ?>" />
  <span class="text-danger"><?php echo form_error('date_of_birth'); ?></span></p>
  <p><input placeholder="Nationality..." type="text" name="nationality" id="nationality" class="form-control" value="<?php echo set_value('nationality'); ?>" />
  <span class="text-danger"><?php echo form_error('nationality'); ?></span></p>
  <p><input placeholder="Mobile no..." type="text" name="mobileno" id="mobileno" class="form-control" value="<?php echo set_value('mobileno'); ?>" />
  <span class="text-danger"><?php echo form_error('mobileno'); ?></span></p>
  <p><input placeholder="Address..." type="text" name="address" id="address" class="form-control" value="<?php echo set_value('address'); ?>" />
  <span class="text-danger"><?php echo form_error('address'); ?></span></p>
  <p><input placeholder="City..." type="text" name="city" id="city" class="form-control" value="<?php echo set_value('city'); ?>" />
  <span class="text-danger"><?php echo form_error('city'); ?></span></p>
  <p><input placeholder="Country..." type="text" name="country" id="country" class="form-control" value="<?php echo set_value('country'); ?>" />
  <span class="text-danger"><?php echo form_error('country'); ?></span></p>
  <p><input placeholder="Skype ID..." type="text" name="skype_id" id="skype_id" class="form-control" value="<?php echo set_value('skype_id'); ?>" />
  <span class="text-danger"><?php echo form_error('skype_id'); ?></span></p>
  <p><input placeholder="Linkdin Profile..." type="text" name="linkdin_profile" id="linkdin_profile" class="form-control" value="<?php echo set_value('linkdin_profile'); ?>" />
  <span class="text-danger"><?php echo form_error('linkdin_profile'); ?></span></p>
  <p>
    <select name="gender" id="gender" class="form-control" value="<?php echo set_value('gender'); ?>">
      <option value="1">Female</option>
      <option value="2">Male</option>
    </select>
    <span class="text-danger"><?php echo form_error('gender'); ?></span>
  </p>
  <p><input type="file" name="cnic_front" id="cnic_front" accept="image/gif, image/jpeg, image/png" value="<?php echo set_value('cnic_front'); ?>">
  <span class="text-danger"><?php echo form_error('cnic_front'); ?></span></p>
  <p><input type="file" name="cnic_back" id="cnic_back" accept="image/gif, image/jpeg, image/png" value="<?php echo set_value('cnic_back'); ?>">
  <span class="text-danger"><?php echo form_error('cnic_back'); ?></span></p>
  <p><input type="file" name="last_degree" id="last_degree" accept="image/gif, image/jpeg, image/png" value="<?php echo set_value('last_degree'); ?>">
  <span class="text-danger"><?php echo form_error('last_degree'); ?></span></p>
  
  <p><input type="submit" name="Submit"  value="Submit" class="btn btn-info" /></p>
  <?php echo form_close() ?>
</div>

