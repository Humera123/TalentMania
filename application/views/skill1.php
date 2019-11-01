<?php
$output ="";
if(count($data) > 0){
    foreach($data as $row){
        $color = '';
        $rating = $row->rating;
        $output .= '<h3 class="text-primary">'.$row->skill_name.'</h3>
                    <ul class="list-inline" data-rating="'.$rating.'" title="Average Rating - '.$rating.'">
                    ';
        for($count = 1; $count <= 5; $count++)
        {
            if($count <= $rating)
            {
            $color = 'color:#ffcc00;';
            }
            else
            {
            $color = 'color:#ccc;';
            }
            $output .= '<li title="'.$count.'"  data-index="'.$count.'"  data-rating="'.$rating.'" class="rating" style="cursor:pointer; '.$color.' font-size:24px;">&#9733;</li>';
        }
   $output .= '</ul>';
    }
    echo $output;
}
else{
    echo "No data found";
}
?>

<script>
$(document).ready(function()
{
  
  $(document).on('mouseenter', '.rating', function()
  {
  var index = $(this).data('index');
  var skillid = $(this).data('panelid');
  for(var count = 1; count <= index; count++)
  {
   $('#'+skillid+'-'+count).css('color', '#ffcc00');
  }
 });

 $(document).on('click', '.rating', function(){
  var index = $(this).data('index');
  var skillid = $(this).data('skillid');
  $.ajax({
   url:"<?php echo base_url(); ?>skillendorsed/insert",
   method:"POST",
   data:{index:index, skillid:skillid},
   success:function(data)
   {
    load_data();
    alert("You have rate "+index +" out of 5");
   }
  })
 });

 $(document).on('mouseleave', '.rating', function(){
  var index = $(this).data('index');
  var skillid = $(this).data('panelid');
  var rating = $(this).data('rating');
  for(var count = 1; count <= rating; count++)
  {
   $('#'+skillid+'-'+count).css('color', '#ffcc00');
  }
 });

});
</script>