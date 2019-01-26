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
include INFUSIONS."pd_stats_panel/infusion_db.php";
include INFUSIONS."pd_stats_panel/locale/Hungarian.php";

require INFUSIONS."pd_stats_panel/stats.inc.php";

if ($settings['maintenance'] != "1" || iSUPERADMIN) {
	openside($locale['pds102']);
	echo "<span class='font11'>";
	if($dset['pd_stats_gaeste']=='Y') echo $locale['pds200'].PD_STATS_GAESTE."<br>";
	if($dset['pd_stats_members']=='Y' && iMEMBER) echo $locale['pds201'].PD_STATS_MEMBERS."<br>";
	if($dset['pd_stats_gaeste']=='Y' || $dset['pd_stats_members']=='Y') echo "<hr class='side-hr'>";
	if($settings['enable_registration'] !=0 ) {
		if($dset['pd_stats_register']=='Y') echo $locale['pds202'].PD_STATS_REGISTER."<br>";
		if($dset['pd_stats_unaktiv']=='Y' && $settings['admin_activation']=='1') echo $locale['pds203'].PD_STATS_UNAKTIV."<br>";
		if($dset['pd_stats_new']=='Y' && iMEMBER) echo $locale['pds204'].PD_STATS_NEW."<br>";
		if($dset['pd_stats_register']=='Y' || ($dset['pd_stats_unaktiv']=='Y' && $settings['admin_activation']=='1') || $dset['pd_stats_new']=='Y') echo "<hr class='side-hr'>";
	}
	if($dset['pd_stats_heute']=='Y' || $dset['pd_stats_online']=='Y' || $dset['pd_stats_maxonline']=='Y' ||	$dset['pd_stats_maxday']=='Y' || $dset['pd_stats_gestern']=='Y' || $dset['pd_stats_monat']=='Y' || $dset['pd_stats_gesamt']=='Y') {
		echo "<table cellspacing='0' cellpadding='0' width='100%'>";
		if($dset['pd_stats_heute']=='Y') echo "<tr><td>".$locale['pds205']."</td><td align='right'>".PD_STATS_HEUTE."</td></tr>";
		if($dset['pd_stats_online']=='Y') echo "<tr><td>".$locale['pds206']."</td><td align='right'>".PD_STATS_ONLINE."</td></tr>";
		if($dset['pd_stats_maxonline']=='Y') echo "<tr><td>".$locale['pds207']."</td><td align='right'>".PD_STATS_MAXONLINE."</td></tr>";
		if($dset['pd_stats_maxday']=='Y') echo "<tr><td>".$locale['pds208']."</td><td align='right'>".PD_STATS_MAXDAY."</td></tr>";
		if($dset['pd_stats_gestern']=='Y') echo "<tr><td>".$locale['pds209']."</td><td align='right'>".PD_STATS_GESTERN."</td></tr>";
		if($dset['pd_stats_monat']=='Y') echo "<tr><td>".$locale['pds210']."</td><td align='right'>".PD_STATS_MONAT."</td></tr>";
		if($dset['pd_stats_gesamt']=='Y') echo "<tr><td>".$locale['pds211']."</td><td align='right'>".PD_STATS_GESAMT."</td></tr>";
		echo "</table>";
	}
	if($dset['pd_stats_last_24h']=='Y') echo "<hr class='side-hr'>".$locale['pds212']."<br><div align='center'>".PD_STATS_LAST_24H."</div>";
	echo "</span>";
	closeside();
}
?>