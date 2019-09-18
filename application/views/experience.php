<?php echo form_open('welcome/validation_exp', array('id' => 'jobseeker_exp')) ?>   
    <p><input placeholder="Job Title..." type="text" name="job_title" class="form-control" value="<?php echo set_value('job_title'); ?>" />
    <span class="text-danger"><?php echo form_error('job_title'); ?></span></p>
    <p><input placeholder="Company..." type="text" name="company" class="form-control" value="<?php echo set_value('company'); ?>" />
    <span class="text-danger"><?php echo form_error('company'); ?></span></p>
    <p><input placeholder="Location..." type="text" name="location" class="form-control" value="<?php echo set_value('location'); ?>" />
    <span class="text-danger"><?php echo form_error('location'); ?></span></p>
    <p><input placeholder="Start Month..." type="date" name="start_month" class="form-control" value="<?php echo set_value('start_month'); ?>" />
    <span class="text-danger"><?php echo form_error('start_month'); ?></span></p>
    <p><input placeholder="End Month..." type="date" name="end_month" class="form-control" value="<?php echo set_value('end_month'); ?>" />
    <span class="text-danger"><?php echo form_error('end_month'); ?></span></p>
    <p><input type="checkbox" name="current_job" value="1" class="form-control"> Current Job
    <span class="text-danger"><?php echo form_error('current_job'); ?></span></p>
    <input type="submit" name="submit" value="Submit" class="btn btn-info" />
    <input type="button" name="next" id="next" value="Next" class="btn btn-info" />
<?php echo form_close() ?>

<script>
$(function() {
  $("#jobseeker_exp").on('submit', function(e) {
    
      e.preventDefault();

      var jobseeker_expForm = $(this);
      
      $.ajax({
          url: jobseeker_expForm.attr('action'),
          type: 'post',
          data: jobseeker_expForm.serialize(),

          success: function(response){
           $("#jobseeker_dashboard").html(response);
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

  $("#next").on('click', function(e) {
      e.preventDefault();
      
      $.ajax({
          url: "<?php echo base_url()?>welcome/totalexperience",
          type: 'post',
          

          success: function(response){
           $("#jobseeker_dashboard").html(response);
            if(response.status == 'success'){
              $("#loginFormdiv").load(responce);
            }
            else{
              alert("xxxxx");
            } 
          }
      });
  });
});
</script>