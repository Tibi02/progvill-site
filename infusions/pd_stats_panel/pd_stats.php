<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright &copy; 2002 - 2008 Nick Jones
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
require_once "../../maincore.php";

include INFUSIONS."pd_stats_panel/infusion_db.php";
include INFUSIONS."pd_stats_panel/locale/English.php";

$tpl->add_to_title($locale['pds102']);
require_once BASEDIR."subheader.php";
define("LEFT_OFF",false);  // true = Panels nicht anzeigen; false=Panels anzeigen
require_once BASEDIR."side_left.php";

require INFUSIONS."pd_stats_panel/stats.inc.php";
if($dset['pd_stats_gaeste']=='Y') {
	$check1[1] = "checked='checked'";
	$check2[1] = "";
} else {
	$check1[1] = "";
	$check2[1] = "checked='checked'";
}
if($dset['pd_stats_members']=='Y') {
	$check1[2] = "checked='checked'";
	$check2[2] = "";
} else {
	$check1[2] = "";
	$check2[2] = "checked='checked'";
}
if($dset['pd_stats_register']=='Y') {
	$check1[3] = "checked='checked'";
	$check2[3] = "";
} else {
	$check1[3] = "";
	$check2[3] = "checked='checked'";
}
if($dset['pd_stats_unaktiv']=='Y') {
	$check1[4] = "checked='checked'";
	$check2[4] = "";
} else {
	$check1[4] = "";
	$check2[4] = "checked='checked'";
}
if($dset['pd_stats_new']=='Y') {
	$check1[5] = "checked='checked'";
	$check2[5] = "";
} else {
	$check1[5] = "";
	$check2[5] = "checked='checked'";
}
if($dset['pd_stats_heute']=='Y') {
	$check1[6] = "checked='checked'";
	$check2[6] = "";
} else {
	$check1[6] = "";
	$check2[6] = "checked='checked'";
}
if($dset['pd_stats_online']=='Y') {
	$check1[7] = "checked='checked'";
	$check2[7] = "";
} else {
	$check1[7] = "";
	$check2[7] = "checked='checked'";
}
if($dset['pd_stats_maxonline']=='Y') {
	$check1[8] = "checked='checked'";
	$check2[8] = "";
} else {
	$check1[8] = "";
	$check2[8] = "checked='checked'";
}
if($dset['pd_stats_maxday']=='Y') {
	$check1[9] = "checked='checked'";
	$check2[9] = "";
} else {
	$check1[9] = "";
	$check2[9] = "checked='checked'";
}
if($dset['pd_stats_gestern']=='Y') {
	$check1[10] = "checked='checked'";
	$check2[10] = "";
} else {
	$check1[10] = "";
	$check2[10] = "checked='checked'";
}
if($dset['pd_stats_monat']=='Y') {
	$check1[11] = "checked='checked'";
	$check2[11] = "";
} else {
	$check1[11] = "";
	$check2[11] = "checked='checked'";
}
if($dset['pd_stats_gesamt']=='Y') {
	$check1[12] = "checked='checked'";
	$check2[12] = "";
} else {
	$check1[12] = "";
	$check2[12] = "checked='checked'";
}
if($dset['pd_stats_last_24h']=='Y') {
	$check1[13] = "checked='checked'";
	$check2[13] = "";
} else {
	$check1[13] = "";
	$check2[13] = "checked='checked'";
}

opentable($locale['pds101']);
echo '<br><table cellspacing="1" cellpadding="1" class="tbl-border" align="center" width="90%">';
if($dset['pd_stats_gaeste']=='Y') {
	echo "<tr>
        <td class='tbl2'>".$locale['pds200']."</td>
        <td class='tbl1'>".PD_STATS_GAESTE."</td>
        <td class='tbl1'>".$locale['pds316']."</td>
        </tr>";
}
if($dset['pd_stats_members']=='Y') {
  	echo "<tr>
        <td class='tbl2'>".$locale['pds201']."</td>
        <td class='tbl1'>".PD_STATS_MEMBERS."</td>
        <td class='tbl1'>".$locale['pds317']."</td>
        </tr>";
}
if($dset['pd_stats_register']=='Y') {
  	echo "<tr>
        <td class='tbl2'>".$locale['pds202']."</td>
        <td class='tbl1'>".PD_STATS_REGISTER."</td>
        <td class='tbl1'>".$locale['pds318']."</td>
        </tr>";
}
if($dset['pd_stats_unaktiv']=='Y') {
  	echo "<tr>
        <td class='tbl2'>".$locale['pds203']."</td>
        <td class='tbl1'>".PD_STATS_UNAKTIV."</td>
        <td class='tbl1'>".$locale['pds319']."</td>
        </tr>";
}        
if($dset['pd_stats_new']=='Y') {
  	echo "<tr>
        <td class='tbl2'>".$locale['pds204']."</td>
        <td class='tbl1'>".PD_STATS_NEW."</td>
        <td class='tbl1'>".$locale['pds320']."</td>
        </tr>";
} 
if($dset['pd_stats_heute']=='Y') {
  	echo "<tr>
        <td class='tbl2'>".$locale['pds205']."</td>
        <td class='tbl1'>".PD_STATS_HEUTE."</td>
        <td class='tbl1'>".$locale['pds321']."</td>
        </tr>";
}  
if($dset['pd_stats_online']=='Y') {
  	echo "<tr>
        <td class='tbl2'>".$locale['pds206']."</td>
        <td class='tbl1'>".PD_STATS_ONLINE."</td>
        <td class='tbl1'>".$locale['pds322']."</td>
        </tr>";
} 
if($dset['pd_stats_maxonline']=='Y') {
  	echo "<tr>
        <td class='tbl2'>".$locale['pds207']."</td>
        <td class='tbl1'>".PD_STATS_MAXONLINE."</td>
        <td class='tbl1'>".$locale['pds323']."</td>
        </tr>";
}   
if($dset['pd_stats_maxday']=='Y') {
  	echo "<tr>
        <td class='tbl2'>".$locale['pds208']."</td>
        <td class='tbl1'>".PD_STATS_MAXDAY."</td>
        <td class='tbl1'>".$locale['pds324']."</td>
        </tr>";
} 
if($dset['pd_stats_gestern']=='Y') {
  	echo "<tr>
        <td class='tbl2'>".$locale['pds209']."</td>
        <td class='tbl1'>".PD_STATS_GESTERN."</td>
        <td class='tbl1'>".$locale['pds325']."</td>
        </tr>";
} 
if($dset['pd_stats_monat']=='Y') {
  	echo "<tr>
        <td class='tbl2'>".$locale['pds210']."</td>
        <td class='tbl1'>".PD_STATS_MONAT."</td>
        <td class='tbl1'>".$locale['pds326']."</td>
        </tr>";
}  
if($dset['pd_stats_gesamt']=='Y') {
  	echo "<tr>
        <td class='tbl2'>".$locale['pds211']."</td>
        <td class='tbl1'>".PD_STATS_GESAMT."</td>
        <td class='tbl1'>".$locale['pds327']."</td>
        </tr>";
}   
if($dset['pd_stats_last_24h']=='Y') {
  	echo "<tr>
        <td class='tbl2'>".$locale['pds212']."</td>
        <td class='tbl1'>".PD_STATS_LAST_24H."</td>
        <td class='tbl1'>".$locale['pds328']."</td>
        </tr>";
}                                                      	  
echo '</table><br />';
closetable();

//Monats&uuml;bersicht
opentable($locale['pds329']);
$sql = dbquery("SELECT * FROM ".PD_STATS_MONTH." ORDER BY year DESC, month DESC");
echo '	<table align="center" cellspacing="1" cellpadding="3" width="90%" class="tbl-border">
	<tr class="tbl2"><td width="50"><b>'.$locale['pds333'].'</b></td><td width="50"><b>'.$locale['pds334'].'</b></td><td><b>'.$locale['pds335'].'</b></td></tr>';
while($data = dbarray($sql)) {
	echo '<tr class="tbl1"><td>'.$data['month'].'</td><td>'.$data['year'].'</td><td>'.$data['stat'].'</td></tr>';
}
echo "</table><br />";
closetable();

//Browser
opentable($locale['pds330']);
$sql = dbquery("SELECT * FROM ".PD_STATS_BROWSER." ORDER BY stat");
echo '	<table align="center" cellspacing="1" cellpadding="3" width="90%" class="tbl-border">
	<tr class="tbl2"><td width="50"><b>'.$locale['pds336'].'</b></td><td><b>'.$locale['pds337'].'</b></td></tr>';
while($data = dbarray($sql)) {
	echo '<tr class="tbl1"><td>'.$data['stat'].'</td><td>'.$data['browser'].'</td></tr>';
}
echo "</table><br />";
closetable();

//Betriebssystem
opentable($locale['pds331']);
$sql = dbquery("SELECT * FROM ".PD_STATS_OS." ORDER BY stat");
echo '	<table align="center" cellspacing="1" cellpadding="3" width="90%" class="tbl-border">
	<tr class="tbl2"><td width="50"><b>'.$locale['pds336'].'</b></td><td><b>'.$locale['pds338'].'</b></td></tr>';
while($data = dbarray($sql)) {
	echo '<tr class="tbl1"><td>'.$data['stat'].'</td><td>'.$data['os'].'</td></tr>';
}
echo '</table><br />';
closetable();

//Referer
opentable($locale['pds332']);
$sql = dbquery("SELECT * FROM ".PD_STATS_REFERER." ORDER BY stat");
echo '	<table align="center" cellspacing="1" cellpadding="3" width="90%" class="tbl-border">
	<tr class="tbl2"><td width="50"><b>'.$locale['pds336'].'</b></td><td><b>'.$locale['pds339'].'</b></td></tr>';
while($data = dbarray($sql)) {
	echo '<tr class="tbl1"><td>'.$data['stat'].'</td><td><a href="'.$data['referer'].'">'.$data['referer'].'</a></td></tr>';
}
echo '</table><br />';
closetable();
echo "<table width='100%'><tr><td align='right'><small><a href='http://www.pirdani.de'>&copy; pirdani 2005</a> (v6) | <a href='http://www.phpfusion-supportclub.de'>PHPFusion-SupportClub.de</a> (v7) | <a href='http://www.schallah.de'>Schallah.de</a> (separate statistic page)</small></td></tr></table>";

define("RIGHT_OFF",false); // true = Panels nicht anzeigen; false = Panels anzeigen
require_once BASEDIR."side_right.php";
require_once BASEDIR."footer.php";
?>