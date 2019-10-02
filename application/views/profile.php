<?php 
foreach($profile as $pro){
   $hired = $pro->hired;
   $output = "<img src=".base_url()."uploads/$pro->pimage' /></br>";
   $output .= "<p>$pro->first_name   $pro->last_name</p>";
   $output .= "<p>$pro->skype_id</p>";
   $output .= "<p>$pro->linkdin_profile</p>";
   $output .= "<p>$pro->city</p>";
   $output .= "<p>$pro->country</p>";
   $output .= "<p>$pro->mobileno</p>";
}

$output .= "<h3>Education</h3>";
$output .="<table><tr><th>Degree</th><th>School</th><th>Field</th><th>Start Date</th><th>End Date</th></tr>";
foreach($edu as $education){
    if($education->degree_name == 1){
        $degree = "Non-Matriculation";
    }
    elseif($education->degree_name == 2){
        $degree = "Matriculation/O-level";
    }
    elseif($education->degree_name == 3){
        $degree = "Intermediate/A-level";
    }
   elseif($education->degree_name == 4){
        $degree = "Bachelor";
    }
    elseif($education->degree_name == 5){
        $degree = "Master";
    }
    elseif($education->degree_name == 6){
        $degree = "MBBS/D-Pharm/BDS";
    }
    elseif($education->degree_name == 7){
        $degree = "M-Phill";
    }
    elseif($education->degree_name == 8){
        $degree = "PHD/Doctorate";
    }
    elseif($education->degree_name == 9){
        $degree = "Certification";
    }
    elseif($education->degree_name == 10){
        $degree = "Diploma";
    }
    else{
        $degree = $education->degree_name;
    }
   
   $output .= "<tr><td>$degree</td>";
   $output .= "<td>$education->school</td>";
   $output .= "<td>$education->field_of_study</td>";
   $output .= "<td>$education->start_date</td>";
   $output .= "<td>$education->end_date</td></tr>";
}
$output .= "</table>";
$output .= "<h3>Experience</h3>";
$output .="<table><tr><th>Job Title</th><th>Company Name</th><th>Location</th><th>Start Date</th><th>End Date</th></tr>";
foreach($exp as $experience){
   
   $output .= "<tr><td>$experience->job_title</td>";
   $output .= "<td>$experience->company_name</td>";
   $output .= "<td>$experience->location</td>";
   $output .= "<td>$experience->start_month</td>";
   $output .= "<td>$experience->end_month</td></tr>";
}
$output .= "</table>";
echo $output;

?>
<?php if($hired == 0 ): ?>
<p id="hired"><button name="hired" value="hired" onclick="gethired(<?php echo $this->input->get('id', TRUE)?>,<?php echo $this->input->get('jobid', TRUE)?>)"> Hired</button></p>
<?php else: ?>
<p> Hired </p>
<?php endif; ?>
<script>
    function gethired(id,jobid){
        $.ajax({
            url: '<?php echo base_url() ?>profile/getHire',
            type: 'post',
            data: {id : id,
                jobid : jobid},

            success: function(response){
            $("#hired").html("Hired");
           
            }
        });
    }
    
</script>




