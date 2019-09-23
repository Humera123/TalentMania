<?php
$output ="";
if(count($alljob) > 0){
    foreach($alljob as $row){

        $output .= '<h3 class="text-primary"><a href="#" id="">'.$row->job_title.'</a></h3><br>';
    }
    echo $output;
}
else{
    echo "No data found";
}
?>
<script>

</script>