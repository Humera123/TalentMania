<br /><br /><br /><h1 align="center">Welcome User</h1>
<p align="center"><a href="<?php echo base_url()?>welcome/logout">Logout</a></p>

<div class="three-step-form">

<form id="regForm" action="">

<h1>Build Profile:</h1>

<!-- One "tab" for each step in the form: -->

<div class="tab">
  <p><input placeholder="First name..." type="text" name="first_name" id="first_name" class="form-control" value="<?php echo set_value('first_name'); ?>" />
  <span class="text-danger"><?php echo form_error('first_name'); ?></span></p>
  <p><input placeholder="Last name..." type="text" name="last_name" id="last_name" class="form-control" value="<?php echo set_value('last_name'); ?>" />
  <span class="text-danger"><?php echo form_error('last_name'); ?></span></p>
  <p><input placeholder="Father Name..." type="text" name="father_name" id="father_name" class="form-control" value="<?php echo set_value('father_name'); ?>" />
  <span class="text-danger"><?php echo form_error('father_name'); ?></span></p>
  <p><input placeholder="Date of birth..." type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="<?php echo set_value('date_of_birth'); ?>" />
  <span class="text-danger"><?php echo form_error('date_of_birth'); ?></span></p>
  <p><input placeholder="Nationality..." type="text" name="nationality" id="nationality" class="form-control" value="<?php echo set_value('nationality'); ?>" />
  <span class="text-danger"><?php echo form_error('nationality'); ?></span></p>
  <p><input placeholder="Mobile no..." type="text" name="mobileno" id="mobileno" class="form-control" value="<?php echo set_value('mobileno'); ?>" />
  <span class="text-danger"><?php echo form_error('mobileno'); ?></span></p>
  <p><input placeholder="Address..." type="text" name="address" id="address" class="form-control" value="<?php echo set_value('address'); ?>" />
  <span class="text-danger"><?php echo form_error('address'); ?></span></p>
  <p><input placeholder="City..." type="text" name="city" id="city" class="form-control" value="<?php echo set_value('city'); ?>" />
  <span class="text-danger"><?php echo form_error('city'); ?></span></p>
  <p><input placeholder="Country..." type="text" name="country" id="country" class="form-control" value="<?php echo set_value('country'); ?>" />
  <span class="text-danger"><?php echo form_error('country'); ?></span></p>
  <p><input placeholder="Skype ID..." type="text" name="skype_id" id="skype_id" class="form-control" value="<?php echo set_value('skype_id'); ?>" />
  <span class="text-danger"><?php echo form_error('skype_id'); ?></span></p>
  <p><input placeholder="Linkdin Profile..." type="text" name="linkdin_profile" id="linkdin_profile" class="form-control" value="<?php echo set_value('linkdin_profile'); ?>" />
  <span class="text-danger"><?php echo form_error('linkdin_profile'); ?></span></p>
  <p><input type="file" name="cnic_front" id="cnic_front" accept="image/gif, image/jpeg, image/png" value="<?php echo set_value('cnic_front'); ?>">
  <span class="text-danger"><?php echo form_error('cnic_front'); ?></span></p>
  <p><input type="file" name="cnic_back" id="cnic_back" accept="image/gif, image/jpeg, image/png" value="<?php echo set_value('cnic_back'); ?>">
  <span class="text-danger"><?php echo form_error('cnic_back'); ?></span></p>
  <p><input type="file" name="last_degree" id="last_degree" accept="image/gif, image/jpeg, image/png" value="<?php echo set_value('last_degree'); ?>">
  <span class="text-danger"><?php echo form_error('last_degree'); ?></span></p>
</div>        

<div class="tab">Experience:
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
    <p><input type="checkbox" name="current_job" class="form-control"> Current Job
    <span class="text-danger"><?php echo form_error('current_job'); ?></span></p>
</div>

<div class="tab">Education:
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
    <p><input type="checkbox" name="current_degree" class="form-control"> Current Job
    <span class="text-danger"><?php echo form_error('current_degree'); ?></span></p>
</div>

<div class="tab">Login Info:
  <p><input placeholder="Username..." oninput="this.className = ''"></p>
  <p><input placeholder="Password..." oninput="this.className = ''"></p>
</div>

<div style="overflow:auto;">
  <div style="float:right;">
    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    <button type="button" id="nextBtn" onclick="form_submit()">Submit</button>
  </div>
</div>

<!-- Circles which indicates the steps of the form: -->
<div style="text-align:center;margin-top:40px;">
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
</div>

</form>
</div>

<script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab
    
    function form_submit(){
      alert("hello");
     

        var first_name = $('#first_name').val();
        alert(first_name);
        var last_name = $('#last_name').val();
        var father_name = $('#father_name').val();
        var date_of_birth = $('#date_of_birth').val();
        var nationality = $('#nationality').val();
        var mobileno = $('#mobileno').val();
        var city = $('#city').val();
        var country = $('#country').val();
        var address = $('#address').val();
        var skype_id = $('#skype_id').val();
        var linkdin_profile = $('#linkdin_profile').val();
        var cnic_front = $('#cnic_front').val();
        var cnic_back = $('#cnic_back').val();
        var last_degree = $('#last_degree').val();

        $.ajax({

        url: "<?php echo base_url(); ?>welcome/validation",

        type:'post',

        data : {first_name:first_name,last_name:last_name,father_name:father_name,date_of_birth:date_of_birth,
        nationality:nationality,mobileno:mobileno,city:city,country:country,address:address,skype_id:skype_id,linkdin_profile:linkdin_profile,
        cnic_front:cnic_front,cnic_back:cnic_back,last_degree:last_degree},

        dataType: "json",

        success: function(data) {

            alert(done);
            
        } 

        });
      
    }

    function showTab(n) {
    // This function will display the specified tab of the form ...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    // ... and fix the Previous/Next buttons:
    if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
        
    } else {
        document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Submit";
    } else {
        document.getElementById("nextBtn").innerHTML = "Next";
    }
    // ... and run a function that displays the correct step indicator:
    fixStepIndicator(n)
    }

    function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:
    //if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form... :
    if (currentTab >= x.length) {
        //...the form gets submitted:
        document.getElementById("regForm").submit();
        return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
    }

//function validateForm() {
  // This function deals with validation of the form fields
  //var x, y, i, valid = true;
  //x = document.getElementsByClassName("tab");
  //y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  //for (i = 0; i < y.length; i++) {
    // If a field is empty...
    //if (y[i].value == "") {
      // add an "invalid" class to the field:
      //y[i].className += " invalid";
      // and set the current valid status to false:
      //valid = false;
    //}
  //}
  // If the valid status is true, mark the step as finished and valid:
  //if (valid) {
    //document.getElementsByClassName("step")[currentTab].className += " finish";
  //}
  //return valid; // return the valid status
//}

    function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class to the current step:
    x[n].className += " active";
    }
</script>