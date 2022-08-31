<!DOCTYPE html>
<html>
<head>
<title>Knowledge Base</title>
<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<link rel="stylesheet" type="text/css" href="css/reset.css" />
<link rel="stylesheet" type="text/css" href="css/main.css" />
<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.11.4.css" />

<script src="scripts/jquery-3.2.1.js"></script>
<script src="scripts/jquery-ui.js"></script>
<script src="scripts/jquery.highlight-within-textarea.js"></script>

<script type="text/javascript">
$(document).ready(function(){
    $('#link-1').click(function(){
    $('#main').load('**.php');
	});
    $('#link-2').click(function(){
    $('#main').load('**.php');
    });
	$('#link-3').click(function(){
    $('#main').load('**.php');
    });
	$('#link-4').click(function(){
    $('#main').load('**.php');
    });
	$('#link-5').click(function(){
    $('#main').load('**.php');
    });
});
</script>

</head>
<body>
   <div id="wrap">
			<?php include_once ("header.php");?>
			<?php include_once ("menubar.php");?>
			<div id="main">
				<h2>IT Resources </h2>
			</div> <!-- End of Main -->
			<div id="sidebar">
				<p class='topics'>Topics</p>
				<ul>
				<li><a class='sidebar-link' href="#" id="link-1">Link-A</a></li>
				<li><a class='sidebar-link' href="#" id="link-2">Link-B</a></li>
				<li><a class='sidebar-link' href="#" id="link-3">Link-C</a></li>
				<li><a class='sidebar-link' href="#" id="link-4">Link-D</a></li>
				<li><a class='sidebar-link' href="#" id="link-5">Link-E</a></li>
				</ul>
			</div> <!-- End of Sidebar -->
			<?php include_once ("footer.php");?>
    </div> <!-- End of wrapper -->

</body>
</html>