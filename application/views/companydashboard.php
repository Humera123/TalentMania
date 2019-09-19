<br /><br /><br /><h1 align="center">Welcome User</h1>
<p align="center"><a href="<?php echo base_url()?>welcome/logout">Logout</a></p>


<div id='jobseeker_dashboard'>
<form action="companydashboard/validation" method="post" enctype="multipart/form-data" id="company_info")) ?>

 <p class="float-left"><label> Upload Profile Image :</label><input type="file" name="logoimage" accept="image/*" onchange="loadimage(event,'profileimg')" />
  <img name="profileimg" id="profileimg" width="100"alt="Profile Image" /></p>


  <p><input placeholder="Name of Organization..." type="text" name="name_of_organization" id="name_of_organization" class="form-control" value="<?php echo set_value('first_name'); ?>" />
  <span class="text-danger"><?php echo form_error('name_of_organization'); ?></span></p>
  <p><input placeholder="Industry Type..." type="text" name="industry_type" id="industry_type" class="form-control" value="<?php echo set_value('last_name'); ?>" />
  <span class="text-danger"><?php echo form_error('industry_type'); ?></span></p>
  <p><input placeholder="Private or Public sector..." type="text" name="sector" id="sector" class="form-control" value="<?php echo set_value('father_name'); ?>" />
  <span class="text-danger"><?php echo form_error('sector'); ?></span></p>
  <p><input placeholder="Address..." type="text" name="address" id="address" class="form-control" value="<?php echo set_value('date_of_birth'); ?>" />
  <span class="text-danger"><?php echo form_error('address'); ?></span></p>
  <p><input placeholder="Phone no..." type="text" name="phoneno" id="phoneno" class="form-control" value="<?php echo set_value('nationality'); ?>" />
  <span class="text-danger"><?php echo form_error('phoneno'); ?></span></p>
  <p><input placeholder="Website Link..." type="text" name="website_link" id="website_link" class="form-control" value="<?php echo set_value('mobileno'); ?>" />
  <span class="text-danger"><?php echo form_error('website_link'); ?></span></p>
  <p><input placeholder="Facebook Page Link..." type="text" name="facebook" id="facebook" class="form-control" value="<?php echo set_value('address'); ?>" />
  <span class="text-danger"><?php echo form_error('facebook'); ?></span></p>
  <p><input placeholder="Name of CEO..." type="text" name="ceo_name" id="ceo_name" class="form-control" value="<?php echo set_value('city'); ?>" />
  <span class="text-danger"><?php echo form_error('ceo_name'); ?></span></p>
  <p><input placeholder="Email Address of CEO..." type="text" name="email_ceo" id="email_ceo" class="form-control" value="<?php echo set_value('country'); ?>" />
  <span class="text-danger"><?php echo form_error('email_ceo'); ?></span></p>
  <p><input placeholder="Focal Person Name..." type="text" name="focal_name" id="focal_name" class="form-control" value="<?php echo set_value('linkdin_profile'); ?>" />
  <span class="text-danger"><?php echo form_error('focal_name'); ?></span></p>
  <p><input placeholder="Email Address of Focal person..." type="text" name="focal_email" id="focal_email" class="form-control" value="<?php echo set_value('country'); ?>" />
  <span class="text-danger"><?php echo form_error('focal_email'); ?></span></p>
  <p><input placeholder="Mobile no of Focal person..." type="text" name="mobileno" id="mobileno" class="form-control" value="<?php echo set_value('mobileno'); ?>" />
  <span class="text-danger"><?php echo form_error('mobileno'); ?></span></p>
  <p><input placeholder="Skype ID..." type="text" name="skype_id" id="skype_id" class="form-control" value="<?php echo set_value('skype_id'); ?>" />
  <span class="text-danger"><?php echo form_error('skype_id'); ?></span></p>
  <p><input placeholder="NTN no..." type="text" name="ntn_no" id="ntn_no" class="form-control" value="<?php echo set_value('mobileno'); ?>" />
  <span class="text-danger"><?php echo form_error('ntn_no'); ?></span></p>
  <p><input placeholder="No of employees in organization..." type="text" name="employee_no" id="employee_no" class="form-control" value="<?php echo set_value('mobileno'); ?>" />
  <span class="text-danger"><?php echo form_error('employee_no'); ?></span></p>
  <p><input type="submit" name="Submit"  value="Submit" class="btn btn-info" /></p>
  <?php echo form_close() ?>
</div>

<script type="text/javascript">
  function loadimage(event,$id) {
    var output=document.getElementById($id);
    output.src=URL.createObjectURL(event.target.files[0]);
    // body...
  }

  
</script>