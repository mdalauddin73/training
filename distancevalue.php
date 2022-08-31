<!DOCTYPE html>
<html>
<head>
<title>Distance Value</title>
</head>
<body>
<p><span class='list'>Administrative distance</span></p></br>

<p>Administrative distance (AD) is a number of arbitrary unit assigned to dynamic routes, static routes and directly-connected routes. The value is used by vendor-specific routers to rank routes from most preferred (low administrative distance value) to least preferred (high administrative distance value). When multiple paths to the same destination are available in its routing table, the router uses the route with the lowest administrative distance. Router vendors typically design their routers to assign a default administrative distance to each kind of route that is used, however, this value can usually be adjusted manually by a network administrator.</p></br>

<h3><span class='list'>Default Administrative Distance Value Table</span></h3></br>
<p>This table lists the administrative distance default values of the protocols that Cisco supports:</p></br>

<table>
<tr class='row-heading'><td>Route Source</td><td>Distance Values</td></tr>
<tr><td>Connected interface</td><td class='td-align-c'>0</td></tr>
<tr><td>Static route</td><td class='td-align-c'>1</td></tr>
<tr><td>EIGRP summary route</td><td class='td-align-c'>5</td></tr>
<tr><td>External BGP</td><td class='td-align-c'>20</td></tr>
<tr><td>Internal EIGRP</td><td class='td-align-c'>90</td></tr>
<tr><td>IGRP</td><td class='td-align-c'>100</td></tr>
<tr><td>OSPF</td><td class='td-align-c'>110</td></tr>
<tr><td>IS-IS</td><td class='td-align-c'>115</td></tr>
<tr><td>RIP</td><td class='td-align-c'>120</td></tr>
<tr><td>Exterior Gateway Protocol (EGP) </td><td class='td-align-c'>140</td></tr>
<tr><td>On Demand Routing (ODR) </td><td class='td-align-c'>160</td></tr>
<tr><td>External EIGRP</td><td class='td-align-c'>170</td></tr>
<tr><td>Internal BGP </td><td class='td-align-c'>200</td></tr>
<tr><td>NHRP </td><td class='td-align-c'>250</td></tr>
<tr><td>Unknown* </td><td class='td-align-c'>255</td></tr>
</table>
<br/>
<p><span class='list'>Administrative distance vs Metric</span></p></br>
<p>A network can use more than one routing protocol, and routers on the network can learn about a route from multiple sources. Routers need to find a way to select a better path. Administrative distance number is used by routers to find out which route is better (lower number is better).</P></br>

<p>If a router learns two different paths for the same network from the same routing protocol, it has to decide which route is better and will be placed in the routing table.  Metric is a measure used to decide which route is better (lower number is better). Each routing protocol uses its own metric.</p></br>

 
The following table lists what various routing protocols use as a metric:</br><br/>

<table>
<tr class='row-heading'><td>Routing protocol</td><td>Metric</td></tr>
<tr><td>RIP</td><td>hop count</td></tr>
<tr><td>EIGRP</td><td>bandwidth, delay <br/> (Load, MTU and Reliability)</td></tr>
<tr><td>OSPF</td><td>cost</td></tr>
</table><br/>

<h2><span class='list'>Default path/STP port cost value on cisco switches</span></h2></br>

<table border=1 cellspacing=2 cellpadding=4>
<tr><th align=left >Speed     </th><th align=left >Port Cost</th><th>Comment             </th></tr>
<tr><td align=right>   10 Mbps</td><td align=right>      100</td><td>Ethernet            </td></tr>
<tr><td align=right>   20 Mbps</td><td align=right>       56</td><td>EtherChannel        </td></tr>
<tr><td align=right>   30 Mbps</td><td align=right>       47</td><td>EtherChannel        </td></tr>
<tr><td align=right>   40 Mbps</td><td align=right>       41</td><td>EtherChannel        </td></tr>
<tr><td align=right>   50 Mbps</td><td align=right>       35</td><td>EtherChannel        </td></tr>
<tr><td align=right>   54 Mbps</td><td align=right>       33</td><td>802.11 wireless     </td></tr>
<tr><td align=right>   60 Mbps</td><td align=right>       30</td><td>EtherChannel        </td></tr>
<tr><td align=right>   70 Mbps</td><td align=right>       26</td><td>EtherChannel        </td></tr>
<tr><td align=right>   80 Mbps</td><td align=right>       23</td><td>EtherChannel        </td></tr>
<tr><td align=right>  100 Mbps</td><td align=right>       19</td><td>Fast Ethernet       </th></tr>
<tr><td align=right>  200 Mbps</td><td align=right>       12</td><td>Fast EtherChannel   </td></tr>
<tr><td align=right>  300 Mbps</td><td align=right>        9</td><td>Fast EtherChannel   </td></tr>
<tr><td align=right>  400 Mbps</td><td align=right>        8</td><td>Fast EtherChannel   </td></tr>
<tr><td align=right>  500 Mbps</td><td align=right>        7</td><td>Fast EtherChannel   </td></tr>
<tr><td align=right>  600 Mbps</td><td align=right>        6</td><td>Fast EtherChannel   </td></tr>
<tr><td align=right>  700 Mbps</td><td align=right>        5</td><td>Fast EtherChannel   </td></tr>
<tr><td align=right>  800 Mbps</td><td align=right>        5</td><td>Fast EtherChannel   </td></tr>
<tr><td align=right>    1 Gbps</td><td align=right>        4</td><td>Gigabit Ethernet    </td></tr>
<tr><td align=right>    2 Gbps</td><td align=right>        3</td><td>Gigabit EtherChannel</td></tr>
<tr><td align=right>   10 Gbps</td><td align=right>        2</td><td>10G Ethernet        </td></tr>
<tr><td align=right>   20 Gbps</td><td align=right>        1</td><td>20G EtherChannel    </td></tr>
<tr><td align=right>   40 Gbps</td><td align=right>        1</td><td>40G EtherChannel    </td></tr>
</table> </br></br>

<p>IGRP and EIGRP need five metrics when redistributing other protocols: bandwidth, delay, reliability, load, and MTU, respectively. An example of IGRP metrics follows:</p></br>


<table>
<tr class='row-heading'><td>Metric</td><td>Value</td></tr>
<tr><td>bandwidth</td><td>In units of kilobits per second; 10000 for Ethernet</td></tr>
<tr><td>delay</td><td>In units of tens of microseconds; for Ethernet it is 100 x 10 [microseconds = 1 ms]</td></tr>
<tr><td>reliability</td><td>255 for 100 percent reliability</td></tr>
<tr><td>load</td><td>Effective load on the link expressed as a number from 0 to 255 (255 is 100 percent loading)</td></tr>
<tr><td>MTU</td><td>Minimum MTU of the path; usually equals that for the Ethernet interface, which is 1500 bytes</td></tr>
</table></br>
	
<p>Keep in mind that the by default EIGRP only evaluates bandwidth and delay.</br><br/>

EIGRP uses these scaled values to determine the total metric to the network:</br></br>

    metric = [K1 * bandwidth + (K2 * bandwidth) / (256 - load) + K3 * delay] * [K5 / (reliability + K4)]</br></br>

Note: These K values should be used after careful planning. Mismatched K values prevent a neighbor relationship from being built, which can cause your network to fail to converge. </br><br>

Note: If K5 = 0, the formula reduces to Metric = [k1 * bandwidth + (k2 * bandwidth)/(256 - load) + k3 * delay].</br><br>

The default values for K are:</br></br>

    K1 = 1 </br>
    K2 = 0  </br>
    K3 = 1  </br>
    K4 = 0  </br>
    K5 = 0  </br></br>

For default behavior, you can simplify the formula as follows: metric = bandwidth + delay </p></br>

<p>Route Preference</p></br>
A router evaluates routes in the following order.</br></br>
1.	Prefix Length - The longest-matching route is preferred first. Prefix length trumps all other route attributes.</br>
2.	Administrative Distance - In the event there are multiple routes to a destination with the same prefix length, the route learned by the protocol with the lowest administrative distance is preferred.</br>
3.	Metric - In the event there are multiple routes learned by the same protocol with same prefix length, the route with the lowest metric is preferred. (If two or more of these routes have equal metrics, load balancing across them may occur.)</br><br/>

OSPF default Cost values for different interface bandwidths.</br></br>
<table>
<tr class='row-heading'><td>Bandwidth</br>(Interface)</td><td>OSPF Cost</td></tr>
<tr><td>100 Gbps 	</td><td>1       </td></tr>
<tr><td>40 Gbps 	</td><td>1       </td></tr>
<tr><td>10 Gbps 	</td><td>1       </td></tr>
<tr><td>1 Gbps 		</td><td>1       </td></tr>
<tr><td>100 Mbps 	</td><td>1       </td></tr>
<tr><td>10 Mbps 	</td><td>10      </td></tr>
<tr><td>1.544 Mbps 	</td><td>64      </td></tr>
<tr><td>768 Kbps 	</td><td>133     </td></tr>
<tr><td>384 Kbps 	</td><td>266     </td></tr>
<tr><td>128 Kbps 	</td><td>781     </td></tr>
</table></br>
 OSPF Cost calculation = reference bandwidth / interface bandwidth</br></br>
 Default OSPF Reference bandwidth = 100Mbps <br/></br>
 Note:The default OSPF cost formula doesn’t differentiate between interfaces with bandwidth faster than 100 Mbps. </br><br/>
 
    10 Mbps port’s cost = 100/10 = 10									<br/>
    100 Mbps port’s cost = 100/100 = 1                                  <br/>
    1000 Mbps port’s cost = 100/1000 = 0.10, which is rounded up to 1   <br/>
    10 Gbps port’s cost = 100/10000 = 0.01, which is rounded up to 1    <br/>
	40 Gbps port’s cost = 100/40000 = 0.0025, which is rounded up to 1    <br/>
	100 Gbps port’s cost = 100/100000 = 0.001, which is rounded up to 1    <br/>

</body>
</html> 

