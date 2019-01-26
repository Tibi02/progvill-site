<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright (C) 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: ajax_calender_panel.php
| Author: Nick Jones (Digitanium)
| Co-Author: bartek124
| http://www.bartek124.net
+--------------------------------------------------------+
| This program is released as free software under the
| Affero GPL license. You can redistribute it and/or
| modify it under the terms of this license which you
| can read by viewing the included agpl.txt or online
| at www.gnu.org/licenses/agpl.html. Removal of this
| copyright header is strictly prohibited without
| written permission from the original author(s).
+--------------------------------------------------------*/
if (!defined("IN_FUSION")) { die("Access Denied"); }

if (file_exists(INFUSIONS."ajax_calender_panel/locale/".$settings['locale'].".php")) {
    include INFUSIONS."ajax_calender_panel/locale/".$settings['locale'].".php";
} else {
    include INFUSIONS."ajax_calender_panel/locale/English.php";
}

add_to_head("<script type='text/javascript'>
/* Ajax Calender Panel by bartek124
 * http://www.bartek124.net
 * based on Calender Panel by Nick Jones (Digitanium)
 * http://www.php-fusion.co.uk
 */
/* <![CDATA[ */ 
$(document).ready(function() {
    var cur_month = $('#ajax-calender-panel input[name=\"cur_month\"]').val();
    var cur_year = $('#ajax-calender-panel input[name=\"cur_year\"]').val();
    
    $('#ajax-calender-panel input[name=\"prev_month\"]').click(function(event) {
        $('#ajax-calender-panel table').stop().fadeTo('fast', 0.001, function() {
            $.post('".INFUSIONS."ajax_calender_panel/ajax_calender.php', {'prev_month': true, 'cur_month': cur_month, 'cur_year': cur_year}, function(data) {
                $('#ajax-calender-panel table').html(data);
                cur_month = $('#ajax-calender-panel input[name=\"cur_month\"]').val();
                cur_year = $('#ajax-calender-panel input[name=\"cur_year\"]').val();
                $('#ajax-calender-panel table').stop().fadeTo('fast', 1.0);
            });
        });
        event.preventDefault();
    });
    
    $('#ajax-calender-panel input[name=\"next_month\"]').click(function(event) {
        $('#ajax-calender-panel table').stop().fadeTo('fast', 0.001, function() {
            $.post('".INFUSIONS."ajax_calender_panel/ajax_calender.php', {'next_month': true, 'cur_month': cur_month, 'cur_year': cur_year}, function(data) {
                $('#ajax-calender-panel table').html(data);
                cur_month = $('#ajax-calender-panel input[name=\"cur_month\"]').val();
                cur_year = $('#ajax-calender-panel input[name=\"cur_year\"]').val();
                $('#ajax-calender-panel table').stop().fadeTo('fast', 1.0);
            });
        });
        event.preventDefault();
    });
});
/* ]]> */ 
</script>");

$internal = true;
openside($locale['cal_100']);
echo "<form id='ajax-calender-panel' style='position: relative' method='post' action='".FUSION_SELF.(FUSION_QUERY ? "?".FUSION_QUERY : "")."'>\n";
echo "<input type='submit' name='prev_month' value='&lt;' class='button' style='position: absolute;left: 0;top: 0' />\n";
echo "<input type='submit' name='next_month' value='&gt;' class='button' style='position: absolute;right: 0;top: 0' />\n";
echo "<table width='100%'>\n";
include INFUSIONS."ajax_calender_panel/ajax_calender.php";
echo "</table>\n";
echo "</form>\n";
closeside();
?>