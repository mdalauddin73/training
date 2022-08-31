
Multicast Address Range Assignments

<table>
<tr><td>Description						</td><td>	Range						</td></tr>
<tr><td>Reserved Link Local Addresses	</td><td>	224.0.0.0/24                </td></tr>
<tr><td>Globally Scoped Addresses		</td><td>	224.0.1.0 to 238.255.255.255</td></tr>
<tr><td>Source Specific Multicast		</td><td>	232.0.0.0/8                 </td></tr>
<tr><td>GLOP Addresses					</td><td>	233.0.0.0/8                 </td></tr>
<tr><td>Limited Scope Addresses			</td><td>	239.0.0.0/8                 </td></tr>
</table>

Examples of Link Local Addresses
IP Address						Usage
224.0.0.1						All systems on this subnet
224.0.0.2						All routers on this subnet
224.0.0.5						OSPF routers
224.0.0.6						OSPF designated routers
224.0.0.12						Dynamic Host Configuration Protocol (DHCP) server/relay agent</br></br>

<p>Mapping IP Multicast to MAC-Layer Multicast</br></br>

To support IP multicasting, the Internet authorities have reserved the multicast address range of 01-00-5E-00-00-00 to 01-00-5E-7F-FF-FF for Ethernet and Fiber Distributed Data Interface (FDDI) media access control (MAC) addresses. As shown in Figure 4.1, the high order 25 bits of the 48-bit MAC address are fixed and the low order 23 bits are variable.</br></br>

<img src="images/ipmulticast-macmulticast.gif" alt="OSPF TTL Security" style="width:520px;height:150px;"></br>

To map an IP multicast address to a MAC-layer multicast address, the low order 23 bits of the IP multicast address are mapped directly to the low order 23 bits in the MAC-layer multicast address. Because the first 4 bits of an IP multicast address are fixed according to the class D convention, there are 5 bits in the IP multicast address that do not map to the MAC-layer multicast address. Therefore, it is possible for a host to receive MAC-layer multicast packets for groups to which it does not belong. However, these packets are dropped by IP once the destination IP address is determined.</br></br>

For example, the multicast address 224.192.16.1 becomes 01-00-5E-40-10-01. To use the 23 low order bits, the first octet is not used, and only the last 7 bits of the second octet is used. The third and fourth octets are converted directly to hexadecimal numbers. The second octet, 192 in binary is 11000000. If you drop the high order bit, it becomes 1000000 or 64 (in decimal), or 0x40 (in hexadecimal). For the next octet, 16 in hexadecimal is 0x10. For the last octet, 1 in hexadecimal is 0x01. Therefore, the MAC address corresponding to 224.192.16.1 becomes 01-00-5E-40-10-01.</br></br>

Token Ring uses this same method for MAC-layer multicast addressing. However, many Token Ring network adapters do not support it. Therefore, by default, the functional address 0xC0-00-00-04-00-00 is used for all IP multicast traffic sent over Token Ring networks</p></br></br>

GEVIC Logic Operation Program (GLOP)</br>
Multicast Border Gateway Protocol (MBGP)</br>
Multicast Open Shortest Path First(MOSPF)</br>
Distance Vector Multicast Routing Protocol (DVMRP)</br>
Protocol Independent Multicasting (PIM)</br>
Pragmatic General Multicast (PGM)</br>

The Pros of IP Multicast</br>
Bandwidth</br>
Server load</br>
Network Load</br></br>

The Cons of IP Multicast</br>
Unreliable Packet Delivery</br>
Packet Duplication</br>
Network Congestion</br></br>

Multicast Applications</br>
Multimedia Conferencing</br>
Data Distribution  (http://www.starburstcom.com) MFTP product, as well as work done in the area of
reliable multicast by Globalcast (http://www.gcast.com),</br>
Real-Time Data Multicasts</br>
Gaming and Simulations</br></br>

Link-Local Multicast Addresses</br>
Address Usage Reference</br>
<table>
<tr><td>224.0.0.1  </td><td>All Hosts [RFC 1112, JBP]				  </td></tr>
<tr><td>224.0.0.2  </td><td>All Multicast Routers [JBP]               </td></tr>
<tr><td>224.0.0.3  </td><td>Unassigned [JBP]                          </td></tr>
<tr><td>224.0.0.4  </td><td>DVMRP Routers [RFC 1075, JBP]             </td></tr>
<tr><td>224.0.0.5  </td><td>OSPF Routers [RFC 1583, JXM1]             </td></tr>
<tr><td>224.0.0.6  </td><td>OSPF Designated Routers [RFC 1583, JXM1]  </td></tr>
<tr><td>224.0.0.7  </td><td>ST Routers [RFC 1190, KS14]               </td></tr>
<tr><td>224.0.0.8  </td><td>ST Hosts [RFC 1190, KS14]                 </td></tr>
<tr><td>224.0.0.9  </td><td>RIP2 Routers [RFC 1723, SM11]             </td></tr>
<tr><td>224.0.0.10 </td><td>IGRP Routers [Farinacci]                  </td></tr>
<tr><td>224.0.0.11 </td><td>Mobile-Agents [Bill Simpson]              </td></tr>
<tr><td>224.0.0.12 </td><td>DHCP Server/Relay Agent [RFC 1884]        </td></tr>
<tr><td>224.0.0.13 </td><td>All PIM Routers [Farinacci]               </td></tr>
<tr><td>224.0.0.14 </td><td>RSVP-Encapsulation [Braden]               </td></tr>
<tr><td>224.0.0.15 </td><td>All CBT Routers [Ballardie]               </td></tr>
<tr><td>224.0.0.16 </td><td>Designated-SBM [Baker]                    </td></tr>
<tr><td>224.0.0.17 </td><td>All SBMS [Baker]                          </td></tr>
<tr><td>224.0.0.18 </td><td>VRRP [Hinden]                             </td></tr>
<tr><td>224.0.0.19 </br>to 224.0.0.255</td><td> Unassigned [JBP]           </td></tr>
</table></br></br>
Other Reserved Multicast Addresses</br>
Address Usage Reference</br>
<table>
<tr><td>224.0.1.0  </td><td>VMTP Managers Group [RFC 1045, DRC3]		</td></tr>
<tr><td>224.0.1.1  </td><td>NTP-Network Time Protocol [RFC 1119, DLM1]  </td></tr>
<tr><td>224.0.1.2  </td><td>SGI-Dogfight [AXC]                          </td></tr>
<tr><td>224.0.1.3  </td><td>Rwhod [SXD]                                 </td></tr>
<tr><td>224.0.1.6  </td><td>NSS-Name Service Server [BXS2]              </td></tr>
<tr><td>224.0.1.8  </td><td>SUN NIS+ Information Service [CXM3]         </td></tr>
<tr><td>224.0.1.20 </td><td>Any Private Experiment [JBP]                </td></tr>
<tr><td>224.0.1.21 </td><td>DVMRP on MOSPF [John Moy]                   </td></tr>
<tr><td>224.0.1.32 </td><td>Mtrace [Casner]                             </td></tr>
<tr><td>224.0.1.33 </td><td>RSVP-encap-1 [Braden]                       </td></tr>
<tr><td>224.0.1.34 </td><td>RSVP-encap-2 [Braden]                       </td></tr>
<tr><td>224.0.1.39 </td><td>Cisco-RP-Announce [Farinacci]               </td></tr>
<tr><td>224.0.1.40 </td><td>Cisco-RP-Discovery [Farinacci]              </td></tr>
<tr><td>224.0.1.52 </td><td>Mbone-VCR-Directory [Holfelder]             </td></tr>
<tr><td>224.0.1.78 </td><td>Tibco Multicast1 [Shum]                     </td></tr>
<tr><td>224.0.1.79 </td><td>Tibco Multicast2 [Shum]                     </td></tr>
<tr><td>224.0.1.80 </td><td>to 224.0.1.255 Unassigned [JBP]             </td></tr>
</table></br></br>

Administratively Scoped Multicast Addresses</br>
239.0.0.0 through 239.255.255.255</br></br>

Multicast Distribution Trees</br>
Source Trees - shortest path tree (SPT)</br></br>

Shared Trees</br>
Unlike source trees that have their roots at the source, shared trees use a single common root placed at
some chosen point in the network. Depending on the multicast routing protocol, this root is often called
a rendezvous point (RP) or core, which lends itself to shared trees' other common names: RP trees (RPT)
or core-based trees (CBT).</br></br>

Reverse Path Forwarding (RPF)</br>

Typical TTL Boundary Values
TTL Scope	Initial TTL Value	TTL Threshold
Local net 	1 					N/A
Site 		15 					16
Region 		63 					64
World 		127 				128
