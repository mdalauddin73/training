Micro Core Linux</br>
(username 'gns3', password 'gns3')</br></br>

Set up IP address:</br></br>

gns3@box:/$ sudo su												</br>
root@box:/# ifconfig eth0 192.168.1.1 netmask 255.255.255.0 up	</br>
root@box:/# route add ip default gw 192.168.1.100               </br>
route: resolving ip                                             </br>
root@box:/# route add default gw 192.168.1.100                  </br>
root@box:/# ifconfig 											</br>
</br></br>

<textarea class='output-1' rows="11" cols="85" readonly>	
root@box:/home/gns3# ifconfig eth0											
eth0      Link encap:Ethernet  HWaddr 00:32:F6:E8:8B:00                     
          inet addr:192.168.1.1  Bcast:192.168.1.255  Mask:255.255.255.0    
          UP BROADCAST RUNNING MULTICAST  MTU:1500  Metric:1                
          RX packets:2 errors:0 dropped:0 overruns:0 frame:0                
          TX packets:90 errors:0 dropped:0 overruns:0 carrier:0             
          collisions:0 txqueuelen:1000                                      
          RX bytes:120 (120.0 B)  TX bytes:30780 (30.0 KiB)                 
</textarea> </br> </br>


Press Ctrl+C to quit from ping command</br>







</br></br>
Resources Link: </br>
https://sourceforge.mirrorservice.org/g/gn/gns-3/Qemu%20Appliances/

