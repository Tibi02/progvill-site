<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright (C) 2002 - 2011 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: fusion_ora_panel.php
| Author: hyperkolyok
| Web: www.fusion-mods.hu
|      humet24.fusion-mods.hu
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

if (file_exists(INFUSIONS."fusion_ora_panel/locale/".$settings['locale'].".php")) {
	include INFUSIONS."fusion_ora_panel/locale/".$settings['locale'].".php";
} else {
	include INFUSIONS."fusion_ora_panel/locale/Hungarian.php";
}

openside($locale['fu_001']);
$betukeszlet = INFUSIONS."fusion_ora_panel/fnt/verdanab.ttf";
$lat = 47.1048;    
$long = 19.3013;   
$offset = 2 ;    // GMT és helyi idõ eltolódás órában
$zenith=90+50/60;
$napkelte = date_sunrise(time(), SUNFUNCS_RET_STRING, $lat, $long, $zenith, $offset);
$napnyugta = date_sunset(time(), SUNFUNCS_RET_STRING, $lat, $long, $zenith, $offset);
$ttakt = showdate("%H",time()).":".showdate("%M",time());

if ($ttakt > $napkelte && $ttakt < $napnyugta) {
	$a_img = imagecreatefrompng(INFUSIONS.'fusion_ora_panel/img/hatter.png');
	$nap = INFUSIONS."fusion_ora_panel/img/nap.png";
	imagettftext($a_img, 7, 0, 7, 139, '0x1187ef', $betukeszlet, $locale['fu_003'].$napnyugta);
} else {
	$a_img = imagecreatefrompng(INFUSIONS.'fusion_ora_panel/img/hatter_este.png');
	$nap = INFUSIONS."fusion_ora_panel/img/hold.png";
	imagettftext($a_img, 7, 0, 7, 139, '0x1187ef', $betukeszlet, $locale['fu_002'].$napkelte);
}

$napkep = imagecreatefrompng($nap);
imagecopyresampled($a_img, $napkep, floor((6 * showdate("%H",time()))), 4, 0, 0, 50, 50, 50, 50);
$felho = INFUSIONS."fusion_ora_panel/img/felho.png";
$felhokep = imagecreatefrompng($felho);

$a_i = 0; 
while ($a_i < 4) {
	$x = rand(0,190); $y = rand(0,55);
	imagecopyresampled($a_img, $felhokep, $x, $y, 0, 0, 50, 23, 50, 23);
	$a_i++;
}

imagettftext($a_img, 20, 0, 5, 130, '0x1187ef', $betukeszlet, showdate("%H",time()).":".showdate("%M",time()));
imagettftext($a_img, 10, 0, 7, 108, '0x000000', $betukeszlet, date("Y").".".date("m").".".date("d"));

imagepng($a_img,INFUSIONS.'fusion_ora_panel/temp/idokep.png');
echo "<center><img src='".INFUSIONS."fusion_ora_panel/temp/idokep.png'></center>";
closeside();
?>