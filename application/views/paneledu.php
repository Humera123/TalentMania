<h3>Education:</h3><br />  
<?php echo form_open('paneldashboard/validation_edu', array('id' => 'panel_edu')) ?> 
<p><input placeholder="School..." type="text" name="school" class="form-control" value="<?php echo set_value('school'); ?>" />
<span class="text-danger"><?php echo form_error('school'); ?></span></p>
<p><input placeholder="Degree/Certificate..." type="text" name="degree_name" class="form-control" value="<?php echo set_value('degree_name'); ?>" />
<span class="text-danger"><?php echo form_error('degree_name'); ?></span></p>
<p><input placeholder="Field of study..." type="text" name="field_of_study" class="form-control" value="<?php echo set_value('field_of_study'); ?>" />
<span class="text-danger"><?php echo form_error('field_of_study'); ?></span></p>
<p><input placeholder="Location..." type="text" name="location" class="form-control" value="<?php echo set_value('location'); ?>" />
<span class="text-danger"><?php echo form_error('location'); ?></span></p>
<p><input placeholder="Start Month..." type="date" name="start_month_edu" class="form-control" value="<?php echo set_value('start_month_edu'); ?>" />
<span class="text-danger"><?php echo form_error('start_month_edu'); ?></span></p>
<p><input placeholder="End Month..." type="date" name="end_month_edu" class="form-control" value="<?php echo set_value('end_month_edu'); ?>" />
<span class="text-danger"><?php echo form_error('end_month_edu'); ?></span></p>
<p><input type="checkbox" name="current_degree" value="1" class="form-control"> Current Job
<span class="text-danger"><?php echo form_error('current_degree'); ?></span></p>
<input type="submit" name="submit" value="Submit" class="btn btn-info" />
<?php echo form_close() ?>



<script>
$(function() {
  $("#panel_edu").on('submit', function(e) {
     
      e.preventDefault();

      var panel_eduForm = $(this);
      
      $.ajax({
          url: panel_eduForm.attr('action'),
          type: 'post',
          data: panel_eduForm.serialize(),

          success: function(response){
           $("#panel_dashboard").html(response);
            if(response.status == 'success'){
                $("#panel_dashboard").load(responce);
            }
            else{
              alert("xxxxx");
            } 
          }
      });
  });
});
</script>