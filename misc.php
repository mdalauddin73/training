<!DOCTYPE html>
<html>
<head>
<title>MyNotes</title>
<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<link rel="stylesheet" type="text/css" href="css/main.css" />
<link rel="stylesheet" type="text/css" href="css/reset.css" />
<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.11.4.css">
	    
<script src="scripts/jquery-3.2.1.js"></script>
<script src="scripts/jquery-ui.js"></script>

<script type="text/javascript">
$(document).ready(function(){
    $('#link-500').click(function(){
    $('#main').load('reslink.php');
	});
    $('#link-501').click(function(){
    $('#main').load('dos-command.php');
    });
	$('#link-502').click(function(){
    $('#main').load('bitcoin.php');
    });
	$('#link-503').click(function(){
    $('#main').load('micro-core-linux.php');
    });
	$('#link-504').click(function(){
    $('#main').load('gns3-working-environment.php');
    });
	$('#link-505').click(function(){
    $('#main').load('windows-command-line.php');
    });
	$('#link-506').click(function(){
    $('#main').load('link-cww.php');
    });
	$('#link-507').click(function(){
    $('#main').load('php-mysql.php');
    });
});
</script>

</head>
<body>
   <div id="wrap">
			<?php include_once ("header.php");?>
			<?php include_once ("menubar.php");?>
			<div id="main">
				<h2>Miscellaneous</h2>
			</div> <!-- End of Main -->
			<div id="sidebar">
				<h2 class='topics'>Topics</h2>
				<ul>
				<li><a class='sidebar-link' href="#" id="link-500">Resource Link</a></li>
				<li><a class='sidebar-link' href="#" id="link-501">DOS Command</a></li>
				<li><a class='sidebar-link' href="#" id="link-502">Bitcoin-Digital Currency</a></li>
				<li><a class='sidebar-link' href="#" id="link-503">Micro Core Linux</a></li>
				<li><a class='sidebar-link' href="#" id="link-504">GNS3 Setup Working Environment </a></li>
				<li><a class='sidebar-link' href="#" id="link-505">Windows Command Line (Win+R) </a></li>
				<li><a class='sidebar-link' href="#" id="link-506">Concern Worldwide </a></li>
				<li><a class='sidebar-link' href="#" id="link-507">PHP Apache MySQL phpMyAdmin Workbench</a></li>
				</ul>
			</div> <!-- End of Sidebar -->
			<?php include_once ("footer.php");?>
    </div> <!-- End of wrapper -->


</body>
</html>