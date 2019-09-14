<br />
<h3 align="center">Complete User Registration and Login System in Codeigniter</h3>

<div id='addjob_dashboard'>
  <?php echo form_open('addjob/validation', array('id' => 'addjob_info')) ?>
  <p><input placeholder="Job Title..." type="text" name="job_title" id="job_title" class="form-control" value="<?php echo set_value('job_title'); ?>" />
    <span class="text-danger"><?php echo form_error('job_title'); ?></span></p>
  <p><input placeholder="Job Description..." type="text" name="job_desc" id="job_desc" class="form-control" value="<?php echo set_value('job_desc'); ?>" />
    <span class="text-danger"><?php echo form_error('job_desc'); ?></span></p>
  <p><input placeholder="What skills are required for this job..." name="skills_required" id="basics" class="form-control" value="<?php echo set_value('skills_required'); ?>" />
    <span class="text-danger"><?php echo form_error('skills_required'); ?></span></p>
  <p><select name="career_level" id="career_level" class="form-control" value="<?php echo set_value('career_level'); ?>">
      <option value="1">Intern/Student</option>
      <option value="2">Entery Level</option>
      <option value="3">Experienced Professional</option>
      <option value="4">Department Head</option>
      <option value="5">GM/CEO/Country Head/President</option>
    </select>
    <span class="text-danger"><?php echo form_error('career_level'); ?></span>
  </p>
  <p><input placeholder="N0. of Positions..." type="text" name="position" id="position" class="form-control" value="<?php echo set_value('position'); ?>" />
    <span class="text-danger"><?php echo form_error('position'); ?></span></p>
  <p><input placeholder="Job Location..." type="text" name="job_location" id="job_location" class="form-control" value="<?php echo set_value('job_location'); ?>" />
    <span class="text-danger"><?php echo form_error('job_location'); ?></span></p>

  <p>What minimum qualification is required?...</p>
  <p><select name="qualification" id="qualification" class="form-control" value="<?php echo set_value('qualification'); ?>">
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
    <span class="text-danger"><?php echo form_error('qualification'); ?></span>
    <select name="qualification_range" id="qualification_range" class="form-control" value="<?php echo set_value('qualification_range'); ?>">
      <option value="1">or higher</option>
      <option value="2">Exactly</option>
    </select>
    <span class="text-danger"><?php echo form_error('qualification_range'); ?></span>
  </p>

  <p>Years of experience required?...</p>
  <p><select name="min_experience" id="min_experience" class="form-control" value="<?php echo set_value('min_experience'); ?>">
      <option value="">Min</option>
      <option value="0">Fresh</option>
      <option value="37">Less than 1 Year</option>
      <option value="1">1 Year</option>
      <option value="2">2 Years</option>
      <option value="3">3 Years</option>
      <option value="4">4 Years</option>
      <option value="5">5 Years</option>
      <option value="6">6 Years</option>
      <option value="7">7 Years</option>
      <option value="8">8 Years</option>
      <option value="9">9 Years</option>
      <option value="10">10 Years</option>
      <option value="11">11 Years</option>
      <option value="12">12 Years</option>
      <option value="13">13 Years</option>
      <option value="14">14 Years</option>
      <option value="15">15 Years</option>
      <option value="16">16 Years</option>
      <option value="17">17 Years</option>
      <option value="18">18 Years</option>
      <option value="19">19 Years</option>
      <option value="20">20 Years</option>
      <option value="21">21 Years</option>
      <option value="22">22 Years</option>
      <option value="23">23 Years</option>
      <option value="24">24 Years</option>
      <option value="25">25 Years</option>
      <option value="26">26 Years</option>
      <option value="27">27 Years</option>
      <option value="28">28 Years</option>
      <option value="29">29 Years</option>
      <option value="30">30 Years</option>
      <option value="31">31 Years</option>
      <option value="32">32 Years</option>
      <option value="33">33 Years</option>
      <option value="34">34 Years</option>
      <option value="35">35 Years</option>
      <option value="36">More than 35 Years</option>
    </select>
    <span class="text-danger"><?php echo form_error('min_experience'); ?></span>
    <select name="max_experience" id="max_experience" class="form-control" value="<?php echo set_value('max_experience'); ?>">
      <option value="">Max</option>
      <option value="0">Fresh</option>
      <option value="37">Less than 1 Year</option>
      <option value="1">1 Year</option>
      <option value="2">2 Years</option>
      <option value="3">3 Years</option>
      <option value="4">4 Years</option>
      <option value="5">5 Years</option>
      <option value="6">6 Years</option>
      <option value="7">7 Years</option>
      <option value="8">8 Years</option>
      <option value="9">9 Years</option>
      <option value="10">10 Years</option>
      <option value="11">11 Years</option>
      <option value="12">12 Years</option>
      <option value="13">13 Years</option>
      <option value="14">14 Years</option>
      <option value="15">15 Years</option>
      <option value="16">16 Years</option>
      <option value="17">17 Years</option>
      <option value="18">18 Years</option>
      <option value="19">19 Years</option>
      <option value="20">20 Years</option>
      <option value="21">21 Years</option>
      <option value="22">22 Years</option>
      <option value="23">23 Years</option>
      <option value="24">24 Years</option>
      <option value="25">25 Years</option>
      <option value="26">26 Years</option>
      <option value="27">27 Years</option>
      <option value="28">28 Years</option>
      <option value="29">29 Years</option>
      <option value="30">30 Years</option>
      <option value="31">31 Years</option>
      <option value="32">32 Years</option>
      <option value="33">33 Years</option>
      <option value="34">34 Years</option>
      <option value="35">35 Years</option>
      <option value="36">More than 35 Years</option>
    </select>
    <span class="text-danger"><?php echo form_error('max_experience'); ?></span>
  </p>

  <p>Salary Range...</p>
  <p><select name="min_salary" id="min_salary" class="form-control" value="<?php echo set_value('min_salary'); ?>">
      <option value="">From</option>
      <option value="5000">5,000</option>
      <option value="6000">6,000</option>
      <option value="7000">7,000</option>
      <option value="8000">8,000</option>
      <option value="9000">9,000</option>
      <option value="10000">10,000</option>
      <option value="11000">11,000</option>
      <option value="12000">12,000</option>
      <option value="13000">13,000</option>
      <option value="14000">14,000</option>
      <option value="15000">15,000</option>
      <option value="16000">16,000</option>
      <option value="17000">17,000</option>
      <option value="18000">18,000</option>
      <option value="19000">19,000</option>
      <option value="20000">20,000</option>
      <option value="25000">25,000</option>
      <option value="30000">30,000</option>
      <option value="35000">35,000</option>
      <option value="40000">40,000</option>
      <option value="45000">45,000</option>
      <option value="50000">50,000</option>
      <option value="60000">60,000</option>
      <option value="70000">70,000</option>
      <option value="80000">80,000</option>
      <option value="90000">90,000</option>
      <option value="100000">100,000</option>
      <option value="125000">125,000</option>
      <option value="150000">150,000</option>
      <option value="175000">175,000</option>
      <option value="200000">200,000</option>
      <option value="250000">250,000</option>
      <option value="300000">300,000</option>
      <option value="350000">350,000</option>
      <option value="400000">400,000</option>
      <option value="450000">450,000</option>
      <option value="500000">500,000</option>
      <option value="550000">550,000</option>
      <option value="600000">600,000</option>
      <option value="650000">650,000</option>
      <option value="700000">700,000</option>
      <option value="750000">750,000</option>
      <option value="800000">800,000</option>
      <option value="850000">850,000</option>
      <option value="900000">900,000</option>
      <option value="950000">950,000</option>
      <option value="1000000">1,000,000</option>
      <option value="1000001">1,000,000+</option>
    </select> <span class="text-danger"><?php echo form_error('min_salary'); ?></span>
    <select name="max_salary" id="max_salary" class="form-control" value="<?php echo set_value('max_salary'); ?>">
      <option value="">To</option>
      <option value="5000">5,000</option>
      <option value="6000">6,000</option>
      <option value="7000">7,000</option>
      <option value="8000">8,000</option>
      <option value="9000">9,000</option>
      <option value="10000">10,000</option>
      <option value="11000">11,000</option>
      <option value="12000">12,000</option>
      <option value="13000">13,000</option>
      <option value="14000">14,000</option>
      <option value="15000">15,000</option>
      <option value="16000">16,000</option>
      <option value="17000">17,000</option>
      <option value="18000">18,000</option>
      <option value="19000">19,000</option>
      <option value="20000">20,000</option>
      <option value="25000">25,000</option>
      <option value="30000">30,000</option>
      <option value="35000">35,000</option>
      <option value="40000">40,000</option>
      <option value="45000">45,000</option>
      <option value="50000">50,000</option>
      <option value="60000">60,000</option>
      <option value="70000">70,000</option>
      <option value="80000">80,000</option>
      <option value="90000">90,000</option>
      <option value="100000">100,000</option>
      <option value="125000">125,000</option>
      <option value="150000">150,000</option>
      <option value="175000">175,000</option>
      <option value="200000">200,000</option>
      <option value="250000">250,000</option>
      <option value="300000">300,000</option>
      <option value="350000">350,000</option>
      <option value="400000">400,000</option>
      <option value="450000">450,000</option>
      <option value="500000">500,000</option>
      <option value="550000">550,000</option>
      <option value="600000">600,000</option>
      <option value="650000">650,000</option>
      <option value="700000">700,000</option>
      <option value="750000">750,000</option>
      <option value="800000">800,000</option>
      <option value="850000">850,000</option>
      <option value="900000">900,000</option>
      <option value="950000">950,000</option>
      <option value="1000000">1,000,000</option>
      <option value="1000001">1,000,000+</option>
    </select>
    <span class="text-danger"><?php echo form_error('max_salary'); ?></span>
  </p>
  <p>Is there a gender prefrence?</p>
  <p>
    <select name="gender" id="gender" class="form-control" value="<?php echo set_value('gender'); ?>">
      <option value="0">None</option>
      <option value="1">Female</option>
      <option value="2">Male</option>
    </select>
    <span class="text-danger"><?php echo form_error('gender'); ?></span>
  </p>

  <p><input type="submit" name="Submit" value="Submit" class="btn btn-info" /></p>
  <?php echo form_close() ?>
</div>

<script>
  var options = {
    data: ["blue", "green", "pink", "red", "yellow"]
  };

  $("#basics").easyAutocomplete(options);
</script>