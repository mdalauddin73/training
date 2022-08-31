<!DOCTYPE html>
<html>
    <head>
      <title>VPN over Internet</title>
	<link rel="stylesheet" type="text/css" href="css/cciers.css" />
	<link rel="stylesheet" type="text/css" href="css/jquery.highlight-within-textarea.css"/>
	 
	<script src="scripts/jquery-3.2.1.js"></script>
	<script src="scripts/jquery-ui.js"></script>
	<script src="scripts/jquery.highlight-within-textarea.js"></script>
	 </head>
     <body>
	
	 <h2> Dynamic Multipoint VPN (DMVPN) </h2>
	</br>
	 <figure>
		<figcaption>Network Diagram</figcaption></br>
		<img src="images/dmvpn-p1-static.png" alt="DMVPN-P1-Static routing" style="width:700px;height:350px;">
	</figure> </br>
	 	 
	 <p class="note-head">DMVPN</p>
	 <p class="note-text">DMVPN is point to multipoint layer 3 overlay VPN:</p>
	 <p class="note-subtext">Logical hub and spoke topology.</p>
	 <p class="note-subtext">Direct spoke to spoke traffic is supported.</p>
	 <p class="note-text">DMVPN is combination of the following technologies:</p>
	 <p class="note-subtext">Multipoint GRE tunnels (mGRE).</p>
	 <p class="note-subtext">Next Hope Resolution Protocol (NHRP).</p>
	 <p class="note-subtext">Dynamic IPsec encryption.</p>
	 <p class="note-subtext">Routing Protocol (RIP, EIGRP, OSPF,BGP).</p>
	 <p class="note-subtext">Cisco Express Forwarding (CEF).</p>
	 <p class="note-text">DMVPN order of operations:</p>
	 <p class="note-subtext">Crypto --- NHRP --- Routing.</p></br>
	 
	 <p class="note-head">Multipoint GRE (mGRE)</p>
	 <p class="note-text">No tunnel destination.</p>
	 <p class="note-text">Uses tunnel source and tunnel mode.</p>
	 <p class="note-text">Tunnels can have many end points (using single tunnel interface).</p>
	 <p class="note-text">The end points can be configured as GRE or mGRE.</p>
	 <p class="note-text">Mapping is done by NHRP protocol.</p></br>
	 
	 
	 <p class="note-head">Next Hope Resolution Protocol (NHRP)</p>
	 <p class="note-text">Maps the tunnel IP with NBMA address (public IP) (static or dynamic) .</p>
	 <p class="note-text">Provides layer 2 address resolution protocol and caching service (similar to ARP and inverse ARP).</p>
	 <p class="note-text">All it dose is building a dynamic database stored on the hub with information about spokes IP address.</p>
	 <p class="note-text">The end points can be configured as GRE or mGRE.</p>
	 <p class="note-text">Mapping is done by NHRP protocol.</p>
	 <p class="note-text">Routers can be configured as:</p>
	 <p class="note-subtext">Next Hope Servers (NHS).</p>
	 <p class="note-subtext">Next Hop Clients (NHC).</p>
	 <p class="note-text">NHS acts as mapping agent and stores all registered mappings.</p>
	 <p class="note-text">NHC send query to the NHS if they want to communicate with another NHC.</p>
	 <p class="note-text">NHS reply to queries made by NHC.</p></br>
	 
	 <p class="note-head">NHRP Messages.</p>
	 <p class="note-text">NHRP registration request:</p>
	 <p class="note-subtext">Spoke register with NBMA and tunnel IP to NHS.</p>
	 <p class="note-subtext">Required to build spoke to hub tunnels.</p>
	 <p class="note-text">NHRP resolution request:</p>
	 <p class="note-subtext">Spoke query for NBMA and tunnel IP of other spokes.</p>
	 <p class="note-subtext">Required to build spoke to spoke tunnels.</p>
	 <p class="note-text">NHRP redirect:</p>
	 <p class="note-subtext">Server answer spoke to spoke dataplane packet throuh it.</p>
	 <p class="note-subtext">Used in DMVPN phase 3 to build spoke to spoke tunnels.</p></br>
	 
	 <p class="note-head">DMVPN: Advantages.</p>
	 <p class="note-text">Simplified Hub router configuration.</p>
	 <p class="note-text">Full support for routers with dynamic IP addressing.</p>
	 <p class="note-text">Dynamic creation of spoke-to-spoke VPN tunnels.</p>
	 <p class="note-text">Lower administrative costs.</p>
	 <p class="note-text">Optional strong security with IPsec.</p></br>
	 
	 <p class="note-head">DMVPN: Phases.</p>
	 <p class="note-text">Phase 1 - Hub and Spoke (mGRE hub, p2p GRE spokes).</p>
	 <p class="note-text">Phase 2 - Hub and Spoke with Spoke-to-Spoke tunnels (mGRE everywhere).</p>
	 <p class="note-text">Phase 3 - NHRP resolution/redirect request.</p></br>
<! ========================================================================================================== >	 
	 <h2> LAB - DMVPN Phase 1 static routing</h2></br>
	 <h3 id="task"> Task </h3>
	 <ol class='ol-wb'>
	 <li class='li-wb'> R1 should be configure as hub and R2, R3, and R4 will be configured as spokes. </li>
	 <li class='li-wb'> Use tunnel IP address 10.0.0.X/24. </li>
	 <li class='li-wb'> Ensure that all the sites sould have reachability to tunnel end points. </li>
	 <li class='li-wb'> For NHRP use static mapping. </li>
	 </ol> </br>
	
	<h3> Solution </h3>
	 <font id="config">
		R1#conf t </br>
		R1(config)#int tunnel 1234</br>
		R1(config-if)#ip address 10.0.0.1 255.255.255.0</br>
		R1(config-if)#tunnel source s0/1</br>
		R1(config-if)#<span class='command'>tunnel mode gre multipoint </span> </br>
		R1(config-if)#ip nhrp network-id 1</br>
		R1(config-if)#ip nhrp map 10.0.0.2 172.16.25.2</br>
		R1(config-if)#ip nhrp map 10.0.0.3 172.16.35.3</br>
		R1(config-if)#ip nhrp map 10.0.0.4 172.16.45.4</br>
		R1(config-if)#exit</br></br>

		R2#conf t</br>
		R2(config)#int tunnel 1234</br>
		R2(config-if)#ip address 10.0.0.2 255.255.255.0</br>
		R2(config-if)#tunnel source 172.16.25.2</br>
		R2(config-if)#tunnel destination 172.16.15.1 </br>
		R2(config-if)#ip nhrp network-id 2</br>
		R2(config-if)#ip nhrp map <span class='command'>10.0.0.1 172.16.15.1</span></br>
		R2(config-if)#exit</br></br>

		R3#conf t</br>
		R3(config)#int tunnel 1234</br>
		R3(config-if)#ip address 10.0.0.3 255.255.255.0</br>
		R3(config-if)#tunnel source 172.16.35.3</br>
		R3(config-if)#tunnel destination 172.16.15.1</br> 
		R3(config-if)#ip nhrp network-id 3</br>
		R3(config-if)#ip nhrp map <span class='command'>10.0.0.1 172.16.15.1</span></br>
		R3(config-if)#exit</br></br>

		R4#conf t</br>
		R4(config)#int tunnel 1234</br>
		R4(config-if)#ip address 10.0.0.4 255.255.255.0</br>
		R4(config-if)#tunnel source 172.16.45.4</br>
		R4(config-if)#tunnel destination 172.16.15.1 </br>
		R4(config-if)#ip nhrp network-id 4</br>
		R4(config-if)#ip nhrp map<span class='command'> 10.0.0.1 172.16.15.1</span></br>
		R4(config-if)#exit</br></br>
		</font>
	 
 <font id="config">
 <h3> Verifying the configuration</h3>
 R1#show dmvpn </br>
 R1#show ip nhrp </br>
 R1#ping 10.0.0.2 </br>
 R1#ping 10.0.0.3 </br>
 R1#ping 10.0.0.4</br>
 </font></br>
 	 
<textarea class='output-7' rows="13" cols="85" readonly>	
R1#sh dmvpn 
Legend: Attrb --> S - Static, D - Dynamic, I - Incompletea
		N - NATed, L - Local, X - No Socket
		# Ent --> Number of NHRP entries with same NBMA peer

Tunnel1234, Type:Spoke, NHRP Peers:3, 
 # Ent  Peer NBMA Addr Peer Tunnel Add State  UpDn Tm Attrb
 ----- --------------- --------------- ----- -------- -----
	 1     172.16.25.2        10.0.0.2  NHRP    never S    
	 1     172.16.35.3        10.0.0.3  NHRP    never S    
	 1     172.16.45.4        10.0.0.4  NHRP    never S    
</textarea></br></br>

<script>
 $('.output-7').highlightWithinTextarea({
	highlight: [' Type:Spoke, ',' never S ']
});
</script>

<textarea class='output-6'rows="13" cols="85" readonly>	
R1#sh ip nhrp 
10.0.0.2/32 via 10.0.0.2, Tunnel1234 created 00:02:30, never expire 
  Type: static, Flags: 
  NBMA address: 172.16.25.2 
10.0.0.3/32 via 10.0.0.3, Tunnel1234 created 00:02:30, never expire 
  Type: static, Flags: 
  NBMA address: 172.16.35.3 
10.0.0.4/32 via 10.0.0.4, Tunnel1234 created 00:02:30, never expire 
  Type: static, Flags: 
  NBMA address: 172.16.45.4 
</textarea></br></br>

<script>
 $('.output-6').highlightWithinTextarea({
	highlight: ['  Type: static, ']
});
</script>

<textarea rows="22" cols="85" readonly>
R1#ping 10.0.0.2

Type escape sequence to abort.
Sending 5, 100-byte ICMP Echos to 10.0.0.2, timeout is 2 seconds:
!!!!!
Success rate is 100 percent (5/5), round-trip min/avg/max = 1/8/32 ms


R1#ping 10.0.0.3

Type escape sequence to abort.
Sending 5, 100-byte ICMP Echos to 10.0.0.3, timeout is 2 seconds:
!!!!!
Success rate is 100 percent (5/5), round-trip min/avg/max = 1/3/8 ms


R1#ping 10.0.0.4

Type escape sequence to abort.
Sending 5, 100-byte ICMP Echos to 10.0.0.4, timeout is 2 seconds:
!!!!!
Success rate is 100 percent (5/5), round-trip min/avg/max = 1/5/24 ms
</textarea></br></br>

<textarea class='output-3' rows="8" cols="85" readonly>
R4#traceroute 10.0.0.2 source 10.0.0.4

Type escape sequence to abort.
Tracing the route to 10.0.0.2

  1 10.0.0.1 8 msec 16 msec 0 msec
  2 10.0.0.2 0 msec 12 msec 0 msec
</textarea></br></br>

 <script>
 $('.output-3').highlightWithinTextarea({
	highlight: [' 1 10.0.0.1 ']
});
</script>


<textarea class='output-4' rows="8" cols="85" readonly>
R3#traceroute 10.0.0.2 source 10.0.0.3

Type escape sequence to abort.
Tracing the route to 10.0.0.2

  1 10.0.0.1 12 msec 0 msec 0 msec
  2 10.0.0.2 4 msec 0 msec 4 msec
</textarea></br></br>

<script>
 $('.output-4').highlightWithinTextarea({
	highlight: [' 1 10.0.0.1 ']
});
</script>

<textarea class='output-5' rows="8" cols="85" readonly>
R2#traceroute 10.0.0.4 source 10.0.0.2

Type escape sequence to abort.
Tracing the route to 10.0.0.4

  1 10.0.0.1 4 msec 0 msec 0 msec
  2 10.0.0.4 4 msec 4 msec 4 msec
</textarea></br>

<script>
 $('.output-5').highlightWithinTextarea({
	highlight: [' 1 10.0.0.1 ']
});
</script>

	<strong>Notice:</strong><br>
		 <span class="cli-output-notice">All spoke routers travells through hub router (10.0.0.1) </span></br></br>
		 
	<! ========================================================================================================= >
	<h2> LAB: DMVPN Phase 1 NHRP Dynamic Routing/Mappings</h2></br>
	 <h3 id="task"> Task </h3>
	 <ol class='ol-wb'>
	 <li class='li-wb'> Remove the tunnel 1234 from routers R1, R2, R3 and R4 . </li>
	 <li class='li-wb'> Reconfigure DMVPN phase 1 tunnel using NHRP dynamic mapping. </li>
	 </ol> </br>
	
	<h3> Solution </h3>
	 <font id="config">
		<span style='color:red;'>X</span> = R1, R2, R3 and R4 </br>
		R<span style='color:red;'>X</span>#conf t </br>
		R<span style='color:red;'>X</span>(config)#no int tunnel 1234</br></br>
		
		R1#conf t </br>                               
		R1(config)#int tu 1234                        </br>
		R1(config-if)#ip add 10.0.0.1 255.255.255.0   </br>
		R1(config-if)#tu source 172.16.15.1           </br>
		R1(config-if)#tunnel mode gre multipoint      </br>
		R1(config-if)#ip nhrp network-id 1            </br>
		R1(config-if)#exit                            </br></br>
		
		<strong>Notice:</strong><br>
	    <span class="cli-output-notice">no nhrp static mapping commands on router R1 (Hub router) </span></br></br>
		
		R2#conf t                                        </br>
		R2(config)#int tu 1234                           </br>
		R2(config-if)#ip add 10.0.0.2 255.255.255.0      </br>
		R2(config-if)#tu source s0/2                     </br>
		R2(config-if)#tunnel destination 172.16.15.1     </br>
		R2(config-if)#ip nhrp network-id 2               </br>
		R2(config-if)#<span class='command'>ip nhrp nhs 10.0.0.1 </span></br>
		R2(config-if)#ip nhrp map 10.0.0.1 172.16.15.1   </br>
		R2(config-if)#exit                               </br></br>
        
		<strong>Notice:</strong><br>
	    <span class="cli-output-notice">ip nhrp nhs (next hop server) command on spoke routers. </span></br></br>
	
        R3#conf t                                        </br>
		R3(config)#int tu 1234                           </br>
		R3(config-if)#ip add 10.0.0.3 255.255.255.0      </br>
		R3(config-if)#tu source s0/3                     </br>
		R3(config-if)#tunnel destination 172.16.15.1     </br>
		R3(config-if)#ip nhrp network-id 3               </br>
		R3(config-if)#<span class='command'>ip nhrp nhs 10.0.0.1 </span></br>
		R3(config-if)#ip nhrp map 10.0.0.1 172.16.15.1   </br>
		R3(config-if)#exit                               </br>
                                                         </br>
		R4#conf t                                        </br>
		R4(config)#int tu 1234                           </br>
		R4(config-if)#ip add 10.0.0.4 255.255.255.0      </br>
		R4(config-if)#tu source s0/4                     </br>
		R4(config-if)#tunnel destination 172.16.15.1     </br>
		R4(config-if)#ip nhrp network-id 4               </br>
		R4(config-if)#<span class='command'>ip nhrp nhs 10.0.0.1 </span></br>
		R4(config-if)#ip nhrp map 10.0.0.1 172.16.15.1   </br>
		R4(config-if)#exit                               </br>
		</font></br> </br>
	 
	 <font id="config">
	 <h3> Verifying the configuration</h3>
	 R1#show dmvpn </br>
	 R1#show ip nhrp </br>
	 R1#ping 10.0.0.2 </br>
	 R1#ping 10.0.0.3 </br>
	 R1#ping 10.0.0.4</br>
	 </font></br>
	 	 
<textarea id='output-9' rows="12" cols="85" readonly>	
R1#sh dmvpn 
Legend: Attrb --> S - Static, D - Dynamic, I - Incompletea
        N - NATed, L - Local, X - No Socket
        # Ent --> Number of NHRP entries with same NBMA peer

Tunnel1234, Type:Hub, NHRP Peers:3, 
 # Ent  Peer NBMA Addr Peer Tunnel Add State  UpDn Tm Attrb
 ----- --------------- --------------- ----- -------- -----
 1     172.16.25.2        10.0.0.2    UP    never D    
 1     172.16.35.3        10.0.0.3    UP    never D    
 1     172.16.45.4        10.0.0.4    UP    never D    
</textarea></br></br>

<script>
  $('#output-9').highlightTextarea({
		   words: [' never D',' Type:Hub, '],
		   caseSensitive: false
  });                                  
</script>	

<textarea id='output-8'rows="11" cols="85" readonly>	
R1#sh ip nhrp 
10.0.0.2/32 via 10.0.0.2, Tunnel1234 created 02:02:43, expire 01:57:16
  Type: dynamic, Flags: unique registered 
  NBMA address: 172.16.25.2 
10.0.0.3/32 via 10.0.0.3, Tunnel1234 created 02:02:11, expire 01:57:49
  Type: dynamic, Flags: unique registered 
  NBMA address: 172.16.35.3 
10.0.0.4/32 via 10.0.0.4, Tunnel1234 created 02:01:42, expire 01:58:18
  Type: dynamic, Flags: unique registered 
  NBMA address: 172.16.45.4 
</textarea></br></br>

<script>
  $('#output-8').highlightTextarea({
		   words: [' Type: dynamic, '],
		   caseSensitive: false
  });                                  
</script>	</br>

	<! ======================================================================================== >
	 
	 <p class="note-head">DMVPN Phase 2</p>
	 <p class="note-text">Hub and Spokes are configured as multipoint GRE.</p>
	 <p class="note-text">Spoke to spoke tunnels are created.</p>
	 <p class="note-text">NHRP required for spoke registration to hub.</p>
	 <p class="note-text">NHRP required for spoke to spoke resolution .</p></br></br>
	 
	 <p class="note-head">DMVPN Phase 3</p>
	 <p class="note-text">Hub and spoke with spioke to spoke direct communication allowed with better scalability using NHRP redirects.</p>
	 </br></br>

	 <h2> LAB - DMVPN Phase 2 Static Mapping</h2></br>
	 <h3 id="task"> Task </h3>
	 <ol class='ol-wb'>
	 <li class='li-wb'> Remove tunnel configuration from all routers. </li>
	 <li class='li-wb'> Reconfigure DMVPN phase 2 using the same hub (R1) and spokes (R2, R3, and R4) network. </li>
	 <li class='li-wb'> Use IP addressing 10.0.0.X/24 and to ensure that all tunnel end points should be able to reach each other using static mapping. </li>
	 </ol> </br>
	
	<h3> Solution </h3>
	 <font id="config">
		<span style='color:red;'>X</span> = R1, R2, R3 and R4 </br>
		R<span style='color:red;'>X</span>#conf t </br>
		R<span style='color:red;'>X</span>(config)#no int tunnel 1234</br></br>
		
		R1#conf t                                         </br>
		R1(config)#int tu 1234                            </br>
		R1(config-if)#ip add 10.0.0.1 255.255.255.0       </br>
		R1(config-if)#tu source 172.16.15.1               </br>
		R1(config-if)#<span class='command2'>tunnel mode gre multipoint </span>         </br>
		R1(config-if)#ip nhrp network-id 1                </br>
		R1(config-if)#<span class='command'>ip nhrp map 10.0.0.2 172.16.25.2 </span>   </br>
		R1(config-if)#<span class='command'>ip nhrp map 10.0.0.3 172.16.35.3 </span>   </br>
		R1(config-if)#<span class='command'>ip nhrp map 10.0.0.4 172.16.45.4 </span>   </br>
		R1(config-if)#exit                                </br></br>

		<strong>Notice:</strong><br>
	    <span class="cli-output-notice">all routers configured with GRE multipoit mode and static nhrp IP mapping. </span></br></br>
		
		R2#conf t                                         </br>
		R2(config)#int tu 1234                            </br>
		R2(config-if)#ip add 10.0.0.2 255.255.255.0       </br>
		R2(config-if)#tu source s0/2                      </br>
		R2(config-if)#<span class='command2'>tunnel mode gre multipoint  </span>        </br>
		R2(config-if)#ip nhrp network-id 2                </br>
		R2(config-if)#<span class='command'>ip nhrp map 10.0.0.1 172.16.15.1 </span>   </br>
		R2(config-if)#<span class='command'>ip nhrp map 10.0.0.3 172.16.35.3 </span>   </br>
		R2(config-if)#<span class='command'>ip nhrp map 10.0.0.4 172.16.45.4 </span>   </br>
		R2(config-if)#exit                                </br></br>
                                                          
		R3(config)#int tu 1234                            </br>
		R3(config-if)#ip add 10.0.0.3 255.255.255.0       </br>
		R3(config-if)#tu source s0/3                      </br>
		R3(config-if)#<span class='command2'>tunnel mode gre multipoint </span>         </br>
		R3(config-if)#ip nhrp network-id 3                </br>
		R3(config-if)#<span class='command'>ip nhrp map 10.0.0.1 172.16.15.1</span>   </br>
		R3(config-if)#<span class='command'>ip nhrp map 10.0.0.2 172.16.25.2</span>   </br>
		R3(config-if)#<span class='command'>ip nhrp map 10.0.0.4 172.16.45.4</span>   </br>
		R3(config-if)#exit                                </br></br>
                                                          
		R4(config)#int tu 1234                            </br>
		R4(config-if)#ip add 10.0.0.4 255.255.255.0       </br>
		R4(config-if)#tu source s0/4                      </br>
		R4(config-if)#<span class='command2'>tunnel mode gre multipoint </span>         </br>
		R4(config-if)#ip nhrp network-id 4                </br>
		R4(config-if)#<span class='command'>ip nhrp map 10.0.0.1 172.16.15.1</span>  </br>
		R4(config-if)#<span class='command'>ip nhrp map 10.0.0.2 172.16.25.2</span>  </br>
		R4(config-if)#<span class='command'>ip nhrp map 10.0.0.3 172.16.35.3</span>  </br>
		R4(config-if)#exit                                </br>
		</font></br> 
	 
	 <font id="config">
	 <h3> Verifying configuration</h3>
	 R4#traceroute 10.0.0.2 </br>
	 R3#traceroute 10.0.0.2 </br>
	 R2#traceroute 10.0.0.4 </br>
	 </font></br>
	 	 
<textarea id='output-10' rows="6" cols="85" readonly>
R4#traceroute 10.0.0.2

Type escape sequence to abort.
Tracing the route to 10.0.0.2

  1 10.0.0.2 8 msec 8 msec 4 msec
 </textarea></br></br>

 <script>
  $('#output-10').highlightTextarea({
           words: ['  1 10.0.0.2 '],
		   caseSensitive: false
  });                                  
</script>	

<textarea id='output-11' rows="6" cols="85" readonly>
R3#traceroute 10.0.0.2

Type escape sequence to abort.
Tracing the route to 10.0.0.2

  1 10.0.0.2 8 msec 4 msec 0 msec
</textarea></br></br>

<script>
  $('#output-11').highlightTextarea({
           words: ['  1 10.0.0.2 '],
		   caseSensitive: false
  });                                  
</script>	

<textarea id='output-12' rows="6" cols="85" readonly>
R2#traceroute 10.0.0.4

Type escape sequence to abort.
Tracing the route to 10.0.0.4

  1 10.0.0.4 8 msec 0 msec 0 msec
</textarea></br>

<script>
  $('#output-12').highlightTextarea({
           words: ['  1 10.0.0.4 '],
		   caseSensitive: false
  });                                  
</script>
<strong>Notice:</strong><br>
	 <span class="cli-output-notice">spoke routers communicate directly each other <span style='color:black;'>NOT</span> through hub router (R1). </span></br></br>

<! ========================================================================== >	 
	 
	 <h2> LAB - DMVPN Phase 2 Dynamic Mapping</h2></br>
	 <h3 id="task"> Task </h3>
	 <ol class='ol-wb'>
	 <li class='li-wb'> Remove tunnel configuration from all routers. </li>
	 <li class='li-wb'> Reconfigure DMVPN phase 2 using the same hub (R1) and spokes (R2, R3, and R4) network. </li>
	 <li class='li-wb'> Use IP addressing 10.0.0.X/24 and to ensure that all tunnel end points should be able to reach each other using dynamic mapping . </li>
	 </ol> </br>
	
	<h3> Solution </h3>
	 <font id="config">
		<span style='color:red;'>X</span> = R1, R2, R3 and R4 </br>
		R<span style='color:red;'>X</span>#conf t </br>
		R<span style='color:red;'>X</span>(config)#no int tunnel 1234</br></br>
		
		R1#conf t                                         </br>
		R1(config)#int tu 1234                            </br>
		R1(config-if)#ip add 10.0.0.1 255.255.255.0       </br>
		R1(config-if)#tu source 172.16.15.1               </br>
		R1(config-if)#tunnel mode gre multipoint          </br>
		R1(config-if)#ip nhrp network-id 1                </br>
		R1(config-if)#exit                                </br></br>
		
		R2#conf t                                         </br>
		R2(config)#int tu 1234                            </br>
		R2(config-if)#ip add 10.0.0.2 255.255.255.0       </br>
		R2(config-if)#tu source s0/2                      </br>
		R2(config-if)#tunnel mode gre multipoint          </br>
		R2(config-if)#ip nhrp network-id 2                </br>
		R2(config-if)#ip nhrp nhs 10.0.0.1                </br>
		R2(config-if)#ip nhrp map 10.0.0.1 172.16.15.1    </br>
		R2(config-if)#exit                                </br></br>
                                                          
 		R3#conf t                                         </br>
		R3(config)#int tu 1234                            </br>
		R3(config-if)#ip add 10.0.0.3 255.255.255.0       </br>
		R3(config-if)#tu source s0/3                      </br>
		R3(config-if)#tunnel mode gre multipoint          </br>
		R3(config-if)#ip nhrp network-id 3                </br>
		R3(config-if)#ip nhrp nhs 10.0.0.1                </br>
		R3(config-if)#ip nhrp map 10.0.0.1 172.16.15.1    </br>
		R3(config-if)#exit                                </br></br>
                                                          
		R4#conf t                                         </br>
		R4(config)#int tu 1234                            </br>
		R4(config-if)#ip add 10.0.0.4 255.255.255.0       </br>
		R4(config-if)#tu source s0/4                      </br>
		R4(config-if)#tunnel mode gre multipoint          </br>
		R4(config-if)#ip nhrp network-id 4                </br>
		R4(config-if)#ip nhrp nhs 10.0.0.1                </br>
		R4(config-if)#ip nhrp map 10.0.0.1 172.16.15.1    </br>
		R4(config-if)#exit                                </br>
		</font></br> 
	 
	 <font id="config">
	 <h3> Verifying configuration</h3>
	 R1#show dmvpn </br>
	 R2#show dmvpn </br>
	 R3#show dmvpn </br>
	 R3#show dmvpn </br>
	 </font></br>
	 	 
<textarea id='output-14' rows="11" cols="85" readonly>
R1#sh dmvpn
Legend: Attrb --> S - Static, D - Dynamic, I - Incompletea
        N - NATed, L - Local, X - No Socket
        # Ent --> Number of NHRP entries with same NBMA peer

Tunnel1234, Type:Hub, NHRP Peers:3, 
 # Ent  Peer NBMA Addr Peer Tunnel Add State  UpDn Tm Attrb
 ----- --------------- --------------- ----- -------- -----
     1     172.16.25.2        10.0.0.2    UP    never D    
     1     172.16.35.3        10.0.0.3    UP    never D    
     1     172.16.45.4        10.0.0.4    UP    never D    
 </textarea></br></br>

 <script>
  $('#output-14').highlightTextarea({
           words: ['Type:Hub','never D'],
		   caseSensitive: false
  });                                  
</script>	

<textarea id='output-15' rows="11" cols="85" readonly>
R2#sh dmvpn
Legend: Attrb --> S - Static, D - Dynamic, I - Incompletea
        N - NATed, L - Local, X - No Socket
        # Ent --> Number of NHRP entries with same NBMA peer

Tunnel1234, Type:Spoke, NHRP Peers:3, 
 # Ent  Peer NBMA Addr Peer Tunnel Add State  UpDn Tm Attrb
 ----- --------------- --------------- ----- -------- -----
     1     172.16.15.1        10.0.0.1    UP 00:32:46 S    
     1     172.16.35.3        10.0.0.3    UP    never D    
     1     172.16.45.4        10.0.0.4    UP    never D    
</textarea></br></br>

<script>
  $('#output-15').highlightTextarea({
           words: ['Type:Spoke','never D','00:32:46 S '],
		   caseSensitive: false
  });                                  
</script>	

<textarea id='output-16' rows="11" cols="85" readonly>
R3#sh dmvpn
Legend: Attrb --> S - Static, D - Dynamic, I - Incompletea
        N - NATed, L - Local, X - No Socket
        # Ent --> Number of NHRP entries with same NBMA peer

Tunnel1234, Type:Spoke, NHRP Peers:3, 
 # Ent  Peer NBMA Addr Peer Tunnel Add State  UpDn Tm Attrb
 ----- --------------- --------------- ----- -------- -----
     1     172.16.15.1        10.0.0.1    UP 00:19:33 S    
     1     172.16.25.2        10.0.0.2    UP    never D    
     1     172.16.45.4        10.0.0.4    UP    never D    
</textarea></br></br>

<script>
  $('#output-16').highlightTextarea({
           words: ['Type:Spoke','never D','00:19:33 S '],
		   caseSensitive: false
  });                                  
</script>	

<textarea id='output-17' rows="11" cols="85" readonly>
R4#sh dmvpn
Legend: Attrb --> S - Static, D - Dynamic, I - Incompletea
        N - NATed, L - Local, X - No Socket
        # Ent --> Number of NHRP entries with same NBMA peer

Tunnel1234, Type:Spoke, NHRP Peers:3, 
 # Ent  Peer NBMA Addr Peer Tunnel Add State  UpDn Tm Attrb
 ----- --------------- --------------- ----- -------- -----
     1     172.16.15.1        10.0.0.1    UP 00:37:21 S    
     1     172.16.25.2        10.0.0.2    UP    never D    
     1     172.16.35.3        10.0.0.3    UP    never D    
</textarea></br></br>

<script>
  $('#output-17').highlightTextarea({
           words: ['Type:Spoke','never D','00:37:21 S '],
		   caseSensitive: false
  });                                  
</script>	

<strong>Notice:</strong><br>
	 <span class="cli-output-notice"></span></br></br>	 
	 
<! ================================================================================================ >
	 
	 <h2> LAB - DMVPN Phase 1 (Dynamic Mapping) over RIPv2</h2></br>
	 <h3 id="task"> Task </h3>
	 <ol class='ol-wb'>
	 <li class='li-wb'> Configure DMVPN Phase 1 dynamic mapping. </li>
	 </li>
	 </ol> </br>
	
	<h3> Solution </h3>
	 <font id="config">
		R1#conf t </br>                               
		R1(config)#int tu 1234                        </br>
		R1(config-if)#ip add 10.0.0.1 255.255.255.0   </br>
		R1(config-if)#tu source 172.16.15.1           </br>
		R1(config-if)#tunnel mode gre multipoint      </br>
		R1(config-if)#ip nhrp network-id 1            </br>
		R1(config-if)#exit                            </br></br>
		
		<strong>Notice:</strong><br>
	    <span class="cli-output-notice">no nhrp static mapping commands on router R1 (Hub router) </span></br></br>
		
		R2#conf t                                        </br>
		R2(config)#int tu 1234                           </br>
		R2(config-if)#ip add 10.0.0.2 255.255.255.0      </br>
		R2(config-if)#tu source s0/2                     </br>
		R2(config-if)#tunnel destination 172.16.15.1     </br>
		R2(config-if)#ip nhrp network-id 2               </br>
		R2(config-if)#<span class='command'>ip nhrp nhs 10.0.0.1 </span></br>
		R2(config-if)#ip nhrp map 10.0.0.1 172.16.15.1   </br>
		R2(config-if)#exit                               </br></br>
        
		<strong>Notice:</strong><br>
	    <span class="cli-output-notice">ip nhrp nhs (next hop sever) command on spoke routers. </span></br></br>
	
        R3#conf t                                        </br>
		R3(config)#int tu 1234                           </br>
		R3(config-if)#ip add 10.0.0.3 255.255.255.0      </br>
		R3(config-if)#tu source s0/3                     </br>
		R3(config-if)#tunnel destination 172.16.15.1     </br>
		R3(config-if)#ip nhrp network-id 3               </br>
		R3(config-if)#<span class='command'>ip nhrp nhs 10.0.0.1 </span></br>
		R3(config-if)#ip nhrp map 10.0.0.1 172.16.15.1   </br>
		R3(config-if)#exit                               </br>
                                                         </br>
		R4#conf t                                        </br>
		R4(config)#int tu 1234                           </br>
		R4(config-if)#ip add 10.0.0.4 255.255.255.0      </br>
		R4(config-if)#tu source s0/4                     </br>
		R4(config-if)#tunnel destination 172.16.15.1     </br>
		R4(config-if)#ip nhrp network-id 4               </br>
		R4(config-if)#<span class='command'>ip nhrp nhs 10.0.0.1 </span></br>
		R4(config-if)#ip nhrp map 10.0.0.1 172.16.15.1   </br>
		R4(config-if)#exit                               </br>
		</font></br> </br>
	 
	 <h3 id="task"> Task </h3>
	 <ol class='ol-wb'>
	 <li class='li-wb'> Configure RIPv2 routing on all routers (R1, R2, R3 and R4) to have reachability between LAN interfaces. </li>
	 </li>
	 </ol> </br>
	
	<h3> Solution </h3>
	 <font id="config">
	 R1#conf t                                 </br>     
	 R1(config)#router rip                     </br>
	 R1(config-router)#version 2               </br>
	 R1(config-router)#no auto-summary         </br>
	 R1(config-router)#network 10.0.0.0        </br>
	 R1(config-router)#network 192.168.1.0     </br>
	 R1(config-router)#exit                    </br></br>
	                                           
	 R2#conf t                                 </br>     
	 R2(config)#router rip                     </br>
	 R2(config-router)#version 2               </br>
	 R2(config-router)#no auto-summary         </br>
	 R2(config-router)#network 10.0.0.0        </br>
	 R2(config-router)#network 192.168.2.0     </br>
	 R2(config-router)#exit                    </br></br>
	                                          
	 R3#conf t                                 </br>     
	 R3(config)#router rip                     </br>
	 R3(config-router)#version 2               </br>
	 R3(config-router)#no auto-summary         </br>
	 R3(config-router)#network 10.0.0.0        </br>
	 R3(config-router)#network 192.168.3.0     </br>
	 R3(config-router)#exit                    </br></br>
	                                           
	 R4#conf t                                 </br>     
	 R4(config)#router rip                     </br>
	 R4(config-router)#version 2               </br>
	 R4(config-router)#no auto-summary         </br>
	 R4(config-router)#network 10.0.0.0        </br>
	 R4(config-router)#network 192.168.4.0     </br>
	 R4(config-router)#exit
	 </font></br> </br>
	 
	 <p class="note-head">Notes:</p>
	 <p class="note-text">The <span class='command'>'ip nhrp map multicast dynamic' </span> command enables the forwarding of multicast traffic accross the tunnel.</p>
	 <p class="note-text">This command is usually required by routing protocols such as OSPF and EIGRP.</p>
	 <p class="note-text">In most cases, DMVPN is accompanied by a routing protocol to send/receive dynamic updates about the private networks.</p>
	 <p class="note-text">The <span class='command'>'ip nhrp map multicast dynamic' </span>command is not required if we are suing static NHRP mappings.</p>
	 </br>
	 
	 <font id="config">
	 R1#conf t                                 		</br>     
	 R1(config)#int tunnel 1234                     </br>
	 R1(config-if)#<span class='command'>ip nhrp map multicast dynamic </span> 	</br></br>
	 
	 OR </br></br>
	 
	 R1(config)#int tunnel 1234                      </br>
	 R1(config-if)#<span class='command'>ip nhrp map multicast 172.16.25.2</span></br>
	 R1(config-if)#<span class='command'>ip nhrp map multicast 172.16.35.3</span></br>
	 R1(config-if)#<span class='command'>ip nhrp map multicast 172.16.45.4</span></br></br>
	 </font>
	 
	 
	 <font id="config">
	 <h3> Verifying configuration</h3>
	 R1#show ip route rip </br>
	 R2#show ip route rip </br>
	 R3#show ip route rip </br>
	 R4#show ip route rip </br>
	 </font></br>
	 	 
<textarea id='output-18' rows="4" cols="85" readonly>
R1#sh ip route rip
R    192.168.4.0/24 [120/1] via 10.0.0.4, 00:00:22, Tunnel1234
R    192.168.2.0/24 [120/1] via 10.0.0.2, 00:00:06, Tunnel1234
R    192.168.3.0/24 [120/1] via 10.0.0.3, 00:00:02, Tunnel1234
 </textarea></br></br>

 <script>
  $('#output-18').highlightTextarea({
           words: ['120','10.0.0.4','10.0.0.2','10.0.0.3'],
		   caseSensitive: false
  });                                  
</script>	

<textarea  rows="2" cols="85" readonly>
R2#sh ip route rip 
R    192.168.1.0/24 [120/1] via 10.0.0.1, 00:00:20, Tunnel1234
 </textarea></br></br>
 
 <textarea  rows="2" cols="85" readonly>
R3#sh ip route rip 
R    192.168.1.0/24 [120/1] via 10.0.0.1, 00:00:05, Tunnel1234
 </textarea></br></br>
 
 <textarea  rows="2" cols="85" readonly>
R4#sh ip route rip 
R    192.168.1.0/24 [120/1] via 10.0.0.1, 00:00:21, Tunnel1234
 </textarea></br></br>

<strong>Notice:</strong><br>
	 <span class="cli-output-notice">due to the Split Horizon rules, update sent out s0/1 (Port on hub router R1), do not advertise routes whose outgoing interface is s0/1. so that our hub and spokes network, spoke routers did not get update each other routes. Prevent this we are going to issue 'no ip split horizon' command on hub router interface tunnel 1234 and see the result. </span></br></br>	 

	 <font id="config">
	 R1#conf t                                 		</br>     
	 R1(config)#int tunnel 1234                     </br>
	 R1(config-if)#<span class='command'>no ip split-horizon</span> </br>
     R1(config-if)#exit</br></br>
 </font>
	 
<textarea  rows="4" cols="85" readonly>
R2#sh ip route rip 
R    192.168.4.0/24 [120/2] via 10.0.0.4, 00:00:17, Tunnel1234
R    192.168.1.0/24 [120/1] via 10.0.0.1, 00:00:17, Tunnel1234
R    192.168.3.0/24 [120/2] via 10.0.0.3, 00:00:17, Tunnel1234
 </textarea></br></br>
 
<textarea  rows="4" cols="85" readonly>
R3#sh ip route rip 
R    192.168.4.0/24 [120/2] via 10.0.0.4, 00:00:12, Tunnel1234
R    192.168.1.0/24 [120/1] via 10.0.0.1, 00:00:12, Tunnel1234
R    192.168.2.0/24 [120/2] via 10.0.0.2, 00:00:12, Tunnel1234
 </textarea></br></br>
 
<textarea  rows="4" cols="85" readonly>
R4#sh ip route rip 
R    192.168.1.0/24 [120/1] via 10.0.0.1, 00:00:06, Tunnel1234
R    192.168.2.0/24 [120/2] via 10.0.0.2, 00:00:06, Tunnel1234
R    192.168.3.0/24 [120/2] via 10.0.0.3, 00:00:06, Tunnel1234
 </textarea></br></br>
 
<! ================================================================================================ >	 

	 <h2> LAB - DMVPN Phase 1 (Dynamic Mapping) over EIGRP</h2></br>
	 <h3 id="task"> Task </h3>
	 <ol class='ol-wb'>
	 <li class='li-wb'> Continue with the same configs from the previous lab and only remove RIPv2 configurations on all routers. </li>
	  <li class='li-wb'> Re-enable IP split horizon back on R1 tunnel interface. </li>
	   <li class='li-wb'> Re-configure DMVPN phase 1 using EIGRP 100. </li>
	 </li>
	 </ol> </br>
	
	<h3> Solution </h3>
	 <font id="config">
		R1#conf t </br>                               
		R1(config)#int tunnel 1234                        </br>
		R1(config-if)#ip split-horizon   </br>
		R1(config-if)#no ip nhrp map multicast dynamic </br>
		R1(config-if)#exit  </br>              </br>
		
		<strong>Notice:</strong><br>
	    <span class="cli-output-notice"></span></br>
		
		<span style='color:red;'>X</span> = R1, R2, R3 and R4 </br>
		R<span style='color:red;'>X</span>#conf t </br>
		R<span style='color:red;'>X</span>(config)#no router rip</br></br>
		
		R1#conf t                                        </br>
		R1(config)#router eigrp 100      </br>
		R1(config-router)#no auto-summary                     </br>
		R1(config-router)#network 10.0.0.0     </br>
		R1(config-router)#network 192.168.1.0       </br>
		R1(config-router)#exit                               </br></br>
		
		R2#conf t                                        </br>
		R2(config)#router eigrp 100      </br>
		R2(config-router)#no auto-summary                     </br>
		R2(config-router)#network 10.0.0.0     </br>
		R2(config-router)#network 192.168.2.0       </br>
		R2(config-router)#exit  </br></br>
		
		R3#conf t                                        </br>
		R3(config)#router eigrp 100      </br>
		R3(config-router)#no auto-summary                     </br>
		R3(config-router)#network 10.0.0.0     </br>
		R3(config-router)#network 192.168.3.0       </br>
		R3(config-router)#exit  </br></br>
		
		R4#conf t                                        </br>
		R4(config)#router eigrp 100      </br>
		R4(config-router)#no auto-summary                     </br>
		R4(config-router)#network 10.0.0.0     </br>
		R4(config-router)#network 192.168.4.0       </br>
		R4(config-router)#exit </br>
		</font></br>
	 
	 <h3 id="task"> Task </h3>
	 <ol class='ol-wb'>
	 <li class='li-wb'> Configure RIPv2 routing on all routers (R1, R2, R3 and R4) to have reachability between LAN interfaces. </li>
	 </li>
	 </ol> </br>
	
	<h3> Solution </h3>
	 <font id="config">
	 R1#conf t                                 </br>     
	 R1(config)#router rip                     </br>
	 R1(config-router)#version 2               </br>
	 R1(config-router)#no auto-summary         </br>
	 R1(config-router)#network 10.0.0.0        </br>
	 R1(config-router)#network 192.168.1.0     </br>
	 R1(config-router)#exit                    </br></br>
	                                           
	 R2#conf t                                 </br>     
	 R2(config)#router rip                     </br>
	 R2(config-router)#version 2               </br>
	 R2(config-router)#no auto-summary         </br>
	 R2(config-router)#network 10.0.0.0        </br>
	 R2(config-router)#network 192.168.2.0     </br>
	 R2(config-router)#exit                    </br></br>
	                                          
	 R3#conf t                                 </br>     
	 R3(config)#router rip                     </br>
	 R3(config-router)#version 2               </br>
	 R3(config-router)#no auto-summary         </br>
	 R3(config-router)#network 10.0.0.0        </br>
	 R3(config-router)#network 192.168.3.0     </br>
	 R3(config-router)#exit                    </br></br>
	                                           
	 R4#conf t                                 </br>     
	 R4(config)#router rip                     </br>
	 R4(config-router)#version 2               </br>
	 R4(config-router)#no auto-summary         </br>
	 R4(config-router)#network 10.0.0.0        </br>
	 R4(config-router)#network 192.168.4.0     </br>
	 R4(config-router)#exit
	 </font></br> </br>
	 
	 <font id="config">
	 <h3> Verifying configuration</h3>
	 R1#show ip route eigrp </br>
	 R2#show ip route eigrp </br>
	 R3#show ip route eigrp </br>
	 R4#show ip route eigrp </br>
	 </font></br>
	 
<textarea class='output-18' rows="8" cols="85" readonly>
R1#sh ip eigrp neighbor        
IP-EIGRP neighbors for process 100
H   Address                 Interface       Hold Uptime   SRTT   RTO  Q  Seq
                                            (sec)         (ms)       Cnt Num
2   10.0.0.3                Tu1234            10 00:00:41    1  5000  1  0
1   10.0.0.4                Tu1234            14 00:00:42    1  5000  1  0
0   10.0.0.2                Tu1234            14 00:00:46    1  5000  1  0
 </textarea></br></br>

<textarea class='output-25'rows="4" cols="85" readonly>	
R2#sh ip eigrp neighbors 
IP-EIGRP neighbors for process 100
</textarea></br></br>
	<script>
 $('.output-25').highlightWithinTextarea({
    highlight: 'IP-EIGRP neighbors for process 100'
});
</script>
 
<textarea class='output-26' rows="4" cols="85" readonly>
R3#sh ip eigrp neighbors 
IP-EIGRP neighbors for process 100
</textarea></br></br>
 
  	<script>
 $('.output-26').highlightWithinTextarea({
    highlight: 'IP-EIGRP neighbors for process 100'
});
</script>

<textarea  class='output-27'rows="4" cols="85" readonly>
R4#sh ip eigrp neighbors 
IP-EIGRP neighbors for process 100
</textarea></br></br>

 	<script>
 $('.output-27').highlightWithinTextarea({
    highlight: 'IP-EIGRP neighbors for process 100'
});
</script>	
	 
	 <p class="note-head">Notes:</p>
	 <p class="note-text">The <span class='command'>'ip nhrp map multicast dynamic' </span> command enables the forwarding of multicast traffic accross the tunnel.</p>
	 <p class="note-text">This command is usually required by routing protocols such as OSPF and EIGRP.</p>
	 <p class="note-text">In most cases, DMVPN is accompanied by a routing protocol to send/receive dynamic updates about the private networks.</p>
	 <p class="note-text">The <span class='command'>'ip nhrp map multicast dynamic' </span>command is not required if we are suing static NHRP mappings.</p>
	 </br>
	 
	 <font id="config">
	 R1#conf t                                 		</br>     
	 R1(config)#int tunnel 1234                     </br>
	 R1(config-if)#<span class='command'>ip nhrp map multicast dynamic </span> 	</br></br>
	 
	 OR </br></br>
	 
	 R1(config)#int tunnel 1234                      </br>
	 R1(config-if)#<span class='command'>ip nhrp map multicast 172.16.25.2</span></br>
	 R1(config-if)#<span class='command'>ip nhrp map multicast 172.16.35.3</span></br>
	 R1(config-if)#<span class='command'>ip nhrp map multicast 172.16.45.4</span></br></br>
	 </font>
	 
<strong>Notice:</strong><br>
	 <span class="cli-output-notice">due to the Split Horizon rules, update sent out s0/1 (Port on hub router R1), do not advertise routes whose outgoing interface is s0/1. so that our hub and spokes network, spoke routers did not get update each other routes. Prevent this we are going to issue 'no ip split horizon eigrp 100' command on hub router interface tunnel 1234 and see the result. </span></br></br>	 

	 <font id="config">
	 R1#conf t                                 		</br>     
	 R1(config)#int tunnel 1234                     </br>
	 R1(config-if)#<span class='command'>no ip split-horizon eigrp 100</span> </br>
     R1(config-if)#exit</br></br>
 </font>
	 
<font id="config">
	 <h3> Verifying configuration</h3>
	 R1#show ip eigrp neighbor</br>
	 R2#show ip eigrp neighbor</br>
	 R3#show ip eigrp neighbor</br>
	 R4#show ip eigrp neighbor</br>
</font></br>
	 
<textarea  rows="7" cols="85" readonly>
R1#sh ip eigrp neighbors      
IP-EIGRP neighbors for process 100
H   Address                 Interface       Hold Uptime   SRTT   RTO  Q  Seq
                                            (sec)         (ms)       Cnt Num
2   10.0.0.2                Tu1234            10 00:37:46   13  5000  0  8
1   10.0.0.3                Tu1234            13 00:37:46   45  5000  0  8
0   10.0.0.4                Tu1234            10 00:37:59   58  5000  0  6
</textarea></br></br>
 
<textarea  rows="5" cols="85" readonly>
R2#sh ip eigrp neighbors 
IP-EIGRP neighbors for process 100
H   Address                 Interface       Hold Uptime   SRTT   RTO  Q  Seq
                                            (sec)         (ms)       Cnt Num
0   10.0.0.1                Tu1234            14 00:36:33  163  5000  0  456
</textarea></br></br>
 
<textarea  rows="5" cols="85" readonly>
R3#sh ip eigrp neighbor
IP-EIGRP neighbors for process 100
H   Address                 Interface       Hold Uptime   SRTT   RTO  Q  Seq
                                            (sec)         (ms)       Cnt Num
0   10.0.0.1                Tu1234            13 00:38:33  116  5000  0  456
</textarea></br></br>
 
<textarea  rows="5" cols="85" readonly>
R4#sh ip eigrp nei
IP-EIGRP neighbors for process 100
H   Address                 Interface       Hold Uptime   SRTT   RTO  Q  Seq
                                            (sec)         (ms)       Cnt Num
0   10.0.0.1                Tu1234            14 00:30:07  119  5000  0  456
</textarea></br></br>

<textarea  rows="4" cols="85" readonly>
R1#sh ip route eigrp
D    192.168.4.0/24 [90/297270016] via 10.0.0.4, 00:48:37, Tunnel1234
D    192.168.2.0/24 [90/297270016] via 10.0.0.2, 00:20:15, Tunnel1234
D    192.168.3.0/24 [90/297270016] via 10.0.0.3, 00:20:15, Tunnel1234
</textarea></br></br>
 
<textarea  rows="4" cols="85" readonly>
R2#sh ip route eigrp
D    192.168.4.0/24 [90/310070016] via 10.0.0.1, 00:20:15, Tunnel1234
D    192.168.1.0/24 [90/297270016] via 10.0.0.1, 00:48:33, Tunnel1234
D    192.168.3.0/24 [90/310070016] via 10.0.0.1, 00:20:15, Tunnel1234
</textarea></br></br>
 
<textarea  rows="4" cols="85" readonly>
R3#sh ip route eigrp
D    192.168.4.0/24 [90/310070016] via 10.0.0.1, 00:20:15, Tunnel1234
D    192.168.1.0/24 [90/297270016] via 10.0.0.1, 00:48:33, Tunnel1234
D    192.168.2.0/24 [90/310070016] via 10.0.0.1, 00:20:15, Tunnel1234
</textarea></br></br>
 
<textarea  rows="4" cols="85" readonly>
R4#sh ip route eigrp
D    192.168.1.0/24 [90/297270016] via 10.0.0.1, 00:48:37, Tunnel1234
D    192.168.2.0/24 [90/310070016] via 10.0.0.1, 00:20:15, Tunnel1234
D    192.168.3.0/24 [90/310070016] via 10.0.0.1, 00:20:15, Tunnel1234
</textarea></br></br>

</body>
</html>
