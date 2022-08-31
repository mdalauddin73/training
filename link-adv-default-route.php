<!DOCTYPE html>
<html>
  <head>
    <title>Lab Multicast</title>
	<link rel="stylesheet" type="text/css" href="css/cciers.css" />
	<!-- <link rel="stylesheet" type="text/css" href="css/reset.css" /> -->
	<link rel="stylesheet" type="text/css" href="css/jquery.highlight-within-textarea.css"/>
	<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.11.4.css"/>
	
	<script src="scripts/jquery-3.2.1.js"/></script>
	<script src="scripts/jquery-ui.js"/></script>
	<script src="scripts/jquery.highlight-within-textarea.js"/></script>
    	
<script type="text/javascript">
$(document).ready(function(){
    $('#link-1000').click(function(){
    $('#main').load('lab-adv-default-route-eigrp.php');
	});
	$('#link-1001').click(function(){
    $('#main').load('lab-adv-default-route-rip.php');
	});
	$('#link-1002').click(function(){
    $('#main').load('lab-adv-default-route-ospf.php');
	});
	$('#link-184').click(function(){
    $('#main').load('lab-security-ext-named-access-list.php');
	});
	$('#link-185').click(function(){
    $('#main').load('lab-security-telnet-access.php');
	});
	$('#link-186').click(function(){
    $('#main').load('lab-security-protocol-acl.php');
	});
	$('#link-187').click(function(){
    $('#main').load('lab-security-ospf-eigrp-traffic.php');
	});
	$('#link-188').click(function(){
    $('#main').load('lab-security-time-acl.php');
	});
	$('#link-189').click(function(){
    $('#main').load('lab-security-time-acl-2.php');
	});
	$('#link-190').click(function(){
    $('#main').load('lab-security-ipv6-acl.php');
	});
	$('#link-191').click(function(){
    $('#main').load('lab-security-login.php');
	});
	$('#link-192').click(function(){
    $('#main').load('lab-security-aaa-auth.php');
	});
	$('#link-193').click(function(){
    $('#main').load('lab-security-port-security.php');
	});
	$('#link-194').click(function(){
    $('#main').load('lab-security-dhcp-snooping.php');
	});
	$('#link-195').click(function(){
    $('#main').load('lab-security-ip-source-guard.php');
	});
	$('#link-196').click(function(){
    $('#main').load('lab-security-dynamic-arp-inspection.php');
	});
	$('#link-197').click(function(){
    $('#main').load('lab-security-private-vlan.php');
	});
});
</script>

</head>
<body>
   	<div id="main">
	<p class='topics'>Advertising Default Route</p></br>
		<ul><hr>
		<li><a class='topics-main' href="#" id="link-1000">LAB - Advertising Default Route with EIGRP 	</a></li><hr>
		<li><a class='topics-main' href="#" id="link-1001">LAB - Advertising Default Route with RIPv2 	</a></li><hr>
		<li><a class='topics-main' href="#" id="link-1002">LAB - Advertising Default Route with OSPF	</a></li><hr>
	</ul>
	</div> <!-- End of Main -->
			
</body>
</html>
