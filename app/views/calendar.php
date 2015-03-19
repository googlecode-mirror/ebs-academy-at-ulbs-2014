<?php
$date =  time();

$day = date('d',$date);
$month = date('m',$date);
$year = date('Y',$date);

//prima zi din luna
$first_day=  mktime(0,0,0,$month,1,$year);
//numele luni
$title=date('F',$first_day);
//ziua
$day_of_the_week=date('D',$first_day);

switch($day_of_the_week){
    case "Mon": $blank='0';break;
    case "Tue": $blank='1';break;
    case "Wed": $blank='2';break;
    case "Thu": $blank='3';break;
    case "Fri": $blank='4';break;
    case "Sat": $blank='5';break;
    case "Sun": $blank='6';break;

}

//cate zile sunt in luna?
$days_in_month= cal_days_in_month(0, $month, $year);

echo"<table border=6 width=394>";
echo"<tr><th colspan=60> $title $year</th>";
echo"<tr><td width=60>Monday</td><td width=62>Tuesday</td><td width=62>Wednesday</td><td width=60>Thursday </td><td width=60>Friday </td><td width=60>Saturday</td><td width=60>Sunday</td></td>";
$day_count=1;
echo"<tr>";
while ($blank>0){
    echo"<td></td>";
    $blank=$blank-1;
    $day_count++;
}
$day_num=1;
while($day_num<=$days_in_month){
    echo"<td>$day_num</td>";
    $day_num++;
    $day_count++;
    if($day_count>7){
        echo"</tr><tr>";
        $day_count=1;
    }
}
while($day_count>1 && $day_count<=7){
    echo"<td></td>";
    $day_count++;
    }
    echo"</tr></table>"
    ?>

















