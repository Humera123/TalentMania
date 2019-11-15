<?php 
   if($this->session->flashdata('true'))
   {
 ?>
   <div class="alert alert-success"> 
     <?php  echo $this->session->flashdata('true'); ?>
<?php    
}
?>
<br>
<p align="center"><a href="<?php echo base_url()?>welcome/logout">Logout</a></p>
<a href="<?php echo base_url()?>admindashboard/company_data">Showing Company Data</a> 
<a href="<?php echo base_url()?>admindashboard/panel_data">Showing Panel Data </a> 
<a href="<?php echo base_url()?>admindashboard/jobSeeker_data">Showing JobSeeker Data</a> 
<button type="submit" onclick="window.location='<?php echo base_url()?>admindashboard/assign'">Assign Panalist</button>


<?php
if($this->uri->segment(2)=="company_data" || $this->uri->segment(2)=="company_data_filter")
{
	?>
	<h3>Company Data :</h3><br />  
              <form class="form-inline" action="<?php echo base_url() . 'admindashboard/company_data_filter'; ?>" method="post">
                <select class="form-control" name="field">
                  <option selected="selected" disabled="disabled" value="">Filter By</option>
                  <option value="name_of_organization">name_of_organization</option>
                </select>
                <input class="form-control" type="text" name="search" value="" placeholder="Search...">
                <input class="btn btn-default" type="submit" name="filter" value="Go">
              </form>

              <div class="table-responsive">  
              <table class="table table-striped">  
               <thead>
                <tr>  
                     <th>Company_no</th>  
                     <th>logoimage</th>  
                     <th>name_of_organizatio</th>  
                     <th>industry_type</th> 
                     <th>sector</th> 
                     <th>address</th>
                     <th>phoneno</th>
                     <th>mobileno</th>  
                     <th>website_link</th>  
                     <th>facebook</th>  
                     <th>ceo_name</th>  
                     <th>skype_id</th>  
                     <th>email_ceo</th>  
                     <th>focal_name</th>  
                     <th>ntn_no</th>  
                     <th>employee_no</th>  

                </tr> 
                </thead> 
           <?php  
           if($data)  
           {  
             foreach ($data as $row) 
                {  
           ?>  <tbody>
                <tr>  
                     <td><?php echo "$row->company_no" ?></td> 
                     <td><img src="<?php echo base_url().'uploads/'.$row->logoimage?>" width="100px"/></td> 
                     <td><a href="<?php echo base_url() . "admindashboard/view_company_job/" . $row->company_no; ?>"><?php echo "$row->name_of_organization" ?></a></td>
                     <td><?php echo "$row->industry_type" ?></td>
                     <td><?php echo "$row->sector" ?></td>
                     <td><?php echo "$row->address" ?></td>
                     <td><?php echo "$row->phoneno"?></td>
                     <td><?php echo "$row->mobileno"?></td>
                     <td><?php echo "$row->website_link"?></td>
                     <td><?php echo "$row->facebook"?></td>
                     <td><?php echo "$row->ceo_name"?></td>
                     <td><?php echo "$row->skype_id"?></td>
                     <td><?php echo "$row->email_ceo"?></td>
                     <td><?php echo "$row->focal_name"?></td>
                     <td><?php echo "$row->ntn_no"?></td>
                     <td><?php echo "$row->employee_no"?></td>
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
      <?php
}
else if ($this->uri->segment(2)=="panel_data" || $this->uri->segment(2)=="panel_data_filter")
{
	?>
	<h3>Panel Data :</h3><br />  
            <form class="form-inline" action="<?php echo base_url() . 'admindashboard/panel_data_filter'; ?>" method="post">
                <select class="form-control" name="field">
                  <option selected="selected" disabled="disabled" value="">Filter By</option>
                  <option value="first_name"> first_name </option>
                  <option value="last_name"> last_name </option>
                  <option value="pskill_name">Skill Name </option>
                </select>
                <input class="form-control" type="text" name="search" value="" placeholder="Search...">
                <input class="btn btn-default" type="submit" name="filter" value="Go">
              </form>

              <div class="table-responsive">  
              <table class="table  table-striped">  
                <tr>  
                     <th>Panelid</th>  
                     <th>Profileimage</th>
                     <th>First_name</th>  
                     <th>Last_name</th> 
                     <th>Mobileno</th> 
                     <th>City</th>
                     <th>Country</th>
                     <th>Skype_id</th>  
                     <th>Linkedin_profile</th> 
                     <th>Panel Skills </th>              
                     <th>Panel Experience </th> 
                     <th>Panel Education </th> 
                </tr>  
           <?php  
           if($data)  
           {  
            
             foreach ($data as $row) 
                {  
           ?>  
                <tr>  
                     <td><?php echo "$row->panelid" ?></td> 
                     <td><img src="<?php echo base_url().'uploads/'.$row->pimage?>" width="100"/></td> 
                     <td><?php echo "$row->first_name" ?></td>
                     <td><?php echo "$row->last_name" ?></td>
                     <td><?php echo "$row->mobileno" ?></td>
                     <td><?php echo "$row->city" ?></td>
                     <td><?php echo "$row->country"?></td>
                     <td><?php echo "$row->skype_id"?></td>
                     <td><?php echo "$row->linkdin_profile"?></td>
                     <td><?php echo "$row->skills"?></td>
                     <td><?php echo "$row->exp"?></td>
                     <td><?php echo "$row->edu"?></td>

                </tr>  
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
      <?php
}
else if($this->uri->segment(2)=="jobSeeker_data"|| $this->uri->segment(2)=="fiter_jobseeker_data")
{
?>
	<h3>Jobseeker Data :</h3><br />  
             <form class="form-inline" action="<?php echo base_url() . 'admindashboard/fiter_jobseeker_data'; ?>" method="post">
                <select class="form-control" name="field">
                  <option selected="selected" disabled="disabled" value="">Filter By</option>
                  <option value="first_name"> first_name</option>
                  <option value="last_name"> last_name </option>
                  <option value="approval">Approval </option>
                  <option value="hiring"> Hiring </option>
                  <option value="city"> City </option>
                  <option value="skill_name"> Skill Name</option>
                </select>
                <input class="form-control" type="text" name="search" value="" placeholder="Search...">
                <input class="btn btn-default" type="submit" name="filter" value="Go">
              </form>

              <div class="table-responsive">  
              <table class="table table-striped">  
                <tr>  
                     <th>CNIC</th>  
                     <th>Profile Image</th>  
                     <th>First_name</th>  
                     <th>Last_name</th> 
                     <th>Father_name</th> 
                     <th>DOB</th>
                     <th>Nationality</th>
                     <th>Mobileno</th>  
                     <th>Address</th>  
                     <th>City</th>  
                     <th>Country</th>  
                     <th>Skype_id</th>  
                     <th>Linkedin_Profile</th>  
                     <th>skills</th>  
                     <th>Experience</th>
                     <th>Education</th>

                     
                </tr>  
           <?php  
           if($data)  
           {  
             foreach ($data as $row) 
                {  
           ?>  
                <tr>  
                     <td><?php echo "$row->cnic" ?></td> 
                     <td><img src="<?php echo base_url().'uploads/'.$row->pimage?>" width="100"/></td> 
                     <td><?php echo "$row->first_name?"?></td>
                     <td><?php echo "$row->last_name" ?></td>
                     <td><?php echo "$row->father_name" ?></td>
                     <td><?php echo "$row->date_of_birth" ?></td>
                     <td><?php echo "$row->nationality" ?></td>
                     <td><?php echo "$row->mobileno"?></td>
                     <td><?php echo "$row->address"?></td>
                     <td><?php echo "$row->city"?></td>
                     <td><?php echo "$row->country"?></td>
                     <td><?php echo "$row->skype_id"?></td>
                     <td><?php echo "$row->linkdin_profile"?></td>
                     <td><?php echo "$row->skills"?></td>
                     <td><?php echo "$row->exp"?></td>
                     <td><?php echo "$row->edu"?></td>
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
<?php
}
else 
{
	?>
	<div class="table-responsive">  
              <table class="table table-bordered">  
                <tr>  Nothing is to shown </tr>
           </table>
       </div>
       <?php
}
?>


