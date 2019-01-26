<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright (C) 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: ajax_calender.php
| Author: bartek124
| http://www.bartek124.net
| Co-Author: Nick Jones (Digitanium)
+--------------------------------------------------------+
| This program is released as free software under the
| Affero GPL license. You can redistribute it and/or
| modify it under the terms of this license which you
| can read by viewing the included agpl.txt or online
| at www.gnu.org/licenses/agpl.html. Removal of this
| copyright header is strictly prohibited without
| written permission from the original author(s).
+--------------------------------------------------------*/
if (!isset($internal)) {
    require_once "../../maincore.php";
    if (file_exists(INFUSIONS."ajax_calender_panel/locale/".$settings['locale'].".php")) {
        include INFUSIONS."ajax_calender_panel/locale/".$settings['locale'].".php";
    } else {
        include INFUSIONS."ajax_calender_panel/locale/English.php";
    }
}

if (isset($_POST['prev_month']) && (isset($_POST['cur_month']) && isnum($_POST['cur_month'])) && (isset($_POST['cur_year']) && isnum($_POST['cur_year']))) {
    if ($_POST['cur_month'] == 1) {
        $date = mktime(0, 0, 0, 12, 1, ($_POST['cur_year'] - 1));
    } else {
        $date = mktime(0, 0, 0, ($_POST['cur_month'] - 1), 1, $_POST['cur_year']);
    }
} elseif (isset($_POST['next_month']) && (isset($_POST['cur_month']) && isnum($_POST['cur_month']))) {
    if ($_POST['cur_month'] == 12) {
        $date = mktime(0, 0, 0, 1, 1, ($_POST['cur_year'] + 1));
    } else {
        $date = mktime(0, 0, 0, ($_POST['cur_month'] + 1), 1, $_POST['cur_year']);
    }
} else {
    $date = time();
}

$day = date("d", $date);
$month = date("m", $date);
$year = date("Y", $date);
$first_day = mktime(0, 0, 0, $month, 1, $year);
$title = strftime("%B", $first_day);
$day_of_week = date("D", $first_day);

switch ($day_of_week) { 
    case "Mon": $blank = 0; break;
    case "Tue": $blank = 1; break;
    case "Wed": $blank = 2; break;
    case "Thu": $blank = 3; break;
    case "Fri": $blank = 4; break;
    case "Sat": $blank = 5; break;
    case "Sun": $blank = 6; break;
}

$days_in_month = cal_days_in_month(0, $month, $year);
$day_count = 1;
$day_num = 1;


echo "<caption style='font-weight: bold;line-height: 2em'>".ucfirst($title)." ".$year."\n";
echo "<input type='hidden' name='cur_month' value='".$month."' />\n";
echo "<input type='hidden' name='cur_year' value='".$year."' /></caption>\n";
echo "<tr>\n";
echo "<th style='text-align:center'>".$locale['cal_monday']."</th>\n";
echo "<th style='text-align:center'>".$locale['cal_tuesday']."</th>\n";
echo "<th style='text-align:center'>".$locale['cal_wednesday']."</th>\n";
echo "<th style='text-align:center'>".$locale['cal_thursday']."</th>\n";
echo "<th style='text-align:center'>".$locale['cal_friday']."</th>\n";
echo "<th style='text-align:center'>".$locale['cal_saturday']."</th>\n";
echo "<th style='text-align:center'>".$locale['cal_sunday']."</th>\n";
echo "</tr>\n<tr>\n";

while ($blank > 0) {
    echo "<td></td>\n";
    $blank = $blank-1;
    $day_count++;
}

while ($day_num <= $days_in_month) {
    if ($year == date("Y", time()) && $month == date("m", time()) && $day_num == date("d", time())) {
        echo "<td style='text-align:center'><strong>".$day_num."</strong></td>\n";
    } else {
        echo "<td style='text-align:center'>".$day_num."</td>\n";
    }
    $day_num++;
    $day_count++;

    if ($day_count > 7 && $day_num <= $days_in_month) {
        echo "</tr>\n<tr>\n";
        $day_count = 1;
    }
} 

while ($day_count > 1 && $day_count <= 7) {
    echo "<td></td>\n";
    $day_count++;
} 

echo "</tr>\n";
?>