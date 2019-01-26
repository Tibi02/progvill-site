<?php
/*---------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+----------------------------------------------------+
| This program is released as free software under the
| Affero GPL license. You can redistribute it and/or
| modify it under the terms of this license which you
| can read by viewing the included agpl.txt or online
| at www.gnu.org/licenses/agpl.html. Removal of this
| copyright header is strictly prohibited without
| written permission from the original author(s).
+----------------------------------------------------+
******************************************************
+----------------------------------------------------+
| Wer ist Online Panel
+----------------------------------------------------+
| Copyright © 2008 Dirk Heise, Ralf Thieme
| http://www.heiseclan.de
| http://www.granade.eu
+---------------------------------------------------*/
/*  Created for PHP-FUSION 6.0
    Robot Function 2005 Petter Paulsson
    http://www.php-fusion.se/
    Gets it´s name from panel administration. */
if (!defined("IN_FUSION")) die("Access Denied");

if (!function_exists("forum_func_bots")) {
	function forum_func_bots($func_bots_ip='',$func_bots_browser='') {
		if(preg_match("/^66\.249\.[0-9]{1,3}\.[0-9]{1,3}$/i", $func_bots_ip)) {
			// Googlebot
			if ((preg_match("/^Mediapartners-Google\/[0-9](\.[0-9])*/i", $func_bots_browser) AND preg_match("/\(\+http:\/\/www\.googlebot\.com\/bot\.html\)$/i", $func_bots_browser)) OR (preg_match("/^Googlebot\/[0-9](\.[0-9])*/i", $func_bots_browser) AND preg_match("/\(\+http:\/\/www\.google\.com\/bot\.html\)$/i", $func_bots_browser)) OR (preg_match("/Googlebot\/[0-9](\.[0-9])*/i", $func_bots_browser) AND preg_match("/http:\/\/www\.google\.com\/bot\.html/i", $func_bots_browser))) {
				$robot = "Googlebot"; // Googlebot
			} elseif(preg_match("/^Mediapartners-Google\/[0-9](\.[0-9])*$/i", $func_bots_browser)) {
				$robot = "Google AdSense"; // Google Adsense
			} else {
				$robot = "Google"; // Google
			}
		} elseif(preg_match("/Yahoo! Slurp/i", $func_bots_browser)) {
			// Yahoo! Slurp
			$robot = "Yahoo! Slurp";
		} elseif(preg_match("/^64\.71\.144\.[0-9]{1,3}$/i", $func_bots_ip)) {
			// JetBot
			$robot = "JetBot";
		} elseif(preg_match("/WebSpider/i", $func_bots_browser)) {
			// WebSpider
			$robot = "WebSpider";
		} elseif(preg_match("/^wwwster\/[0-9](\.[0-9])/i", $func_bots_browser)) {
			// wwwster
			$robot = "wwwster";
		} elseif(preg_match("/Turing Machine/i", $func_bots_browser)) {
			// Turing Machine
			$robot = "Turing Machine";
		} elseif(preg_match("/ZyBorg\/[0-9](\.[0-9])/i", $func_bots_browser)) {
			// Looksmart
			$robot = "Looksmart";
		} elseif(preg_match("/BecomeBot\/[0-9](\.[0-9]{1,2})/i", $func_bots_browser)) {
			// Become
			$robot = "Become";
		} elseif(preg_match("/TurnitinBot\/[0-9](\.[0-9]{1,2})/i", $func_bots_browser)) {
			// TurnitinBot
			$robot = "TurnitinBot";
		} elseif(preg_match("/ConveraCrawler\/[0-9](\.[0-9]{1,2})/i", $func_bots_browser)) {
			// ConveraCrawler
			$robot = "ConveraCrawler";
		} elseif(preg_match("/Gigabot\/[0-9](\.[0-9])/i", $func_bots_browser)) {
			// Gigabot
			$robot = "Gigabot";
		} elseif(preg_match("/msnbot\/[0-9](\.[0-9])/i", $func_bots_browser) OR preg_match("/msnbot-media\/[0-9](\.[0-9])/i", $func_bots_browser)) {
			// msnbot
			$robot = "msnbot";
		} elseif(preg_match("/arachmo/i", $func_bots_browser)) {
			// Arachmo
			$robot = "Arachmo";
		} elseif(preg_match("/Ask/i", $func_bots_browser)) {
			// Ask
			$robot = "Ask";
		} elseif(preg_match("/whatUseek_winona\/[0-9](\.[0-9])/i", $func_bots_browser)) {
			// whatUseek
			$robot = "whatUseek";
		} elseif(preg_match("/exabot\.com/i", $func_bots_browser) OR preg_match("/NG\/[0-9](\.[0-9])/i", $func_bots_browser)) {
			// exalead
			$robot = "exalead";
		} elseif(preg_match("/snap\.com/i", $func_bots_browser)) {
			// snap.com
			$robot = "SNAP";
		} elseif(preg_match("/MJ12bot/i", $func_bots_browser)) {
			// Majestic-12
			$robot = "Majestic-12";
		} elseif(preg_match("/e-SocietyRobot/i", $func_bots_browser)) {
			// e-SocietyRobot
			$robot = "e-SocietyRobot";
		} elseif(preg_match("/Accoona-AI-Agent/i", $func_bots_browser)) {
			// Accoona-AI-Agent
			$robot = "Accoona-AI-Agent";
		} elseif(preg_match("/webbot/i", $func_bots_browser)) {
			// WebBot
			$robot = "WebBot";
		} elseif(preg_match("/voyager\/[0-9](\.[0-9])/i", $func_bots_browser)) {
			// Kosmix
			$robot = "Kosmix";
		} elseif(preg_match("/envolk\/[0-9](\.[0-9])/i", $func_bots_browser)) {
			// Envolk
			$robot = "Envolk";
		} elseif(preg_match("/ichiro\/[0-9](\.[0-9])/i", $func_bots_browser)) {
			// ichiro
			$robot = "ichiro";
		} elseif(preg_match("/libwww-perl\/[0-9](\.[0-9]*)/i", $func_bots_browser)) {
			// Perl Script
			$robot = "Perl Script";
		} elseif(preg_match("/Microsoft URL Control/i", $func_bots_browser)) {
			// Microsoft URL Control
			$robot = "Microsoft URL Control";
		} else {
			$robot = "";
		}
		return $robot;
	}
}
?>