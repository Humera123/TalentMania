<br /><br /><br /><h1 align="center">Welcome User</h1>
<p align="center"><a href="<?php echo base_url()?>welcome/logout">Logout</a></p>

<div id='jobseeker_dashboard'>
<form action="<?php echo base_url();?>welcome/validation" id="experience_info" method="post" enctype="multipart/form-data">

   
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
  <input type="file" name="proimage" accept="image/*" onchange="loadimage(event,'profileimg')" />
  <img name="profileimg" id="profileimg" width="100"alt="Profile Image" />
  <span class="text-danger"><?php echo form_error('image_value'); ?></span></p>



<?php
  }
  
  ?>

  
  



  <p><input placeholder="First name..." type="text" name="first_name" id="first_name" class="form-control" value="<?php echo set_value('first_name', $form['first_name']); ?>" />
  <span class="text-danger"><?php echo form_error('first_name'); ?></span></p>
  <p><input placeholder="Last name..." type="text" name="last_name" id="last_name" class="form-control" value="<?php echo set_value('last_name', $form['last_name']); ?>" />
  <span class="text-danger"><?php echo form_error('last_name'); ?></span></p>
  <p><input placeholder="Father Name..." type="text" name="father_name" id="father_name" class="form-control" value="<?php echo set_value('father_name',$form['father_name']); ?>" />
  <span class="text-danger"><?php echo form_error('father_name'); ?></span></p>
  <p><input placeholder="Date of birth..." type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="<?php echo set_value('date_of_birth',$form['date_of_birth']); ?>" />
  <span class="text-danger"><?php echo form_error('date_of_birth'); ?></span></p>
  <p><input placeholder="Nationality..." type="text" name="nationality" id="nationality" class="form-control" value="<?php echo set_value('nationality',$form['nationality']); ?>" />
  <span class="text-danger"><?php echo form_error('nationality'); ?></span></p>
  <p><input placeholder="Mobile no..." type="text" name="mobileno" id="mobileno" class="form-control" value="<?php echo set_value('mobileno',$form['mobileno']); ?>" />
  <span class="text-danger"><?php echo form_error('mobileno'); ?></span></p>
  <p><input placeholder="Address..." type="text" name="address" id="address" class="form-control" value="<?php echo set_value('address',$form['address']); ?>" />
  <span class="text-danger"><?php echo form_error('address'); ?></span></p>
  <p><input placeholder="City..." type="text" name="city" id="city" class="form-control" value="<?php echo set_value('city',$form['city']); ?>" />
  <span class="text-danger"><?php echo form_error('city'); ?></span></p>
  <p><input placeholder="Country..." type="text" name="country" id="country" class="form-control" value="<?php echo set_value('country',$form['country']); ?>" />
  <span class="text-danger"><?php echo form_error('country'); ?></span></p>
  <p><input placeholder="Skype ID..." type="text" name="skype_id" id="skype_id" class="form-control" value="<?php echo set_value('skype_id',$form['skype_id']); ?>" />
  <span class="text-danger"><?php echo form_error('skype_id'); ?></span></p>
  <p><input placeholder="Linkdin Profile..." type="text" name="linkdin_profile" id="linkdin_profile" class="form-control" value="<?php echo set_value('linkdin_profile',$form['linkdin_profile']); ?>" />
  <span class="text-danger"><?php echo form_error('linkdin_profile'); ?></span></p>
  <p>
    <select name="gender" id="gender" class="form-control" value="<?php echo set_value('gender'); ?>">
      <option value="1">Female</option>
      <option value="2">Male</option>
    </select>
    <span class="text-danger"><?php echo form_error('gender'); ?></span>
  </p>


<?php 
  if($form['cnic_front'])
  {
  ?>
   <p class="float-left"><label>CNIC Front Image :</label>
   <img src="<?php echo base_url().'uploads/'.$form['cnic_front'] ?>" name="fcnicimage" id="fcnicimage" width="100"alt="Front CNIC image" /></p>
  <input type="hidden" name="cnic_front_value" id= "cnic_front_value" value="<?php echo set_value('cnic_front', $form['cnic_front']); ?>"/>
  <?php
}
  else
  {
    ?>
   <p>
    <label> Upload CNIC Front Image :</label>
  <input type="file" name="cnic_front" id="cnic_front" accept="image/gif, image/jpeg, image/png" onchange="loadimage(event,'fcnicimage')">
  <img name="fcnicimage" id="fcnicimage" width="100"alt="Front CNIC image" /></p>
  <p><span class="text-danger"><?php echo form_error('cnic_front'); ?></span></p>
<?php
  }
  
  ?>

<?php 
  if($form['cnic_back'])
  {
  ?>
   <p class="float-left"><label>CNIC Back Image :</label>
   <img src="<?php echo base_url().'uploads/'.$form['cnic_back'] ?>" name="bcnicimage" id="bcnicimage" width="100"alt="Front CNIC image" /></p>
  <input type="hidden" name="cnic_back_value" id= "cnic_back_value" value="<?php echo set_value('cnic_back', $form['cnic_back']); ?>"/>
  <?php
}
  else
  {
    ?>
   <p>
    <label> Upload CNIC Back Image :</label>
  <input type="file" name="cnic_back" id="cnic_back" accept="image/gif, image/jpeg, image/png" onchange="loadimage(event,'bcnicimage')">
  <img name="bcnicimage" id="bcnicimage" width="100"alt="Back CNIC image" /></p>
  <p><span class="text-danger"><?php echo form_error('cnic_back'); ?></span></p>
<?php
  }
  
  ?>


 <?php 
  if($form['last_degree'])
  {
  ?>
   <p class="float-left"><label>CNIC Front Image :</label>
   <img src="<?php echo base_url().'uploads/'.$form['last_degree'] ?>" name="lastdegreeimg" id="lastdegreeimg" width="100"alt="Front CNIC image" /></p>
  <input type="hidden" name="last_degree_value" id= "last_degree_value" value="<?php echo set_value('last_degree', $form['last_degree']); ?>"/>
  <?php
}
  else
  {
    ?>
   <p>
    <label> Upload CNIC Front Image :</label>
  <input type="file" name="last_degree" id="last_degree" accept="image/gif, image/jpeg, image/png" onchange="loadimage(event,'lastdegreeimg')">
  <img name="lastdegreeimg" id="lastdegreeimg" width="100"alt="Front CNIC image" /></p>
  <p><span class="text-danger"><?php echo form_error('last_degree'); ?></span></p>
<?php
  }
  
  ?>
  <p><input type="submit" name="Submit" value="Submit" class="btn btn-info" /></p>
  <?php echo form_close() ?>
</div>

<script type="text/javascript">
  function loadimage(event,$id) {
    var output=document.getElementById($id);
    output.src=URL.createObjectURL(event.target.files[0]);
    document.getElementById("image_value").value = event.target.files[0]['name'];
    // body...
  }

</script>
 