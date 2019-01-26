<?php
if (!defined("IN_FUSION")) { die("Access Denied"); }

define("THEME_WIDTH", "900");
define("THEME_BULLET", "<img src='".THEME."images/bulletb.gif' alt='' style='border:0' />");

require_once INCLUDES."theme_functions_include.php";

function render_page($license=false) {

	global $settings, $main_style,$locale,$aidlink,$userdata;


//Header
	echo "<table align='center' cellspacing='0' cellpadding='0' border='0' width='".THEME_WIDTH."'>\n<tr>\n";
	echo "<td>\n";
	echo "<table cellpadding='0' cellspacing='0' width='80%'>\n<tr>\n";
	echo "<td class='header'>\n";
	echo "</tr>\n</table>\n";
	echo "</td>\n</tr>\n</table>\n";

	

//Menu

	echo "<table align='right' cellpadding='0' cellspacing='0' border='0' width='100%'>\n
	<td>
	<div id='container'>
	<div id='sub-nav'>
	<ul>
		".showsublinks('')."
	</ul>
	</div>
	</div>
	</td>
	</table>\n";

	//Content
	echo "<table cellpadding='0' cellspacing='0' align='center' width='".THEME_WIDTH."' class='$main_style'>\n<tr>\n";
	if (LEFT) { echo "<td class='side-border-left' valign='top'>".LEFT."</td>"; }
	echo "<td class='main-bg' valign='top'>".U_CENTER.CONTENT.L_CENTER."</td>";
        if (RIGHT) { echo "<td class='side-border-right' valign='top'>".RIGHT."</td>"; }
	echo "</tr>\n</table>\n";

        //Footer
echo "</tr>\n</table>\n";
	echo "<table cellspacing='0' cellpadding='0' width='".THEME_WIDTH."' class=' center'>\n<tr>\n";
	echo "<tr><td><table border='0' cellpadding='0' cellspacing='0' width='100%' height='30'>";
	echo "<tr><td class='footer' valign='middle' width='100%'>";
	
echo "<p align='center' style='margin-top: 4px; margin-right: 49px; color:#fff;'>";
	echo "Powered by <a href='http://oktibor.com' target='_blank' style='color:#fff'>oktibor.com</a>";
	echo "</p>";
	echo "</td>";
	echo "
</tr></table></center></table></table></table>\n";



	

}
function render_news($subject, $news, $info) {

echo "<table cellpadding='0' cellspacing='0' width='100%'>
<tr>
<td class='capmain'>$subject</td>
</tr>
<tr>
<td class='main-body'>$news</td>
</tr>
<tr>
<td align='left' class='news-footer'>\n";
echo " Pridal: <a href='profile.php?lookup=".$info['user_id']."'>".$info['user_name']."</a>";
echo ", <a href='news.php?readmore=".$info['news_id']."'>Komentáre (".$info['news_comments'].")</a>";
echo ", Preèítané ".$info['news_reads']."x";
echo ", <a href='news.php?readmore=".$info['news_id']."'><img src='".THEME."images/readmore.png'align='right' border='0'></a>";
echo "</tr>
</table>\n";


}

function render_article($subject, $article, $info) {
	
	echo "<table cellpadding='0' cellspacing='0' width='100%'>\n<tr>\n";
	echo "<td class='capmain'>".$subject."</td>\n";
	echo "</tr>\n<tr>\n";
	echo "<td class='main-body'>".($info['article_breaks'] == "y" ? nl2br($article) : $article)."</td>\n";
	echo "</tr>\n<tr>\n";
	echo "<td align='center' class='news-footer'>\n";
	echo articleposter($info," &middot;").articleopts($info,"&middot;").itemoptions("A",$info['article_id']);
	echo "</td>\n</tr>\n</table>\n";

}

function opentable($title) {

	echo "<table cellpadding='0' cellspacing='0' width='100%'>\n<tr>\n";
	echo "<td class='capmain'>".$title."</td>\n";
	
	echo "</tr>\n<tr>\n";
	echo "<td colspan='3' rowspan='1' class='main-body'>\n";

}

function closetable() {

	echo "</td>\n</tr>\n</table>\n";

}

function openside($title) {

	echo "<table cellpadding='0' cellspacing='0' width='100%'>\n<tr>\n";
	
	echo "<td class='scapmain'>".$title."</td>\n";

	echo "</tr>\n<tr>\n";
	echo "<td colspan='3' rowspan='1' class='side-body'>\n";

}

function closeside() {

	echo "</td>\n</tr>\n</table>\n";

}
?>