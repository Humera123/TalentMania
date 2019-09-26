

<h3>Education:</h3><br />  

              <div class="table-responsive">  
              <table class="table table-bordered">  
                <tr>  
                     <th>Education ID</th>  
                     <th>School</th>  
                     <th>Degree Name</th>  
                     <th>Field of study</th> 
                     <th>Start Date</th> 
                     <th>End Date</th>
                     <th>Current Degree</th>
                     <th>Delete</th>  
                     <th>Update</th>  
                </tr>  
           <?php  
           if($data)  
           {  
             foreach ($data as $row) 
                {  
           ?>  
                <tr>  
                     <td><?php echo "$row->education_id" ?></td>  
                     <td><?php echo "$row->school" ?></td>
                     <td><?php echo "$row->degree_name" ?></td>
                     <td><?php echo "$row->field_of_study" ?></td>
                     <td><?php echo "$row->start_date" ?></td>
                     <td><?php echo "$row->end_date" ?></td>
                     <td><?php echo "$row->current_degree"?></td>
                     <td><a href="<?php echo base_url() . "welcome/delete_edu_data/" . $row->experience_id; ?>">Delete</a></td>  
                     <td><a href="<?php echo base_url() . "welcome/edit_edu_data/" . $row->experience_id; ?>">Edit</a></td>  
                </tr>  
           <?php       
                }  
           }  
           else  
           {  
           ?>  
                <tr>  
                     <td colspan="5">No Data Found</td>  
                </tr>  
           <?php  
           }  
           ?>  
           </table>  
      </div>

      <?php
      if($exp)
      {
        foreach ($exp as $row) 
        {
        ?>
<?php echo form_open('welcome/update_edu_data', array('id' => 'jobseeker_edu')) ?> 
    <p><input placeholder="School..." type="text" name="school" class="form-control" value="<?php echo set_value('school'); ?>" />
    <span class="text-danger"><?php echo form_error('school'); ?></span></p>
    <p><select name="degree_name" id="degree_name" class="form-control" value="<?php echo set_value('degree_name'); ?>">
      <option value="1">Non-Matriculation</option>
      <option value="2">Matriculation/O-level</option>
      <option value="3">Intermediate/A-level</option>
      <option value="4">Bachelor</option>
      <option value="5">Master</option>
      <option value="6">MBBS/D-Pharm/BDS</option>
      <option value="7">M-Phill</option>
      <option value="8">PHD/Doctorate</option>
      <option value="9">Certification</option>
      <option value="10">Diploma</option>
    </select>
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
    <p><input type="hidden" id="hide" name="did" value="<?php echo $row->education_id; ?>"></p>
    <input type="submit" name="submit" value="Submit" class="btn btn-info" />
<?php echo form_close() ?>
        <?php  # code...
        }
      }
      else
      {
        ?>
        <?php echo form_open('welcome/validation_edu', array('id' => 'jobseeker_edu')) ?> 
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


        <?php
      }
      ?>  

<script>
$(function() {
  $("#jobseeker_edu").on('submit', function(e) {
     
      e.preventDefault();

      var jobseeker_eduForm = $(this);
      
      $.ajax({
          url: jobseeker_eduForm.attr('action'),
          type: 'post',
          data: jobseeker_eduForm.serialize(),

          success: function(response){
            if(response.status == 'faliure'){
              console.log(response.message);
            }
            else{
              $("#jobseeker_dashboard").html(response);
            } 
          }
      });
  });
});
</script>