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
    $('#link-10').click(function(){
    $('#main').load('words.php');
    });
});
</script>

</head>
<body>
   <div id="wrap">
			<?php include_once ("header.php");?>
			<?php include_once ("menubar.php");?>
			<div id="main">
				<h2>Vocabulary</h2>
			</div> <!-- End of Main -->
			<div id="sidebar">
				<h2 class='topics'>Topics</h2>
				<ul>
				<li><a class='sidebar-link' href="#" id="link-10">Vocabulary</a></li>
				</ul>
			</div> <!-- End of Sidebar -->
			<?php include_once ("footer.php");?>
    </div> <!-- End of wrapper -->

</body>
</html>