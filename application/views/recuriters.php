<?php

if(count($alljob) > 0){
    foreach($alljob as $row){
        $output = "<h3 class='text-primary'>$row->job_title</h3>";
        $output .= "<a href='#' id='$row->jobid' onclick='loadrecuriters($row->jobid,$row->career_level,$row->qualification,$row->gender)'>see recuriters </a>";
        $output .= "<p class='$row->jobid'></p>";
        $output .="<input type='hidden' value='$row->skills_required' id='skill'/>";
    } 
    echo $output; 
   }
else
{     
    echo "No data found";
}
?>
<p class="recuriters"></p>
<script>
function loadrecuriters(jobid,exp,edu,gender){
  var skills_req = document.getElementById("skill").value;
      $.ajax({
          url: "<?php echo base_url()?>recuriters/getRecuriters",
          type: 'post',
          data: {jobid: jobid,
                skills : skills_req,
                exp : exp,
                edu : edu,
                gender : gender},

          success: function(response){
           $(".recuriters").html(response); 
          }
      });
}
</script>