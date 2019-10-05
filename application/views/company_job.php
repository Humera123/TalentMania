<h3>View Company related Jobs   :</h3><br />  
              <form class="form-inline" action="<?php echo base_url() . 'admindashboard/company_job_filter'; ?>" method="post">
                <select class="form-control" name="field">
                  <option selected="selected" disabled="disabled" value="">Filter By</option>
                  <option value="job_title">job_title</option>
                  <option value="job_location">job_location</option>
                </select>
                <input class="form-control" type="text" name="search" value="" placeholder="Search...">
                <input class="btn btn-default" type="submit" name="filter" value="Go">
              </form>

              <div class="table-responsive">  
              <table class="table table-striped">  
               <thead>
                <tr>  
                     <th>job_id</th>  
                     <th>job_title</th>  
                     <th>skills_required</th>  
                     <th>career_level</th> 
                     <th>qualification</th> 
                     <th>qualification_range</th>
                     <th>position</th>
                     <th>job_location</th>  
                     <th>min_experience</th>  
                     <th>max_experience</th>  
                     <th>min_salary</th>  
                     <th>max_salary</th>  
                     <th>gender</th>  
                     <th>approval</th>  
                     <th>hired_emp</th>  
                  </tr> 
                </thead> 
           <?php  
           if($data)  
           {  
             foreach ($data as $row) 
                {  
           ?>  <tbody>
                <tr>  
                     <td><?php echo "$row->jobid" ?> </td> 
                     <td><?php echo "$row->job_title" ?></td> 
                     <td><?php echo "$row->skills_required" ?></td>
                     <td><?php echo "$row->career_level" ?></td>
                     <td><?php echo "$row->qualification" ?></td>
                     <td><?php echo "$row->qualification_range" ?></td>
                     <td><?php echo "$row->position"?></td>
                     <td><?php echo "$row->job_location"?></td>
                     <td><?php echo "$row->min_experience"?></td>
                     <td><?php echo "$row->max_experience"?></td>
                     <td><?php echo "$row->min_salary"?></td>
                     <td><?php echo "$row->max_salary"?></td>
                     <td><?php echo "$row->gender"?></td>
                     <td><?php echo "$row->approval"?></td>
                     <td><?php echo "$row->hired_emp"?></td>
                </tr> 
                </tbody> 
           <?php       
                }  
           }  
           else  
           {  
           ?>  
                <tr>  
                     <td colspan="15">No Data Found</td>  
                </tr>  
           <?php  
           }  
           ?>  
           </table>  
      </div>
      