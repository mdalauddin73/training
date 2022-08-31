
R2

access-list 1 permit 172.16.1.0 0.0.0.255
access-list 1 permit 172.16.2.0 0.0.0.255
access-list 1 permit 172.16.3.0 0.0.0.255

router rip
distribution-list 1 out


access-list 2 deny 10.1.1.0 0.0.0.255
access-list 2 deny 10.1.2.0 0.0.0.255
access-list 2 deny 10.1.3.0 0.0.0.255

access-list 2 permit any

router ospf 1
distribution-list 2 out


show ip eigrp topology 155.1.10.1/24



