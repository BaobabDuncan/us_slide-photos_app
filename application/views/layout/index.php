<?php
defined( '_JEXEC' ) or die( 'Restricted index access' );
define( 'TEMPLATEPATH', dirname(__FILE__) );
/*
-----------------------------------------
Political - March 2010 Shape 5 Club Template
-----------------------------------------
Site:      www.shape5.com
Email:     contact@shape5.com
@license:  Copyrighted Commercial Software
@copyright (C) 2010 Shape 5

*/
// Template Configuration    

	$s5_menu = $this->params->get ("xml_s5_menu"); 
	$s5_effects = $this->params->get ("xml_s5_jsmenu"); 
	$s5_widthtype = $this->params->get ("xml_s5_widthtype");
	$s5_body_width = $this->params->get ("xml_s5_body_width");
	$s5_left_width = $this->params->get ("xml_s5_left_width");
	$s5_right_width = $this->params->get ("xml_s5_right_width");
	$s5_inset_width = $this->params->get ("xml_s5_inset_width");
	$s5_show_frontpage = $this->params->get ("xml_s5_frontpage");  
	$s5_showdate = $this->params->get ("xml_s5_showdate");	
	$s5_highlightcolor = $this->params->get ("xml_s5_highlightcolor");	
	$s5_abovevod = $this->params->get ("xml_s5_abovevod");
	$s5_headerback  = $this->params->get ("xml_s5_headerback");
	$s5_backimage  = $this->params->get ("xml_s5_backimage");	
	$s5_backcolor = $this->params->get ("xml_s5_backcolor");
	
	$s5_donate = $this->params->get ("xml_s5_donate");
	$s5_besocial  = $this->params->get ("xml_s5_besocial");	
	$s5_tweetwithus  = $this->params->get ("xml_s5_tweetwithus");	
	$s5_tweetwithusl  = $this->params->get ("xml_s5_tweetwithusl");	
	$s5_rss  = $this->params->get ("xml_s5_rss");	
	$s5_rssl  = $this->params->get ("xml_s5_rssl");
	$s5_tooltips = $this->params->get ("xml_s5_tooltips");
	$s5_lytebox = $this->params->get ("xml_s5_lytebox");
	$s5_urlforSEO = $this->params->get ("xml_s5_seourl");



////////////////////////  DO NOT EDITBELOW THIS  ////////////////////////
// Middle content calculations
if (!$this->countModules("left") && !$this->countModules("right")) { $s5_mainbody_width = (($s5_body_width) - 39); }
else if ($this->countModules("left") && !$this->countModules("right")) { $s5_mainbody_width = $s5_body_width - ($s5_left_width + 52);}
else if (!$this->countModules("left") && $this->countModules("right")) { $s5_mainbody_width = $s5_body_width - ($s5_right_width + 52);}
else if ($this->countModules("left") && $this->countModules("right")) { $s5_mainbody_width = $s5_body_width - (($s5_left_width + $s5_right_width) + 66); }

// above body 1, 2, and 3 collapse calculations 
if ($this->countModules("above_body_1") && $this->countModules("above_body_2")  && $this->countModules("above_body_3")) { $abovebody="33"; }
else if ($this->countModules("above_body_1") && $this->countModules("above_body_2") && !$this->countModules("above_body_3")) { $abovebody="50"; }
else if ($this->countModules("above_body_1") && !$this->countModules("above_body_2") && $this->countModules("above_body_3")) { $abovebody="50"; }
else if (!$this->countModules("above_body_1") && $this->countModules("above_body_2") && $this->countModules("above_body_3")) { $abovebody="50"; }
else if ($this->countModules("above_body_1") && !$this->countModules("above_body_2") && !$this->countModules("above_body_3")) { $abovebody="100"; }
else if (!$this->countModules("above_body_1") && $this->countModules("above_body_2") && !$this->countModules("above_body_3")) { $abovebody="100"; }
else if (!$this->countModules("above_body_1") && !$this->countModules("above_body_2") && $this->countModules("above_body_3")) { $abovebody="100"; }


// advert 1, 2, and 3 collapse calculations 
if ($this->countModules("advert1") && $this->countModules("advert2")  && $this->countModules("advert3")) { $advert="33"; }
else if ($this->countModules("advert1") && $this->countModules("advert2") && !$this->countModules("advert3")) { $advert="50"; }
else if ($this->countModules("advert1") && !$this->countModules("advert2") && $this->countModules("advert3")) { $advert="50"; }
else if (!$this->countModules("advert1") && $this->countModules("advert2") && $this->countModules("advert3")) { $advert="50"; }
else if ($this->countModules("advert1") && !$this->countModules("advert2") && !$this->countModules("advert3")) { $advert="100"; }
else if (!$this->countModules("advert1") && $this->countModules("advert2") && !$this->countModules("advert3")) { $advert="100"; }
else if (!$this->countModules("advert1") && !$this->countModules("advert2") && $this->countModules("advert3")) { $advert="100"; }

// top 1, 2, and 3 collapse calculations 
if ($this->countModules("top_1") && $this->countModules("top_2")  && $this->countModules("top_3")) { $advert2="33"; }
else if ($this->countModules("top_1") && $this->countModules("top_2") && !$this->countModules("top_3")) { $advert2="50"; }
else if ($this->countModules("top_1") && !$this->countModules("top_2") && $this->countModules("top_3")) { $advert2="50"; }
else if (!$this->countModules("top_1") && $this->countModules("top_2") && $this->countModules("top_3")) { $advert2="50"; }
else if ($this->countModules("top_1") && !$this->countModules("top_2") && !$this->countModules("top_3")) { $advert2="100"; }
else if (!$this->countModules("top_1") && $this->countModules("top_2") && !$this->countModules("top_3")) { $advert2="100"; }
else if (!$this->countModules("top_1") && !$this->countModules("top_2") && $this->countModules("top_3")) { $advert2="100"; }

// contentbottom 1, 2, and 3 collapse calculations 
if ($this->countModules("contentbottom1") && $this->countModules("contentbottom2")  && $this->countModules("contentbottom3")) { $contentbottom="33"; }
else if ($this->countModules("contentbottom1") && $this->countModules("contentbottom2") && !$this->countModules("contentbottom3")) { $contentbottom="50"; }
else if ($this->countModules("contentbottom1") && !$this->countModules("contentbottom2") && $this->countModules("contentbottom3")) { $contentbottom="50"; }
else if (!$this->countModules("contentbottom1") && $this->countModules("contentbottom2") && $this->countModules("contentbottom3")) { $contentbottom="50"; }
else if ($this->countModules("contentbottom1") && !$this->countModules("contentbottom2") && !$this->countModules("contentbottom3")) { $contentbottom="100"; }
else if (!$this->countModules("contentbottom1") && $this->countModules("contentbottom2") && !$this->countModules("contentbottom3")) { $contentbottom="100"; }
else if (!$this->countModules("contentbottom1") && !$this->countModules("contentbottom2") && $this->countModules("contentbottom3")) { $contentbottom="100"; }

//user1 and 2 calculations
if ($this->countModules("user1") && $this->countModules("user2")) { $user23="50"; }
else if (!$this->countModules("user1") && $this->countModules("user2")) { $user23="100";  }
else if ($this->countModules("user1") && !$this->countModules("user2")) { $user23="100";  }

//user3, 4, 5, 6, 7 and 8 calculations
if ($this->countModules("user3") && $this->countModules("user4") && $this->countModules("user5")  && $this->countModules("user6") && $this->countModules("user7") && $this->countModules("user8")) { $bottom4="15"; }
else if (!$this->countModules("user3") && $this->countModules("user4") && $this->countModules("user5")  && $this->countModules("user6") && $this->countModules("user7") && $this->countModules("user8")) { $bottom4="20"; }
else if ($this->countModules("user3") && !$this->countModules("user4") && $this->countModules("user5")  && $this->countModules("user6") && $this->countModules("user7") && $this->countModules("user8")) { $bottom4="20"; }
else if ($this->countModules("user3") && $this->countModules("user4") && !$this->countModules("user5")  && $this->countModules("user6") && $this->countModules("user7") && $this->countModules("user8")) { $bottom4="20"; }
else if ($this->countModules("user3") && $this->countModules("user4") && $this->countModules("user5")  && !$this->countModules("user6") && $this->countModules("user7") && $this->countModules("user8")) { $bottom4="20"; }
else if ($this->countModules("user3") && $this->countModules("user4") && $this->countModules("user5")  && $this->countModules("user6") && !$this->countModules("user7") && $this->countModules("user8")) { $bottom4="20"; }
else if ($this->countModules("user3") && $this->countModules("user4") && $this->countModules("user5")  && $this->countModules("user6") && $this->countModules("user7") && !$this->countModules("user8")) { $bottom4="20"; }

else if ($this->countModules("user3") && $this->countModules("user4") && $this->countModules("user5")  && $this->countModules("user6") && !$this->countModules("user7") && !$this->countModules("user8")) { $bottom4="25"; }
else if ($this->countModules("user3") && $this->countModules("user4") && $this->countModules("user5")  && !$this->countModules("user6") && $this->countModules("user7") && !$this->countModules("user8")) { $bottom4="25"; }
else if ($this->countModules("user3") && $this->countModules("user4") && !$this->countModules("user5")  && $this->countModules("user6") && $this->countModules("user7") && !$this->countModules("user8")) { $bottom4="25"; }
else if ($this->countModules("user3") && !$this->countModules("user4") && $this->countModules("user5")  && $this->countModules("user6") && $this->countModules("user7") && !$this->countModules("user8")) { $bottom4="25"; }
else if (!$this->countModules("user3") && $this->countModules("user4") && $this->countModules("user5")  && $this->countModules("user6") && $this->countModules("user7") && !$this->countModules("user8")) { $bottom4="25"; }
else if (!$this->countModules("user3") && !$this->countModules("user4") && $this->countModules("user5")  && $this->countModules("user6") && $this->countModules("user7") && $this->countModules("user8")) { $bottom4="25"; }
else if ($this->countModules("user3") && !$this->countModules("user4") && !$this->countModules("user5")  && $this->countModules("user6") && $this->countModules("user7") && $this->countModules("user8")) { $bottom4="25"; }
else if ($this->countModules("user3") && $this->countModules("user4") && !$this->countModules("user5")  && !$this->countModules("user6") && $this->countModules("user7") && $this->countModules("user8")) { $bottom4="25"; }
else if ($this->countModules("user3") && $this->countModules("user4") && $this->countModules("user5")  && !$this->countModules("user6") && !$this->countModules("user7") && $this->countModules("user8")) { $bottom4="25"; }
else if (!$this->countModules("user3") && $this->countModules("user4") && !$this->countModules("user5")  && $this->countModules("user6") && $this->countModules("user7") && $this->countModules("user8")) { $bottom4="25"; }
else if ($this->countModules("user3") && !$this->countModules("user4") && $this->countModules("user5")  && !$this->countModules("user6") && $this->countModules("user7") && $this->countModules("user8")) { $bottom4="25"; }
else if ($this->countModules("user3") && $this->countModules("user4") && !$this->countModules("user5")  && $this->countModules("user6") && !$this->countModules("user7") && $this->countModules("user8")) { $bottom4="25"; }

else if (!$this->countModules("user3") && $this->countModules("user4") && $this->countModules("user5") && $this->countModules("user6") && !$this->countModules("user7") && !$this->countModules("user8")) { $bottom4="33";  }
else if ($this->countModules("user3") && !$this->countModules("user4") && $this->countModules("user5") && $this->countModules("user6") && !$this->countModules("user7") && !$this->countModules("user8")) { $bottom4="33";  }
else if ($this->countModules("user3") && $this->countModules("user4") && !$this->countModules("user5") && $this->countModules("user6") && !$this->countModules("user7") && !$this->countModules("user8")) { $bottom4="33";  }
else if ($this->countModules("user3") && $this->countModules("user4") && $this->countModules("user5") && !$this->countModules("user6") && !$this->countModules("user7") && !$this->countModules("user8")) { $bottom4="33";  }
else if ($this->countModules("user3") && $this->countModules("user4") && !$this->countModules("user5") && !$this->countModules("user6") && $this->countModules("user7") && !$this->countModules("user8")) { $bottom4="33";  }
else if (!$this->countModules("user3") && $this->countModules("user4") && $this->countModules("user5") && !$this->countModules("user6") && $this->countModules("user7") && !$this->countModules("user8")) { $bottom4="33";  }
else if (!$this->countModules("user3") && !$this->countModules("user4") && $this->countModules("user5") && $this->countModules("user6") && $this->countModules("user7") && !$this->countModules("user8")) { $bottom4="33";  }
else if ($this->countModules("user3") && !$this->countModules("user4") && $this->countModules("user5") && !$this->countModules("user6") && $this->countModules("user7") && !$this->countModules("user8")) { $bottom4="33";  }
else if ($this->countModules("user3") && !$this->countModules("user4") && !$this->countModules("user5") && $this->countModules("user6") && $this->countModules("user7") && !$this->countModules("user8")) { $bottom4="33";  }
else if (!$this->countModules("user3") && !$this->countModules("user4") && !$this->countModules("user5") && $this->countModules("user6") && $this->countModules("user7") && $this->countModules("user8")) { $bottom4="33";  }
else if ($this->countModules("user3") && !$this->countModules("user4") && !$this->countModules("user5") && !$this->countModules("user6") && $this->countModules("user7") && $this->countModules("user8")) { $bottom4="33";  }
else if ($this->countModules("user3") && $this->countModules("user4") && !$this->countModules("user5") && !$this->countModules("user6") && !$this->countModules("user7") && $this->countModules("user8")) { $bottom4="33";  }
else if (!$this->countModules("user3") && $this->countModules("user4") && !$this->countModules("user5") && $this->countModules("user6") && !$this->countModules("user7") && $this->countModules("user8")) { $bottom4="33";  }
else if (!$this->countModules("user3") && !$this->countModules("user4") && $this->countModules("user5") && !$this->countModules("user6") && $this->countModules("user7") && $this->countModules("user8")) { $bottom4="33";  }
else if ($this->countModules("user3") && !$this->countModules("user4") && $this->countModules("user5") && !$this->countModules("user6") && !$this->countModules("user7") && $this->countModules("user8")) { $bottom4="33";  }
else if ($this->countModules("user3") && !$this->countModules("user4") && !$this->countModules("user5") && $this->countModules("user6") && !$this->countModules("user7") && $this->countModules("user8")) { $bottom4="33";  }
else if ($this->countModules("user3") && $this->countModules("user4") && !$this->countModules("user5") && !$this->countModules("user6") && !$this->countModules("user7") && $this->countModules("user8")) { $bottom4="33";  }
else if (!$this->countModules("user3") && $this->countModules("user4") && !$this->countModules("user5") && !$this->countModules("user6") && $this->countModules("user7") && $this->countModules("user8")) { $bottom4="33";  }

else if (!$this->countModules("user3") && !$this->countModules("user4") && $this->countModules("user5") && $this->countModules("user6") && !$this->countModules("user7") && !$this->countModules("user8")) { $bottom4="50"; }
else if ($this->countModules("user3") && !$this->countModules("user4") && !$this->countModules("user5") && $this->countModules("user6") && !$this->countModules("user7") && !$this->countModules("user8")) { $bottom4="50"; }
else if ($this->countModules("user3") && $this->countModules("user4") && !$this->countModules("user5") && !$this->countModules("user6") && !$this->countModules("user7") && !$this->countModules("user8")) { $bottom4="50"; }
else if (!$this->countModules("user3") && $this->countModules("user4") && $this->countModules("user5") && !$this->countModules("user6") && !$this->countModules("user7") && !$this->countModules("user8")) { $bottom4="50"; }
else if (!$this->countModules("user3") && $this->countModules("user4") && !$this->countModules("user5") && $this->countModules("user6") && !$this->countModules("user7") && !$this->countModules("user8")) { $bottom4="50"; }
else if ($this->countModules("user3") && !$this->countModules("user4") && $this->countModules("user5") && !$this->countModules("user6") && !$this->countModules("user7") && !$this->countModules("user8")) { $bottom4="50"; }
else if ($this->countModules("user3") && !$this->countModules("user4") && !$this->countModules("user5") && !$this->countModules("user6") && $this->countModules("user7") && !$this->countModules("user8")) { $bottom4="50"; }
else if (!$this->countModules("user3") && $this->countModules("user4") && !$this->countModules("user5") && !$this->countModules("user6") && $this->countModules("user7") && !$this->countModules("user8")) { $bottom4="50"; }
else if (!$this->countModules("user3") && !$this->countModules("user4") && $this->countModules("user5") && !$this->countModules("user6") && $this->countModules("user7") && !$this->countModules("user8")) { $bottom4="50"; }
else if (!$this->countModules("user3") && !$this->countModules("user4") && !$this->countModules("user5") && $this->countModules("user6") && $this->countModules("user7") && !$this->countModules("user8")) { $bottom4="50"; }
else if (!$this->countModules("user3") && !$this->countModules("user4") && !$this->countModules("user5") && !$this->countModules("user6") && $this->countModules("user7") && $this->countModules("user8")) { $bottom4="50"; }
else if (!$this->countModules("user3") && !$this->countModules("user4") && !$this->countModules("user5") && $this->countModules("user6") && !$this->countModules("user7") && $this->countModules("user8")) { $bottom4="50"; }
else if (!$this->countModules("user3") && !$this->countModules("user4") && $this->countModules("user5") && !$this->countModules("user6") && !$this->countModules("user7") && $this->countModules("user8")) { $bottom4="50"; }
else if (!$this->countModules("user3") && $this->countModules("user4") && !$this->countModules("user5") && !$this->countModules("user6") && !$this->countModules("user7") && $this->countModules("user8")) { $bottom4="50"; }
else if ($this->countModules("user3") && !$this->countModules("user4") && !$this->countModules("user5") && !$this->countModules("user6") && !$this->countModules("user7") && $this->countModules("user8")) { $bottom4="50"; }

else if ($this->countModules("user3") && !$this->countModules("user4") && !$this->countModules("user5") && !$this->countModules("user6") && !$this->countModules("user7") && !$this->countModules("user8")) { $bottom4="100"; }
else if (!$this->countModules("user3") && $this->countModules("user4") && !$this->countModules("user5") && !$this->countModules("user6") && !$this->countModules("user7") && !$this->countModules("user8")) { $bottom4="100"; }
else if (!$this->countModules("user3") && !$this->countModules("user4") && $this->countModules("user5") && !$this->countModules("user6") && !$this->countModules("user7") && !$this->countModules("user8")) { $bottom4="100"; }
else if (!$this->countModules("user3") && !$this->countModules("user4") && !$this->countModules("user5") && $this->countModules("user6") && !$this->countModules("user7") && !$this->countModules("user8")) { $bottom4="100"; }
else if (!$this->countModules("user3") && !$this->countModules("user4") && !$this->countModules("user5") && !$this->countModules("user6") && $this->countModules("user7") && !$this->countModules("user8")) { $bottom4="100"; }
else if (!$this->countModules("user3") && !$this->countModules("user4") && !$this->countModules("user5") && !$this->countModules("user6") && !$this->countModules("user7") && $this->countModules("user8")) { $bottom4="100"; }

if ($s5_effects == "s5") { 
if (($s5_menu  == "1") || ($s5_menu  == "3") || ($s5_menu  == "4")){ 
require( TEMPLATEPATH.DS."s5_no_moo_menu.php");}
else if ($s5_menu  == "2")  {
require( TEMPLATEPATH.DS."s5_suckerfish.php");}
$menu_name = $this->params->get ("xml_menuname");}

if ($s5_effects == "jq") { 
require( TEMPLATEPATH.DS."s5_suckerfish.php");
$menu_name = $this->params->get ("xml_menuname");}

if ($s5_urlforSEO  == ""){ 
$LiveSiteUrl = JURI::root();}
if ($s5_urlforSEO  != ""){ 
$LiveSiteUrl = "$s5_urlforSEO/";}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<jdoc:include type="head" />
<meta http-equiv="Content-Type" content="text/html; <?php echo _ISO; ?>" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<link href="<?php echo $LiveSiteUrl;?>templates/political/css/template.css" rel="stylesheet" type="text/css" media="screen" />
<link href="<?php echo $LiveSiteUrl;?>templates/political/css/editor.css" rel="stylesheet" type="text/css" media="screen" />
<?php 
// Disable lytebox when VM is loaded 
if (JRequest::getVar('option') == 'com_virtuemart' ) { 
 } else { ?>
<?php if ($s5_lytebox  == "yes") { ?>
<link href="<?php echo $LiveSiteUrl;?>templates/political/css/lytebox.css" rel="stylesheet" type="text/css" media="screen" />
<?php } ?>
<?php } ?>
<script type="text/javascript" src="<?php echo $LiveSiteUrl;?>templates/political/js/s5_effects.js"></script>
<link href="<?php echo $LiveSiteUrl;?>templates/political/css/suckerfish.css" rel="stylesheet" type="text/css" media="screen" />
<?php if ($s5_effects == "jq") { ?>
<?php if (($s5_menu  == "1") || ($s5_menu  == "3") || ($s5_menu  == "4")) { ?>
<script type="text/javascript" src="<?php echo $LiveSiteUrl;?>templates/political/js/jquery13.js"></script>
<script type="text/javascript" src="<?php echo $LiveSiteUrl;?>templates/political/js/jquery_no_conflict.js"></script>
<script type="text/javascript">
<?php if ($s5_menu  == "3") { ?>
var s5_fading_menu = "yes";
<?php } ?>
<?php if ($s5_menu  != "3") { ?>
var s5_fading_menu = "no";
<?php } ?>
function s5_jqmainmenu(){
jQuery(" #navlist ul ").css({display: "none"}); // Opera Fix
jQuery(" #s5_navv li").hover(function(){
		jQuery(this).find('ul:first').css({visibility: "visible",display: "none"}).<?php if ($s5_menu  == "1") { ?>show(400)<?php } ?><?php if ($s5_menu  == "3") { ?>fadeIn(500)<?php } ?><?php if ($s5_menu  == "4") { ?>slideDown(400)<?php } ?>;
		},function(){jQuery(this).find('ul:first').css({visibility: "hidden"});	});}
  jQuery(document).ready(function(){ s5_jqmainmenu();});
</script>
<?php } ?>
<?php } ?>
<?php 
// Disable lytebox when VM is loaded 
if (JRequest::getVar('option') == 'com_virtuemart' ) { 
 } else { ?>
<?php if ($s5_lytebox  == "yes") { ?>
<script type="text/javascript" src="<?php echo $LiveSiteUrl;?>templates/political/js/lytebox.js"></script>
<?php } ?>
<?php } ?>



<?php
$br = strtolower($_SERVER['HTTP_USER_AGENT']);
$browser = "other";

if(strrpos($br,"msie 6") > 1) {
$is_ie6 = "yes";} 
else {$is_ie6 = "no";}

if(strrpos($br,"msie 7") > 1) {
$is_ie7 = "yes";} 
else {$is_ie7 = "no";}

if(strrpos($br,"msie 8") > 1) {
$is_ie8 = "yes";} 
else {$is_ie8 = "no";}
?>
	
<?php if ($is_ie6 == "yes" || $is_ie7 == "yes" || $is_ie8 == "yes") { ?>	
<?php if (($s5_menu  == "1") || ($s5_menu  == "2") || ($s5_menu  == "3") || ($s5_menu  == "4")) { ?>
<script type="text/javascript" src="<?php echo $LiveSiteUrl;?>templates/political/js/IEsuckerfish.js"></script>
<?php } ?>	
<?php } ?>	

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-23933551-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<style type="text/css"> 
.s5_wrap {width:<?php echo ($s5_body_width);?><?php echo ($s5_widthtype);?>;}
#s5_abovebody {background:#<?php echo ($s5_abovevod);?>;}
body .s5_h3_first,a.readon, #s5_navv a, ul.menu li#current, ul.menu li#current a, div.s5_accordion_menu_element li#current a{color:#<?php echo ($s5_highlightcolor);?>;}
<?php if ($is_ie7 == "yes") { ?>#s5_twittericon { margin-right:18px;}<?php } ?>
<?php if ($is_ie6 == "yes" || $is_ie7 == "yes" || $is_ie8 == "yes") { ?>#s5_polbr {padding:0 10px;}<?php } ?>
<?php if($this->countModules('right')) { ?>	
#s5_mainbody, #s5_mainbodybread {margin-right:<?php echo ($s5_right_width) + 1;?>px;}
<?php } ?><?php if($this->countModules('left')) { ?>	
#s5_mainbody, #s5_mainbodybread {margin-left:<?php echo ($s5_left_width) + 20;?>px;}
<?php } ?>	
	

</style>
</head>
<body style="background:#<?php echo $s5_backcolor; ?> url(<?php echo $s5_headerback; ?>) no-repeat top center;">
<div style="background:transparent url(<?php echo $s5_backimage; ?>) repeat-x;">
<!-- Header -->

<div id="s5_topbar" style="position:relative;">
	<div class="s5_wrap">
		<?php if ($s5_showdate  == "yes") { ?>
		<div id="s5_date">
			<?php echo date("l");?>&nbsp;<?php echo date("F j, Y");?>
		</div>
		<?php } ?>
		<?php if($this->countModules('subscribe')) { ?>	
		<div id="s5_newsletter">
			<jdoc:include type="modules" name="subscribe" style="round_box" />	
		</div>
		<?php } ?>
		<div style="clear:both;"></div>
	</div>
</div>

<div class="s5_wrap" style="margin-top:-12px;position:relative;">
	<div id="s5_poltl">
		<div id="s5_poltr">
			<div id="s5_poltm"></div>
		</div>
	</div>
	
	<div class="s5_controllermleft">
		<div class="s5_controllermright">
			<div class="s5_controllermiddle">
			
			
				<div id="s5_headergradient">	
					<div id="s5_logo" style="cursor:pointer;" onclick="window.document.location.href='index.php'"></div>	
					<?php if($this->countModules('banner')) { ?>	
						<div id="s5_topright">
							<jdoc:include type="modules" name="banner" style="round_box" />	
						</div>
					<?php } ?>
					<div style="clear:both;"></div>
				</div>
								
				<div id="s5_menuback">
					<div class="s5_backcolor" id="s5_menubar">
					<?php if (($s5_menu  == "1") || ($s5_menu  == "2") || ($s5_menu  == "3") || ($s5_menu  == "4")) { ?>
						<!-- Start Menu -->
							<div id="s5_menu">						
								<div id="s5_navv">
							
											<?php mosShowListMenu($menu_name);	?>
											<?php if ($s5_effects == "s5") { ?>
											<?php if ($s5_menu  == "1") { ?>
												<script type="text/javascript" src="<?php echo $LiveSiteUrl;?>templates/political/js/s5_no_moo_menu.js"></script>																		
											<?php } ?>
											<?php if ($s5_menu  == "3") { ?>
												<script type="text/javascript" src="<?php echo $LiveSiteUrl;?>templates/political/js/s5_fading_no_moo_menu.js"></script>																		
											<?php } ?>	
											<?php if ($s5_menu  == "4") { ?>
												<script type="text/javascript" src="<?php echo $LiveSiteUrl;?>templates/political/js/s5_scroll_down_no_moo_menu.js"></script>																		
											<?php } ?>	
											<?php } ?>	
								</div>	
							</div>
						<!-- End Menu -->
						<div id="s5_buttondrops">
							<?php if($this->countModules('social')) { ?>	
							<div style="float:left;height:35px;" onmouseover="s5besocialover();" onmouseout="s5besocialout();">
								<div id="s5_socialleft"></div>
								<div id="s5_socialmid"><?php echo $s5_besocial; ?>
								</div>
								<div id="s5_socialright">
									<div id="s5_besociald" style="display:none;margin-top:28px;">
									
									<div class="s5_dropouter">
										<div class="s5_dropback">
											<jdoc:include type="modules" name="social" style="round_box" />	
										</div>
										<div class="s5_dropbottom"></div>
									</div>
	
								</div></div>
							</div>
							<?php } ?>	
							<?php if($this->countModules('donate')) { ?>	
							<div style="float:left;height:35px;" onmouseover="s5donateover();" onmouseout="s5donateout();">
								
								<div id="s5_donateleft"></div>
								<div id="s5_donatemid"><?php echo $s5_donate; ?></div>
								<div id="s5_donateright">
								<div id="s5_donate" style="display:none;margin-top:28px;">
								
									<div class="s5_dropouter">
										<div class="s5_dropback">
											<jdoc:include type="modules" name="donate" style="round_box" />	
										</div>
										<div class="s5_dropbottom"></div>
									</div>
					
								</div>
								</div>
							</div>
							<?php } ?>
							
						</div>
					<?php } ?>	
					</div>				
				</div>
			<?php if($this->countModules('top_1') || $this->countModules('top_2') || $this->countModules('top_3')) { ?>	
			<div style="clear:both;width:100%;"></div>
			<div class="s5_wrap">
				<div class="s5_w_modwrap">
					<!-- Start top 1-3 -->
							<?php if($this->countModules('top_1')) { ?>	
								<div id="s5_advert4_<?php echo $advert2; ?>">
									<jdoc:include type="modules" name="top_1" style="round_box" />	
								</div>
							<?php } ?>
							<?php if($this->countModules('top_2')) { ?>	
								<div id="s5_advert5_<?php echo $advert2; ?>">	
									<jdoc:include type="modules" name="top_2" style="round_box" />
								</div>
							<?php } ?>
							<?php if($this->countModules('top_3')) { ?>	
								<div id="s5_advert6_<?php echo $advert2; ?>">
									<jdoc:include type="modules" name="top_3" style="round_box" />
								</div>
							<?php } ?>		
							<div style="clear:both;"></div>		
					<!-- End top 1-3 -->
				</div>
				<div style="clear:both;"></div>
			</div>
			<?php } ?>
			
			<?php if($this->countModules('above_body_1') || $this->countModules('above_body_2') || $this->countModules('above_body_3')) { ?>	
			<!-- Start Above Body -->
			<div id="s5_abovebody">
				<div id="s5_abovebody_inner">
					<div id="s5_abovebody_static">				
					<?php if($this->countModules('above_body_1')) { ?>	
						<div id="s5_above_body_1_<?php echo $abovebody; ?>">
							<jdoc:include type="modules" name="above_body_1" style="round_box" />	
						</div>
					<?php } ?>
					<?php if($this->countModules('above_body_2')) { ?>	
						<div id="s5_above_body_2_<?php echo $abovebody; ?>">	
							<jdoc:include type="modules" name="above_body_2" style="round_box" />
						</div>
					<?php } ?>
					<?php if($this->countModules('above_body_3')) { ?>	
						<div id="s5_above_body_3_<?php echo $abovebody; ?>">
							<jdoc:include type="modules" name="above_body_3" style="round_box" />
						</div>
					<?php } ?>		
					<div style="clear:both;"></div>
					</div>
				</div>
			</div>
			<!-- End Above Body -->
			<?php } ?>	
			
			
			
			<!-- Main Body -->	
			<div style="width:100%;overflow:hidden;position:relative;">
				<div id="s5_mainbodyfullw">
				<div id="s5_mainbodywrapper">
				<div <?php if($this->countModules('breadcrumb')) { ?>id="s5_mainbody"<?php } else {?>id="s5_mainbodybread"<?php } ?>>	
					<div id="s5_middlecolwrap">
								<div class="s5_mainmiddleinnerwrap">
									<div id="s5_getmaincolheight">
										<div class="s5_mainmiddle_padding">	
												
												
											<div id="s5_abovebodyusers">
												<?php if($this->countModules('search')) { ?>	
												<div id="s5_topgradsearch">
													<jdoc:include type="modules" name="search" style="xhtml" />	
												</div>
												<?php } ?>	

											
											
											<?php if($this->countModules('advert1') || $this->countModules('advert2') || $this->countModules('advert3')) { ?>	
											<!-- Adverts -->	
											<div class="s5_w_modwrap">
												<?php if($this->countModules('advert1')) { ?>	
													<div id="s5_advert1_<?php echo $advert; ?>">
														<jdoc:include type="modules" name="advert1" style="round_box" />	
													</div>
												<?php } ?>
												<?php if($this->countModules('advert2')) { ?>	
													<div id="s5_advert2_<?php echo $advert; ?>">	
														<jdoc:include type="modules" name="advert2" style="round_box" />
													</div>
												<?php } ?>
												<?php if($this->countModules('advert3')) { ?>	
													<div id="s5_advert3_<?php echo $advert; ?>">
														<jdoc:include type="modules" name="advert3" style="round_box" />
													</div>
												<?php } ?>		
												<div style="clear:both;"></div>	
											</div>
											<!-- End Adverts -->
											<?php } ?>	

							
											
											
											<?php if($this->countModules('breadcrumb')) { ?>
											<!-- Breadcrumbs -->
												<div id="s5_breadcrumbs">
													<div id="s5_breadcrumbsinner">
														<jdoc:include type="modules" name="breadcrumb" style="xhtml" />
													</div>
												</div>
											<!-- End Breadcrumbs -->	
											<?php } ?>
											
											<?php if($this->countModules('user1') || $this->countModules('user2')) { ?>	
												<div id="s5_positions">
													<?php if($this->countModules('user1')) { ?>	
														<div id="s5_user1_<?php echo $user23; ?>">
															<jdoc:include type="modules" name="user1" style="round_box" />
														</div>
													<?php } ?>
													<?php if($this->countModules('user2')) { ?>	
														<div id="s5_user2_<?php echo $user23; ?>">
															<jdoc:include type="modules" name="user2" style="round_box" />
														</div>
													<?php } ?>
												</div>
												<div style="clear:both;"></div>	
											<?php } ?>	
											</div>
											
													
										
													
											<div <?php if($this->countModules('inset')) { ?>id="s5_bodygradient"<?php } else {?>id="s5_bodygradientnoin"<?php } ?>>
												
											<div <?php if($this->countModules('inset')) { ?>style="margin-right:<?php echo ($s5_inset_width) + 20;?>px;position:relative;float:left;left:0;"<?php } ?>>
												<?php if ($s5_rss  != "") { ?>
												<div id="s5_rssicon"  onclick="window.open('<?php echo $s5_rssl; ?>')"></div>
												<div id="s5_rssfeeds" onclick="window.open('<?php echo $s5_rssl; ?>')"><?php echo $s5_rss; ?></div>
												<?php } ?>	
												<div style="clear:both;"></div>	
												<?php 
														$s5_domain = $_SERVER['HTTP_HOST'];
														$s5_url = "http://" . $s5_domain . $_SERVER['REQUEST_URI'];

														$s5_frontpage = "yes";
																				$s5_current_page = "";
																				if (JRequest::getVar('view') == "frontpage") {
																					$s5_current_page = "frontpage";
																				}
																				if (JRequest::getVar('view') != "frontpage") {
																					$s5_current_page = "not_frontpage";
																				}
																				$s5_check_frontpage = strrpos($s5_url,"index.php");
																				if ($s5_check_frontpage > 1) {
																					$s5_current_page = "not_frontpage";
																				}
																				$s5_check_frontpage2 = strrpos($s5_url,"view=frontpage&Itemid=1");
																				if ($s5_check_frontpage2 > 1) {
																					$s5_current_page = "frontpage";
																				}
																				if ($s5_show_frontpage == "no" && $s5_current_page == "frontpage") {
																					$s5_frontpage = "no";
																				}
												?>

																						
												<?php if ($s5_frontpage == "yes") { ?>	
												<jdoc:include type="message" />
												<jdoc:include type="component" />
												<?php } ?>
											</div>
											<?php if($this->countModules('inset')) { ?>	
											<div id="s5_inset" style="padding-right:10px;float:right;margin-left:-<?php echo ($s5_inset_width) + 10;?>px;width:<?php echo ($s5_inset_width) - 10;?>px;">
												<?php if ($s5_tweetwithus  != "") { ?>
												<div id="s5_twittericon" onclick="window.open('<?php echo $s5_tweetwithusl; ?>')">
												</div>
												<div id="s5_twitter" onclick="window.open('<?php echo $s5_tweetwithusl; ?>')"><?php echo $s5_tweetwithus; ?></div>
												<?php } ?>
												<div style="clear:both;"></div>	
												<jdoc:include type="modules" name="inset" style="round_box" />
											</div>
											<?php } ?>
												<div style="clear:both;"></div>	
											</div>	
											<div style="clear:both;"></div>	
										</div>
									</div>
				
								<div style="clear:both;"></div>	
							</div>
						</div>
					</div>
				</div>	
				
				
				
				<?php if($this->countModules('left')) { ?>	
				<div id="s5_leftcolumn" style="width:<?php echo ($s5_left_width) + 1;?>px;">
					<div style="clear:both;"></div>
					<div class="s5_whitemodleftwrap">
						<div class="s5_whitemodrightwrap">
							<div class="s5_backmiddlemiddle_r" style="width:<?php echo ($s5_left_width) - 13;?>px;">	
								<jdoc:include type="modules" name="left" style="round_box" />
							<div style="clear:both;"></div>
							</div>
						</div>
					</div>
					<div style="clear:both;"></div>		
					
				</div>
				<?php } ?>
				
				
				<?php if($this->countModules('right')) { ?>	
				<div id="s5_rightcolumn" style="width:<?php echo ($s5_right_width) + 1;?>px;margin-left:-<?php if($this->countModules('left') && $this->countModules('right')) { echo (($s5_right_width) + ($s5_left_width) + 15); } else { echo ($s5_right_width) + 1; } ?>px;">
					<div class="s5_whitemodleftwrap">
						<div class="s5_whitemodrightwrap">
							<div class="s5_backmiddlemiddle_r" style="width:<?php echo ($s5_right_width) - 13;?>px;">

									<jdoc:include type="modules" name="right" style="round_box" />
							
								<div style="clear:both;"></div>
							</div>
						</div>
					</div>
				</div>	
				<?php } ?>
				
				
				
				<?php if($this->countModules('contentbottom1') || $this->countModules('contentbottom2') || $this->countModules('contentbottom3')) { ?>	
				<div style="clear:both;"></div>
				<div class="s5_w_modwrap" style="width:50%;">
					<!-- Start User 1-3 -->
							<?php if($this->countModules('contentbottom1')) { ?>	
								<div id="s5_contentbottom1_<?php echo $contentbottom; ?>">
									<jdoc:include type="modules" name="contentbottom1" style="round_box" />	
								</div>
							<?php } ?>
							<?php if($this->countModules('contentbottom2')) { ?>	
								<div id="s5_contentbottom2_<?php echo $contentbottom; ?>">	
									<jdoc:include type="modules" name="contentbottom2" style="round_box" />
								</div>
							<?php } ?>
							<?php if($this->countModules('contentbottom3')) { ?>	
								<div id="s5_contentbottom3_<?php echo $contentbottom; ?>">
									<jdoc:include type="modules" name="contentbottom3" style="round_box" />
								</div>
							<?php } ?>	
							<div style="clear:both;"></div>		
					<!-- EndUser 1-3 -->
				</div>
				
				
				<div style="clear:both;"></div>
				<?php } ?>
				</div>

			</div>					
					
								
		
			<!-- End Main Body -->

			
			
			
			
			
			
			
			
			
			
			
			<div id="s5_belowbodygrad"></div>
			
			<div id="s5_bottomusers">
				<div id="s5_bottomusers_inner">
					<?php if($this->countModules('user3') || $this->countModules('user4') || $this->countModules('user5') || $this->countModules('user6') || $this->countModules('user7')) { ?>
					<!-- Bottom Modules -->
					<div style="clear:both;width:100%;"></div>
					<div class="s5_wrap">
										<div class="s5_backmiddlemiddle">
												<?php if($this->countModules('user3')) { ?>	
													<div id="s5_user3_<?php echo $bottom4; ?>" class="s5_userpositions" style="width:<?php echo $bottom4; ?>%">
														<jdoc:include type="modules" name="user3" style="round_box" />
													</div>
												<?php } ?>
												<?php if($this->countModules('user4')) { ?>	
													<div id="s5_user4_<?php echo $bottom4; ?>" class="s5_userpositions" style="width:<?php echo $bottom4; ?>%">
														<jdoc:include type="modules" name="user4" style="round_box" />
													</div>
												<?php } ?>
												<?php if($this->countModules('user5')) { ?>	
													<div id="s5_user5_<?php echo $bottom4; ?>" class="s5_userpositions" style="width:<?php echo $bottom4; ?>%">
														<jdoc:include type="modules" name="user5" style="round_box" />
													</div>
												<?php } ?>
												<?php if($this->countModules('user6')) { ?>	
													<div id="s5_user6_<?php echo $bottom4; ?>" class="s5_userpositions" style="width:<?php echo $bottom4; ?>%">
														<jdoc:include type="modules" name="user6" style="round_box" />
													</div>
												<?php } ?>
												<?php if($this->countModules('user7')) { ?>	
													<div id="s5_user7_<?php echo $bottom4; ?>" class="s5_userpositions" style="width:<?php echo $bottom4; ?>%">
														<jdoc:include type="modules" name="user7" style="round_box" />
													</div>
												<?php } ?>
												<?php if($this->countModules('user8')) { ?>	
													<div id="s5_user8_<?php echo $bottom4; ?>" class="s5_userpositions" style="width:<?php echo $bottom4; ?>%">
														<jdoc:include type="modules" name="user8" style="round_box" />
													</div>
												<?php } ?>
											<div style="clear:both;"></div>
										</div>
						<div style="clear:both;"></div>
					</div>
					<!-- End Bottom Modules -->
					<?php } ?>		
				</div>
			</div>
			
			
			<div id="s5_footergrad">
				<?php if($this->countModules('bottom')) { ?>	
				<div id="s5_footermenu">
					<jdoc:include type="modules" name="bottom" style="xhtml" />
				</div>
				<?php } ?>
				<div id="s5_footcopy">
					<?php include("templates/political/footer.php"); ?>
				</div>
			</div>
			
			
			<div style="clear:both;"></div>
			</div>
		</div>
	</div>

	<div id="s5_polbl">
		<div id="s5_polbr">
			<div id="s5_polbm"></div>
		</div>
	</div>
	<div id="s5_footerbar"></div>	
</div>






		

<div style="height:30px;clear:both;"></div>




</div>
<?php if (($s5_menu  == "1") || ($s5_menu  == "2") || ($s5_menu  == "3") || ($s5_menu  == "4")) { ?>
<script type="text/javascript" src="<?php echo $LiveSiteUrl;?>templates/political/js/s5_suckerfish.js"></script>
<?php } ?>
<?php if ($s5_tooltips  == "yes") { ?>
<script type="text/javascript" src="<?php echo $LiveSiteUrl;?>templates/political/js/tooltips.js"></script>
<?php } ?>
<?php if($this->countModules('debug')) { ?>
	<jdoc:include type="modules" name="debug" style="xhtml" />
<?php } ?> 

</body>
</html>