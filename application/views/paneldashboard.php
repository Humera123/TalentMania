<br /><br /><br /><h1 align="center">Welcome User</h1>
<p align="center"><a href="<?php echo base_url()?>welcome/logout">Logout</a></p>

<a href="<?php echo base_url()?>skillendorsed/getskills">Skills Endorsement </a>
<div id='panel_dashboard'>
<form action="<?php echo base_url();?>paneldashboard/validation" id="panel_info" method="post" enctype="multipart/form-data">
   
 <?php 
  if($form['pimage'])
  {
  ?>
   <p class="float-left"><label>Profile Image :</label>
  <img src="<?php echo base_url().'uploads/'.$form['pimage'] ?>" name="profileimg" id="profileimg" width="100"alt="Profile Image" /></p>
  <input type="hidden" name="image_value" id= "image_value" value="<?php echo set_value('pimage', $form['pimage']); ?>"/>
  <?php
}
  else
  {
    ?>
    <p id="ch" class="float-left"><label> Upload Profile Image :</label>
  <input type="file" name="profile_image" accept="image/*" onchange="loadimage(event,'profileimg')" />
  <img name="profileimg" id="profileimg" width="100"alt="Profile Image" />
  <span class="text-danger"><?php echo form_error('image_value'); ?></span></p>



<?php
  }
  
  ?>
  <p><input placeholder="First name..." type="text" name="first_name" id="first_name" class="form-control" value="<?php echo set_value('first_name',$form['first_name']); ?>" />
  <span class="text-danger"><?php echo form_error('first_name'); ?></span></p>
  <p><input placeholder="Last name..." type="text" name="last_name" id="last_name" class="form-control" value="<?php echo set_value('last_name',$form['last_name']); ?>" />
  <span class="text-danger"><?php echo form_error('last_name'); ?></span></p>
  <p><input placeholder="Mobile no..." type="text" name="mobileno" id="mobileno" class="form-control" value="<?php echo set_value('mobileno',$form['mobileno']); ?>" />
  <span class="text-danger"><?php echo form_error('mobileno'); ?></span></p>
  <p><input placeholder="City..." type="text" name="city" id="city" class="form-control" value="<?php echo set_value('city',$form['city']); ?>" />
  <span class="text-danger"><?php echo form_error('city'); ?></span></p>
  <p><input placeholder="Country..." type="text" name="country" id="country" class="form-control" value="<?php echo set_value('country',$form['country']); ?>" />
  <span class="text-danger"><?php echo form_error('country'); ?></span></p>
  <p><input placeholder="Skype ID..." type="text" name="skype_id" id="skype_id" class="form-control" value="<?php echo set_value('skype_id',$form['skype_id']); ?>" />
  <span class="text-danger"><?php echo form_error('skype_id'); ?></span></p>
  <p><input placeholder="Linkdin Profile..." type="text" name="linkdin_profile" id="linkdin_profile" class="form-control" value="<?php echo set_value('linkdin_profile',$form['linkdin_profile']); ?>" />
  <span class="text-danger"><?php echo form_error('linkdin_profile'); ?></span></p>

  <p><input type="submit" name="Submit"  value="Submit" class="btn btn-info" /></p>
  <?php echo form_close() ?>
</div>

<script>
 function loadimage(event,$id) {
    var output=document.getElementById($id);
    output.src=URL.createObjectURL(event.target.files[0]);
    document.getElementById("image_value").value = event.target.files[0]['name'];
    // body...
  }


</script>