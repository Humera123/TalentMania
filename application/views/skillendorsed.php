<?php
$output ="";
if(count($getSkills) > 0){
    foreach($getSkills as $row){
        $color = '';
        $rating = $row->rating;
        $output .= '
                    <h3 class="text-primary">'.$row->skill_name.'</h3>
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