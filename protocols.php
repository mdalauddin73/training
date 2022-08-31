<!DOCTYPE html>
<html>
  <head>
    <title>Protocols</title>
	<link rel="stylesheet" type="text/css" href="css/cciers.css" />
	<!-- <link rel="stylesheet" type="text/css" href="css/reset.css" /> -->
	<link rel="stylesheet" type="text/css" href="css/jquery.highlight-within-textarea.css"/>
	<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.11.4.css"/>
	
	<script src="scripts/jquery-3.2.1.js"/></script>
	<script src="scripts/jquery-ui.js"/></script>
	<script src="scripts/jquery.highlight-within-textarea.js"/></script>
    	
<script type="text/javascript">
$(document).ready(function(){
    $('#link-90').click(function(){
    $('#main').load('protocols-comparison.php');
	});
	$('#link-91').click(function(){
    $('#main').load('eigrp.php');
	});
	$('#link-92').click(function(){
    $('#main').load('ospf.php');
	});
});
</script>

</head>
<body>
   	<div id="main">
	<p class='topics'>Protocols</p></br>
		<ul><hr>
		<li><a class='topics-main' href="#" id="link-90">Protocols Attributes Comparison</a></li><hr>
		<li><a class='topics-main' href="#" id="link-91">EIGRP</a></li><hr>
		<li><a class='topics-main' href="#" id="link-92">OSPF</a></li><hr>
		</ul>
	</div> <!-- End of Main -->
			
</body>
</html>
