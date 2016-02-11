<!--<div class="profile" style="display:none">
	
	<p>Welcom To
		<?php if (isset($me)): echo $me['first_name']; endif; ?>
		<br>
		Favorites : 
		<?php echo $user_data['storage_count']; ?>/<?php echo $user_data['max_storage']; ?>
	</p>
	
</div>
-->
<!--Header Begin-->
<div id="header">
  <div class="center">
    <div id="logo"><a href="./photos">Slide Photos</a></div>
    <!--Menu Begin-->
    <div id="menu">
      
        <div id="about"><a href="http://www.facebook.com/apps/application.php?id=136758826401321" target="_blank" title="About Us">About Us</a></div>
        <div id="favorites"><a href="./favorites" title="Favorite Photos">Favorite</a></div>               
        <div id="friends" ><a href="./photos" title="Friends Photos">Friends</a></div>     
    </div>
    <!--Menu END-->
  </div>
</div>

<div id="menu" style="display:none">
	<ul>
		<li><a href="./photos">Friends<br /><span>takes your<br />Friends Photos</span></a></li>
		<li><a href="./favorites">Favorites<br /><span>takes your<br />Favorites Photos</span></a></li>		
		<li><a href="./user">User<br /><span>takes your<br />User</span></a></li>		
	</ul>
</div>



<div style="display:none">
	<h2>Admin</h2>
	<a href="./install">Install</a>	|
	<a href="./slidephotos_test">Slide Photos Test</a> |
	<a href="./facebook_test">Slide Photos Test</a>	
</div>
