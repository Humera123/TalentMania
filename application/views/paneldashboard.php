<br /><br /><br /><h1 align="center">Welcome User</h1>
<p align="center"><a href="<?php echo base_url()?>welcome/logout">Logout</a></p>


<div id='panel_dashboard'>
<?php echo form_open('paneldashboard/validation', array('id' => 'panel_info')) ?>
  <p><input placeholder="First name..." type="text" name="first_name" id="first_name" class="form-control" value="<?php echo set_value('first_name'); ?>" />
  <span class="text-danger"><?php echo form_error('first_name'); ?></span></p>
  <p><input placeholder="Last name..." type="text" name="last_name" id="last_name" class="form-control" value="<?php echo set_value('last_name'); ?>" />
  <span class="text-danger"><?php echo form_error('last_name'); ?></span></p>
  <p><input placeholder="Mobile no..." type="text" name="mobileno" id="mobileno" class="form-control" value="<?php echo set_value('mobileno'); ?>" />
  <span class="text-danger"><?php echo form_error('mobileno'); ?></span></p>
  <p><input placeholder="City..." type="text" name="city" id="city" class="form-control" value="<?php echo set_value('city'); ?>" />
  <span class="text-danger"><?php echo form_error('city'); ?></span></p>
  <p><input placeholder="Country..." type="text" name="country" id="country" class="form-control" value="<?php echo set_value('country'); ?>" />
  <span class="text-danger"><?php echo form_error('country'); ?></span></p>
  <p><input placeholder="Skype ID..." type="text" name="skype_id" id="skype_id" class="form-control" value="<?php echo set_value('skype_id'); ?>" />
  <span class="text-danger"><?php echo form_error('skype_id'); ?></span></p>
  <p><input placeholder="Linkdin Profile..." type="text" name="linkdin_profile" id="linkdin_profile" class="form-control" value="<?php echo set_value('linkdin_profile'); ?>" />
  <span class="text-danger"><?php echo form_error('linkdin_profile'); ?></span></p>

  <p><input type="submit" name="Submit"  value="Submit" class="btn btn-info" /></p>
  <?php echo form_close() ?>
</div>

<script>
$("#panel_info").on('submit', function(e) {
    
    e.preventDefault();

    var panel_infoForm = $(this);
    
    $.ajax({
        url: panel_infoForm.attr('action'),
        type: 'post',
        data: panel_infoForm.serialize(),

        success: function(response){
         $("#panel_dashboard").html(response);
          if(response.status == 'success'){
            alert("xxx");
            $("#loginFormdiv").load(responce);
          }
          else{
            alert("xxxxx");
          } 
        }
    });
});
</script>