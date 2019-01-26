<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| PD Stats Panel for PHP-Fusion v7
| Author: Ralf Thieme
| Homepage: www.PHPFusion-SupportClub.de
| Author: pirdani (Version 1.9.1 unter v6)
+--------------------------------------------------------+
| This program is released as free software under the
| Affero GPL license. You can redistribute it and/or
| modify it under the terms of this license which you
| can read by viewing the included agpl.txt or online
| at www.gnu.org/licenses/agpl.html. Removal of this
| copyright header is strictly prohibited without
| written permission from the original author(s).
+--------------------------------------------------------+
| mod for bs-fusion by bahnfrank65
+--------------------------------------------------------*/
if (!defined("IN_FUSION")) die("Access Denied");
if (!defined("PD_STATS_BROWSER")) define("PD_STATS_BROWSER", DB_PREFIX."pd_stats_browser");
if (!defined("PD_STATS_COUNTER")) define("PD_STATS_COUNTER", DB_PREFIX."pd_stats_counter");
if (!defined("PD_STATS_OS")) define("PD_STATS_OS", DB_PREFIX."pd_stats_os");
if (!defined("PD_STATS_REFERER")) define("PD_STATS_REFERER", DB_PREFIX."pd_stats_referer");
if (!defined("PD_STATS_TEMP")) define("PD_STATS_TEMP", DB_PREFIX."pd_stats_temp");
if (!defined("PD_STATS_MONTH")) define("PD_STATS_MONTH", DB_PREFIX."pd_stats_month");
if (!defined("PD_STATS_SETTINGS")) define("PD_STATS_SETTINGS", DB_PREFIX."pd_stats_settings");
?>