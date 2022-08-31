<!DOCTYPE html>
<html>
     <head>
            <title>MPLS Layer 3 VPN</title>
			<link rel="stylesheet" type="text/css" href="css/cciers.css">
	 </head>
     <body>
	 <h1> MPLS Layer 3 VPN </h1>
<! =========================================================== >	
	 <h2> LAB - Configuring LDP </h2>
<! =========================================================== >	
	 <figure>
		<figcaption>Network Diagram</figcaption>
		<img src="images/ldp.png" alt="MPLS Diagram" style="width:700px;height:250px;">
		</figure>

	 <h3 id="task"> Task </h3>
	 <ol>
	 <li> Configure the basic IP addressing according to the diagram. </li>
	 <li> Configure OSPF area 0 as IGP protocol running inside the MPLS SP network. </li>
	 <li> Advertise the loopback 0 interface inside the IGP. </li> </ol>
     </br>
	 <h3> Solution </h3>
	 <font id="config">
	 R1(config)#router ospf 1 </br>
	 R1(config-router)#network 10.12.0.0 0.0.0.255 area 0 </br> 
	 R1(config-router)#network 1.1.1.1 255.255.255.255 area 0 </br>
	 R1(config-router)#exit</br>
	 </br>
	 R2(config)#router ospf 1 </br>
	 R2(config-router)#network 10.12.0.0 0.0.0.255 area 0 </br>
	 R2(config-router)#network 10.23.0.0 0.0.0.255 area 0 </br>		 
	 R2(config-router)#network 2.2.2.2 255.255.255.255 area 0 </br>
	 R2(config-router)#exit</br>
	 </br>
	 R3(config)#router ospf 1 </br>
	 R3(config-router)#network 10.23.0.0 0.0.0.255 area 0 </br>
	 R3(config-router)#network 10.34.0.0 0.0.0.255 area 0 </br>		 
	 R3(config-router)#network 3.3.3.3 255.255.255.255 area 0 </br>
	 R3(config-router)#exit</br>
	 </br>
	 R4(config)#router ospf 1 </br>
	 R4(config-router)#network 10.34.0.0 0.0.0.255 area 0 </br>
	 R4(config-router)#network 10.45.0.0 0.0.0.255 area 0 </br>		 
	 R4(config-router)#network 4.4.4.4 255.255.255.255 area 0 </br>
	 R4(config-router)#exit</br>
	 </br>
	 R5(config)#router ospf 1 </br>
	 R5(config-router)#network 10.45.0.0 0.0.0.255 area 0 </br>		 
	 R5(config-router)#network 5.5.5.5 255.255.255.255 area 0 </br>
	 R5(config-router)#exit</br>
	 </br></font>
	 <p class="note-head"> Note:</p>
	 <p class="note-text">Make sure that we are able to reach (ping) loopback 0 of every router as we are going to establish the LDP neighborship based on MPLS router-id.</p>
	 <p class="note-text"> It is usually consider best practice to create a loopback interface on all routers and set this loopback interface as the LDP router-id.</p></br>
	 
	 <font id="config">
	 <h3>Verifying the configuration</h3>
	 sh ip ospf neighbor </br>
	 sh ip route ospf</br>
	 </br></font>
	 
	 <p class="note-head">Prerequisites for MPLS LDP </p>
	 <p class="note-text">CEF have to be enabled on LSR router.</p> </br>
	 
	 <font face="Cisco">
	 <p class="note-head"> Cisco Express Forwarding (CEF) </p>
	 <p class="note-text"> Cisco Express Forwarding is advanced, Layer 3 IP switching technology. CEF optimizes network performance and scalability for networks with large and dynamic traffic patterns, such as the Internet, on networks characterized by intensive Web-based applications, or interactive sessions. </p> </font> </br>
	 
	 Enable/Disable CEF  [by default CEF is enabled] </br> </br>
	 <font id="config">
	 R1(config)# ip cef &emsp; <<&nbsp;Enable CEF </br>
	 R1(config)# no ip cef &emsp; <<&nbsp;Disable CEF<br>
	 </font></br>
	 
	 <p class="note-head">MPLS Label Distribution Protocol (LDP) </p>

	 <p class="note-text">LDP is a protocol that automatically generates and exchanges labels between routers. Each router will locally generate labels for its prefixes and will then advertise the label values to its neighbors. It&#8217;s a standard, based on Cisco&#8217;s proprietary TDP (Tag Distribution Protocol). Cisco created a protocol and a standard was created later. Nowadays almost everyone uses LDP instead of TDP.</p></br>
	 
	 <p class="note-head">Selecting MPLS LDP router-id </p></h3>
	 <p class="note-text"> The router determines the LDP router ID as follows, if the mpls ldp router-id command is not executed: </p>
	 <p class="note-subtext">The router examines the IP addresses of all operational interfaces. </p>
	 <p class="note-subtext">If these IP addresses include loopback interface addresses, the router selects the largest loopback address as the LDP router ID.</p>
	 <p class="note-subtext">Otherwise, the router select the largest IP address pertaining to an operational interface as the LDP router ID. </p> </br>
	
	<h3> Task </h3>
	 <ol>
	 <li> Configure MPLS on all routers. Use LDP as protocol. </li>
	 <li> Configure loopback 0 address as LDP router ID. </li>
	 <li> Configure the routers to select the labels as below. </li> </ol>
     </br>
		R1 &emsp; 100 &nbsp; 199 </br>
		R2 &emsp; 200 &nbsp; 299 </br>
		R3 &emsp; 300 &nbsp; 399 </br>
		R4 &emsp; 400 &nbsp; 499 </br>
		R5 &emsp; 500 &nbsp; 599 </br></br>
		 
	 <font id="config">
	 </br>
<h3> Solution </h3>
	 R1(config)#mpls label range 100 199 		</br>
	 R1(config)#mpls label protocol ldp 		</br>
	 R1(config)#mpls ldp router-id loopback0 </br>
	 </br>
	 R1(config)#int s0/0 </br>
	 R1(config-if)#mpls ip </br>
	 </br>
	 
	 R2(config)#mpls label range 200 299 		</br>
	 R2(config)#mpls label protocol ldp 		</br>
	 R2(config)#mpls ldp router-id loopback0 </br>
	 </br>
	 R2(config)#int s0/0 </br>
	 R2(config-if)#mpls ip </br>
	 R2(config)#int s0/1 </br>
	 R2(config-if)#mpls ip </br>
	 </br>
	 R3(config)#mpls label range 300 399 	</br>
	 R3(config)#mpls label protocol ldp 	</br>
	 R3(config)#mpls ldp router-id loopback0 </br>
	 </br>
	 R3(config)#int s0/0</br>
	 R3(config-if)#mpls ip</br>
	 R3(config)#int s0/1</br>
	 R3(config-if)#mpls ip</br>
	 </br>
	 R4(config)#mpls label range 400 499   	</br>
	 R4(config)#mpls label protocol ldp 	</br>
	 R4(config)#mpls ldp router-id loopback0 </br>
	 </br>
	 R4(config)#int s0/0</br>
	 R4(config-if)#mpls ip</br>
	 R4(config)#int s0/1</br>
	 R4(config-if)#mpls ip</br>
	 </br>
	 R5(config)#mpls label range 500 599 	</br>
	 R5(config)#mpls label protocol ldp 	</br>
	 R5(config)#mpls ldp router-id loopback0 </br>
	 </br>
	 R5(config)#int s0/0</br>
	 R5(config-if)#mpls ip</br>
	 </font>
	 </br>
	 <h3> Verifying configuration </h3>
	 <font id="config">
	 show mpls ldp neighbor </br>
	 show mpls interfaces</br>
	 show mpls ldp bindings </br>
	 show mpls ldp bindings local</br>
	 show mpls forwarding-table</br>
	 </font>
	 </br>

<! =========================================================== >	
	 <h2> LAB - MPLS LDP Troubleshooting </h2>
<! =========================================================== >	
	 <h3> Problem issues: </h3>
	 <ul>
	 <li>	First establish IGP connectivity between all the routers.                       </li>
	 <li>	Configured loopback interface on every router and advertised into IGP.          </li>
	 <li>	Ensure that all loopback interfaces are reachable to each other.                </li>
	 <li>	Check if higher loopback address taken as router-id which is not advertised in IGP.  </li>
	 <li>	Make sure CEF is enabled.                                                       </li>
	 <li>	Make sure 'mpls ip' command enabled on all mpls required interfaces.            </li>
	 <li>	Check for LDP neighbors discovery.                                              </li>
	 <li>	Protocol mismatch (TDP/LDP) global or interface level.                          </li>
	 <li>	Mismatch authentication if configured.                                          </li>
	 <li>	Verifying LDP label Filtering.                                                  </li>
	 </ul></br>
	 <h3> Task </h3>
	 <ol>
	 <li> Configure authentication between R1 and R2.Password: cisco123</li>
	 <li> Configure R1 to change the router-id to loopback 1 </li>
	 <li> Configure the hello interval to 20 sec and hello holdtime of 60 sec on all LSR routers </li>
	 </ol>
     </br>
	 <h3> Solution </h3>
	 <font id="config">
	 R1(config)#mpls ldp neighbor 2.2.2.2 password cisco123 </br>
	 R2(config)#mpls ldp neighbor 1.1.1.1 password cisco123 </br> </br>
	 R1(config)#mpls ldp router-id loopback 1 force </br>
	 </br>
	 Rx(config)#mpls ldp discovery hello interval 20 </br>
	 Rx(config)#mpls ldp discovery hello holdtime 60 </br></br> 
	 </font>
	 
	 <h3> Verifying the configuration</h3>
	 <font id="config">
	 show ip cef </br>
	 show ip cef summary </br>
	 show mpls interface </br>
	 show mpls ldp discovery detail </br>
	 show mpls ldp parameters</br></br>
	 </font>
	 </br>
<! =========================================================== >	
	 <h2> LAB - MPLS VPN implementing with static routing</h2>
<! =========================================================== >		 
		<figure>
		<figcaption>Network Diagram</figcaption>
		<img src="images/MPLS-Static.png" alt="MPLS Diagram" style="width:800px;height:250px;">
		</figure>

	 <h3> Task </h3>
	 <ol>
	 <li> Configuring LDP and OSPF routing on provider routers (P and PE) [LAB - Configuring LDP] </li>
	 <li> Configure R6, R7 and assign IP addressing as per the diagram and verify connectivity </li>
	 <li> Create VRF A1 on site1 (R1) and VRF A2 on site2 (R5), both PE router [LAB- MPLS VPN with Static Routing] </li>
	 <li> RD & RT value should be 777:1 for both sites [LAB- MPLS VPN with Static Routing] </li>
	 <li> Associates the VRF (A1/A2) with the Layer 3 interface. Both PE's LAN interface (R1 to R6 and R5 to R7). [LAB- MPLS VPN with Static Routing] </li>
	 </ol> </br>
	 
	 <h3> Solution </h3>
	 <font id="config">
	 R1(config)#ip vrf A1 </br>
	 R1(config-vrf)#rd 777:1 </br>
	 R1(config-vrf)#route-target import 777:1 </br>
	 R1(config-vrf)#route-target export 777:1 </br>
	 </br>
	 R5(config)#ip vrf A2 </br>
	 R5(config-vrf)#rd 777:1 </br>
	 R5(config-vrf)#route-target both 777:1 </br>
	 </br></font>
	 <h3> Verifying VRF </h3>
	 <font id="config">
	 show ip vrf </br>
	 show ip vrf detail</br>
	 </br>
	 R1(config)#int f0/0 </br>
	 R1(config-if)#ip vrf forwarding A1</br>
	 R1(config-if)#ip address 172.16.16.1 255.255.255.0 </br>
	 R1(config-if)#exit </br>
	 </br>
	 <h4>Notice:</h4>
	 Interface f0/0 IP address will be removed due to enabling VRF A1.</br>
	 </br>
	 
	 R5(config)#int f0/0 </br>
	 R5(config-if)#ip vrf forwarding A2</br>
	 R5(config-if)#ip address 172.16.57.5 255.255.255.0 </br>
	 R5(config-if)#exit </br>
	 </br>
	 </font>
	 <h4>Note:<h4>
	 Once we assign the interface under VRF A1/A2 it moves to separate VRF A1/A2 routing table.</br>
	 All the routes receiving from this interface to facing CE will be placed in a separate VRF routing table.</br>
	 </br>
	 <h3> Verifying the configuration</h3>
	 <font id="config">
	 R1#show ip route connected </br>
	 R1#show ip route vrf A1</br>
	 R2#show ip route vrf A2</br>
	 </br>
	 R1#ping 172.16.16.6 [will not be working]</br>
	 R1#ping vrf A1 172.16.16.6 [will be working] </br>
	 </br>
	 R5#ping 172.16.57.7 [will not be working]</br>
	 R5#ping vrf A2 172.16.57.7 [will be working] </br>
	 </font>
	 </br>
	 <h3> Task </h3>
	 <ol>
	 <li> Configure static routing between PE and CE on both ends (R6 & R1) and (R7 & R5)</li>
	 <li> Ensure that PE routers (R1 & R5) shoud be able to ping CE routers (R6 & R7) LAN interfaces respectively</li>
	 </ol> </br>
	 <h3> Solution </h3>
	 <font id="config">
	 R6(config)#ip route 0.0.0.0 0.0.0.0 172.16.16.1 </br>
	 R1(config)#ip route vrf A1 6.6.6.6 255.255.255.255 172.16.16.6 </br>
	 </br> 
	 R7(config)#ip route 0.0.0.0 0.0.0.0 172.16.57.5 </br>
	 R5(config)#ip route vrf A2 7.7.7.7 255.255.255.255 172.16.57.7 </br>
	 </font></br>
	 <h3> Verifying the configuration </h3>
	 <font id="config">
	 R1#show ip route static [you don't see the route entry] </br>
	 R1#show ip route vrf A1 static [you can see the route entry]</br>
	 </br></font>
	 <h3> Task </h3>
	 <ol>
	 <li> Configure VPNv4 peering between PE routers (R1 & R5).</li>
	 </ol> </br>
	 <h3> Solution </h3>
	 <font id="config">
	 R1(config)#router bgp 500 </br>
	 R1(config-router)#neighbor  5.5.5.5 remote-as 500</br>
	 R1(config-router)#neighbor  5.5.5.5 update-source loopback 0</br></br> 
	 R1(config-router)#address-family vpnv4 unicast</br>
	 R1(config-router-af)#neighbor  5.5.5.5 activate</br>
	 R1(config-router-af)#neighbor  5.5.5.5 send-community extended</br>
	 R1(config-router-af)#neighbor  5.5.5.5 next-hop-self</br></br>
	 
	 R5(config)#router bgp 500 </br>
	 R5(config-router)#neighbor  1.1.1.1 remote-as 500</br>
	 R5(config-router)#neighbor  1.1.1.1 update-source loopback 0</br></br> 
	 R5(config-router)#address-family vpnv4 unicast</br>
	 R5(config-router-af)#neighbor  1.1.1.1 activate</br>
	 R5(config-router-af)#neighbor  1.1.1.1 send-community extended</br>
	 R5(config-router-af)#neighbor  1.1.1.1 next-hop-self</br>
	 </font></br>
	 <h3> Verifying the configuration </h3>
	 <font id="config">
	 show ip bgp vpnv4 all summary </br>
	 show ip bgp vpnv4 vrf A1 (no output) </br>
	 </br></font>
	 <h3> Task </h3>
	 <ol>
	 <li> Configure redistribution static routing into BGP under VRF.</li>
	 <li> Ensure that CE routers on both sites (R6 & R7) should have reachability between them.</li>
	 </ol> </br>
	 <h3> Solution </h3>
	 <font id="config">
	 R1(config)#router bgp 500 </br>
	 R1(config-router)#address-family ipv4 vrf A1</br>
	 R1(config-router-af)#redistribute static</br>
	 R1(config-router-af)#redistribute connected</br></br>
	 R5(config)#router bgp 500 </br>
	 R5(config-router)#address-family ipv4 vrf A2</br>
	 R5(config-router-af)#redistribute static</br>
	 R5(config-router-af)#redistribute connected</br></br>
	 </font>
	 <h3> Verifying the configuration </h3>
	 <font id="config">
	 show ip route [you don't see the route entry] </br>
	 show ip route vrf A1 [you see the route entry]</br>
	 show ip bgp vpnv4 vrf A1</br>
	 </br></font>
	 
<! =========================================================== >	 
	 <h2> LAB - MPLS VPN implementing with RIPv2 </h2>
<! =========================================================== >	 
		<figure>
		<figcaption>Network Diagram</figcaption>
		<img src="images/mpls-rip.png" alt="MPLS Diagram" style="width:700px;height:250px;">
		</figure><br>
	 
	 <h6 style='color:#0087be;'> Worked out on GNS3 1.5.3 </h6>
	 <h6 style='color:#0087be;'> IOS: c3745-adventerprisek9-mz.124-15.T14 </h6></br>
	 
	 <h3> Task </h3>
	 <ol>
	 <li> Configuring LDP and OSPF routing on provider routers (P and PE)[LAB - Configuring LDP]</li>
	 <li> Configure R6, R7 and assign IP addressing as per the diagram and verify connectivity </li>
	 <li> Create VRF A1 on site1 (R1) and VRF A2 on site2 (R5), both PE router [LAB- MPLS VPN with Static Routing] </li>
	 <li> RD & RT value should be 777:1 for both sites [LAB- MPLS VPN with Static Routing] </li>
	 <li> Associates the VRF (A1/A2) with the Layer 3 interface. Both PE's LAN interface (R1 to R6 and R5 to R7). [LAB- MPLS VPN with Static Routing] </li>
	 <li> Remove the static/default routing on PE and CE routers. </li>
	 <li> Remove the BGP configuration from both PE routers. </li>
	 </ol>
     </br>
	 <h3> Solution </h3>
	 <font id="config">
	 R6(config)#no ip route 0.0.0.0 0.0.0.0 172.16.16.1 </br>
	 R1(config)#no ip route vrf A1 6.6.6.6 255.255.255.255 172.16.16.6 </br>
	 </br> 
	 R7(config)#no ip route 0.0.0.0 0.0.0.0 172.16.57.5 </br>
	 R5(config)#no ip route vrf A2 7.7.7.7 255.255.255.255 172.16.57.7 </br>
	 </br>
	 R1(config)# no router bgp 500 </br>
	 R5(config)# no router bgp 500 </br>
	 </font></br>
	 <h3> Task </h3>
	 <ol>
	 <li> Configure RIPv2 routing between PE and CE on both ends (R6 & R1) and (R7 & R5)</li>
	 <li> Ensure that PE routers (R1 & R5) shoud be able to ping CE routers (R6 & R7) LAN interfaces respectively  </li>
	 </ol> </br>
	 <h3> Solution </h3>
	 <font id="config">
	 R6(config)#router rip </br>
	 R6(config-router)#version 2 </br>
	 R6(config-router)#no auto-summary </br>
	 R6(config-router)#network 6.0.0.0 </br>
	 R6(config-router)#network 172.16.0.0 </br>
	 </br> 
	 R1(config)#router rip </br>
	 R1(config-router)#address-family ipv4 vrf A1 </br>
	 R1(config-router)#version 2 </br>
	 R1(config-router)#no auto-summary </br>
	 R1(config-router)#network 172.16.0.0 </br></br>
	 
	 R7(config)#router rip </br>
	 R7(config-router)#version 2 </br>
	 R7(config-router)#no auto-summary </br>
	 R7(config-router)#network 7.0.0.0 </br>
	 R7(config-router)#network 172.16.0.0 </br>
	 </br> 
	 R5(config)#router rip </br>
	 R5(config-router)#address-family ipv4 vrf A2 </br>
	 R5(config-router)#version 2 </br>
	 R5(config-router)#no auto-summary </br>
	 R5(config-router)#network 172.16.0.0 </br>
	 </font></br></br>
	 <h3> Verifying the configuration </h3>
	 <font id="config">
	 show ip route vrf A1/A2 </br>
	 </br> </font>
	 <h3> Task </h3>
	 <ol>
	 <li> Configure VPNv4 peering between PE routers (R1 & R5).</li>
	 </ol> </br>
	 <h3> Solution </h3>
	 <font id="config">
	 R1(config)#router bgp 500 </br>
	 R1(config-router)#neighbor  5.5.5.5 remote-as 500</br>
	 R1(config-router)#neighbor  5.5.5.5 update-source loopback 0</br></br> 
	 R1(config-router)#address-family vpnv4 unicast</br>
	 R1(config-router-af)#neighbor  5.5.5.5 activate</br>
	 R1(config-router-af)#neighbor  5.5.5.5 send-community extended</br>
	 R1(config-router-af)#neighbor  5.5.5.5 next-hop-self</br></br>
	 
	 R5(config)#router bgp 500 </br>
	 R5(config-router)#neighbor  1.1.1.1 remote-as 500</br>
	 R5(config-router)#neighbor  1.1.1.1 update-source loopback 0</br></br> 
	 R5(config-router)#address-family vpnv4 unicast</br>
	 R5(config-router-af)#neighbor  1.1.1.1 activate</br>
	 R5(config-router-af)#neighbor  1.1.1.1 send-community extended</br>
	 R5(config-router-af)#neighbor  1.1.1.1 next-hop-self</br>
	 </font></br>
	 <h3> Verifying the configuration </h3>
	 <font id="config">
	 show ip bgp vpnv4 all summary </br>
	 show ip bgp vpnv4 vrf A1 </br>
	 </br></font>
	 <h3> Task </h3>
	 <ol>
	 <li> Configure redistribution RIPv2 into BGP and BGP into RIPv2 under VRF.</li>
	 <li> Ensure that CE routers on both sites (R6 & R7) should have reachability between them.</li>
	 </ol> </br>
	  <h3> Solution </h3>
	 <font id="config">
	 R1(config)#router bgp 500 </br>
	 R1(config-router)#address-family ipv4 vrf A1</br>
	 R1(config-router-af)#redistribute rip</br></br>
	 R1(config)#router rip</br>
	 R1(config-router)#address-family ipv4 vrf A1</br>
	 R1(config-router-af)#redistribute bgp 500 metric 2</br></br>
	 
	 R5(config)#router bgp 500 </br>
	 R5(config-router)#address-family ipv4 vrf A2</br>
	 R5(config-router-af)#redistribute rip</br></br>
	 R5(config)#router rip</br>
	 R5(config-router)#address-family ipv4 vrf A2</br>
	 R5(config-router-af)#redistribute bgp 500 metric 2</br></br>
	 </font>
	 <h3> Verifying the configuration </h3>
	 <font id="config">
	 R1#show ip route [No RIP routes] </br>
	 R1#show ip route vrf A1 [Notice: RIP routing]</br>
	 R1#show ip bgp vpnv4 vrf A1</br>
	 R6#show ip route rip</br>
	 </br></font>

<! =========================================================== >	 
	 <h2> LAB - MPLS VPN implementing with EIGRP </h2>
<! =========================================================== >	
	 <figure>
		<figcaption>Network Diagram</figcaption>
		<img src="images/mpls-eigrp.png" alt="MPLS Diagram" style="width:700px;height:250px;">
		</figure>
		
	 <h6 style='color:#0087be;'> Worked out on GNS3 1.5.3 </h6> 
	 <h6 style='color:#0087be;'> IOS: c3745-adventerprisek9-mz.124-15.T14 </h6></br>
	 
	 <h3> Task </h3>
	 <ol>
	 <li> Configuring LDP and OSPF routing on provider routers (P and PE)<span id="ref01">[LAB - Configuring LDP] <span></li>
	 <li> Configure R6, R7 and assign IP addressing as per the diagram and verify connectivity </li>
	 <li> Create VRF A1 on site1 (R1) and VRF A2 on site2 (R5), both PE router <span id="ref01">[LAB- MPLS VPN with Static Routing] </span></li>
	 <li> RD & RT value should be 777:1 for both sites. <span id="ref01">[LAB- MPLS VPN with Static Routing] </span> </li>
	 <li> Associates the VRF (A1/A2) with the Layer 3 interface. Both PE's LAN interface (R1 to R6 and R5 to R7).<span id="ref01"> [LAB- MPLS VPN with Static Routing] </span> </li>
	 <li> Remove RIPv2 configuration from PE and CE routers. </li>
	 <li> Remove the BGP configuration from both PE routers. </li>
	 </ol>
     </br>
	 <h3> Solution </h3>
	 <font id="config">
	 R1#conf t </br>
	 R1(config)#no router bgp 500 </br>
	 R1(config)#no router rip </br>
	 </br> 
	 R5(config)#no router bgp 500 </br>
	 R5(config)#no router rip </br>
	 </br>
	 R6(config)# no router rip </br>
	 R7(config)# no router rip </br>
	 </font></br>
	 <h3> Task </h3>
	 <ol>
	 <li> Configure EIGRP routing between PE and CE on both ends (R6 & R1) and (R7 & R5)</li>
	 <li> Ensure that PE routers (R1 & R5) shoud be able to ping CE routers (R6 & R7) LAN interfaces respectively  </li>
	 </ol> </br>
	 <h3> Solution </h3>
	 <font id="config">
	 R6#conf t </br>
	 R6(config)#router eigrp 100 </br>
	 R6(config-router)#no auto-summary </br>
	 R6(config-router)#network 6.0.0.0 </br>
	 R6(config-router)#network 172.16.0.0 </br>
	 R6(config-router)#exit </br>
	 </br> 
	 R1(config)#router eigrp 500 </br>
	 R1(config-router)#address-family ipv4 vrf A1 </br>
	 R1(config-router-af)#autonomous-system 100 </br>
	 R1(config-router-af)#no auto-summary </br>
	 R1(config-router)#network 172.16.0.0 </br>
	 R1(config-router)#exit </br></br>
	 
	 R7(config)#router eigrp 100 </br>
	 R7(config-router)#no auto-summary </br>
	 R7(config-router)#network 7.0.0.0 </br>
	 R7(config-router)#network 172.16.0.0 </br>
	 R7(config-router)#exit </br></br> 
	 
	 R5(config)#router eigrp 500 </br>
	 R5(config-router)#address-family ipv4 vrf A2 </br>
	 R5(config-router-af)#autonomous-system 100 </br>
	 R5(config-router)#no auto-summary </br>
	 R5(config-router)#network 172.16.0.0 </br>
	 R5(config-router)#exit</br></br>
	 </font>
	 
	 <h3> Verifying the configuration  </h3>
	 <font id="config">
	 show ip eigrp vrf A1/A2 neighbor</br>
	 show ip route vrf A1 </br>
	 </br> </font>
	 <h3> Task </h3>
	 <ol>
	 <li> Configure VPNv4 peering between PE routers (R1 & R5).</li>
	 </ol> </br>
	 <h3> Solution </h3>
	 <font id="config">
	 R1(config)#router bgp 500 </br>
	 R1(config-router)#neighbor  5.5.5.5 remote-as 500</br>
	 R1(config-router)#neighbor  5.5.5.5 update-source loopback 0</br></br> 
	 R1(config-router)#address-family vpnv4 unicast</br>
	 R1(config-router-af)#neighbor  5.5.5.5 activate</br>
	 R1(config-router-af)#neighbor  5.5.5.5 send-community extended</br>
	 R1(config-router-af)#neighbor  5.5.5.5 next-hop-self</br></br>
	 R5(config)#router bgp 500 </br>
	 R5(config-router)#neighbor  1.1.1.1 remote-as 500</br>
	 R5(config-router)#neighbor  1.1.1.1 update-source loopback 0</br></br> 
	 R5(config-router)#address-family vpnv4 unicast</br>
	 R5(config-router-af)#neighbor  1.1.1.1 activate</br>
	 R5(config-router-af)#neighbor  1.1.1.1 send-community extended</br>
	 R5(config-router-af)#neighbor  1.1.1.1 next-hop-self</br>
	 </font></br>
	 <h3> Verifying the configuration </h3>
	 <font id="config">
	 show ip bgp vpnv4 all summary </br>
	 show ip bgp vpnv4 vrf A1 </br>
	 </br></font>
	 <h3> Task </h3>
	 <ol>
	 <li> Configure redistribution EIGRP into BGP and BGP into EIGRP under VRF.</li>
	 <li> Ensure that CE routers on both sites (R6 & R7) should have reachability between them.</li>
	 </ol> </br>
	  <h3> Solution </h3>
	 <font id="config">
	 R1(config)#router bgp 500 </br>
	 R1(config-router)#address-family ipv4 vrf A1</br>
	 R1(config-router-af)#redistribute eigrp 100</br></br>
	 R1(config)#router eigrp 500</br>
	 R1(config-router)#address-family ipv4 vrf A1</br>
	 R1(config-router-af)#redistribute bgp 500 metric 1 1 1 1 1 </br></br>
	 
	 R5(config)#router bgp 500 </br>
	 R5(config-router)#address-family ipv4 vrf A2</br>
	 R5(config-router-af)#redistribute eigrp 100</br></br>
	 R5(config)#router eigrp 500</br>
	 R5(config-router)#address-family ipv4 vrf A2</br>
	 R5(config-router-af)#redistribute bgp 500 metric 1000 2000 255 1 1500</br></br>
	 </font>
	 <h3> Verifying the configuration </h3>
	 <font id="config">
	 R1#show ip route [No EIGRP routes] </br>
	 R1#show ip route vrf A1 [Notice: EIGRP routes]</br>
	 R1#show ip bgp vpnv4 vrf A1</br></br>
	 R6#ping 7.7.7.7 [success] </br>
	 R7#ping 6.6.6.6 {success] </br>	 
	 </br></font>
	 
<! =========================================================== >		 
	 <h2> LAB - MPLS VPN implementing with OSPF </h2>
<! =========================================================== >		
	<figure>
		<figcaption>Network Diagram</figcaption>
		<img src="images/mpls-ospf.png" alt="MPLS Diagram" style="width:700px;height:250px;">
		</figure>
	 
	 <h6 style='color:#0087be;'> Worked out on GNS3 1.5.3 </h6> 
	 <h6 style='color:#0087be;'> IOS: c3745-adventerprisek9-mz.124-15.T14 </h6></br>
	 
	 <h3> Task </h3>
	 <ol>
	 <li> Configuring LDP and OSPF routing on provider routers (P and PE)<span id="ref01">[LAB - Configuring LDP]<span></li>
	 <li> Configure R6, R7 and assign IP addressing as per the diagram and verify connectivity </li>
	 <li> Create VRF A1 on site1 (R1) and VRF A2 on site2 (R5), both PE router <span id="ref01">[LAB- MPLS VPN with Static Routing]</span></li>
	 <li> RD & RT value should be 777:1 for both sites. <span id="ref01">[LAB- MPLS VPN with Static Routing]</span> </li>
	 <li> Associates the VRF (A1/A2) with the Layer 3 interface. Both PE's LAN interface (R1 to R6 and R5 to R7).<span id="ref01">[LAB- MPLS VPN with Static Routing]</span> </li>
	 <li> Remove EIGRP configuration from PE and CE routers. </li>
	 <li> Remove the BGP configuration from both PE routers. </li>
	 </ol>
     </br>
	 <h3> Solution </h3>
	 <font id="config">
	 R1(config)#no router bgp 500 </br>
	 R1(config)#no router eigrp 500 </br>
	 </br> 
	 R5(config)#no router bgp 500 </br>
	 R5(config)#no router eigrp 500 </br>
	 </br>
	 R6(config)# no router eigrp 100 </br>
	 R7(config)# no router eigrp 100 </br>
	 </font></br>
	 <h3> Task </h3>
	 <ol>
	 <li> Configure OSPF routing between PE and CE on both ends (R6 & R1) and (R7 & R5)</li>
	 <li> Ensure that PE routers (R1 & R5) shoud be able to ping CE routers (R6 & R7) LAN interfaces respectively  </li>
	 </ol> </br>
	 <h3> Solution </h3>
	 <font id="config">
	 R6(config)#router ospf 1 </br>
	 R6(config-router)#network 6.6.6.6 0.0.0.0 area 0 </br>
	 R6(config-router)#network 172.16.16.6 0.0.0.0 area 0 </br>
	 </br> 
	 R1(config)#router ospf 10 vrf A1 </br>
	 R1(config-router)#network 172.16.16.1 0.0.0.0 area 0 </br></br>
	 </br> </font>
	 Notes: </br>
	 A separate process ID is required for each VRF that receive VPN routes via OSPF from CE</br>
	 If PE routes are running OSPF for multiple VRF(customers) and also runing inside the service provider (SP) core it need to distinguish wihch routes belong to which VRFs, and to understand which interfaces belong to which OSPF process.</br></br>
	 <font id="config">
	 R7(config)#router ospf 1 </br>
	 R7(config-router)#network 7.7.7.7 0.0.0.0 area 0 </br>
	 R7(config-router)#network 172.16.57.7 0.0.0.0 area 0 </br>
	 </br> 
	 R5(config)#router ospf 50 vrf A2 </br>
	 R5(config-router)#network 172.16.57.5 0.0.0.0 area 0 </br>
	 </font></br></br>
	 <h3> Verifying the configuration </h3>
	 <font id="config">
	 R1#show ip ospf 10 neighbor</br>
	 R5#show ip ospf 50 neighbor</br></br>
	 R1#show ip route vrf A1 ospf </br>
	 R5#show ip route vrf A2 ospf </br>
	 </br> </font>
	 <h3> Task </h3>
	 <ol>
	 <li> Configure VPNv4 peering between PE routers (R1 & R5).</li>
	 </ol> </br>
	 <h3> Solution </h3>
	 <font id="config">
	 R1(config)#router bgp 500 </br>
	 R1(config-router)#neighbor  5.5.5.5 remote-as 500</br>
	 R1(config-router)#neighbor  5.5.5.5 update-source loopback 0</br></br> 
	 R1(config-router)#address-family vpnv4 unicast</br>
	 R1(config-router-af)#neighbor  5.5.5.5 activate</br>
	 R1(config-router-af)#neighbor  5.5.5.5 send-community extended</br>
	 R1(config-router-af)#neighbor  5.5.5.5 next-hop-self</br></br>
	 R5(config)#router bgp 500 </br>
	 R5(config-router)#neighbor  1.1.1.1 remote-as 500</br>
	 R5(config-router)#neighbor  1.1.1.1 update-source loopback 0</br></br> 
	 R5(config-router)#address-family vpnv4 unicast</br>
	 R5(config-router-af)#neighbor  1.1.1.1 activate</br>
	 R5(config-router-af)#neighbor  1.1.1.1 send-community extended</br>
	 R5(config-router-af)#neighbor  1.1.1.1 next-hop-self</br>
	 </font></br>
	 <h3> Verifying the configuration </h3>
	 <font id="config">
	 R1#show ip bgp vpnv4 all summary </br>
	 R1#show ip bgp vpnv4 vrf A1 </br></br>
	 R5#show ip bgp vpnv4 all summary </br>
	 R5#show ip bgp vpnv4 vrf A2 </br>
	 </br></font>
	 <h3> Task </h3>
	 <ol>
	 <li> Configure redistribution OSPF into BGP and BGP into OSPF under VRF.</li>
	 <li> Ensure that CE routers on both sites (R6 & R7) should have reachability between them.</li>
	 </ol> </br>
	  <h3> Solution </h3>
	 <font id="config">
	 R1(config)#router bgp 500 </br>
	 R1(config-router)#address-family ipv4 vrf A1</br>
	 R1(config-router-af)#redistribute ospf 10 vrf A1 match internal external 1 external 2</br></br>
	 </font>
	 <p class="note-head">OSPF Redistribution</p>
	 <p class="note-text">if you configure the redistribution of OSPF into BGP without keywords, only OSPF intra-area and inter-area (OIA) routes are redistributes into BGP, (by default).</p>
	 <p class="note-text">use the internal keyword along with the redistribute command under bgp to redistribute OSPF intra-area and inter-area routes into BGP.</p>
	 <p class="note-text">use the external keyword along with the redistribute command under bgp to redistribute OSPF  external (OE1/OE2)  routes into BGP.</dt>
	 <p class="note-text">With the external keyword, you have three choices: </p> 
	 <p class="note-subtext">redistribute both external type-1 and external type-2 (default)</p>
	 <p class="note-subtext">redistribute type-1 </p>
	 <p class="note-subtext">redistribute type-2 </p>
	 </br>
	 <font id="config">
	 R1(config)#router ospf 10 vrf A1 </br>
	 R1(config-router)#redistribute bgp 500 subnets</br></br>
	 
	 R5(config)#router bgp 500 </br>
	 R5(config-router)#address-family ipv4 vrf A2</br>
	 R5(config-router-af)#redistribute ospf 50 vrf A2 match internal external 1 external 2</br>
	 R5(config)#router ospf 50 vrf A2 </br>
	 R5(config-router)#redistribute bgp 500 subnets</br></br>
	 </font>
	 <h3> Verifying the configuration </h3>
	 <font id="config">
	 show ip bgp vpnv4 all summary </br>
	 show ip bgp vpnv4 all </br>
	 show ip route vrf A1 bgp </br>
	 show ip route ospf </br>
	 </br></font>
	 
	 <p class="note-head">OSPF in MPLS VPN</p>
	 <p class="note-text">In MPLS, BGP becomes the backbone for customer network.</p>
	 <p class="note-text">Every site runs separate OSPF.</p>
	 <p class="note-text">Exchange routes through redistribution.</p></br>
	 </br>
	 <p class="note-head">OSPF Supper Backbone</p>
	 <p class="note-text">MPLS VPN extends concet of OSPF.</p>
	 <p class="note-text">Another backbone over area 0.</p>
	 <p class="note-text">Rule: OSPF supper backbone is exact like area 0 of OSPF.</p>
	 <p class="note-text">Rule: PE routers are advertised as ABR.</p>
	 <p class="note-text">Rule: Routes from area 0 of site1 seen as OIA from site2.</p></br>
	 </br>
	 <p class="note-head">OSPF domain-id</p>
	 <p class="note-text">PE routers mark OSPF routes with the domain attribute.</p>
	 <p class="note-text">It is derived from the OSPF process number.</p>
	 <p class="note-text">Indicates whether the route originated with the same OSPF domain or not.</p>
	 <p class="note-text">If domain-id value on PE routers:</p>
	 <p class="note-subtext">matches &emsp; &emsp; &nbsp; OIA</p>
	 <p class="note-subtext">No matches &emsp; E1/E2</p></br>
	 </br>
	 
	 <p class="note-head">OIA (LSA-3) and OE1/OE2 (LSA-5)routes</p>
	 <p class="note-text">As routes from CE to CE via OSPF redistribution through BGP, other sites of CE routers get routes as LSA-5.</p>
	 <p class="note-text">To change E1/E2 routes to OIA routes, there are two possible solutions:</p>
	 <p class="note-subtext">use the same process id on both PE routers</p>
	 <p class="note-subtext">set the same Domain ID on both PE routers</p></br>
	 </br>
	 
	 <h3> Task </h3>
	 <ol>
	 <li> Configure PE routers ensure that OSPF routes learned from other end as LSA-3 instead of LSA-5 using DOMAIN ID</li>
	 </ol> </br></br>
	 <h3> Verifying the configuration</h3>
	 <font id="config">
	 R1#show ip bgp vpnv4 vrf A1 6.6.6.6</br>
	 R5#show ip bgp vpnv4 vrf A2 7.7.7.7</br>
	 </br></font>
	 <h3> Solution </h3>
	 <font id="config">
	 R1#conf t </br>
	 R1(config)#router ospf 10 vrf A1 </br>
	 R1(config-router)#domain-id 10.10.10.10 </br>
	 R1(config-router)#exit</br>
	 </br> 
	 R5(config)#router ospf 50 vrf A2 </br>
	 R5(config-router)#domain-id 10.10.10.10
	 </font></br></br>
	 <h3> Verifying the configuration </h3>
	 <font id="config">
	 R1#show ip bgp vpnv4 vrf A1 6.6.6.6</br>
	 R5#show ip bgp vpnv4 vrf A2 7.7.7.7</br>
	 show ip route ospf</br>
	 </br> </font>

<! =========================================================== >		 
	 <h2> LAB - MPLS VPN support for OSPF Sham-Link </h2>
<! =========================================================== >		
	<figure>
		<figcaption>Network Diagram</figcaption>
		<img src="images/mpls-sham-link.png" alt="MPLS Diagram" style="width:800px;height:400px;">
		</figure>

	 <p class="note-head">OSPF Sham-Link</p>
	 <p class="note-text">A logical intra-area link.</p>
	 <p class="note-text">Carried by the supper backbone.</p>
	 <p class="note-text">A shame-link is requred only between two VPN sites that belong to the same area and have a backbone link for backup purpose.</p>
	 <p class="note-text">OSPF adjacency is established across the sham-link.</p>
	 <p class="note-text">LSA flooding occurs across the sham-link.</p></br>
	 </br>
	 <p class="note-head">Steps to create Sham-Link</p>
	 <p class="note-text">Create a loopback interface with /32 mask on both PE routers.</p>
	 <p class="note-text">Configure the loopback interface under the VRF.</p>
	 <p class="note-text">Advertise the loopback interface in BGP vrf address-family.</p>
	 <p class="note-text">Configure OSPF sham-link in OSPF vrf between PE routers.</p></br>
	 </br>

	 <h3> Task </h3>
	 <ol>
	 <li> Configure one serial link between CE routers (R6 & R7). </li>
	 <li> Configure CE routers in OSPF area 0 to ensure that OSPF routes learned from other end should prefer MPLS backbone. </li>
	 </br>
	 <h3> Solution </h3>
	 <font id="config">
	 R6(config)#int s0/0</br>
	 R6(config-if)#ip address 172.16.67.6 255.255.255.0 </br> 
	 R6(config-if)#no shutdown </br>
	 R6(config-if)#exit</br>
	 </br>
	 R7(config)#int s0/0</br>
	 R7(config-if)#ip address 172.16.67.7 255.255.255.0 </br> 
	 R7(config-if)#no shutdown </br>
	 R7(config-if)#exit</br>
	 </br>
	 R6(config)#router ospf 1 </br>
	 R6(config-router)#network 172.16.67.0 0.0.0.255 area 0 </br>
	 R6(config-router)#exit </br>
	 </br>
	 R7(config)#router ospf 1 </br>
	 R7(config-router)#network 172.16.67.0 0.0.0.255 area 0 </br>
	 R7(config-router)#exit </br>
	 </br></font>
	 <h3> Verifying the configuration </h3>
	 <font id="config">
	 sh ip ospf neighbor </br>
	 sh ip route ospf</br>
	 </br> </font>
	 <p class="note-head">Notes:</p>
	 <p class="note-text">OSPF default preferred path selection criteria is O > OIA > EI > E2.</p>
	 <p class="note-text">In order to prefer MPLS first, we need to change the route-type over MPLS to be count as 'O' routes instead of E1/E2 or OIA.</p>
	 <p class="note-text">To make the above thing possible we need to configure OSPF Sham-Link between PE routers (R1 & R5).</p>
	 <p class="note-text">Matching domain-id is not pre-requirement to configure sham-link anyway.</p>
	 <p class="note-text">Using sham-link we can convert either LSA-3 or LSA-5 routes into LSA-1 routes when it reaches the other end of CE.</p></br>
	 <h3> Task </h3>
	 <ol>
	 <li> Configuring sham-link. </li>
	 </ol>
	 </br>
	 <h3> Solution </h3>
	 <font id="config">
	 R1(config)#int loopback 10</br>
	 R1(config-if)#ip vrf forwarding A1</br> 
	 R1(config-if)#ip address 11.11.11.11 255.255.255.255</br>
	 R1(config-if)#exit</br>
	 </br>
	 R1(config)#router bgp 500</br>
	 R1(config-router)#address-family ipv4 vrf A1</br> 
	 R1(config-router-af)#network 11.11.11.11 mask 255.255.255.255</br>
	 R1(config-router-af)#exit</br></br>
	 
	 R1(config)#router ospf 10 vrf A1</br>
	 R1(config-router)#area 0 sham-link 11.11.11.11 55.55.55.55</br> 
	 R1(config-if)#exit</br></br>
	 
	 R5(config)#int loopback 10</br>
	 R5(config-if)#ip vrf forwarding A2</br> 
	 R5(config-if)#ip address 55.55.55.55 255.255.255.255</br>
	 R5(config-if)#exit</br>
	 </br>
	 R5(config)#router bgp 500</br>
	 R5(config-router)#address-family ipv4 vrf A2</br> 
	 R5(config-router-af)#network 55.55.55.55 mask 255.255.255.255</br>
	 R5(config-router-af)#exit</br></br>
	 
	 R5(config)#router ospf 50 vrf A2</br>
	 R5(config-router)#area 0 sham-link 55.55.55.55 11.11.11.11</br> 
	 R5(config-if)#exit</br></br></font>
	 <h3> Verifying the configuration </h3>
	 <font id="config">
	 show ip ospf neighbor </br>
	 show ip route ospf</br>
	 </br> </font>

<! =========================================================== >		 
	 <h2> LAB - MPLS VPN implementing with eBGP </h2>
<! =========================================================== >	
	 <figure>
		<figcaption>Network Diagram</figcaption>
		<img src="images/mpls-ebgp.png" alt="MPLS Diagram" style="width:700px;height:250px;">
		</figure>

	 <h3> Task </h3>
	 <ol>
	 <li> Configuring LDP and OSPF routing on provider routers (P and PE)<span id="ref01">[LAB - Configuring LDP]<span></li>
	 <li> Configure R6, R7 and assign IP addressing as per the diagram and verify connectivity </li>
	 <li> Create VRF A1 on site1 (R1) and VRF A2 on site2 (R5), both PE router <span id="ref01">[LAB- MPLS VPN with Static Routing]</span></li>
	 <li> RD & RT value should be 777:1 for both sites. <span id="ref01">[LAB- MPLS VPN with Static Routing]</span> </li>
	 <li> Associates the VRF (A1/A2) with the Layer 3 interface. Both PE's LAN interface (R1 to R6 and R5 to R7).<span id="ref01">[LAB- MPLS VPN with Static Routing]</span> </li>
	 <li> Remove OSPF configuration on PE and CE. </li>
	 <li> Remove BGP configuration from both PE routers. </li>
	 <li> Remove the loopback 10/50 interface used for sham-link. </li> </ol>
     </br>
	 <h3> Solution </h3>
	 <font id="config">
	 R1(config)#no router bgp 500 </br>
	 R1(config)#no router ospf 10 </br> 
	 R1(config)#no int loopback 10 </br>
	 </br>
	 R5(config)#no router bgp 500 </br>
	 R5(config)#no router ospf 50 </br> 
	 R5(config)#no int loopback 50 </br>
	 </br>
	 R6(config)#no router ospf 1 </br>
	 R7(config)#no router ospf 1 </br>
	 </br>
	 </font>
	 <h3> Task </h3>
	 <ol>
	 <li> Configure eBGP routing between PE and CE routers. </li>
	 <li> Use AS-500 for SP core and AS-600 for both CE. </li>
	 <li> Ensure that the PE routers should be able to ping CE routers LAN interfaces respectively. </li> </ol>
     </br>
	 <h3> Solution </h3>
	 <font id="config">
	 R1(config)#router bgp 500 </br>
	 R1(config-router)#<span class="command">address-family ipv4 vrf A1</span></br> 
	 R1(config-router-af)#neighbor 172.16.16.6 remote-as 600 </br>
	 R1(config-router-af)#neighbor 172.16.16.6 activate</br>
	 R1(config-router-af)#no auto-summary</br>
	 R1(config-router-af)#no synchronization</br>
	 R1(config-router-af)#network 172.16.16.0 mask 255.255.255.0</br></br>
	 
	 R6(config)#router bgp 600 </br>
	 R6(config-router-af)#neighbor 172.16.16.1 remote-as 500 </br>
	 R6(config-router-af)#no auto-summary</br>
	 R6(config-router-af)#no synchronization</br>
	 R6(config-router-af)#network 172.16.16.0 mask 255.255.255.0</br>
	 R6(config-router-af)#network 6.6.6.6 mask 255.255.255.255</br>
	 </br> </font>
	 <h3> Verifying the configuration </h3>
	 <font id="config">
	 show ip bgp vpnv4 all summary </br>
	 show ip bgp vpnv4 all</br>
	 show ip route vrf A1</br>
	 </br> </font>
	 <font id="config">
	 R5(config)#router bgp 500 </br>
	 R5(config-router)#<span class="command">address-family ipv4 vrf A2</span></br> 
	 R5(config-router-af)#neighbor 172.16.57.7 remote-as 600 </br>
	 R5(config-router-af)#neighbor 172.16.57.7 activate</br>
	 R5(config-router-af)#redistribute connected</br></br>
	 	 
	 R7(config)#router bgp 600 </br>
	 R7(config-router-af)#neighbor 172.16.57.5 remote-as 500 </br>
	 R7(config-router-af)#no auto-summary</br>
	 R7(config-router-af)#no synchronization</br>
	 R7(config-router-af)#network 172.16.57.0 mask 255.255.255.0</br>
	 R7(config-router-af)#network 7.7.7.7 mask 255.255.255.255</br>
	 </br> </font>
	 <h3> Verifying the configuration </h3>
	 <font id="config">
	 show ip bgp vpnv4 all summary </br>
	 show ip bgp vpnv4 all</br>
	 show ip route vrf A2</br>
	 </br> </font>
	 <h3> Task </h3>
	 <ol>
	 <li> Configure VPNv4 peering between PE routers (R1 & R5).</li>
	 </ol> </br>
	 <h3> Solution </h3>
	 <font id="config">
	 R1(config)#router bgp 500 </br>
	 R1(config-router)#neighbor  5.5.5.5 remote-as 500</br>
	 R1(config-router)#neighbor  5.5.5.5 update-source loopback 0</br>
	 R1(config-router)#<span class="command">address-family vpnv4 unicast</span></br>
	 R1(config-router-af)#neighbor  5.5.5.5 activate</br>
	 R1(config-router-af)#neighbor  5.5.5.5 send-community extended</br>
	 R1(config-router-af)#neighbor  5.5.5.5 next-hop-self</br></br>
	 R5(config)#router bgp 500 </br>
	 R5(config-router)#neighbor  1.1.1.1 remote-as 500</br>
	 R5(config-router)#neighbor  1.1.1.1 update-source loopback 0</br>
	 R5(config-router)#<span class="command">address-family vpnv4 unicast</span></br>
	 R5(config-router-af)#neighbor  1.1.1.1 activate</br>
	 R5(config-router-af)#neighbor  1.1.1.1 send-community extended</br>
	 R5(config-router-af)#neighbor  1.1.1.1 next-hop-self</br>
	 </font></br>
	 <h3> Verifying the configuration </h3>
	 <font id="config">
	 show ip bgp vpnv4 all summary </br>
	 show ip bgp vpnv4 all</br>
	 show ip route vrf A1/A2</br>
	 show ip route</br></br>
	 
	 R1#ping vrf A1 7.7.7.7  <span class="command"> Failed </span>
	 </br></br></font>
	 <p class="note-head">Notes:</p>
	 <p class="note-text">No routes get installed because the CE routers receive the routes with its own AS coming from other sites.</p>
	 <p class="note-text">For loop prevention mechanism BGP will not install the routes its BGP table if the customer has the same ASN at different sites. (default behavior).</p>
	 <p class="note-text">The CE router drops the BGP update as it sees that its own ASN 600 is in the update.</p>
	 <p class="note-text">This means that if the customer had this own private network having only 1 ASN, for MPLS VPN service from SP, he would now have to use different ASN for each site.</p>
	 <p class="note-text">This is tedious and new ASN are almost impossible to attain. The customer can use ASNs from the private ASN range (64512-65535).</p>
	 <p class="note-text">However an easier solution is available, and it involves having the PE router replace the customer ASN in the as-path with the ASN of the SP.</p>
	 <p class="note-text">The command that you need to configure on the PE router to override the ASN is neighbor ip-address as-override.</p></br>
	 <font id="config">
	 R1(config)#router bgp 500 </br>
	 R1(config-router)#<span class="command">address-family ipv4 vrf A1</span></br> 
	 R1(config-router-af)#neighbor 172.16.16.6 <span class="command"> as-override</span> </br>
	 </br>
	 R5(config)#router bgp 500 </br>
	 R5(config-router)#<span class="command">address-family ipv4 vrf A2</span></br> 
	 R5(config-router-af)#neighbor 172.16.57.7 <span class="command"> as-override</span> </br>
	 </br> </font>
	 <h3> Verifying </h3>
	 <font id="config">
	 show ip route </br>
	 show ip bgp</br>
	 R7#ping 6.6.6.6 source loopback 0 <span class="command"> Success </span></br>
	 R5#ping vrf A2 6.6.6.6 <span class="command"> Success </span></br>
	 R1#ping vrf A1 7.7.7.7  <span class="command"> Success </span></br></br>
	 </font>
		 
<! =========================================================== >	
	 <h2> LAB - MPLS Overlay VPN </h2>
<! =========================================================== >	
	<figure>
		<figcaption>Network Diagram</figcaption>
		<img src="images/mpls-overlayvpn.png" alt="MPLS Diagram" style="width:800px;height:300px;">
		</figure>

	 <p class="note-head">Overlapping VPNs:</p>
	 <p class="note-text">Overlapping VPNs are used to provide connectivity between segments of two VPNs.</p>
	 <p class="note-text">CE routers participate in simple VPNs.</p>
	 <p class="note-text">Some CE routers participate in more that one simple VPN.</p>
	 <p class="note-text">There are two uses for overlapping VPNs:</p>
	 <p class="note-subtext">Comapnies that use MPLS VPNs to implement both intranet and extranet services.</p>
	 <p class="note-subtext">Companies that might decide to limit visibility between departments.</p>
	 <p class="note-text">Sites that participate in more than one VPN import routes with RTs from any VPN in which they
participate and export routes with RTs for all VPNs in which they participate.</p>
	 <p class="note-text">Sites cannot talk to each other if they belong to different VPNs.</p>
	 <p class="note-text">Overlapping VPN site are configured with the required RTs based on the VPN membership.</p></br>
	 
	<h3> Task </h3>
	 <ol>
	 <li> Add R8 and R9 to existing network as per the network diagram and configure basic ip addressing. </li>
	 </ol>
     </br>
	 <h3> Solution </h3>
	 <font id="config">
	 R1(config)#int f0/1 </br>
	 R1(config-if)#ip address 172.16.18.1 255.255.255.0 </br> 
	 R1(config-if)#no shutdown </br>
	 </br>
	 R8(config)#int f0/1 </br>
	 R8(config-if)#ip address 172.16.18.8 255.255.255.0 </br> 
	 R8(config-if)#no shutdown </br>
	 R8(config-if)#exit </br>
	 R8(config)#int loopback 0 </br>
	 R8(config-if)#ip address 8.8.8.8 255.255.255.255 </br> 
	 R8(config-if)#end </br>
	 </br>
	 R5(config)#int f0/1 </br>
	 R5(config-if)#ip address 172.16.59.5 255.255.255.0 </br> 
	 R5(config-if)#no shutdown </br>
	 </br>
	 R9(config)#int f0/1 </br>
	 R9(config-if)#ip address 172.16.59.9 255.255.255.0 </br> 
	 R9(config-if)#no shutdown </br>
	 R9(config-if)#exit </br>
	 R9(config)#int loopback 0 </br>
	 R9(config-if)#ip address 9.9.9.9 255.255.255.255 </br> 
	 R9(config-if)#end </br>
	 </br> </font>
	 <h3> Task </h3>
	 <ol>
	 <li> Configure VRF B1 on R1 and VRF B2 on R5 using RD/RT value of 500:2 for both sides. </li>
	 <li> Configure facing interface (f0/1) under VRF as per the diagram. </li>
	 </ol></br>
	 <h3> Solution </h3>
	 <font id="config">
	 R1(config)#ip vrf B1 </br>
	 R1(config-vrf)#rd 500:2</span></br> 
	 R1(config-vrf)#route-target both 500:2 </br>
	 R1(config-vrf)#exit</br>
	 R1(config)#int f0/1</br>
	 R1(config-if)#ip vrf forwarding B1</br>
	 R1(config-if)#ip address 172.16.18.1 255.255.255.0</br>
	 R1(config-if)#end</br></br>
	 
	 R5(config)#ip vrf B2 </br>
	 R5(config-vrf)#rd 500:2</span></br> 
	 R5(config-vrf)#route-target both 500:2 </br>
	 R5(config-vrf)#exit</br>
	 R5(config)#int f0/1</br>
	 R5(config-if)#ip vrf forwarding B2</br>
	 R5(config-if)#ip address 172.16.59.5 255.255.255.0</br>
	 R5(config-if)#end</br></br> 
	 </font>
	 <h3> Verifying the configuration </h3>
	 <font id="config">
	 R1#show ip vrf interface </br>
	 R5#show ip vrf interface </br>
	 </br> </font>
	 <h3> Task </h3>
	 <ol>
	 <li> Configure PE and CE routing for customer site B1 and B2 using any routing protocol. </li>
	 <li> Configure OSPF on site1 (B1) and EIGRP on site2 (B2) for exchanging routing between CE and PE routers. </li>
	 </ol></br>
	 <h3> Solution </h3>
	 <font id="config">
	 R8(config)#router ospf 1 </br>
	 R8(config-router)#network 172.16.18.0 0.0.0.255 area 0</span></br> 
	 R8(config-router)#network 8.8.8.8 0.0.0.0 area 0 </br>
	 R8(config-router)#exit</br></br>
	 
	 R1(config)#router ospf 10 vrf B1</br>
	 R1(config-router)#network 172.16.18.0 0.0.0.255 area 0</br>
	 R1(config-router)#redistribute bgp 500 subnets </br>
	 R1(config-router)#exit</br></br>
	 
	 R1(config)#router bgp 500 </br>
	 R1(config)#address-family ipv4 vrf B1</br>
	 R1(config-af)#redistribute ospf 10 vrf B1 match internal external</br>
	 R1(config-af)#end</br></br>
	 
	 R9(config)#router eigrp 100 </br>
	 R9(config-router)#no auto-summary</span></br> 
	 R9(config-router)#network 172.16.59.0 </br>
	 R9(config-router)#network 9.0.0.0 </br>
	 R9(config-router)#exit</br></br>
	 
	 R5(config)#router eigrp 500</br>
	 R5(config-router)#address-family ipv4 vrf B2</br>
	 R5(config-router-af)#autonomous-system 100 </br>
	 R5(config-router-af)#network 172.16.59.0</br>
	 R5(config-router-af)#redistribute bgp 500 metric 1 1 1 1 1</br>
	 R5(config-router-af)#exit</br>
	 R5(config-router)#exit</br></br>
	 
	 R5(config)#router bgp 500</br> 
	 R5(config-router)#address-family ipv4 vrf B2</br> 
	 R5(config-router-af)#redistribute eigrp 100</br> 
	 R5(config-router-af)#exit</br></br> 
	 </font>
	 <h3> Verifying the configuration </h3>
	 <font id="config">
	 R5#show ip eigrp vrf B2 neighbors </br>
	 R5#show ip route vrf B2 eigrp </br>
	 R5#ping vrf B2 9.9.9.9 <span class="command"> Success </span></br>
	 R5#show ip vrf B2</br></br>
	 R1#show ip route vrf B1 </br></br>
	 R8#show ip route ospf </br>
	 R8#ping 9.9.9.9 source loopback 0 <span class="command"> Success </span></br>
	 </br> </font>
	 
	 <h3> Task </h3>
	 <ol>
	 <li> Configure PE routers to ensure that customer sites A1/A2 can exchange routes between customer sites B1/B2. </li>
	 </ol></br>
	 <h3> Verifying the configuration </h3>
	 <font id="config">
	 R5#show run | s vrf </br></br>
	 R1#show run | s vrf </br></br>
	 
	 R1#show ip bgp vpnv4 vrf A1 </br>
	 R1#show ip bgp vpnv4 vrf B1 </br>
	 R1#show ip route vrf A1 </br>
	 R1#show ip route vrf B1 </br></br>
	 
	 R6#show ip route bgp </br>
	 R6#ping 8.8.8.8 source loopback 0 <span class="command"> NOT Success </span></br>
	 R6#ping 9.9.9.9 source loopback 0 <span class="command"> NOT Success </span></br></br>
	 
	 R5#show ip route vrf A2 </br>
	 R5#show ip route vrf B2 </br>
	 R5#show ip bgp vpnv4 all </br></br>
	 
	 R9#show ip route eigrp </br>
	 R9#ping 6.6.6.6 source loopback 0 <span class="command"> NOT Success </span></br>
	 R9#ping 7.7.7.7 source loopback 0 <span class="command"> NOT Success </span></br>	 
	 </br> </font>
	 
	 <h3> Solution </h3>
	 <font id="config">
	 R1(config)#ip vrf A1 </br>
	 R1(config-vrf)#route-target import 500:2</br> 
	 R1(config-vrf)#exit </br></br> 
	 
	 R1(config)#ip vrf B1 </br>
	 R1(config-vrf)#route-target import 777:1</br> 
	 R1(config-vrf)#exit</br></br>
	 
	 R5(config)#ip vrf A2 </br>
	 R5(config-vrf)#route-target import 500:2</br> 
	 R5(config-vrf)#exit </br></br> 
	  
	 R5(config)#ip vrf B2 </br>
	 R5(config-vrf)#route-target import 777:1</br> 
	 R5(config-vrf)#exit</br></br>
	 </font>
	 <h3> Verifying the configuration </h3>
	 <font id="config">
	 R1#show ip bgp vpnv4 vrf A1 </br>
	 R1#show ip bgp vpnv4 vrf B1 </br>
	 R1#show ip route vrf A1 </br>
	 R1#show ip route vrf B1 </br></br>
	 
	 R6#show ip route bgp </br>
	 R6#ping 8.8.8.8 source loopback 0 <span class="command"> Success </span></br>
	 R6#ping 9.9.9.9 source loopback 0 <span class="command"> Success </span></br></br>
	 
	 R5#show ip route vrf A2 </br>
	 R5#show ip route vrf B2 </br>
	 R5#show ip bgp vpnv4 all </br></br>
	 
	 R9#show ip route eigrp </br>
	 R9#ping 6.6.6.6 source loopback 0 <span class="command"> Success </span></br>
	 R9#ping 7.7.7.7 source loopback 0 <span class="command"> Success </span></br>
	 </br> </font>
	 
	 <h3> Task </h3>
	 <ol>
	 <li> Remove the import options configured in the previous task. </li>
	 </ol></br>
	 <h3> Verifying the configuration </h3>
	 <font id="config">
	 R5#show run | s vrf </br></br>
	 R1#show run | s vrf </br>
	 </br> </font>
	 <h3> Solution </h3>
	 <font id="config">
	 R1(config)#ip vrf A1 </br>
	 R1(config-vrf)#no route-target import 500:2</br> 
	 R1(config-vrf)#exit </br></br> 
	 
	 R1(config)#ip vrf B1 </br>
	 R1(config-vrf)#no route-target import 777:1</br> 
	 R1(config-vrf)#exit</br></br>
	 
	 R5(config)#ip vrf A2 </br>
	 R5(config-vrf)#no route-target import 500:2</br> 
	 R5(config-vrf)#exit </br></br> 
	  
	 R5(config)#ip vrf B2 </br>
	 R5(config-vrf)#no route-target import 777:1</br> 
	 R5(config-vrf)#exit</br></br></font>
	 
	 <h3> Verifying the configuration </h3>
	 <font id="config">
	 R1#show ip route vrf A1 </br>
	 R1#show ip route vrf B1 </br>
	 </br> </font>
	 
	 <h3> Task </h3>
	 <ol>
	 <li> Configure PE routes to ensure that site A1 can exchange routes from A2 & B2 but not B1. </li>
	 </ol></br>
	 <h3> Solution </h3>
	 <font id="config">
	 R1(config)#ip vrf A1 </br>
	 R1(config-vrf)#route-target export 500:12</br> 
	 R1(config-vrf)#route-target import 500:12</br> 
	 R1(config-vrf)#exit </br></br> 
	 
	 R5(config)#ip vrf B2 </br>
	 R5(config-vrf)#route-target export 500:12</br> 
	 R5(config-vrf)#route-target import 500:12</br> 
	 R5(config-vrf)#exit </br></br> </font> 
	  
	 <h3> Verifying the configuration </h3>
	 <font id="config">
	 R1#show ip route vrf A1 </br>
	 R1#show ip bgp vpnv4 vrf A1 </br></br>
	 
	 R6#show ip route bgp </br>
	 R6#ping 9.9.9.9 source loopback 0 <span class="command"> Success </span></br>
	 </br> </font>
	 
<! =========================================================== >	
	 <h2> LAB - Export Maps </h2>
<! =========================================================== >		
	<figure>
		<figcaption>Network Diagram</figcaption>
		<img src="images/mpls-export-maps.png" alt="MPLS Export Maps Diagram" style="width:800px;height:300px;">
		</figure>
	 <h3> Task </h3>
	 <ol>
	 <li> Continue with the previous lab [LAB - MPLS overlay VPN]. </li>
	 <li> Remove the import/export 500:12 configured on A1 and B2 customer sites. </li>
	 <li> Ensure that respective customer sites (A1 with A2 and B1 with B2) communicate with each other. No traffic should between customer A and B. </li>
	 </ol></br>
	 <h3> Solution </h3>
	  <font id="config">
	 R1(config)#ip vrf A1 </br>
	 R1(config-vrf)#no route-target export 500:12</br> 
	 R1(config-vrf)#no route-target import 500:12</br> 
	 R1(config-vrf)#exit </br></br> 
	 
	 R5(config)#ip vrf B2 </br>
	 R5(config-vrf)#no route-target export 500:12</br> 
	 R5(config-vrf)#no route-target import 500:12</br> 
	 R5(config-vrf)#exit </br></br> </font> 
	  
	 <h3> Verifying the configuration </h3>
	 <font id="config">
	 R1#show ip route vrf A1 </br>
	 R1#show ip bgp vpnv4 vrf A1 </br>
	 R1#show ip bgp vpnv4 vrf B1 </br></br>
	 
	 R5#show ip bgp vpnv4 vrf B2 </br>
	 R5#show ip bgp vpnv4 vrf A2 </br>
	 </br> </font>
	 
	 
	 <h3> Task </h3>
	 <ol>
	 <li> Configure the PE routers to exchange all routes between customer A and B. </li>
	 </ol></br>
	 <h3> Solution </h3>
	 <font id="config">
	 R1(config)#ip vrf A1 </br>
	 R1(config-vrf)#route-target import 500:2</br> 
	 R1(config-vrf)#exit </br></br> 
	 
	 R1(config)#ip vrf B1 </br>
	 R1(config-vrf)#route-target import 777:1</br> 
	 R1(config-vrf)#exit </br></br>
	 
	 R5(config)#ip vrf A2 </br>
	 R5(config-vrf)#route-target import 500:2</br> 
	 R5(config-vrf)#exit </br></br> 
	 
	 R5(config)#ip vrf B2 </br>
	 R5(config-vrf)#route-target import 777:1</br> 
	 R5(config-vrf)#exit </br></br> </font> 	
	 
	 <h3> Verifying the configuration </h3>
	 <font id="config">
	 R1#show ip route vrf A1 </br>
	 R1#show ip bgp vpnv4 vrf A1 </br>
	 R1#show ip bgp vpnv4 vrf B1 </br></br>
	 
	 R5#show ip bgp vpnv4 vrf B2 </br>
	 R5#show ip bgp vpnv4 vrf A2 </br></br>
	 
	 R6#show ip route bgp </br></br>
	 
	 R8#show ip route ospf </br>
	 </font></br>
	 	 
	 <h3> Task </h3>
	 <ol>
	 <li> Add two new loopback interfaces on R6 using loopback 11 and loopback 12. </li>
	 <li> Advertise loopback interface into BGP. </li>
	 <li> Ensure that R1 should exchange these two loopback interfaces with only sites of customer A (A1 and A2) but not sites of customer B (B1 and B2). </li>
	 </ol></br>
	 <h3> Solution </h3>
	  <font id="config">
	 R6(config)#int loopback 11 </br>
	 R6(config-if)#ip address 11.11.11.11 255.255.255.255</br> 
	 R6(config-if)#exit </br></br> 
	  
	 R6(config)#int loopback 12 </br>
	 R6(config-if)#ip address 12.12.12.12 255.255.255.255</br> 
	 R6(config-if)#exit </br></br> 
	 
	 R6(config)#router bgp 600 </br>
	 R6(config-router)#network 11.11.11.11 mask 255.255.255.255</br> 
	 R6(config-router)#network 12.12.12.12 mask 255.255.255.255</br> 
	 R6(config-router)#exit </br></br> 
	 </font>
	 <h3> Verifying the configuration </h3>
	 <font id="config">
	 R1#show ip bgp vpnv4 vrf A1 </br>
	 R1#show ip bgp vpnv4 vrf B1 </br></br>
	 
	 R5#show ip bgp vpnv4 vrf B2 </br>
	 R5#show ip bgp vpnv4 vrf A2 </br></br>
	 </font>
	 <p class="note-head">Notes:</p>
	 <p class="note-text">By default all the routes from R6 get advertised to R1 and then advertised to all sites of customer A and B based on default import/export values.</p></br>
	 
	 <h3> Verifying the configuration </h3>
	 <font id="config">
	 R1#show run | s vrf </br></br>
	 R5#show run | s vrf </br></br>
	 </font>
	 <p class="note-head">Notes:</p>
	 <p class="note-text">As per the task these two new loopbacks should get advertised only between customer A1 and A2.</p>
	 <p class="note-text">To make that possible we need to advertise these two loopback interfaces with new RT value (Using Export Maps).</p></br>
	 
	 <h3> Solution </h3>
	 <font id="config">
	 R1(config)#ip prefix-list R6_R7 seq 5 permit 11.11.11.11/32 </br>
	 R1(config)#ip prefix-list R6_R7 seq 10 permit 12.12.12.12/32 </br></br>
	 
	 R1(config)#route-map R6_R7 permit 10 </br>
	 R1(config-route-map)#match ip address prepix-list R6_R7 </br>
	 R1(config-route-map)#set extcommunity rt 6:6 </br>
	 R1(config-route-map)#exit</br></br>
	 
	 R1(config)#route-map R6_R7 permit 20 </br>
	 R1(config-route-map)#exit</br> 
	 R1(config-if)#exit </br></br> 
	 
	 R1(config)#ip vrf A1 </br>
	 R1(config-vrf)#export map R6_R7</br> 
	 R1(config-vrf)#end</br></br> 
	 </font>
	 <h3> Verifying the configuration </h3>
	 <font id="config">
	 R1#clear ip bgp * vpnv4 unicast </br>
	 R1#show ip bgp vpnv4 vrf A1 </br>
	 R1#show ip bgp vpnv4 vrf B1 </br></br>
	 
	 R5#show ip bgp vpnv4 vrf B2 </br>
	 R5#show ip bgp vpnv4 vrf A2 </br></br>
	 </font>
	 <h3> Solution </h3>
	 <font id="config">
	 R5(config)#ip vrf A2 </br>
	 R5(config-vrf)#route-target import 6:6 </br>
	 R5(config-vrf)#exit </br>
	 R5(config)#end </br></br> 
	 </font> 
	 <h3> Verifying the configuration </h3>
	 <font id="config">
	 R5#show ip bgp vpnv4 vrf B2 </br>
	 R5#show ip bgp vpnv4 vrf A2 </br></br>
	 </font>
	 
	 </body>
</html>
