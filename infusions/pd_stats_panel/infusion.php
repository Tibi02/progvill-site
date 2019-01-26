<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| PD Stats Panel for PHP-Fusion v7
| Author: Steffen Schalow
| Homepage: www.schallah.de
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
+--------------------------------------------------------*/
if (!defined("IN_FUSION")) { die("Access Denied"); }
include INFUSIONS."pd_stats_panel/infusion_db.php";
include INFUSIONS."pd_stats_panel/locale/English.php";

// Infusion general information
$inf_title = $locale['pds100'];
$inf_description = $locale['pds101'];
$inf_version = "2.2";
$inf_developer = "pirdani(v6) &amp; Ralf Thieme (v7) &amp; Steffen Schalow";
$inf_email = "s@schallah.de";
$inf_weburl = "http://www.schallah.de";
$inf_folder = "pd_stats_panel";

$inf_admin_image = "";
$inf_admin_panel = "pd_stats_admin.php";
$inf_admin_rights = "IP";

$inf_newtables = 7;
$inf_insertdbrows = 2;
$inf_altertables = 0;
$inf_deldbrows = 0;

$inf_newtable_[1] = "pd_stats_browser (
	browser	VARCHAR(50) NOT NULL DEFAULT '',
	stat BIGINT(1) NOT NULL DEFAULT '0',
	PRIMARY KEY (browser)
) TYPE=MyISAM;";

$inf_newtable_[2] = "pd_stats_counter (
	standing BIGINT(2) NOT NULL DEFAULT '0',
	maxonline BIGINT(1) NOT NULL DEFAULT '0',
	maxday BIGINT(1) NOT NULL DEFAULT '0'
) TYPE=MyISAM;";

$inf_newtable_[3] = "pd_stats_os (
	os VARCHAR(50) NOT NULL DEFAULT '',
	stat BIGINT(1) NOT NULL DEFAULT '0',
	PRIMARY KEY  (os)
) TYPE=MyISAM;";

$inf_newtable_[4] = "pd_stats_referer (
	referer VARCHAR(200) NOT NULL DEFAULT '',
	stat BIGINT(1) NOT NULL DEFAULT '0',
	PRIMARY KEY  (referer)
) TYPE=MyISAM;";

$inf_newtable_[5] = "pd_stats_temp (
	id BIGINT(15) UNSIGNED NOT NULL AUTO_INCREMENT,
	timestamp BIGINT(10) NOT NULL DEFAULT '0',
	PRIMARY KEY  (id)
) TYPE=MyISAM;";

$inf_newtable_[6] = "pd_stats_month (
	id BIGINT(2) UNSIGNED NOT NULL AUTO_INCREMENT,
	month VARCHAR(2) NOT NULL DEFAULT '',
	year VARCHAR(4) NOT NULL DEFAULT '',
	stat BIGINT(10) NOT NULL DEFAULT '0',
	PRIMARY KEY  (id)
) TYPE=MyISAM;";

$inf_newtable_[7] = "pd_stats_settings (
	reload VARCHAR(20) NOT NULL DEFAULT '3600',
	special1 VARCHAR(200) NOT NULL DEFAULT '[',
	special2 VARCHAR(200) NOT NULL DEFAULT ']',
	pd_stats_gaeste	VARCHAR(1) NOT NULL DEFAULT 'Y',
	pd_stats_members VARCHAR(1) NOT NULL DEFAULT 'Y',
	pd_stats_register VARCHAR(1) NOT NULL DEFAULT 'Y',
	pd_stats_unaktiv VARCHAR(1) NOT NULL DEFAULT 'Y',
	pd_stats_new VARCHAR(1) NOT NULL DEFAULT 'Y',
	pd_stats_heute VARCHAR(1) NOT NULL DEFAULT 'Y',
	pd_stats_online	VARCHAR(1) NOT NULL DEFAULT 'Y',
	pd_stats_maxonline VARCHAR(1) NOT NULL DEFAULT 'Y',
	pd_stats_maxday	VARCHAR(1) NOT NULL DEFAULT 'Y',
	pd_stats_gestern VARCHAR(1) NOT NULL DEFAULT 'Y',
	pd_stats_monat VARCHAR(1) NOT NULL DEFAULT 'Y',
	pd_stats_gesamt	VARCHAR(1) NOT NULL DEFAULT 'Y',
	pd_stats_last_24h VARCHAR(1) NOT NULL DEFAULT 'Y'
) TYPE=MyISAM;";

$inf_insertdbrow_[1] = "pd_stats_counter (standing, maxonline, maxday) VALUES('0', '0', '0')";
$inf_insertdbrow_[2] = "pd_stats_settings (reload, special1, special2, pd_stats_gaeste, pd_stats_members, pd_stats_register, pd_stats_unaktiv, pd_stats_new, pd_stats_heute, pd_stats_online, pd_stats_maxonline, pd_stats_maxday, pd_stats_gestern, pd_stats_monat, pd_stats_gesamt, pd_stats_last_24h) VALUES('3600', '[', ']', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y')";

$inf_droptable_[1] = "pd_stats_browser";
$inf_droptable_[2] = "pd_stats_counter";
$inf_droptable_[3] = "pd_stats_os";
$inf_droptable_[4] = "pd_stats_referer";
$inf_droptable_[5] = "pd_stats_temp";
$inf_droptable_[6] = "pd_stats_month";
$inf_droptable_[7] = "pd_stats_settings";

?>