<!DOCTYPE html>
<html>
    <head>
    <title>Redistribution</title>
	<link rel="stylesheet" type="text/css" href="css/cciers.css" />
	<!-- <link rel="stylesheet" type="text/css" href="css/reset.css" /> -->
	<link rel="stylesheet" type="text/css" href="css/jquery.highlight-within-textarea.css"/>
	 
	<script src="scripts/jquery-3.2.1.js"></script>
	<script src="scripts/jquery-ui.js"></script>
	<script src="scripts/jquery.highlight-within-textarea.js"></script>
	 </head>
     <body>
	
	<h2>Redistribution </h2><br/>
	
	<p>Route redistribution is simply the process of taking routes from one source and placing them into a separate routing process.   
	The route source doesn’t have to be a dynamic routing protocol – we can redistribute directly connected networks and static routes as well. </p><br/>

	<p>Differences in routing protocol characteristics, such as metrics, administrative distance, classful and classless capabilities can effect redistribution. Consideration must be given to these differences for redistribution to succeed.</p><br/>
	
<p class='chapter'>Redistribution overview</p></br>
<p class='list-1'>Redistribution occurs from the routing table not the routing database</p>
<p class='list-1'>When redistributing protocols X into Y, take...</p>
<p class='list-3'>routes in the routing table via protocol X</p>
<p class='list-3'>Connected interfaces running protocol X</p>
<p class='list-1'>Route advertisement rules </p>
<p class='list-3'>RIP vs. EIGRP vs. OSPF vs. BGP </p></br>

<p class='chapter-header'>Connected redistribution:</p>
<p class='list-1'>Implicitly occurs for connected links running the redistributed protocol (not for IPv6)</p>
<p class='list-1'>Additional connected links can explicitly included or excluded </p>
	<p class='list-2'>redistribute connected [metric] [route-map]                </p>
	<p class='list-2'>overrides implicit redistribution                          </p></br>
<p class='chapter-header'>How IOS chooses paths:                                         </p>
<p class='list-1'>Routing databases chooses one or more candidate paths          </p>
	<p class='list-2'>EIGRP via DUAL, OSPF via SPF etc.                           </p>
	<p class='list-2'>Load balancing possible via maximum-paths                  </p>
<p class='list-1'>If multiple equal matches between protocols....                </p>
	<p class='list-2'>Choose the lowest AD                                       </p>
	<p class='list-2'>Install results in RIB and/or FIB                          </p>
<p class='list-1'>If multiple equal matches between same protocol                </p>
	<p class='list-2'>EIGRP: Choose the lowest AS                                </p>
	<p class='list-2'>OSPF: Chooses the lowest PID                               </p>
	<p class='list-2'>Install results in RIB and/or FIB                          </p></br>

<p class='chapter'>Basic Redistribution Examples														</p></br>
<p class='chapter-header'>RIP Redistribution:                                                                   </p>
<p class='list-1'>Doesn't differentialte between internal and external routes                           </p>
<p class='list-2'>	Administrative distance of 120 for all routes                                       </p>
<p class='list-1'>No default seed metric                                                                </p>
<p class='list-2'>	redistribute [protocol] metric [hops]                                               </p>
<p class='list-2'>	default-metric [hops]                                                               </p></br>
<p class='chapter-header'>EIGRP Redistribution:                                                                 </p>
<p class='list-1'>AD of 170 for external EIGRP                                                          </p>
<p class='list-2'>	Helps to automitically prevent route feedback                                       </p>
<p class='list-1'>No default seed metric unless EIGRP to EIGRP, or connected to EIGRP                   </p>
<p class='list-2'>	redistribute [protocol] metric [bandwidth] [delay] [load] [reliability] [MTU]       </p>
<p class='list-2'>	default-metric [bandwidth] [delay] [load] [reliability] [MTU]	                    </p>
<p class='list-1'>                                                                                      </p>
<p class='list-1'>EIGRP Router-ID                                                                       </p>
<p class='list-1'>EIGRP Uses Router-ID for loop prevention                                              </p>
<p class='list-2'>	As of EIGRP release 5.0 router-id also included in internal routes                  </p>
<p class='list-2'>	show eigrp plugins show version of EIGRP                                            </p>
<p class='list-1'>Route will be dropped if the same router-id is present in internal/external routes.   </p></br>
<p class='chapter-header'>OSPF Redistribution                                                                   </p>
<p class='list-1'>AD of 110 for all OSPF routes                                                         </p>
<p class='list-1'>Uses route-id for flooding loop prevention                                            </p>
<p class='list-1'>Default seed metric 20 and metric-type E2/N2                                          </p>
<p class='list-1'>OSPF path selection preference                                                       </p>
<p class='list-2'>E1>N1>E2>N2                                                                  </p>
<p class='list-2'>sometimes E1 & N1 vs. E2 & N2 metrics                                                           </p>
<p class='list-3'>	Forward metric is the key                                                           </p></br>
<p class='chapter-header'>BGP Redistribution                                                                    </p>
<p class='list-1'>Uses ORIGIN code Incomplete(?)                                                        </p>
<p class='list-1'>Uses normal eBGP and iBGP loop prevention                                             </p>
<p class='list-1'>No need to redistribution from PE/CE eBGP to VPNv4 BGP                                </p></br>
<p class='chapter-header'>BGP Redistribution Considerations                                                     </p>
<p class='list-1'>IGP TO BGP                                                                            </p>
<p class='list-2'>	Denies OSPF external routes by default                                              </p>
<p class='list-3'>		redistribute ospf [pid] match internal external                                 </p>
<p class='list-1'>BGP to IGP                                                                            </p>
<p class='list-2'>eBGP routes allowed, iBGP routes denied by default                                    </p>
<p class='list-3'>	bgp redistribute-internal                                                           </p>
<p class='list-3'>	Legacy synchronization rule                                                         </p>

	</br>
	 <figure>
		<figcaption>Network Diagram</figcaption></br>
		<img src="images/redis-rip-eigrp.png" alt="DMVPN-P1-Static routing" style="width:550px;height:300px;">
	</figure> </br>
	 	 
	 <h2> LAB - Redistribution between RIP and EIGRP</h2></br>
	 <h3 id="task"> Task </h3>
	 <ol class='ol-wb'>
	 <li class='li-wb'> Configure the interfaces as per the diagram.</li>
	 <li class='li-wb'> Configure RIP and EIGRP routing process according to network diagram.</li>
	 </ol> </br>
	
	<h3> Solution </h3>
	 <font id="config">
		R1#conf t </br>
		R1(config)#router rip </br>
		R1(config-router)#version 2 </br>
		R1(config-router)#no auto-summary</br>
		R1(config-router)#network 12.0.0.0  </br>
		R1(config-router)#network 10.0.0.0  </br>
		R1(config-router)#end       </br></br>
		                                                    
		R2#conf t </br>
		R2(config)#router rip </br>
		R2(config-router)#version 2 </br>
		R2(config-router)#no auto-summary</br>
		R2(config-router)#network 12.0.0.0  </br>
		R2(config-router)#network 20.0.0.0  </br>
		R2(config-router)#end  </br></br>
		                                                        
		R2#conf t </br>
		R2(config)#router eigrp 100 </br>
		R2(config-router)#no auto-summary</br>
		R2(config-router)#network 23.0.0.0  </br>
		R2(config-router)#end       </br></br>
		
		R3#conf t </br>
		R3(config)#router eigrp 100 </br>
		R3(config-router)#no auto-summary</br>
		R3(config-router)#network 23.0.0.0  </br>
		R3(config-router)#network 30.0.0.0  </br>
		R3(config-router)#end       </br></br>
			
	 <font id="config">
	 <h3> Verifying the configuration</h3>
	 R1#sh ip route </br>
	 R2#sh ip route</br>
	 R3#sh ip route</br>
	 </font></br>
	
<textarea class='output-118' rows="11" cols="85" readonly>	
R1#sh ip route | b Gateway
Gateway of last resort is not set

     20.0.0.0/24 is subnetted, 1 subnets
R       20.0.0.0 [120/1] via 12.0.0.2, 00:00:17, Serial0/0
     10.0.0.0/24 is subnetted, 1 subnets
C       10.0.0.0 is directly connected, FastEthernet0/0
     12.0.0.0/24 is subnetted, 1 subnets
C       12.0.0.0 is directly connected, Serial0/0
</textarea></br></br>

<script>
 $('.output-118').highlightWithinTextarea({
	highlight: ['R       20.0.0.0 [120/1] via 12.0.0.2, 00:00:17, Serial0/0']
});
</script>
	
<textarea class='output-119' rows="15" cols="85" readonly>	
R2#sh ip route | b Gateway
Gateway of last resort is not set

     20.0.0.0/24 is subnetted, 1 subnets
C       20.0.0.0 is directly connected, FastEthernet0/0
     23.0.0.0/24 is subnetted, 1 subnets
C       23.0.0.0 is directly connected, Serial0/0
     10.0.0.0/24 is subnetted, 1 subnets
R       10.0.0.0 [120/1] via 12.0.0.1, 00:00:21, Serial0/1
     12.0.0.0/24 is subnetted, 1 subnets
C       12.0.0.0 is directly connected, Serial0/1
     30.0.0.0/24 is subnetted, 1 subnets
D       30.0.0.0 [90/2195456] via 23.0.0.3, 02:17:45, Serial0/0
</textarea></br></br>

<script>
 $('.output-119').highlightWithinTextarea({
	highlight: ['R       10.0.0.0 [120/1] via 12.0.0.1, 00:00:21, Serial0/1','D       30.0.0.0 [90/2195456] via 23.0.0.3, 02:17:45, Serial0/0']
});
</script>

<textarea class='output-120' rows="9" cols="85" readonly>	
R3#sh ip route | b Gateway
Gateway of last resort is not set

     23.0.0.0/24 is subnetted, 1 subnets
C       23.0.0.0 is directly connected, Serial0/1
     30.0.0.0/24 is subnetted, 1 subnets
C       30.0.0.0 is directly connected, FastEthernet0/0
</textarea></br></br>

<script>
 $('.output-120').highlightWithinTextarea({
	highlight: ['!!!!!']
});
</script>	
	
	
	<h3 id="task"> Task </h3>
	<ol class='ol-wb'>
	<li class='li-wb'> Configure redistribution on R2 router, so that R1 and R3 routers can reach each other </li>
	</ol> </br>
	
	R2# conf t </br>
	R2(config)#router eigrp 100 </br></br>
	R2(config-router)#redistribute rip metric 1000 2000 255 1 1500 </br> 
	R2(config-router)#exit </br></br>
	
	R2(config)#router rip </br></br>
	R2(config-router)#redistribute eigrp 100 metric 3 </br> <br/>
	
	
	<font id="config">
	 <h3> Verifying the configuration</h3>
	 R1#sh ip route </br>
	 R2#sh ip route</br>
	 R3#sh ip route </br>
	 R1#ping 30.0.0.30 </br>
	 R3#ping 10.0.0.10 </br></br>
	 </font>
	
<textarea class='output-121' rows="15" cols="85" readonly>	
R1#sh ip route | b Gateway
Gateway of last resort is not set

     20.0.0.0/24 is subnetted, 1 subnets
R       20.0.0.0 [120/1] via 12.0.0.2, 00:00:04, Serial0/0
     23.0.0.0/24 is subnetted, 1 subnets
R       23.0.0.0 [120/3] via 12.0.0.2, 00:00:04, Serial0/0
     10.0.0.0/24 is subnetted, 1 subnets
C       10.0.0.0 is directly connected, FastEthernet0/0
     12.0.0.0/24 is subnetted, 1 subnets
C       12.0.0.0 is directly connected, Serial0/0
     30.0.0.0/24 is subnetted, 1 subnets
R       30.0.0.0 [120/3] via 12.0.0.2, 00:00:05, Serial0/0
</textarea></br></br>

<script>
 $('.output-121').highlightWithinTextarea({
	highlight: ['R       23.0.0.0 [120/3] via 12.0.0.2, 00:00:04, Serial0/0','R       30.0.0.0 [120/3] via 12.0.0.2, 00:00:05, Serial0/0']
});
</script>
	
<textarea class='output-122' rows="15" cols="85" readonly>	
R2#sh ip route | b Gateway
Gateway of last resort is not set

     20.0.0.0/24 is subnetted, 1 subnets
C       20.0.0.0 is directly connected, FastEthernet0/0
     23.0.0.0/24 is subnetted, 1 subnets
C       23.0.0.0 is directly connected, Serial0/0
     10.0.0.0/24 is subnetted, 1 subnets
R       10.0.0.0 [120/1] via 12.0.0.1, 00:00:21, Serial0/1
     12.0.0.0/24 is subnetted, 1 subnets
C       12.0.0.0 is directly connected, Serial0/1
     30.0.0.0/24 is subnetted, 1 subnets
D       30.0.0.0 [90/2195456] via 23.0.0.3, 02:17:45, Serial0/0
</textarea></br></br>

<script>
 $('.output-122').highlightWithinTextarea({
	highlight: ['R       10.0.0.0 [120/1] via 12.0.0.1, 00:00:21, Serial0/1','D       30.0.0.0 [90/2195456] via 23.0.0.3, 02:17:45, Serial0/0']
});
</script>

<textarea class='output-123' rows="15" cols="85" readonly>	
R3#sh ip route | b Gateway
Gateway of last resort is not set

     20.0.0.0/24 is subnetted, 1 subnets
D EX    20.0.0.0 [170/3584000] via 23.0.0.2, 00:01:20, Serial0/1
     23.0.0.0/24 is subnetted, 1 subnets
C       23.0.0.0 is directly connected, Serial0/1
     10.0.0.0/24 is subnetted, 1 subnets
D EX    10.0.0.0 [170/3584000] via 23.0.0.2, 00:01:20, Serial0/1
     12.0.0.0/24 is subnetted, 1 subnets
D EX    12.0.0.0 [170/3584000] via 23.0.0.2, 00:01:20, Serial0/1
     30.0.0.0/24 is subnetted, 1 subnets
C       30.0.0.0 is directly connected, FastEthernet0/0
</textarea></br></br>

<script>
 $('.output-123').highlightWithinTextarea({
	highlight: ['D EX    20.0.0.0 [170/3584000] via 23.0.0.2, 00:01:20, Serial0/1','D EX    10.0.0.0 [170/3584000] via 23.0.0.2, 00:01:20, Serial0/1','D EX    12.0.0.0 [170/3584000] via 23.0.0.2, 00:01:20, Serial0/1']
});
</script>	

<textarea class='output-124' rows="8" cols="85" readonly>	
R1#ping 30.0.0.30

Type escape sequence to abort.
Sending 5, 100-byte ICMP Echos to 30.0.0.30, timeout is 2 seconds:
!!!!!
Success rate is 100 percent (5/5), round-trip min/avg/max = 1/7/28 ms
</textarea></br></br>

<script>
 $('.output-124').highlightWithinTextarea({
	highlight: ['!!!!!']
});
</script>

<textarea class='output-125' rows="8" cols="85" readonly>	
R3#ping 10.0.0.10

Type escape sequence to abort.
Sending 5, 100-byte ICMP Echos to 10.0.0.10, timeout is 2 seconds:
!!!!!
Success rate is 100 percent (5/5), round-trip min/avg/max = 1/3/12 ms
</textarea></br></br>

<script>
 $('.output-125').highlightWithinTextarea({
	highlight: ['!!!!!']
});
</script>	

 <h2> LAB - Redistribution between RIP and OSPF</h2></br>
 
	 <figure>
		<figcaption>Network Diagram</figcaption></br>
		<img src="images/redis-rip-ospf.png" alt="Redistribution RIP-OSPF" style="width:550px;height:300px;">
	</figure> </br>
	 	 
	 <h3 id="task"> Task </h3>
	 <ol class='ol-wb'>
	 <li class='li-wb'> Configure the interfaces as per the diagram.</li>
	 <li class='li-wb'> Configure RIP and OSPF routing process according to network diagram.</li>
	 </ol> </br>
	
	<h3> Solution </h3>
	 <font id="config">
		R1#conf t </br>
		R1(config)#router rip </br>
		R2(config-router)#version 2 </br>
		R1(config-router)#no auto-summary</br>
		R1(config-router)#network 12.0.0.0  </br>
		R1(config-router)#network 10.0.0.0  </br>
		R1(config-router)#end       </br></br>
		                                                    
		R2#conf t </br>
		R2(config)#router rip </br>
		R2(config-router)#version 2 </br>
		R2(config-router)#no auto-summary</br>
		R2(config-router)#network 12.0.0.0  </br>
		R2(config-router)#network 20.0.0.0  </br>
		R2(config-router)#end  </br></br>
		                                                        
		R2#conf t </br>
		R2(config)#router ospf 1 </br>
		R2(config-router)#network 23.0.0.0 0.0.0.255 area 0 </br>
		R2(config-router)#end       </br></br>
		
		R3#conf t </br>
		R3(config)#router ospf 1 </br>
		R3(config-router)#network 23.0.0.0 0.0.0.255 area 0 </br>
		R3(config-router)#network 30.0.0.0 0.0.0.255 area 0 </br>
		R3(config-router)#end       </br></br>
			
	 <font id="config">
	 <h3> Verifying the configuration</h3>
	 R1#sh ip route </br>
	 R2#sh ip route</br>
	 R3#sh ip route</br>
	 </font></br>
	
<textarea class='output-126' rows="11" cols="85" readonly>	
R1#sh ip route | beg Gateway
Gateway of last resort is not set

     20.0.0.0/24 is subnetted, 1 subnets
R       20.0.0.0 [120/1] via 12.0.0.2, 00:00:04, Serial0/0
     10.0.0.0/24 is subnetted, 1 subnets
C       10.0.0.0 is directly connected, FastEthernet0/0
     12.0.0.0/24 is subnetted, 1 subnets
C       12.0.0.0 is directly connected, Serial0/0
</textarea></br></br>

<script>
 $('.output-126').highlightWithinTextarea({
	highlight: ['R       20.0.0.0 [120/1] via 12.0.0.2, 00:00:04, Serial0/0']
});
</script>
	
<textarea class='output-127' rows="15" cols="85" readonly>	
R2#sh ip route | b Gateway
Gateway of last resort is not set

     20.0.0.0/24 is subnetted, 1 subnets
C       20.0.0.0 is directly connected, FastEthernet0/0
     23.0.0.0/24 is subnetted, 1 subnets
C       23.0.0.0 is directly connected, Serial0/0
     10.0.0.0/24 is subnetted, 1 subnets
R       10.0.0.0 [120/1] via 12.0.0.1, 00:00:01, Serial0/1
     12.0.0.0/24 is subnetted, 1 subnets
C       12.0.0.0 is directly connected, Serial0/1
     30.0.0.0/24 is subnetted, 1 subnets
O       30.0.0.0 [110/74] via 23.0.0.3, 00:04:30, Serial0/0
</textarea></br></br>

<script>
 $('.output-127').highlightWithinTextarea({
	highlight: ['R       10.0.0.0 [120/1] via 12.0.0.1, 00:00:01, Serial0/1','O       30.0.0.0 [110/74] via 23.0.0.3, 00:04:30, Serial0/0']
});
</script>

<textarea class='output-128' rows="9" cols="85" readonly>	
RR3#sh ip route | b Gateway
Gateway of last resort is not set

     23.0.0.0/24 is subnetted, 1 subnets
C       23.0.0.0 is directly connected, Serial0/1
     30.0.0.0/24 is subnetted, 1 subnets
C       30.0.0.0 is directly connected, FastEthernet0/0
</textarea></br></br>

<script>
 $('.output-128').highlightWithinTextarea({
	highlight: ['!!!!!']
});
</script>	
	
	
	<h3 id="task"> Task </h3>
	<ol class='ol-wb'>
	<li class='li-wb'> Configure redistribution on R2 router, so that R1 and R3 routers can reach each other </li>
	</ol> </br>
	
	R2# conf t </br>
	R2(config)#router rip </br>
	R2(config-router)#redistribute ospf 1 metric 5 </br> 
	R2(config-router)#exit </br></br>
	
	R2(config)#router ospf 1 </br>
	R2(config-router)#redistribute rip subnets metric 100 metric-type 1 </br> <br/>
	
	
	<font id="config">
	 <h3> Verifying the configuration</h3>
	 R1#sh ip route </br>
	 R2#sh ip route</br>
	 R3#sh ip route </br>
	 R1#ping 30.0.0.30 </br>
	 R3#ping 10.0.0.10 </br></br>
	 </font>
	
<textarea class='output-129' rows="15" cols="85" readonly>	
R1#sh ip route | b Gateway
Gateway of last resort is not set

     20.0.0.0/24 is subnetted, 1 subnets
R       20.0.0.0 [120/1] via 12.0.0.2, 00:00:00, Serial0/0
     23.0.0.0/24 is subnetted, 1 subnets
R       23.0.0.0 [120/5] via 12.0.0.2, 00:00:00, Serial0/0
     10.0.0.0/24 is subnetted, 1 subnets
C       10.0.0.0 is directly connected, FastEthernet0/0
     12.0.0.0/24 is subnetted, 1 subnets
C       12.0.0.0 is directly connected, Serial0/0
     30.0.0.0/24 is subnetted, 1 subnets
R       30.0.0.0 [120/5] via 12.0.0.2, 00:00:00, Serial0/0
</textarea></br></br>

<script>
 $('.output-129').highlightWithinTextarea({
	highlight: ['R       23.0.0.0 [120/5] via 12.0.0.2, 00:00:00, Serial0/0','R       30.0.0.0 [120/5] via 12.0.0.2, 00:00:00, Serial0/0']
});
</script>
	
<textarea class='output-130' rows="15" cols="85" readonly>	
R2#sh ip route | b Gateway
Gateway of last resort is not set

     20.0.0.0/24 is subnetted, 1 subnets
C       20.0.0.0 is directly connected, FastEthernet0/0
     23.0.0.0/24 is subnetted, 1 subnets
C       23.0.0.0 is directly connected, Serial0/0
     10.0.0.0/24 is subnetted, 1 subnets
R       10.0.0.0 [120/1] via 12.0.0.1, 00:00:24, Serial0/1
     12.0.0.0/24 is subnetted, 1 subnets
C       12.0.0.0 is directly connected, Serial0/1
     30.0.0.0/24 is subnetted, 1 subnets
O       30.0.0.0 [110/74] via 23.0.0.3, 01:57:32, Serial0/0
</textarea></br></br>

<script>
 $('.output-130').highlightWithinTextarea({
	highlight: ['R       10.0.0.0 [120/1] via 12.0.0.1, 00:00:21, Serial0/1','D       30.0.0.0 [90/2195456] via 23.0.0.3, 02:17:45, Serial0/0']
});
</script>

<textarea class='output-131' rows="15" cols="85" readonly>	
R3#sh ip route | b Gateway
Gateway of last resort is not set

     20.0.0.0/24 is subnetted, 1 subnets
O E1    20.0.0.0 [110/164] via 23.0.0.2, 00:12:14, Serial0/1
     23.0.0.0/24 is subnetted, 1 subnets
C       23.0.0.0 is directly connected, Serial0/1
     10.0.0.0/24 is subnetted, 1 subnets
O E1    10.0.0.0 [110/164] via 23.0.0.2, 00:12:14, Serial0/1
     12.0.0.0/24 is subnetted, 1 subnets
O E1    12.0.0.0 [110/164] via 23.0.0.2, 00:12:14, Serial0/1
     30.0.0.0/24 is subnetted, 1 subnets
C       30.0.0.0 is directly connected, FastEthernet0/0
</textarea></br></br>

<script>
 $('.output-131').highlightWithinTextarea({
	highlight: ['O E1    20.0.0.0 [110/164] via 23.0.0.2, 00:12:14, Serial0/1','O E1    10.0.0.0 [110/164] via 23.0.0.2, 00:12:14, Serial0/1','O E1    12.0.0.0 [110/164] via 23.0.0.2, 00:12:14, Serial0/1']
});
</script>	

<textarea class='output-132' rows="8" cols="85" readonly>	
R1#ping 30.0.0.30

Type escape sequence to abort.
Sending 5, 100-byte ICMP Echos to 30.0.0.30, timeout is 2 seconds:
!!!!!
Success rate is 100 percent (5/5), round-trip min/avg/max = 1/3/12 ms
</textarea></br></br>

<script>
 $('.output-132').highlightWithinTextarea({
	highlight: ['!!!!!']
});
</script>

<textarea class='output-133' rows="8" cols="85" readonly>	
R3#ping 10.0.0.10

Type escape sequence to abort.
Sending 5, 100-byte ICMP Echos to 10.0.0.10, timeout is 2 seconds:
!!!!!
Success rate is 100 percent (5/5), round-trip min/avg/max = 1/7/20 ms
</textarea></br></br>

<script>
 $('.output-133').highlightWithinTextarea({
	highlight: ['!!!!!']
});
</script>	

<h2> LAB - Redistribution between EIGRP and OSPF</h2></br>
 
	 <figure>
		<figcaption>Network Diagram</figcaption></br>
		<img src="images/redis-eigrp-ospf.png" alt="Redistribution RIP-OSPF" style="width:550px;height:300px;">
	</figure> </br>
	 	 
	 <h3 id="task"> Task </h3>
	 <ol class='ol-wb'>
	 <li class='li-wb'> Configure the interfaces as per the diagram.</li>
	 <li class='li-wb'> Configure EIGRP and OSPF routing process according to network diagram.</li>
	 </ol> </br>
	
	<h3> Solution </h3>
	 <font id="config">
		R1#conf t </br>
		R1(config)#router eigrp 100 </br>
		R1(config-router)#no auto-summary</br>
		R1(config-router)#network 12.0.0.0  </br>
		R1(config-router)#network 10.0.0.0  </br>
		R1(config-router)#end       </br></br>
		                                                    
		R2#conf t </br>
		R2(config)#router eigrp 100 </br>
		R2(config-router)#no auto-summary</br>
		R2(config-router)#network 12.0.0.0  </br>
		R2(config-router)#network 20.0.0.0  </br>
		R2(config-router)#end  </br></br>
		                                                        
		R2#conf t </br>
		R2(config)#router ospf 1 </br>
		R2(config-router)#network 23.0.0.0 0.0.0.255 area 0 </br>
		R2(config-router)#end       </br></br>
		
		R3#conf t </br>
		R3(config)#router ospf 1 </br>
		R3(config-router)#network 23.0.0.0 0.0.0.255 area 0 </br>
		R3(config-router)#network 30.0.0.0 0.0.0.255 area 0 </br>
		R3(config-router)#end       </br></br>
			
	 <font id="config">
	 <h3> Verifying the configuration</h3>
	 R1#sh ip route </br>
	 R2#sh ip route</br>
	 R3#sh ip route</br>
	 </font></br>
	
<textarea class='output-134' rows="11" cols="85" readonly>	
R1#sh ip route | b Gateway
Gateway of last resort is not set

     20.0.0.0/24 is subnetted, 1 subnets
D       20.0.0.0 [90/2195456] via 12.0.0.2, 00:08:27, Serial0/0
     10.0.0.0/24 is subnetted, 1 subnets
C       10.0.0.0 is directly connected, FastEthernet0/0
     12.0.0.0/24 is subnetted, 1 subnets
C       12.0.0.0 is directly connected, Serial0/0
</textarea></br></br>

<script>
 $('.output-134').highlightWithinTextarea({
	highlight: ['D       20.0.0.0 [90/2195456] via 12.0.0.2, 00:08:27, Serial0/0']
});
</script>
	
<textarea class='output-135' rows="15" cols="85" readonly>	
R2#sh ip route | b Gateway
Gateway of last resort is not set

     20.0.0.0/24 is subnetted, 1 subnets
C       20.0.0.0 is directly connected, FastEthernet0/0
     23.0.0.0/24 is subnetted, 1 subnets
C       23.0.0.0 is directly connected, Serial0/0
     10.0.0.0/24 is subnetted, 1 subnets
D       10.0.0.0 [90/2195456] via 12.0.0.1, 00:10:17, Serial0/1
     12.0.0.0/24 is subnetted, 1 subnets
C       12.0.0.0 is directly connected, Serial0/1
     30.0.0.0/24 is subnetted, 1 subnets
O       30.0.0.0 [110/74] via 23.0.0.3, 00:10:55, Serial0/0
</textarea></br></br>

<script>
 $('.output-135').highlightWithinTextarea({
	highlight: ['D       10.0.0.0 [90/2195456] via 12.0.0.1, 00:10:17, Serial0/1','O       30.0.0.0 [110/74] via 23.0.0.3, 00:10:55, Serial0/0']
});
</script>

<textarea class='output-136' rows="9" cols="85" readonly>	
RR3#sh ip route | b Gateway
Gateway of last resort is not set

     23.0.0.0/24 is subnetted, 1 subnets
C       23.0.0.0 is directly connected, Serial0/1
     30.0.0.0/24 is subnetted, 1 subnets
C       30.0.0.0 is directly connected, FastEthernet0/0
</textarea></br></br>

<script>
 $('.output-136').highlightWithinTextarea({
	highlight: ['!!!!!']
});
</script>	
	
	
	<h3 id="task"> Task </h3>
	<ol class='ol-wb'>
	<li class='li-wb'> Configure redistribution on R2 router, so that R1 and R3 routers can reach each other </li>
	</ol> </br>
	
	R2# conf t </br>
	R2(config)#router eigrp 100 </br>
	R2(config-router)#redistribute ospf 1 metric 1000 2000 255 1 1500 </br> 
	R2(config-router)#exit </br></br>
	
	R2(config)#router ospf 1 </br>
	R2(config-router)#redistribute eigrp 100 subnets </br> <br/>
	
	
	<font id="config">
	 <h3> Verifying the configuration</h3>
	 R1#sh ip route </br>
	 R2#sh ip route</br>
	 R3#sh ip route </br>
	 R1#ping 30.0.0.30 </br>
	 R3#ping 10.0.0.10 </br></br>
	 </font>
	
<textarea class='output-137' rows="15" cols="85" readonly>	
R1#sh ip route | b Gateway
Gateway of last resort is not set

     20.0.0.0/24 is subnetted, 1 subnets
D       20.0.0.0 [90/2195456] via 12.0.0.2, 00:19:03, Serial0/0
     23.0.0.0/24 is subnetted, 1 subnets
D EX    23.0.0.0 [170/3584000] via 12.0.0.2, 00:04:51, Serial0/0
     10.0.0.0/24 is subnetted, 1 subnets
C       10.0.0.0 is directly connected, FastEthernet0/0
     12.0.0.0/24 is subnetted, 1 subnets
C       12.0.0.0 is directly connected, Serial0/0
     30.0.0.0/24 is subnetted, 1 subnets
D EX    30.0.0.0 [170/3584000] via 12.0.0.2, 00:04:51, Serial0/0
</textarea></br></br>

<script>
 $('.output-137').highlightWithinTextarea({
	highlight: ['D EX    23.0.0.0 [170/3584000] via 12.0.0.2, 00:04:51, Serial0/0','D EX    30.0.0.0 [170/3584000] via 12.0.0.2, 00:04:51, Serial0/0']
});
</script>
	
<textarea class='output-138' rows="15" cols="85" readonly>	
R2#sh ip route | b Gateway
Gateway of last resort is not set

     20.0.0.0/24 is subnetted, 1 subnets
C       20.0.0.0 is directly connected, FastEthernet0/0
     23.0.0.0/24 is subnetted, 1 subnets
C       23.0.0.0 is directly connected, Serial0/0
     10.0.0.0/24 is subnetted, 1 subnets
D       10.0.0.0 [90/2195456] via 12.0.0.1, 00:22:58, Serial0/1
     12.0.0.0/24 is subnetted, 1 subnets
C       12.0.0.0 is directly connected, Serial0/1
     30.0.0.0/24 is subnetted, 1 subnets
O       30.0.0.0 [110/74] via 23.0.0.3, 00:23:36, Serial0/0
</textarea></br></br>

<script>
 $('.output-138').highlightWithinTextarea({
	highlight: ['D       10.0.0.0 [90/2195456] via 12.0.0.1, 00:22:58, Serial0/1','O       30.0.0.0 [110/74] via 23.0.0.3, 00:23:36, Serial0/0']
});
</script>

<textarea class='output-139' rows="15" cols="85" readonly>	
R3#sh ip route | b Gateway
Gateway of last resort is not set

     20.0.0.0/24 is subnetted, 1 subnets
O E2    20.0.0.0 [110/100] via 23.0.0.2, 00:09:51, Serial0/1
     23.0.0.0/24 is subnetted, 1 subnets
C       23.0.0.0 is directly connected, Serial0/1
     10.0.0.0/24 is subnetted, 1 subnets
O E2    10.0.0.0 [110/100] via 23.0.0.2, 00:09:51, Serial0/1
     12.0.0.0/24 is subnetted, 1 subnets
O E2    12.0.0.0 [110/100] via 23.0.0.2, 00:09:51, Serial0/1
     30.0.0.0/24 is subnetted, 1 subnets
C       30.0.0.0 is directly connected, FastEthernet0/0
</textarea></br></br>

<script>
 $('.output-139').highlightWithinTextarea({
	highlight: ['O E2    20.0.0.0 [110/100] via 23.0.0.2, 00:09:51, Serial0/1','O E2    10.0.0.0 [110/100] via 23.0.0.2, 00:09:51, Serial0/1','O E2    12.0.0.0 [110/100] via 23.0.0.2, 00:09:51, Serial0/1']
});
</script>	

<textarea class='output-140' rows="8" cols="85" readonly>	
R1#ping 30.0.0.30

Type escape sequence to abort.
Sending 5, 100-byte ICMP Echos to 30.0.0.30, timeout is 2 seconds:
!!!!!
Success rate is 100 percent (5/5), round-trip min/avg/max = 1/1/4 ms
</textarea></br></br>

<script>
 $('.output-140').highlightWithinTextarea({
	highlight: ['!!!!!']
});
</script>

<textarea class='output-141' rows="8" cols="85" readonly>	
R3#ping 10.0.0.10

Type escape sequence to abort.
Sending 5, 100-byte ICMP Echos to 10.0.0.10, timeout is 2 seconds:
!!!!!
Success rate is 100 percent (5/5), round-trip min/avg/max = 1/3/12 ms
</textarea></br></br>

<script>
 $('.output-141').highlightWithinTextarea({
	highlight: ['!!!!!']
});
</script>	

</body>
</html>
