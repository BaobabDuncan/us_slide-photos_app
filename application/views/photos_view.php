<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Insert title here</title>
<LINK REL=StyleSheet HREF="<?php echo base_url();?>styles/myStyle.css"
	TYPE="text/css" MEDIA=screen>
<!-- load jQuery -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>

<!-- load Galleria -->
<script src="<?php echo base_url();?>js/galleria-1.2.3.photo.js"></script>
<style>
/* This rule is read by Galleria to define the gallery height: */
#galleria {
	height: 440px;
}
</style>
<?
include "layout/analytics.php";
?>

</head>
<body>
<?
//include "layout/user_profile.php";
include "layout/top_menu.php";
?>
<?php 

if (isset($error)):
include "error/full_room.php";
endif; 
?>


<!--SubPage Toprow Begin-->
<!-- 
<div id="toprowsub">
<table>
	<tr>
		<td width="20%">
		<div>Friends Photos</div>

		</td>
		<td width="70%">
		<div id="image_title"></div>

		</td>
		<td width="15%">
		<div id="image_created"></div>
		</td>
		<td width="10%"><?php if($fb_photos)
		{
			echo '<div id="form_div">';
			echo '<form action="" ><input type="hidden" name="photo_id" id="photo_id">';
			echo '<input type="hidden" name="image_url" id="image_url">';
			echo '<input type="hidden" name="title" id="title">';
			echo '<input type="hidden" name="photo_by_id" id="photo_by_id">';
			echo '<input type="hidden" name="photo_by_name" id="photo_by_name">';
			echo '<input type="hidden" name="owner_id" id="owner_id" value="'.$me['id'].'">';
			echo '<input type="hidden" name="photo_link" id="photo_link">';
			echo '<input type="hidden" name="photo_created" id="photo_created">';
			echo '<input type="hidden" name="current_image" id="current_image" value="'.$page_data['current_image_number'].'">';
			echo '<input type="submit" value="Favorites">';
			echo '</form>';
			echo '</div>';
		}
		?></td>
	</tr>
</table>

</div>
 -->
<div class="content"><!-- Adding gallery images. We use resized thumbnails here for better performance, but it’s not necessary -->
		<?php
		if ($fb_photos){
			echo "<div id='galleria'>";

			$_index = 0;
			foreach ($fb_photos as $row)
			{
				echo "<a href='".$row['src_big']."'>";
				echo "<img title='".$row['owner_name']."' owner_id='".$me['id']."' photo_id='".$row['object_id']."' photo_link='".$row['link']."' photo_by_id='".$row['owner']."' created='".$row['created']."' alt='".$row['caption']."'src='".$row['src_big']."'>";
				echo "</a>";
				$_index = $_index + 1;
			}


			echo "</div>";
		}
		else{
			echo '<h3>You Do not have facebook friends!!</h3>';

		}
		?></div>


<div>
	<input type="hidden" id="current_page" value="<?php echo $page_data['page'];?>">
	<input type="hidden" name="current_image" id="current_image" value="<?php echo $page_data['current_image_number'];?>">
</div>
<script>
	var current_image = $("#current_image").val();	
    // Load the classic theme        
    Galleria.loadTheme('<?php echo base_url();?>js/twelve/galleria.twelve.js');
    // Initialize Galleria
    //
    $('#galleria').galleria({    	
    	imageCrop : 'height',
    	show : current_image
    });
    //show :  5
    /*$(function() {
    	$('form').each(function() {
    		$(this).submit(function(){
    			var $that = $(this);
    	        var $submitButton = $(this, "input[type='submit']");
    	        $submitButton.attr("disabled", "true");
        	});
        });
    })*/
    $(document).ready(function() {
    	$("#friends a").addClass("active");
    });
    
</script>
</body>
</html>
