<!DOCTYPE html>
<html>
<head>
<title>MyNotes</title>

<script src="https://cdn.tailwindcss.com"></script>
<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!-- <link rel="stylesheet" type="text/css" href="css/main.css" /> -->
<!-- <link rel="stylesheet" type="text/css" href="css/reset.css" /> -->
<!-- <link rel="stylesheet" type="text/css" href="css/jquery-ui-1.11.4.css"> -->
	    
<script src="scripts/jquery-3.2.1.js"></script>
<script src="scripts/jquery-ui.js"></script>

<script type="text/javascript">
$(document).ready(function(){
    $('#link-1').click(function(){
    $('#main').load('filename.php');
	});
});
</script>

</head>
<body>
	<section>
		<div class="container mx-auto mt-2 mb-4 bg-rose-100">
			<header>
			<?php include_once ("header.php");?>
			<?php include_once ("menubar.php");?>
			</header>
			<main class="mt-5 mb-5 max-h-screen p-10">
				<div class="text-center">
					<h2 class="text-3xl text-blue-900 font-bold">Staff Development Training on Information Technology</h2>
				</div>
			</main>
			<footer class="bg-black text-white">
				<div class="text-center p-5">
					<p>Copyright &copy; 2022 All Rights Reserved</p>
				</div>
			</footer>
		</div>
	</section>
</body>
</html>