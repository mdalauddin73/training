<!DOCTYPE html>
<html>
     <head>
      <title>VPN over Internet</title>
	  <link rel="stylesheet" type="text/css" href="css/cciers.css">
	  <link rel="stylesheet" type="text/css" href="css/jquery-ui-1.11.4.css">
	  <link rel="stylesheet" type="text/css" href="css/jquery.highlight-within-textarea.css">
    
	  <script src="scripts/jquery-3.2.1.js"></script>
	  <script src="scripts/jquery-ui.js"></script>
      <script src="scripts/jquery.highlight-within-textarea.js"></script>
	
	
	</head>
     <body>
	 <h1> VPN over Internet </h1>
	<! ===================================================================================== >
		 <h2> LAB - Configure basic setup for VPN labs </h2>
	<! ===================================================================================== >
		<figure>
		<figcaption>Network Diagram</figcaption>
		<img src="images/basic-vpn.png" alt="Basic VPN Diagram" style="width:700px;height:350px;">
		</figure>

	 <h3 id="task"> Task </h3>
	 <ol>
	 <li> Configure the basic IP addressing according to the diagram. </li>
	 </ol> </br>
	 <h3> Solution </h3>
	 <font id="config">
	 R1(config)#int lo0 </br>
	 R1(config-if)#ip address 1.1.1.1 255.255.255.255 </br> 
	 R1(config-if)#exit </br>
	 R1(config)#int s0/0</br>
	 R1(config-if)#ip address 172.16.15.1 255.255.255.0</br>
	 R1(config-if)#no shutdown</br>
	 R1(config-if)#exit </br>
	 R1(config)#int f0/0</br>
	 R1(config-if)#ip address 192.168.1.1 255.255.255.0</br>
	 R1(config-if)#no shutdown</br></br>
	 
	 R5(config)#int lo0 </br>
	 R5(config-if)#ip address 5.5.5.5 255.255.255.255 </br> 
	 R5(config-if)#exit </br>
	 R5(config)#int s0/5</br>
	 R5(config-if)#ip address 172.16.15.5 255.255.255.0</br>
	 R5(config-if)#no shutdown</br>
	 R5(config-if)#exit </br>
	 R5(config)#int s0/1</br>
	 R5(config-if)#ip address 172.16.25.5 255.255.255.0</br>
	 R5(config-if)#no shutdown</br>
	 R5(config)#int s0/2</br>
	 R5(config-if)#ip address 172.16.35.5 255.255.255.0</br>
	 R5(config-if)#no shutdown</br>
	 R5(config)#int s0/3</br>
	 R5(config-if)#ip address 172.16.45.5 255.255.255.0</br>
	 R5(config-if)#no shutdown</br></br>
	 
	 R2(config)#int lo0 </br>
	 R2(config-if)#ip address 2.2.2.2 255.255.255.255 </br> 
	 R2(config-if)#exit </br>
	 R2(config)#int s0/2</br>
	 R2(config-if)#ip address 172.16.25.2 255.255.255.0</br>
	 R2(config-if)#no shutdown</br>
	 R2(config-if)#exit </br>
	 R2(config)#int f0/0</br>
	 R2(config-if)#ip address 192.168.2.2 255.255.255.0</br>
	 R2(config-if)#no shutdown</br></br>
	 
	 R3(config)#int lo0 </br>
	 R3(config-if)#ip address 3.3.3.3 255.255.255.255 </br> 
	 R3(config-if)#exit </br>
	 R3(config)#int s0/3</br>
	 R3(config-if)#ip address 172.16.35.3 255.255.255.0</br>
	 R3(config-if)#no shutdown</br>
	 R3(config-if)#exit </br>
	 R3(config)#int f0/0</br>
	 R3(config-if)#ip address 192.168.3.3 255.255.255.0</br>
	 R3(config-if)#no shutdown</br></br>     
	 
	 R4(config)#int lo0 </br>
	 R4(config-if)#ip address 4.4.4.4 255.255.255.255 </br> 
	 R4(config-if)#exit </br>
	 R4(config)#int s0/4</br>
	 R4(config-if)#ip address 172.16.45.4 255.255.255.0</br>
	 R4(config-if)#no shutdown</br>
	 R4(config-if)#exit </br>
	 R4(config)#int f0/0</br>
	 R4(config-if)#ip address 192.168.4.4 255.255.255.0</br>
	 R4(config-if)#no shutdown</br>
	 </br></font>
	 
	 <strong>Notice:</strong><br>
	 <span class="cli-output-notice"> </span></br>

	 <h3 id="task"> Task </h3>
	 <ol>
	 <li> Configure static/default routing on routers R1, R2, R3, R4 and R5. </li>
	 </ol> </br>
	 <h3> Solution </h3></br>
	 <font id="config">
	 R1(config)#ip route 0.0.0.0 0.0.0.0 <span class="command"> Serial0/0 172.16.15.5 </span></br></br>
	 </font>
	 <strong>Notice:</strong><br>
	 <span class="cli-output-notice"> </span></br><br>
	 <font id="config">
	 R5(config)#ip route 2.2.2.2 255.255.255.255 Serial0/1</br>
	 R5(config)#ip route 3.3.3.3 255.255.255.255 Serial0/2</br>
	 R5(config)#ip route 4.4.4.4 255.255.255.255 Serial0/3</br>
	 R5(config)#ip route 192.168.1.0 255.255.255.0 Serial0/5</br>
	 R5(config)#ip route 192.168.2.0 255.255.255.0 Serial0/1</br>
	 R5(config)#ip route 192.168.3.0 255.255.255.0 Serial0/2</br>
	 R5(config)#ip route 192.168.4.0 255.255.255.0 Serial0/3</br></br>
	 
	 R2(config)#ip route 0.0.0.0 0.0.0.0 Serial0/2 </br></br>
	 R3(config)#ip route 0.0.0.0 0.0.0.0 Serial0/3 </br></br>
	 R4(config)#ip route 0.0.0.0 0.0.0.0 Serial0/4 </br></br>
	 </font>
	 <font id="config">
	 <h3> Verifying the configuration</h3>
	 R1#ping 192.168.2.2 </br>
	 R1#ping 192.168.3.3</br>
	 R1#ping 192.168.4.4 </br> </br>
	 </font>
	<textarea class='output-2'rows="6" cols="70" readonly>
	R1#ping 192.168.2.2
	Type escape sequence to abort.
	Sending 5, 100-byte ICMP Echos to 192.168.2.2, timeout is 2 seconds:
	!!!!!
	Success rate is 100 percent (5/5), round-trip min/avg/max = 1/1/1 ms
	</textarea></br></br>
	<script>
	 $('.output-2').highlightWithinTextarea({
		highlight: '!!!!!'
	});
	</script>	

	<textarea class='output-50'rows="6" cols="70" readonly>
	R1#ping 192.168.3.3
	Type escape sequence to abort.
	Sending 5, 100-byte ICMP Echos to 192.168.3.3, timeout is 2 seconds:
	!!!!!
	Success rate is 100 percent (5/5), round-trip min/avg/max = 1/7/24 ms
	</textarea></br></br>

	<script>
	 $('.output-50').highlightWithinTextarea({
		highlight: '!!!!!'
	});
	</script>		
		
	<textarea class='output-51' rows="6" cols="70" readonly>
	R1#ping 192.168.4.4
	Type escape sequence to abort.
	Sending 5, 100-byte ICMP Echos to 192.168.4.4, timeout is 2 seconds:
	!!!!!
	Success rate is 100 percent (5/5), round-trip min/avg/max = 1/2/8 ms
	</textarea></br></br>

	<script>
	 $('.output-51').highlightWithinTextarea({
		highlight: '!!!!!'
	});
	</script>		

	<! ===================================================================================== > 
		  <h2> Generic Routing Encapsulation (GRE) </h2></br>
	<! ===================================================================================== >
      <h3> LAB- GRE point-to-point tunnels </h3></br>
	  
	  <figure>
		<figcaption>Network Diagram</figcaption>
		<img src="images/gre-tunnel.png" alt="GRE Diagram" style="width:700px;height:350px;">
	  </figure> </br>

	 <p class="note-head">GRE</p>
	 <p class="note-text">Developed by Cisco.</p>
	 <p class="note-text">To use when packets need to be sent from one network to another over the Internet or an insecure network .</p>
	 <p class="note-text">Support encapsulation of a wide variety of network layer protocols inside point-to-point links.</p>
	 <p class="note-text">GRE tunnel are not encrypted.</p>
	 <p class="note-text">Configuration is very easy.</p></br></br>
	
	 <p class="note-head">Drawbacks of GRE</p>
	 <p class="note-text">Support only cisco routers.</p>
	 <p class="note-text">Not scalable.</p>
	 <p class="note-text">No encryotion.</p>
	 <p class="note-text">Static IP on all points.</p></br>
	 
	   
	 <p class="note-head">Note:</p>
	 <p class="note-text">GRE tunnel uses a logical tunnel interface configured on the router with an IP address where packets are encapsulated and decapsulated as they enter or exit the GRE tunnel.</p>
	 <p class="note-text">Tunnel interface IP address must not used anywhere else in the network.</p>
	 <p class="note-text">Tunnel interface IP address must be the same network as the other tunnel interfaces.</p>
	 <p class="note-text">Adjust MTU to 1400 and MSS to 1360 is a common practice because of GRE overhead and thus to ensure unnecessary packet fragmentation.</p>
	 </br>

	 <h3 id="task"> Task </h3>
	 <ol>
	 <li> Configure GRE tunnel between R1 and R2. </li>
	 </ol> </br>
	 <h3> Solution </h3>
	 <font id="config">
	 R1(config)#int tunnel 12 </br>
	 R1(config-if)#ip address 10.12.0.1 255.255.255.255 </br> 
	 R1(config-if)#ip mtu 1400 </br>
	 R1(config-if)#ip tcp adjust-mss 1360</br>
	 R1(config-if)#tunnel source 172.16.15.1</br>
	 R1(config-if)#tunnel destination 172.16.25.2</br>
	 R1(config-if)#exit </br></br>
	 
	 R2(config)#int tunnel 12 </br>
	 R2(config-if)#ip address 10.12.0.2 255.255.255.255 </br> 
	 R2(config-if)#ip mtu 1400 </br>
	 R2(config-if)#ip tcp adjust-mss 1360</br>
	 R2(config-if)#tunnel source 172.16.25.2</br>
	 R2(config-if)#tunnel destination 172.16.15.1</br>
	 R2(config-if)#exit </br></br>
	 </br></font>
	 
	 <font id="config">
	 <h3> Verifying the configuration</h3>
	 R1#sh ip int bri | e unass </br>
	 R2#sh ip int bri | e unass </br></br>
	 
	 R1#ping 10.12.0.2</br>
	 R2#ping 10.12.0.1</br> </br>
	 </font>
	 
	 <strong>Notice:</strong><br>
	 <span class="cli-output-notice"> </span></br>

	 
	<textarea class='demo2'rows="8" cols="85" readonly>	
	R1#sh ip int bri | e unass
	Interface                  IP-Address      OK? Method Status                Protocol
	FastEthernet0/0            192.168.1.1     YES manual up                    up      
	Serial0/0                  172.16.15.1     YES NVRAM  up                    up      
	Loopback0                  1.1.1.1         YES NVRAM  up                    up      
	Tunnel12                   10.12.0.1       YES manual up                    up      
	</textarea>

	<script>
	 $('.demo2').highlightWithinTextarea({
		highlight: ['Tunnel12',' 10.12.0.1 ']
	});
	</script>
			
	<textarea class='output-1' rows="7" cols="85" readonly>
	R2#sh ip int bri | e unass
	Interface                  IP-Address      OK? Method Status                Protocol
	FastEthernet0/0            192.168.2.2     YES manual up                    up      
	Serial0/2                  172.16.25.2     YES NVRAM  up                    up      
	Loopback0                  2.2.2.2         YES NVRAM  up                    up      
	Tunnel12                   10.12.0.2       YES manual up                    up      
	</textarea></br></br>
		
	<script>
	 $('.output-1').highlightWithinTextarea({
		highlight: ['Tunnel12',' 10.12.0.2 ']
	});
	</script>

	<textarea rows="6" cols="70" readonly>
	R1#ping 10.12.0.2
	Type escape sequence to abort.
	Sending 5, 100-byte ICMP Echos to 10.12.0.2, timeout is 2 seconds:
	!!!!!
	Success rate is 100 percent (5/5), round-trip min/avg/max = 1/7/20 ms
	</textarea></br></br>
		
	<textarea rows="6" cols="70" readonly>
	R2#ping 10.12.0.1         
	Type escape sequence to abort.
	Sending 5, 100-byte ICMP Echos to 10.12.0.1, timeout is 2 seconds:
	!!!!!
	Success rate is 100 percent (5/5), round-trip min/avg/max = 1/4/16 ms
	</textarea></br><br>

	<h3 id="task"> Task </h3>
	 <ol>
	 <li> Configure point to point GRE tunnels between R1-R3 and R1-R4. </li>
	 </ol> </br>
	 <h3> Solution </h3>
	 <font id="config">
	 R1(config)#int tunnel 13 </br>
	 R1(config-if)#ip address 10.13.0.1 255.255.255.0</br> 
	 R1(config-if)#ip mtu 1400 </br>
	 R1(config-if)#ip tcp adjust-mss 1360</br>
	 R1(config-if)#tunnel source 172.16.15.1</br>
	 R1(config-if)#tunnel destination 172.16.35.3</br>
	 R1(config-if)#exit </br></br>

	 R3(config)#int tunnel 13 </br>
	 R3(config-if)#ip address 10.13.0.3 255.255.255.255 </br> 
	 R3(config-if)#ip mtu 1400 </br>
	 R3(config-if)#ip tcp adjust-mss 1360</br>
	 R3(config-if)#tunnel source 172.16.35.3</br>
	 R3(config-if)#tunnel destination 172.16.15.1</br>
	 R3(config-if)#exit </br></br>
	 
	 R1(config)#int tunnel 14 </br>
	 R1(config-if)#ip address 10.14.0.1 255.255.255.0</br> 
	 R1(config-if)#ip mtu 1400 </br>
	 R1(config-if)#ip tcp adjust-mss 1360</br>
	 R1(config-if)#tunnel source 172.16.15.1</br>
	 R1(config-if)#tunnel destination 172.16.45.4</br>
	 R1(config-if)#exit </br></br>

	 R4(config)#int tunnel 14 </br>
	 R4(config-if)#ip address 10.14.0.4 255.255.255.255 </br> 
	 R4(config-if)#ip mtu 1400 </br>
	 R4(config-if)#ip tcp adjust-mss 1360</br>
	 R4(config-if)#tunnel source 172.16.45.4</br>
	 R4(config-if)#tunnel destination 172.16.15.1</br>
	 R4(config-if)#exit </br></br>
	 </br></font>
	 
	 <font id="config">
	 <h3> Verifying the configuration</h3>
	 R1#sh ip int bri | e unass </br>
	 R3#sh ip int bri | e unass </br>
	 R4#sh ip int bri | e unass </br></br>
	 
	 R1#ping 10.13.0.3</br>
	 R1#ping 10.14.0.4</br> </br>
	 </font>
	 
	 <strong>Notice:</strong><br>
	 <span class="cli-output-notice"> </span></br>

	 
	<textarea class='demo1' style="border:none; background-color:#f2f4f4;" rows="10" cols="100" readonly>
	R1#sh ip int bri | e unass
	Interface                  IP-Address      OK? Method Status                Protocol
	FastEthernet0/0            192.168.1.1     YES manual up                    up      
	Serial0/0                  172.16.15.1     YES NVRAM  up                    up      
	Loopback0                  1.1.1.1         YES NVRAM  up                    up      
	Tunnel12                   10.12.0.1       YES manual up                    up      
	Tunnel13                   10.13.0.1       YES manual up                    up      
	Tunnel14                   10.14.0.1       YES manual up                    up
	</textarea></br></br>

	<script>
	 $('.demo1').highlightWithinTextarea({
		highlight: ['Tunnel12','Tunnel13','Tunnel14',' 10.12.0.1 ','  10.13.0.1  ',' 10.14.0.1  ']
	});
	</script>

	<! *************************************************** >
		  <h2> P2P GRE over IPsec </h2></br>
	<! *************************************************** >
	  <h3> LAB- GRE p2p tunnel over IPsec </h3></br>
	  
	  <figure>
		<figcaption>Network Diagram</figcaption>
		<img src="images/gre-ipsec.png" alt="GRE Diagram" style="width:700px;height:350px;">
	  </figure> </br>

	 <p class="note-head">Why use GRE with IPsec?</p>
	 <p class="note-text">For data security over the tunnels, GRE implies only encapsulation not encryption that does with IPsec.</p></br>

	 <h3 id="task"> Task </h3>
	 <ol><li> ISAKMP policy configuration. </li>
	 <li> Dead Peer Detection (DPD) Configuration. </li>
	 <li> IPsec Transform set configuration. </li>
	 <li> ACL configuration for encryption. </li>
	 <li> Crypto maps configuration. </li>
	 <li> Applying crypto maps. </li>
	 <li> Tunnel interface configuration. </li>
	 </ol> </br>
	 <h3> Solution </h3>
	 <font id="config">
	 R1(config)#int s0/0 </br>
	 R1(config-if)#ip address 172.16.15.1 255.255.255.0 </br>
	 R1(config-if)#crypto isakmp policy 10</br>
	 R1(config-isakmp)#encryption 3des</br>
	 R1(config-isakmp)#authentication pre-share</br>
	 R1(config-isakmp)#crypto isakmp key cisco1234 address 172.16.25.2 </br></br>

	 R1(config)#crypto isakmp keepalive 10 </br>
	 R1(config)#crypto ipsec transform-set ESP-3DES-SHA esp-3des esp-sha-hmac</br></br>

	 R1(cfg-crypto-trans)#ip access-list extended VPN-STATIC</br>
	 R1(config-ext-nacl)#permit gre host 172.16.15.1 host 172.16.25.2</br></br>

	 R1(config-ext-nacl)#crypto map GRE-AND-IPSEC local-address s0/0</br>
	 R1(config)#crypto map GRE-AND-IPSEC 10 ipsec-isakmp</br>
	 R1(config-crypto-map)#set peer 172.16.25.2</br>
	 R1(config-crypto-map)#set transform-set ESP-3DES-SHA</br>
	 R1(config-crypto-map)#match address VPN-STATIC</br></br>

	 R1(config-crypto-map)#interface s0/0</br>
	 R1(config-if)#crypto map GRE-AND-IPSEC</br></br>

	 R1(config-if)#interface Tunnel12</br>
	 R1(config-if)#bandwidth 1536</br>
	 R1(config-if)#keepalive 10 3</br>
	 R1(config-if)#ip address 10.12.0.1 255.255.255.0</br>
	 R1(config-if)#tunnel source 172.16.15.1</br>
	 R1(config-if)#tunnel destination 172.16.25.2</br>
	 R1(config-if)#end</br>
	 </br></font>
	 
	 
	 <font id="config">
	 R2#conf t </br>
	 R2(config)#int s0/2</br>
	 R2(config-if)#ip address 172.16.25.2 255.255.255.0</br>
	 R2(config-if)#crypto isakmp policy 10</br>
	 R2(config-isakmp)#encryption 3des</br>
	 R2(config-isakmp)#authentication pre-share</br>
	 R2(config-isakmp)#crypto isakmp key cisco1234 address 172.16.15.1</br></br>

	 R2(config)#crypto isakmp keepalive 10 </br>
	 R2(config)#crypto ipsec transform-set ESP-3DES-SHA esp-3des esp-sha-hmac</br>
	 R2(cfg-crypto-trans)#end</br>
	 R2# </br></br>

	 R2#conf t</br>
	 R2(config)#ip access-list extended VPN-STATIC</br>
	 R2(config-ext-nacl)#permit gre host 172.16.25.2 host 172.16.15.1</br>
	 R2(config-ext-nacl)#end</br>
	 R2#</br></br>

	 R2#conf t</br>
	 R2(config)#crypto map GRE-AND-IPSEC local-address s0/2</br>
	 R2(config)#crypto map GRE-AND-IPSEC 10 ipsec-isakmp</br>
	 R2(config-crypto-map)#set peer 172.16.15.1</br>
	 R2(config-crypto-map)#set transform-set ESP-3DES-SHA</br>
	 R2(config-crypto-map)#match address VPN-STATIC</br>
	 R2(config-crypto-map)#end</br>
	 R2#</br></br>

	 R2#conf t</br>
	 R2(config)#interface s0/2</br>
	 R2(config-if)#crypto map GRE-AND-IPSEC</br>
	 R2(config-if)#end</br>
	 R2#</br></br>

	 R2#conf t</br>
	 R2(config)#interface Tunnel12</br>
	 R2(config-if)#bandwidth 1536</br>
	 R2(config-if)#keepalive 10 3</br>
	 R2(config-if)#ip address 10.12.0.2 255.255.255.0</br>
	 R2(config-if)#tunnel source 172.16.25.2</br>
	 R2(config-if)#tunnel destination 172.16.15.1</br>
	 R2(config-if)#end</br>
	 </br></font>
	 
	 <font id="config">
	 <h3> Verifying the configuration</h3>
	 R1#show crypto isakmp sa</br>
	 R2#show crypto isakmp sa</br>
	 </font>
	 
	 <strong>Notice:</strong><br>
	 <span class="cli-output-notice"> </span></br>

	 
	<textarea class='demo1' style="border:none; background-color:#f2f4f4;" rows="10" cols="100" readonly>

	</textarea></br></br>

	<script>
	 $('.demo1').highlightWithinTextarea({
		highlight: ['Tunnel12','Tunnel13','Tunnel14',' 10.12.0.1 ','  10.13.0.1  ',' 10.14.0.1  ']
	});
	</script>

	</body>
</html>
