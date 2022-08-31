<!DOCTYPE html>
<html>
<head>
<title>MyNotes</title>
<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<link rel="stylesheet" type="text/css" href="css/maincss.css" />
<link rel="stylesheet" type="text/css" href="css/reset.css" />
</head>
<body>
    <div id="wrapper">
      	<?php include_once ("header.php");?>
        <div id="navigation">
            <p> About | Cisco | Microsoft | Hardware | Software | Contact </p>
        </div>
        <div id="content"></div>
        <div id="rightcolumn">
            <p><a href ="#" onclick="load_home()"> Definition </a></p>
		</div>
		<script>
		function load_home() {
        document.getElementById("content").innerHTML='<object type="text/html" data="definition.php" ></object>';
		}
		</script>
		<?php include_once ("footer.php");?>
    </div> <!-- end of wrapper -->
</body>
</html>

