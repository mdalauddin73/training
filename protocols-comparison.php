<!DOCTYPE html>
<html>
<head>
<title>Acronyms</title>
</head>
<body>
<h3><span class='list'> Protocols Attributes Comparison - RIP, IGRP, EIGRP, OSPF, IS-IS, and BGP </span></h3></br>
<table style='font-size:10px;'>
<tr bgcolor='#7FFFD4' class='row-heading' style='text-align:center;'><td>Criteria</td><td>RIPv1/RIPv2</td><td>IGRP</td><td>EIGRP</td><td>OSPF</td><td>IS-IS</td><td>BGP</td></tr>

<tr bgcolor='#F5F5DC'><td class='td-format'>Protocol type</td><td>Distance Vector</td><td>Distance Vector</td><td>Distance Vector</td><td>Link-State</td><td>Link-State</td><td>Path Vector</td></tr>

<tr><td class='td-format'>Update trends</td><td>full update</td><td>full update</td><td>only changes</td><td>only changes</td><td>only changes (LSPs)</td><td></td></tr>

<tr bgcolor='#F5F5DC'><td class='td-format'>Metric</td><td>hop count</td><td>BW and delay </br> (relaibility, load, MTU) </td><td>BW and delay </br> (relaibility, load, MTU)</td><td>Cost </br>(Link Bandwidth=</br>10<sup>8</sup>/BW in bps)</td><td>Cost </br>(delay, expense and error)</td><td>BGP Attribute</td></tr>

<tr><td class='td-format'>Path selection Algorithm</td><td>Bellman-Ford</td><td>Bellman-Ford</td><td>DUAL</td><td>Dijkstra Shortest Path First</td><td>Dijkstra Shortest Path First</td><td>--</td></tr>

<tr bgcolor='#F5F5DC'><td class='td-format'>Supports Routed Protocols</td><td>IP and IPX</td><td>IP</td><td>IP, IPX and Appletalk</td><td>IP</td><td>IP and CLNS (Classless Network Service)	</td><td>--</td></tr>

<tr><td class='td-format'>Port used</td><td>UDP 520</td><td>IP 9</td><td>RTP</td><td>IP 89</td><td>--</td><td>TCP 179</td></tr>

<tr bgcolor='#F5F5DC'><td class='td-format'>Administrative Distance (AD)</td><td>120</td><td>100</td><td>Int. 90, ext. 170</td><td>110</td><td>115</td><td>eBGP 20, iBGP 200</td></tr>

<tr><td class='td-format'>Max. hop count</td><td>15</td><td>100-255</td><td>100-255</td><td>Unlimited</td><td>Unlimited</td><td>Unlimited</td></tr>

<tr bgcolor='#F5F5DC'><td class='td-format'>Subnet Mask</td><td>(v1) Classful, </br>(v2) Classless</td><td>classful</td><td>classless </br>(support VLSMs)</td><td>classless </br>(support VLSMs)</td><td>classless </br>(support VLSMs)</td><td>-</td></tr>

<tr><td class='td-format'>Timers (seconds)</td><td>30 update,</br> 180 invalid/hold-down, </br>240 flush</td><td>90 update,</br> 270 invalid, </br> 280 hold-down, </br>630 flush</td><td>Hello 5 </br>(high speed link)</br>Hello 60 </br>(slow speed link)</br>Hello 15 or 180 </br>(3xhellos)</td><td>1800 LSA (refreshed)</br>3600 LSA max age (flushed) </br> 10 hello </br> 40 dead</td><td>- </td><td>60 keepalive, </br> 180 holdtime</td></tr>

<tr bgcolor='#F5F5DC'><td class='td-format'>Standard (open/proprietary)</td><td>Open</td><td>cisco</td><td>cisco</td><td>open</td><td>open</td><td>open</td></tr>

<tr><td class='td-format'>Traffic sends through</br>(Multicast Address)</td><td>(v1)broadcasts (255.255.255.255)</br>(v2)Multicast (224.0.0.9)</td><td>-</td><td>Unicast or Multicast (224.0.0.10)</td><td>All routers (224.0.0.5),</br> all Designated Router (224.0.0.6)</td><td>Link-State Packets (LSPs)</td><td>-</td></tr>

<tr bgcolor='#F5F5DC'><td class='td-format'>Autonomous System(AS)/</br>Network design </td><td>-</td><td>Using AS for building relations </td><td>Using AS for building relations </td><td>Using Areas</td><td>Using Areas</td><td>Public ASN (1-64511)</br>Private ASN (64512-65535)</td></tr>

<tr><td class='td-format'>Authencation</td><td>v1- no authentication </br> v2- Plain text and MD5 </td><td> - </td><td>MD5 </td><td>Null Auth (Type 0) , Plain Text (Type-1), <br> MD5 (Type-2)</td><td>Clear Text, </br>HMAC-MD5</td><td>MD5</td></tr>

 </table>

 </body>
</html>
