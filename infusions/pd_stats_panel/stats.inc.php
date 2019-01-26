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

if (!defined("IN_FUSION")) { die("Access Denied"); }
//Settings laden
$dset = dbarray(dbquery("SELECT * FROM ".PD_STATS_SETTINGS));

//Variabeln deklarieren
$zeit = time();
$zeit_cookie = $zeit + $dset['reload'];
$hua = (isset($_SERVER['HTTP_USER_AGENT']) ? stripinput($_SERVER['HTTP_USER_AGENT']) : "");
$uip = USER_IP;
$referer = (isset($_SERVER['HTTP_REFERER']) ? stripinput($_SERVER['HTTP_REFERER']) : "");
$host = (isset($_SERVER['HTTP_HOST']) ? stripinput($_SERVER['HTTP_HOST']) : "");
$heute_tag = date("d");
$heute_monat = date("m");
$heute_jahr = date("Y");

//FUSION Standard Funktion -- geändert!!!
$name = (iMEMBER ? $userdata['user_id'] : "0");
$result = dbquery("SELECT * From ".DB_PREFIX."online WHERE online_user=".$name." AND online_ip='".USER_IP."'");
if (dbrows($result)) {
	$result = dbquery("UPDATE ".DB_PREFIX."online SET online_lastactive='".$zeit."' WHERE online_user=".$name." AND online_ip='".USER_IP."'");
} else {
	$result = dbquery("INSERT INTO ".DB_PREFIX."online SET online_user='".$name."', online_ip='".USER_IP."', online_lastactive='".$zeit."'");
}
$result = dbquery("DELETE From ".DB_PREFIX."online WHERE online_lastactive<".($zeit-60));

//User Auswertung START
if (!isset($_COOKIE[COOKIE_PREFIX.'pd_stats_visited'])) {
	include INFUSIONS."pd_stats_panel/robots.php";
	if(forum_func_bots(USER_IP,$hua) != "") {
		//ist ein Bot
	} else {
		//Counter erhöhen
		$result=dbquery("INSERT INTO ".PD_STATS_TEMP." (timestamp) VALUES ('".$zeit."')");
		$result=dbquery("UPDATE ".PD_STATS_COUNTER." SET standing=standing+1");
		//Cookie setzen
		setcookie(COOKIE_PREFIX.'pd_stats_visited', 'yes', $zeit_cookie, '/', '', '0');
		//Browser bestimmen
		if( preg_match("(opera) ([0-9]{1,2}.[0-9]{1,3}){0,1}",$hua,$regs) || preg_match("(opera/)([0-9]{1,2}.[0-9]{1,3}){0,1}",$hua,$regs)) {
			$browser = "Opera $regs[2]";
		} else if( preg_match("(msie) ([0-9]{1,2}.[0-9]{1,3})",$hua,$regs) ) {
			$browser = "MSIE $regs[2]";
		} else if( preg_match("(konqueror)/([0-9]{1,2}.[0-9]{1,3})",$hua,$regs) ) {
			$browser = "Konqueror $regs[2]";
		} else if( preg_match("(lynx)/([0-9]{1,2}.[0-9]{1,2}.[0-9]{1,2})",$hua,$regs) ) {
			$browser = "Lynx $regs[2]";
		} else if( preg_match("(firefox)/([0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3})",$hua,$regs) ) {
			$browser = "Firefox $regs[2]";
		} else if( preg_match("(netscape6)/(6.[0-9]{1,3})",$hua,$regs) ) {
			$browser = "Netscape $regs[2]";
		} else if( preg_match("mozilla/5",$hua) ) {
			$browser = "Mozilla 5";
		} else if( preg_match("(mozilla)/([0-9]{1,2}.[0-9]{1,3})",$hua,$regs) ) {
			$browser = "Netscape $regs[2]";
		} else if( preg_match("w3m",$hua) ) {
			$browser = "w3m";
		} else if( preg_match("WebTV",$hua) ) {
			$browser = "WebTV";
		} else if( preg_match("Googlebot",$hua) ) {
			$browser = "Google Bot";
		} else {
			$browser = "unknown";
		}
		//OS bestimmen
		if (preg_match("Win", $hua)) {
			$os = "Windows";
		} elseif( (preg_match("Mac", $hua) ) || ( preg_match("PPC", $hua)) ) {
			$os = "Mac";
		} elseif(preg_match("Linux", $hua) ) {
			$os = "Linux";
		} elseif(preg_match("FreeBSD", $hua) ) {
			$os = "FreeBSD";
		} elseif(preg_match("SunOS", $hua) ) {
			$os = "SunOS";
		} elseif(preg_match("IRIX", $hua) ) {
			$os = "IRIX";
		} elseif(preg_match("BeOS", $hua) ) {
			$os = "BeOS";
		} elseif(preg_match("OS/2", $hua) ) {
			$os = "OS/2";
		} elseif(preg_match("AIX", $hua) ) {
			$os = "AIX";
		} else {
			$os = "Other";
		}
		//Referer bestimmen
		if ($referer != "") {
			$url_p = parse_url($referer);
			$url = ($url_p != "" ? $url_p['host'] : "");
		} else {
			$url = "";
		}
		$referer = 'http://'.$url;
		//Falls Referer nach Bearbeitung leer, nutze $host
		if ($referer == 'http://') $referer = "http://".$host;
		//DB Querys
		//Browser
		if (!dbrows(dbquery("SELECT * FROM ".PD_STATS_BROWSER." WHERE browser='".$browser."'"))) {
			$insert_browser = dbquery("INSERT INTO ".PD_STATS_BROWSER." VALUES('".$browser."', '1')");
		} else {
			$update_browser = dbquery("UPDATE ".PD_STATS_BROWSER." SET stat=stat+1 WHERE browser='".$browser."'");
		}
		//Betriebssystem
		if (!dbrows(dbquery("SELECT * FROM ".PD_STATS_OS." WHERE os='".$os."'"))) {
			$insert_os = dbquery("INSERT INTO ".PD_STATS_OS." VALUES('".$os."', '1')");
		} else {
			$update_os = dbquery("UPDATE ".PD_STATS_OS." SET stat=stat+1 WHERE os='".$os."'");
		}
		//Referer
		if (!dbrows(dbquery("SELECT * FROM ".PD_STATS_REFERER." WHERE referer='".$referer."'"))) {
			$insert_referer = dbquery("INSERT INTO ".PD_STATS_REFERER." VALUES('".$referer."', '1');");
		} else {
			$update_referer = dbquery("UPDATE ".PD_STATS_REFERER." SET stat=stat+1 WHERE referer='".$referer."'");
		}
	}
}
//DB auslesen
//Neustes Mitglied
$data = dbarray(dbquery("SELECT user_id,user_name From ".DB_PREFIX."users WHERE user_status='0' ORDER BY user_joined DESC LIMIT 0,1"));
define("PD_STATS_NEW", "<a href='".BASEDIR."profile.php?lookup=".$data['user_id']."' class='side'>".$data['user_name']."</a>");
//Unaktivierter Mitglieder
define("PD_STATS_UNAKTIV", dbcount("(user_id)", DB_PREFIX."users", "user_status='2'"));
//Gäste ONLINE
$result_gaeste = dbquery("SELECT * From ".DB_PREFIX."online WHERE online_user='0'");
define("PD_STATS_GAESTE", dbrows($result_gaeste));
//Mitglieder ONLINE
$result_members = dbquery("SELECT do.*,du.* From ".DB_PREFIX."online do
INNER JOIN ".DB_PREFIX."users du ON du.user_id=do.online_user
WHERE online_user!='0' ORDER BY user_name");
if (dbrows($result_members)) {
	$z = 1;
	$memon="";
	while($om = dbarray($result_members)) {
		if($om['user_level'] != 101 OR $om['user_groups']!='') {
			$special = '';
			if($om['user_level']==102) $special = "<b>".$locale['pds213']."</b>".$locale['user2'];
			if($om['user_level']==103) $special = "<b>".$locale['pds213']."</b>".$locale['user3'];
			if ($om['user_groups']) {
				if($special) $special = $special."<br>";
				$user_groups = (strpos($om['user_groups'], ".") == 0 ? explode(".", substr($om['user_groups'], 1)) : explode(".", $om['user_groups']));
				if(count($user_groups) > 1) { $special = $special."<b>".$locale['pds215']."</b><br />"; } else { $special = $special."<b>".$locale['pds214']."</b>"; }
				for ($i = 0;$i < count($user_groups);$i++) {
					$special = $special.getgroupname($user_groups[$i]);
					if ($i != (count($user_groups)-1)) $special = $special.", ";
				}
			}
			$memon = $memon.'<a href="'.BASEDIR.'profile.php?lookup='.$data['user_id'].'" class="side">'.$om['user_name'].'</a>';
		} else {
			$memon = $memon." <a href='".BASEDIR."profile.php?lookup=".$om['user_id']."' class='side'>".$om['user_name']."</a>";
		}
	}
	if ($z != dbrows($result_members)) { $memon = $memon.", "; }
	$z++;
} else {
	$memon = $locale['pds216']."<br>\n";
}
define("PD_STATS_MEMBERS", $memon);
//Registrierte Mitglieder
define("PD_STATS_REGISTER", dbcount("(user_id)", DB_PREFIX."users", "user_status<='1'"));
//Besucher HEUTE
$result_heute=dbquery("SELECT * FROM ".PD_STATS_TEMP." WHERE timestamp>='".mktime(0, 0, 0, $heute_monat, $heute_tag, $heute_jahr)."'");
define("PD_STATS_HEUTE", dbrows($result_heute));
//Besucher ONLINE
$result_online = dbquery("SELECT * From ".DB_PREFIX."online WHERE online_lastactive>".(time()-60));
define("PD_STATS_ONLINE", dbrows($result_online));
//Besucher MAXONLINE
$data = dbarray(dbquery("SELECT * FROM ".PD_STATS_COUNTER));
if($data['maxonline'] < PD_STATS_ONLINE) {
	$result = dbquery("UPDATE ".PD_STATS_COUNTER." SET maxonline='".PD_STATS_ONLINE."'");
	define("PD_STATS_MAXONLINE", PD_STATS_ONLINE);
} else {
	define("PD_STATS_MAXONLINE", $data['maxonline']);
}
//Besucher GESTERN
$result_gestern=dbquery("SELECT * FROM ".PD_STATS_TEMP." WHERE timestamp>='".mktime(0, 0, 0, $heute_monat, ($heute_tag-1), $heute_jahr)."' AND timestamp<='".mktime(23, 59, 59, $heute_monat, ($heute_tag-1), $heute_jahr)."'");
define("PD_STATS_GESTERN", dbrows($result_gestern));
//Besucher MAXDAY
$data = dbarray(dbquery("SELECT * FROM ".PD_STATS_COUNTER));
if($data['maxday'] == 0 OR $data['maxday'] < PD_STATS_HEUTE) {
	$result = dbquery("UPDATE ".PD_STATS_COUNTER." SET maxday='".PD_STATS_HEUTE."'");
	define("PD_STATS_MAXDAY", PD_STATS_HEUTE);
}else {
	if($data['maxday'] < PD_STATS_GESTERN) {
		$result = dbquery("UPDATE ".PD_STATS_COUNTER." SET maxday='".PD_STATS_GESTERN."'");
		define("PD_STATS_MAXDAY", PD_STATS_GESTERN);
	} else {
		define("PD_STATS_MAXDAY", $data['maxday']);
	}
}
//Besucher MONAT
$result_monat=dbquery("SELECT * FROM ".PD_STATS_TEMP." WHERE timestamp>='".mktime(0, 0, 0, $heute_monat, 1, $heute_jahr)."'");
define("PD_STATS_MONAT", dbrows($result_monat));
$sql = dbquery("SELECT * FROM ".PD_STATS_MONTH." WHERE year='".$heute_jahr."' AND month='".$heute_monat."'");
if(!dbrows($sql)) {
	$insert = dbquery("INSERT INTO ".PD_STATS_MONTH." (month, year, stat) VALUES ('".$heute_monat."', '".$heute_jahr."', '".PD_STATS_HEUTE."')");
} else {
	$update = dbquery("UPDATE ".PD_STATS_MONTH." SET stat='".PD_STATS_MONAT."' WHERE month='".$heute_monat."' AND year='".$heute_jahr."'");
}
//Besucher GESAMT
$data = dbarray(dbquery("SELECT * FROM ".PD_STATS_COUNTER));
define("PD_STATS_GESAMT", $data['standing']);
//Besucher letzten 24h
if (file_exists(THEME."images/poll.gif")) {
	$pfad = THEME."images/poll.gif";
} else {
	$pfad = INFUSIONS."pd_stats_panel/poll.gif";
}
$result_last24h_gesamt=dbquery("SELECT id FROM ".PD_STATS_TEMP." WHERE timestamp>'".($zeit-86400)."' AND timestamp<='".$zeit."'");
$gesamt = dbrows($result_last24h_gesamt);
if($gesamt) {
	$last24h = '<table cellspacing="0" cellpadding="0"><tr>';
	for($a=23; $a>=0; $a--) {
		$last24h = $last24h."<td align='center' valign='bottom'>";
		$result_last24h=dbquery("SELECT id FROM ".PD_STATS_TEMP." WHERE `timestamp`>'".($zeit-(($a+1)*3600))."' AND `timestamp`<='".($zeit-($a*3600))."'");
		$hoehe = round(((100/$gesamt)*dbrows($result_last24h))+1);
		$last24h = $last24h."<img src='".$pfad."' height='".$hoehe."px' width='6px'><br></td>";
	}
	$last24h = $last24h."</tr></table>";
	define("PD_STATS_LAST_24H", $last24h);
} else {
	define("PD_STATS_LAST_24H", $locale['pds217']);
}
// Alte Temp DB Einträge löschen
$result = dbquery("DELETE FROM ".PD_STATS_TEMP." WHERE timestamp<'".mktime(0, 0, 0, $heute_monat, 1, $heute_jahr)."'");
?>
