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
require_once "../../maincore.php";
require_once BASEDIR."subheader.php";
require_once ADMIN."navigation.php";

if (!checkrights("PDSP") || !defined("iAUTH") || $_GET['aid'] != iAUTH) { redirect(BASEDIR."index.php"); }
include INFUSIONS."pd_stats_panel/infusion_db.php";
if (file_exists(INFUSIONS."infusionsname/locale/".LANGUAGE.".php")) {
	include INFUSIONS."pd_stats_panel/locale/".LANGUAGE.".php";
} else {
	include INFUSIONS."pd_stats_panel/locale/German.php";
}

if(isset($_POST['btnSave'])) {
	$update = dbquery("UPDATE ".PD_STATS_SETTINGS." SET
	reload='".stripinput($_POST['txt_reload'])."',
	special1='".stripinput($_POST['txt_special1'])."',
	special2='".stripinput($_POST['txt_special2'])."',
	pd_stats_gaeste='".stripinput($_POST['optGaeste'])."',
	pd_stats_members='".stripinput($_POST['optMembers'])."',
	pd_stats_register='".stripinput($_POST['optRegister'])."',
	pd_stats_unaktiv='".stripinput($_POST['optUnaktiv'])."',
	pd_stats_new='".stripinput($_POST['optNew'])."',
	pd_stats_heute='".stripinput($_POST['optHeute'])."',
	pd_stats_online='".stripinput($_POST['optOnline'])."',
	pd_stats_maxonline='".stripinput($_POST['optMaxonline'])."',
	pd_stats_maxday='".stripinput($_POST['optMaxday'])."',
	pd_stats_gestern='".stripinput($_POST['optGestern'])."',
	pd_stats_monat='".stripinput($_POST['optMonat'])."',
	pd_stats_gesamt='".stripinput($_POST['optGesamt'])."',
	pd_stats_last_24h='".stripinput($_POST['optLast24H'])."'");
	redirect(FUSION_SELF.$aidlink."&status=0");
}
if (isset($_GET['status']) && $_GET['status'] == 0) echo "<br><div align='center'><b>&Auml;nderungen &uuml;bernommen!</b></div><br>";
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
opentable($locale['pds302']);
echo "	<br>
	<form action='".FUSION_SELF.$aidlink."' method='post'>
	<table cellspacing='1' cellpadding='1' width='90%' align='center'  class='tbl-border'><tr>
	<td class='tbl2' colspan='2'><b>".$locale['pds303']."</b></td>
	</tr><tr>
	<td class='tbl2' width='150'>".$locale['pds304']."</td>
	<td class='tbl1'><input type='text' value='".$dset['reload']."' size='20' maxlength='20' class='textbox' name='txt_reload' />".$locale['pds305']."</td>
	</tr><tr>
	<td class='tbl2' width='150'>".$locale['pds306']."</td>
	<td class='tbl1'><img src='".INFUSIONS."pd_stats_panel/user.png' alt='user' /> ".$locale['pds307']."</td>
	</tr><tr>
	<td class='tbl2' width='150'>".$locale['pds308']."</td>
	<td class='tbl1'><input type='text' value='".$dset['special1']."' size='50' maxlength='200' class='textbox' name='txt_special1' /></td>
	</tr><tr>
	<td class='tbl2' width='150'>".$locale['pds309']."</td>
	<td class='tbl1'><input type='text' value='".$dset['special2']."' size='50' maxlength='200' class='textbox' name='txt_special2' /></td>
	</tr><tr>
	<td class='tbl2' width='150'>PD_STATS_GAESTE</td>
	<td class='tbl1'><input type='radio' ".$check1[1]." value='Y' name='optGaeste' /> ".$locale['pds300']."<br /><input type='radio' ".$check2[1]." value='N' name='optGaeste' /> ".$locale['pds301']."</td>
	</tr><tr>
	<td class='tbl2' width='150'>PD_STATS_MEMBERS</td>
	<td class='tbl1'><input type='radio' ".$check1[2]." value='Y' name='optMembers' /> ".$locale['pds300']."<br /><input type='radio' ".$check2[2]." value='N' name='optMembers' /> ".$locale['pds301']."</td>
	</tr><tr>
	<td class='tbl2' width='150'>PD_STATS_REGISTER</td>
	<td class='tbl1'><input type='radio' ".$check1[3]." value='Y' name='optRegister' /> ".$locale['pds300']."<br /><input type='radio' ".$check2[3]." value='N' name='optRegister' /> ".$locale['pds301']."</td>
	</tr><tr>
	<td class='tbl2' width='150'>PD_STATS_UNAKTIV</td>
	<td class='tbl1'><input type='radio' ".$check1[4]." value='Y' name='optUnaktiv' /> ".$locale['pds300']."<br /><input type='radio' ".$check2[4]." value='N' name='optUnaktiv' /> ".$locale['pds301']."</td>
	</tr><tr>
	<td class='tbl2' width='150'>PD_STATS_NEW</td>
	<td class='tbl1'><input type='radio' ".$check1[5]." value='Y' name='optNew' /> ".$locale['pds300']."<br /><input type='radio' ".$check2[5]." value='N' name='optNew' /> ".$locale['pds301']."</td>
	</tr><tr>
	<td class='tbl2' width='150'>PD_STATS_HEUTE</td>
	<td class='tbl1'><input type='radio' ".$check1[6]." value='Y' name='optHeute' /> ".$locale['pds300']."<br /><input type='radio' ".$check2[6]." value='N' name='optHeute' /> ".$locale['pds301']."</td>
	</tr><tr>
	<td class='tbl2' width='150'>PD_STATS_ONLINE</td>
	<td class='tbl1'><input type='radio' ".$check1[7]." value='Y' name='optOnline' /> ".$locale['pds300']."<br /><input type='radio' ".$check2[7]." value='N' name='optOnline' /> ".$locale['pds301']."</td>
	</tr><tr>
	<td class='tbl2' width='150'>PD_STATS_MAXONLINE</td>
	<td class='tbl1'><input type='radio' ".$check1[8]." value='Y' name='optMaxonline' /> ".$locale['pds300']."<br /><input type='radio' ".$check2[8]." value='N' name='optMaxonline' /> ".$locale['pds301']."</td>
	</tr><tr>
	<td class='tbl2' width='150'>PD_STATS_MAXDAY</td>
	<td class='tbl1'><input type='radio' ".$check1[9]." value='Y' name='optMaxday' /> ".$locale['pds300']."<br /><input type='radio' ".$check2[9]." value='N' name='optMaxday' /> ".$locale['pds301']."</td>
	</tr><tr>
	<td class='tbl2' width='150'>PD_STATS_GESTERN</td>
	<td class='tbl1'><input type='radio' ".$check1[10]." value='Y' name='optGestern' /> ".$locale['pds300']."<br /><input type='radio' ".$check2[10]." value='N' name='optGestern' /> ".$locale['pds301']."</td>
	</tr><tr>
	<td class='tbl2' width='150'>PD_STATS_MONAT</td>
	<td class='tbl1'><input type='radio' ".$check1[11]." value='Y' name='optMonat' /> ".$locale['pds300']."<br /><input type='radio' ".$check2[11]." value='N' name='optMonat' /> ".$locale['pds301']."</td>
	</tr><tr>
	<td class='tbl2' width='150'>PD_STATS_GESAMT</td>
	<td class='tbl1'><input type='radio' ".$check1[12]." value='Y' name='optGesamt' /> ".$locale['pds300']."<br /><input type='radio' ".$check2[12]." value='N' name='optGesamt' /> ".$locale['pds301']."</td>
	</tr><tr>
	<td class='tbl2' width='150'>PD_STATS_LAST_24H</td>
	<td class='tbl1'><input type='radio' ".$check1[13]." value='Y' name='optLast24H' /> ".$locale['pds300']."<br /><input type='radio' ".$check2[13]." value='N' name='optLast24H' /> ".$locale['pds301']."</td>
	</tr><tr>
	<td class='tbl2' colspan='2' align='right'><input type='submit' value='".$locale['pds310']."' class='button' name='btnSave' /></td>
	</tr></table></form><br>";
closetable();
opentable($locale['pds311']);
echo '	<br>
	<table cellspacing="1" cellpadding="1" class="tbl-border" align="center" width="90%"><tr class="tbl2">
	<td align="center" width="150"><b>'.$locale['pds312'].'</b></td>
	<td align="center" width="200"><b>'.$locale['pds313'].'</b></td>
	<td align="center" width="150"><b>'.$locale['pds314'].'</b></td>
	<td align="center"><b>'.$locale['pds315'].'</b></td>
	</tr>
	<tr>
	<td class="tbl2">PD_STATS_GAESTE</td>
	<td class="tbl1">'.PD_STATS_GAESTE.'</td>
	<td class="tbl2">'.$locale['pds200'].'</td>
	<td class="tbl1">'.$locale['pds316'].'</td>
	</tr><tr>
	<td class="tbl2">PD_STATS_MEMBERS</td>
	<td class="tbl1">'.PD_STATS_MEMBERS.'</td>
	<td class="tbl2">'.$locale['pds201'].'</td>
	<td class="tbl1">'.$locale['pds317'].'</td>
	</tr><tr>
	<td class="tbl2">PD_STATS_REGISTER</td>
	<td class="tbl1">'.PD_STATS_REGISTER.'</td>
	<td class="tbl2">'.$locale['pds202'].'</td>
	<td class="tbl1">'.$locale['pds318'].'</td>
	</tr><tr>
	<td class="tbl2">PD_STATS_UNAKTIV</td>
	<td class="tbl1">'.PD_STATS_UNAKTIV.'</td>
	<td class="tbl2">'.$locale['pds203'].'</td>
	<td class="tbl1">'.$locale['pds319'].'</td>
	</tr><tr>
	<td class="tbl2">PD_STATS_NEW</td>
	<td class="tbl1">'.PD_STATS_NEW.'</td>
	<td class="tbl2">'.$locale['pds204'].'</td>
	<td class="tbl1">'.$locale['pds320'].'</td>
	</tr><tr>
	<td class="tbl2">PD_STATS_HEUTE</td>
	<td class="tbl1">'.PD_STATS_HEUTE.'</td>
	<td class="tbl2">'.$locale['pds205'].'</td>
	<td class="tbl1">'.$locale['pds321'].'</td>
	</tr><tr>
	<td class="tbl2">PD_STATS_ONLINE</td>
	<td class="tbl1">'.PD_STATS_ONLINE.'</td>
	<td class="tbl2">'.$locale['pds206'].'</td>
	<td class="tbl1">'.$locale['pds322'].'</td>
	</tr><tr>
	<td class="tbl2">PD_STATS_MAXONLINE</td>
	<td class="tbl1">'.PD_STATS_MAXONLINE.'</td>
	<td class="tbl2">'.$locale['pds207'].'</td>
	<td class="tbl1">'.$locale['pds323'].'</td>
	</tr><tr>
	<td class="tbl2">PD_STATS_MAXDAY</td>
	<td class="tbl1">'.PD_STATS_MAXDAY.'</td>
	<td class="tbl2">'.$locale['pds208'].'</td>
	<td class="tbl1">'.$locale['pds324'].'</td>
	</tr><tr>
	<td class="tbl2">PD_STATS_GESTERN</td>
	<td class="tbl1">'.PD_STATS_GESTERN.'</td>
	<td class="tbl2">'.$locale['pds209'].'</td>
	<td class="tbl1">'.$locale['pds325'].'</td>
	</tr><tr>
	<td class="tbl2">PD_STATS_MONAT</td>
	<td class="tbl1">'.PD_STATS_MONAT.'</td>
	<td class="tbl2">'.$locale['pds210'].'</td>
	<td class="tbl1">'.$locale['pds326'].'</td>
	</tr><tr>
	<td class="tbl2">PD_STATS_GESAMT</td>
	<td class="tbl1">'.PD_STATS_GESAMT.'</td>
	<td class="tbl2">'.$locale['pds211'].'</td>
	<td class="tbl1">'.$locale['pds327'].'</td>
	</tr><tr>
	<td class="tbl2">PD_STATS_LAST_24H</td>
	<td class="tbl1">'.PD_STATS_LAST_24H.'</td>
	<td class="tbl2">'.$locale['pds212'].'</td>
	<td class="tbl1">'.$locale['pds328'].'</td>
	</tr></table><br />';
closetable();
//Monatsübersicht
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
echo "<table width='100%'><tr><td align='right'><small><a href='http://www.pirdani.de'>&copy; pirdani 2005</a> (v6) | <a href='http://www.phpfusion-supportclub.de'>PHPFusion-SupportClub.de</a> (v7) | <a href='http://www.schallah.de'>Schallah.de</a> (New Statistic Page)</small></td></tr></table>";
require_once BASEDIR."footer.php";
?>