<?php
require_once "maincore.php";
require_once THEMES."templates/header.php";
include LOCALE.LOCALESET."photogallery.php";
define("SAFEMODE", @ini_get("safe_mode") ? true : false);

add_to_head("<link rel='stylesheet' href='".INCLUDES."jquery/colorbox/colorbox.css' type='text/css' media='screen' />");
add_to_head("<script type='text/javascript' src='".INCLUDES."jquery/colorbox/jquery.colorbox.js'></script>");
add_to_head("<script type='text/javascript'>\n
	/* <![CDATA[ */\n
		jQuery(document).ready(function(){
			jQuery('a.photogallery_photo_link').colorbox({
				width:'80%', height:'80%', photo:true
			});
		});\n
	/* ]]>*/\n
</script>\n");

opentable("Rólunk");
	echo "<p style='padding: 3px; font-size: 13px;'>Villanyszerelési vállalkozásom tevékenységi köre az elektromos hálózatok kiépítése és felújítása. Kedves ügyfeleink részére hibaelhárítási munkákat is vállalunk, 0-24 órában. 
	A vállalkozás munkáját a gyors, precíz munkavégzés jellemzi az Ön egyéni igényeit figyelembe véve. Szeretjük a kihívásokat, biztos találunk megoldás esetleges elektromos problémájára. Keressen fel minket itt bővebb információért.</p>";
closetable();

$_GET['album_id'] = 2;
define("PHOTODIR", PHOTOS.(!SAFEMODE ? "album_".$_GET['album_id']."/" : ""));
	$result = dbquery(
		"SELECT album_title, album_description, album_thumb, album_access FROM ".DB_PHOTO_ALBUMS." WHERE album_id='".$_GET['album_id']."'"
	);
	if (!dbrows($result)) {
		redirect(FUSION_SELF);
	} else {
		$data = dbarray($result);
		if (!checkgroup($data['album_access'])) {
			redirect(FUSION_SELF);
		} else {
			$rows = dbcount("(photo_id)", DB_PHOTOS, "album_id='".$_GET['album_id']."'");
			if ($rows) {
				opentable("Néhány munkánk");
				if (!isset($_GET['rowstart']) || !isnum($_GET['rowstart'])) { $_GET['rowstart'] = 0; }
				$result = dbquery(
					"SELECT tp.photo_id, tp.photo_title, tp.photo_filename, tp.photo_thumb1, tp.photo_views, tp.photo_datestamp, tp.photo_allow_comments, tp.photo_allow_ratings,
					tu.user_id, tu.user_name, tu.user_status, SUM(tr.rating_vote) AS sum_rating, COUNT(tr.rating_item_id) AS count_votes
					FROM ".DB_PHOTOS." tp
					LEFT JOIN ".DB_USERS." tu ON tp.photo_user=tu.user_id
					LEFT JOIN ".DB_RATINGS." tr ON tr.rating_item_id = tp.photo_id AND tr.rating_type='P'
					WHERE album_id='".$_GET['album_id']."' GROUP BY photo_id ORDER BY photo_order LIMIT ".$_GET['rowstart'].",".$settings['thumbs_per_page']
				);
				$counter = 0;
				
				if ($rows > $settings['thumbs_per_page']) { echo "<div align='center' style='margin-top:5px;'>\n".makepagenav($_GET['rowstart'], $settings['thumbs_per_page'], $rows, 3, FUSION_SELF."?album_id=".$_GET['album_id']."&amp;")."\n</div>\n"; }
				echo "<table cellpadding='0' cellspacing='1' width='90%' align='center'>\n<tr>\n";
				while ($data = dbarray($result)) {
					if ($counter != 0 && ($counter % $settings['thumbs_per_row'] == 0)) { echo "</tr>\n<tr>\n"; }
					echo "<td align='center' valign='top' style='padding-bottom:30px'>\n";
					echo "<strong>".$data['photo_title']."</strong><br /><br />\n<a href='".BASEDIR."photogallery.php?photo_id=".$data['photo_id']."' class='photogallery_album_photo_link'><!--photogallery_album_photo_".$data['photo_id']."-->";
					$photo_file = PHOTODIR.$data['photo_filename'];
					if ($data['photo_thumb1'] && file_exists(PHOTODIR.$data['photo_thumb1'])){
						echo "<a target='_blank' href='".$photo_file."' class='photogallery_photo_link' '>";
						echo "<img src='".PHOTODIR.$data['photo_thumb1']."' alt='".$data['photo_thumb1']."' title='".$locale['431']."' width='250px' height='200px' class='photogallery_album_photo pic' />";
						echo "</a>";
					} else {
						echo $locale['432'];
					}
					echo "</a><br /><br />\n<span class='small photogallery_album_photo_info'> <!--photogallery_album_photo_info-->\n";
					echo $locale['433'].showdate("shortdate", $data['photo_datestamp'])."<br />\n";
					echo $locale['434'].profile_link($data['user_id'], $data['user_name'], $data['user_status'])."<br />\n";
					$photo_comments = dbcount("(comment_id)", DB_COMMENTS, "comment_type='P' AND comment_item_id='".$data['photo_id']."'");
					echo ($data['photo_allow_comments'] ? ($photo_comments == 1 ? $locale['436b'] : $locale['436']).$photo_comments."<br />\n" : "");
					echo ($data['photo_allow_ratings'] ? $locale['437'].($data['count_votes'] > 0 ? str_repeat("<img src='".get_image("star")."' alt='*' style='vertical-align:middle' />", ceil($data['sum_rating'] / $data['count_votes'])) : $locale['438'])."<br />\n" : "");
					echo $locale['435'].$data['photo_views']."</span><br />\n";
					echo "</td>\n";
					$counter++;
				}
				echo "</tr>\n</table>\n";
				closetable();
			}
			if ($rows > $settings['thumbs_per_page']) { echo "<div align='center' style='margin-bottom: 17px; color: #000'>\n".makepagenav($_GET['rowstart'], $settings['thumbs_per_page'], $rows, 3, FUSION_SELF."?album_id=".$_GET['album_id']."&amp;")."\n</div>\n"; }
		}
	}



require_once THEMES."templates/footer.php";
?>