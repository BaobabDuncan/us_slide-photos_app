<html lang="en">
<head>
<meta charset="utf-8">
<title>Welcome to CodeIgniter</title>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
<?
include "layout/analytics.php";
?>
<script>
	$(document).ready(function() {
		setTimeout(function() {			
			window.location = "./index.php/photos";
		}, 1000);
	});
</script>

<style>
/*Loading*/
#loading{
	margin-top:35%;
}
</style>
</head>


<body>
<center>
<div id="loading">
	<img src="http://cdn.nirmaltv.com/images/3-thumb.gif">
	<p>Loading</p>
</div>
</center>
</body>

</html>
