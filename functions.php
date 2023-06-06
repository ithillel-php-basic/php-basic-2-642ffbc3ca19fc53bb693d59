<?php function
date_calculating($date) {
if($date === null) { return 'Дедлайн відсутній';}

$current_date = time();
$hour = 3600;

$transfered_date = strtotime($date);

$difference = floor(($transfered_date - $current_date) / $hour);
$difference_day = floor($difference / 24);

if($difference <= 24) {
echo '<small class="badge badge-danger"><i class="far fa-clock"></i>'.str_pad($difference, strlen($difference) + 11 ,"Годин:",STR_PAD_LEFT).'</small>';
} else
{echo '<small class="badge badge-success"><i class="far fa-clock"></i>'.str_pad($difference_day, strlen($difference_day) +9,"Днів:",STR_PAD_LEFT).'</small>';}
}

function taskSum(array $array, $projectName): int
{
    $number = 0;
    foreach ($array as $el) {
        if ($el['id'] === $projectName) {
            $number += 1;
        }
    }
    return $number;
}