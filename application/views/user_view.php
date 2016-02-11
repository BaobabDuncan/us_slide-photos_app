<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK REL=StyleSheet HREF="<?php echo base_url();?>styles/myStyle.css" TYPE="text/css" MEDIA=screen>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>





<?
	include "layout/analytics.php";
?>

<title>Insert title here</title>
</head>

<body>
<?
include "error/full_room.php";
?>

<?
//include "layout/user_profile.php";
include "layout/top_menu.php";
?>

		
		
<!--SubPage Toprow Begin-->
<div id="toprowsub">
	<table>
		<tr >
			<td  width="20%" >
				<div>
				    User 
				</div>
  
			</td>
			<td  width="50%">
				<div id="image_title">
    
  				</div>
				
			</td>
			<td  width="20%">
				<div id="image_created">
   
  				</div>
			</td>
			<td  width="10%">
				<div id="form_div" >
			
					<form>
						<input type="hidden" name="level_up" id="level_up" value="level_up">
						<input type="submit" value="Level Up">
					</form>
					
				</div>	
			</td>
		</tr>
	</table>
  
  
  
 
</div>
<div>
	
	<h3>User Info</h3>
	<div class="exampleboxshadow">		
		<p>Level is <span><?php echo $user_data['level_name']; ?></span></p>
		<p>Save a total of <span><?php echo $user_data['storage_count']; ?></span> photos</p>
		<p>Total of <span><?php echo $user_data['max_storage']; ?></span> Photos can be saved</p>
	</div>
	<!-- <h3>Slide Photo</h3>
	<div class="exampleboxshadow">
		<p>1. Find photos with ease.</p>
		<p>2. Pictures are stored.</p>
		<p>3. See photos with powerful features.</p>
		
		<p>You Level is <?php echo $user_data['level_name']; ?></p>
	</div> -->
	
	<h3>User Info</h3>
	<center>
	<div>
		
		<form>
			<select id="feed_status" name="feed_status" class="select">
				
			  <option value="1" <?php if($user_data['feed_status']==1) echo 'selected'; ?>>SendFeedMe</option>
			  <option value="2" <?php if($user_data['feed_status']==2) echo 'selected'; ?>>SendFeedTarget</option>
			  <option value="3" <?php if($user_data['feed_status']==3) echo 'selected'; ?>>SendFeedBoth</option>
			  <option value="4" <?php if($user_data['feed_status']==4) echo 'selected'; ?>>NotSendFeed</option>
			  
			</select>			
			<input type="submit" style="margin-left:52%;margin-top:25px;"value="Save">
		</form>
	</div>
	</center>
	<h3>Level And Total Room</h3>	
	<center>
	<table class="gridtable">
		<tr>
			<th>Level</th><th>Total Room</th><th>Price</th>
		</tr> 
		<tr>
			<td>Basics Level</td>
			<td>10</td>
			<td>2$</td>
		</tr>
		<tr>
			<td>Silver Level</td>
			<td>30</td>
			<td>5$</td>
		</tr>
		<tr>
			<td>Gold Level</td>
			<td>60</td>
			<td>10$</td>
		</tr>
		<tr>
			<td>Diamond Level</td>
			<td>100</td>
			<td>15$</td>
		</tr>		
	</table>
	</center>
	<!-- CSS goes in the document HEAD or added to your external stylesheet -->
	
</div>
</body>
</html>