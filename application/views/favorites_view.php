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
<script src="<?php echo base_url();?>js/galleria-1.2.3.js"></script>

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
<?php if (isset($error)):
echo '<div class="error">';
	 echo $error;
echo '</div>';
endif; ?>

<!--SubPage Toprow Begin-->
<!-- 
<div id="toprowsub">
	<table>
		<tr >
			<td  width="20%" >
				<div>
				    Favorites Photos     
				</div>
  
			</td>
			<td  width="70%">
				<div id="image_title">
    
  				</div>
				
			</td>
			<td  width="15%">
				<div id="image_created">
   
  				</div>
			</td>
			<td  width="10%">
				<div id="form_div">
					<form>
						<input type="hidden" name="favorites_key" id="favorites_key">
						<input	type="submit" value="Un Favorites">
					</form>
				</div>				  	
			</td>
		</tr>
	</table>
  
  
  
 
</div>
 -->
<div class="content"><!-- Adding gallery images. We use resized thumbnails here for better performance, but it’s not necessary -->

<?php if (!$favoritesPhotos){
	echo '<h3>Do not have favorites photos!!</h3>';
	echo '<p>You can make album easily with slide photos.</p>';
	echo '<div class="exampleboxshadow">';
	echo '<p>1. Find photos with ease.</p>';
	echo '<p>2. Pictures are stored.</p>';
	echo '<p>3. See photos with powerful features.</p>';


	echo '</div>';
}?>
<div id="galleria"><?php 

foreach ($favoritesPhotos as $row)
{

	echo "<a href='".$row->image_url."'>";
	echo "<img title='".$row->photo_by_name."' md='".$row->favorites_id."' created='".$row->photo_created."' alt='".$row->title."'src='".$row->image_url."'>";
	echo "</a>";

}
?></div>

</div>
<script>

    // Load the classic theme
    Galleria.loadTheme('<?php echo base_url();?>js/twelve/galleria.twelve.min.js');
    
    // Initialize Galleria
    $('#galleria').galleria({
    	imageCrop : 'height'    
    });

    $(document).ready(function() {
    	$("#favorites a").addClass("active");
    });
    </script>
</body>
</html>
