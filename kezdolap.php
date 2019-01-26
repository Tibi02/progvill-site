<?php
require_once "maincore.php";
require_once THEMES."templates/header.php";

add_to_title(" - Kezdőlap");

opentable("Szolgáltatásaink");

echo "<h2><b>Szolgáltatásaink:</b></h2>";
echo "<ul>";
	echo "<li style='font-size:12px;padding: 3px;'><a href='#ipari_automatizalas'>Ipari automatizálás</a></li>";
	echo "<li style='font-size:12px;padding: 3px;'><a href='#gsm_tavkapcsolas'>GSM távkapcsolás</a></li>";
	echo "<li style='font-size:12px;padding: 3px;'><a href='#frekvenciavaltok'>Frekvenciaváltók beüzemelése</a></li>";
	echo "<li style='font-size:12px;padding: 3px;'><a href='#villanyszereles'>Épület és Hálózati villanyszerelés</a></li>";
	echo "<li style='font-size:12px;padding: 3px;'><a href='#szivattyuk'>Villanymotorok, Szivattyúk üzembe helyezése.</a></li>";
	echo "<li style='font-size:12px;padding: 3px;'><a href='#erintesvedelem'>Érintésvédelem</a></li>";
echo "</ul><br /><hr /><br />";


	echo "<div><h2><a id='ipari_automatizalas'>Ipari automatizálás</a></h2></div>";
		echo "<span style='font-size:13px;'>Telemecanique, Moeller PLC-k telepítése, programozása, módosítása.</span><br /><br />";
		echo "<span style='padding-right: 5px;'><a href='".IMAGES."plc1.jpg' target='_blank'><img src='".IMAGES."plc1.jpg' class='pic' alt='PLC' width='250' height='200' /></a></span>";	
		echo "<span style='padding: 0;'><a href='".IMAGES."plc2.jpg' target='_blank'><img src='".IMAGES."plc2.jpg' class='pic' alt='PLC' width='250' height='200' /></a></span>";
	
	echo "<div style='padding-top: 40px;'><h2><a id='gsm_tavkapcsolas'>GSM távkapcsolás</a></h2></div>";
		echo "<span style='font-size:13px;'>GSM-Távjelző, Távkapcsoló készülékek, Rendszerek kiépítése, Üzembe helyezése, Programozása, Bővítése mikrovezérlőkkel (Szivattyúk, Frekvenciaváltók, Öntözőrendszerek, Mágnes-szelepek, Elektromos-kapuk, Távkapcsolása Ráhívással és- vagy Sms-sel Üzemállapot visszajelzéssel)</span><br /><br />";
		echo "<span style='padding-right: 5px;'><a href='".IMAGES."gsm1.jpg' target='_blank'><img src='".IMAGES."gsm1.jpg' class='pic' alt='PLC' width='250' height='200' /></a></span>";	
		echo "<span style='padding: 0;'><a href='".IMAGES."gsm2gsm1.jpg' target='_blank'><img src='".IMAGES."gsm2.jpg' class='pic' alt='PLC' width='250' height='200' /></a></span>";
		echo "<span style='padding: 0;'><a href='".IMAGES."gsm3.jpg' target='_blank'><img src='".IMAGES."gsm3.jpg' class='pic' alt='PLC' width='250' height='200' /></a></span>";
	
	echo "<div style='padding-top: 40px;'><h2><a id='frekvenciavaltok'>Frekvenciaváltók beüzemelése</a></h2></div>";
		echo "<span style='font-size:13px;'>Frekvenciaváltók üzembe helyezése felprogramozása, adatainak módosítása.</span><br /><br />";	
		echo "<span style='padding-right: 5px;'><a href='".IMAGES."freq1.jpg' target='_blank'><img src='".IMAGES."freq1.jpg' class='pic' alt='PLC' width='250' height='200' /></a></span>";	
		echo "<span style='padding: 0;'><a href='".IMAGES."freq2.jpg' target='_blank'><img src='".IMAGES."freq2.jpg' class='pic' alt='PLC' width='250' height='200' /></a></span>";
		echo "<span style='padding: 0;'><a href='".IMAGES."freq3.jpg' target='_blank'><img src='".IMAGES."freq3.jpg' class='pic' alt='PLC' width='250' height='200' /></a></span>";
	
	echo "<div style='padding-top: 40px;'><h2><a id='villanyszereles'>Épület és Hálózati villanyszerelés</a></h2></div>";
		echo "<span style='font-size:13px;'>Épület és Hálózati villanyszerelés, Háztartási gépek javítása, üzembe helyezése.</span><br /><br />";
		echo "<span style='padding-right: 5px;'><a href='".IMAGES."villanyszereles.jpg' target='_blank'><img src='".IMAGES."villanyszereles.jpg' class='pic' alt='PLC' width='250' height='200' /></a></span>";	
		echo "<span style='padding: 0;'><a href='".IMAGES."villanyszereles1.jpg' target='_blank'><img src='".IMAGES."villanyszereles1.jpg' class='pic' alt='PLC' width='250' height='200' /></a></span>";
		echo "<span style='padding: 0;'><a href='".IMAGES."villanyszereles2.jpg' target='_blank'><img src='".IMAGES."villanyszereles2.jpg' class='pic' alt='PLC' width='250' height='200' /></a></span>";
	
	echo "<div style='padding-top: 40px;'><h2><a id='szivattyuk'>Villanymotorok, Szivattyúk üzembe helyezése.</a></h2></div>";
		echo "<span style='padding: 0;'><a href='".IMAGES."szivattyu.jpg' target='_blank'><img src='".IMAGES."szivattyu.jpg' class='pic' alt='PLC' width='250' height='200' /></a></span>";
echo "<br /><br />";

closetable();




require_once THEMES."templates/footer.php";
?>