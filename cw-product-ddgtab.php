<!DOCTYPE html>
<html>
<head>
<title>EUR-GDP</title>
<link rel="stylesheet" type="text/css" href="css/main.css" />
<link rel="stylesheet" type="text/css" href="css/reset.css" />
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</head>

<body>
<style>
.heading-1{
	font-size:24px;
	font-weight:bold;
	color:maroon;
}
.table-heading{
	font-size:14px;
	font-weight:bold;
	color:teal;
}
</style>

<p class='heading-1'>DDG Tab Info</p><br>
<table>
<tr class='table-heading'><td>Slno</td><td>Asset ID</td><td>SIM Number</td><td>Serial#</td><td>Username</td><td>Designation </td><td>Status  </td><td>Handover Note</td></tr>
<tr><td>01</td><td>CON/9504/IT/1049	</td><td>01844503891</td><td>R52M102ST9Y</td><td>	MEAL Team</td><td></td><td> </td>

<td>
<button id="myBtn">Click to View</button>

<!-- The Modal -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
	<p style="font-weight:bold;"><span class="m5"></span></p>
    <p><img src="asset-register/tab-salek.jpg" alt="No Image Available"></p>
  </div>
</div>
</td></tr>

<tr><td>02</td><td>CON/9504/IT/1050	</td><td>01844503899</td><td>R52M102VQSE</td><td>	MEAL Team</td><td></td><td> </td><td> </td></tr>
<tr><td>03</td><td>CON/9504/IT/1051	</td><td>01844503898</td><td>R52M102SRFT</td><td>	MEAL Team</td><td></td><td> </td><td> </td></tr>
<tr><td>04</td><td>CON/9504/IT/1052	</td><td>01844498790</td><td>R52M102SS6Y</td><td>	MEAL Team</td><td></td><td> </td><td> </td></tr>
<tr><td>05</td><td>CON/9510/IT/901	</td><td>01885996430</td><td>R52KA0NK3QF</td><td>	MEAL Team</td><td></td><td> </td><td> </td></tr>
<tr><td>06</td><td>CON/9510/IT/902	</td><td>01885996431</td><td>R52KA0NK1QE</td><td>	MEAL Team</td><td></td><td> </td><td> </td></tr>
<tr><td>07</td><td>CON/9510/IT/903	</td><td>01885996432</td><td>R52KA0NJY5M</td><td>	MEAL Team</td><td></td><td> </td><td> </td></tr>
<tr><td>08</td><td>CON/9510/IT/904	</td><td>01885996433</td><td>R52KA0NJYTA</td><td>	MEAL Team</td><td></td><td> </td><td> </td></tr>
<tr><td>09</td><td>CON/9510/IT/905	</td><td>01885996434</td><td>R52KA0NJY6L</td><td>	MEAL Team</td><td></td><td> </td><td> </td></tr>
<tr><td>10</td><td>CON/9510/IT/906	</td><td>01885996435</td><td>R52KA0NJZ9L</td><td>	MEAL Team</td><td></td><td> </td><td> </td></tr>
</table><br>
<p class='heading-1'>Other Tab Info</p><br>
<table>
<tr class='table-heading'><td>Slno</td><td>Asset ID</td><td>Serial#</td><td>Username</td><td>Designation </td><td>Donor</td><td>Price</td><td>Handover Note</td></tr>
<tr><td>01</td><td>CON/9504/IT/786</td><td>R52k30CDFFD	</td><td>Sharmin Pervin		</td><td>OTP Sup</td><td>U1137	   	</td><td>15,860</td>

<td>
<button id="myBtn">Click to View</button>

<!-- The Modal -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
	<p style="font-weight:bold;"><span class="m5"></span></p>
    <p><img src="asset-register/tab-sharmin-pervin.jpg" alt="No Image Available"></p>
  </div>
</div>
</td>
</tr> 

<tr><td>02</td><td>CON/9504/IT/787</td><td>R52k30CDFQV	</td><td>IT Store			</td><td>OTP Sup</td><td>U1137	   	</td><td>15,860</td>

<td>
<button id="myBtn">Click to View</button>

<!-- The Modal -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
	<p style="font-weight:bold;"><span class="m5"></span></p>
    <p><img src="asset-register/tab-sharmin-pervin.jpg" alt="No Image Available"></p>
  </div>
</div>
</td>
</tr> 

<tr><td>03</td><td>CON/9504/IT/788</td><td>R52k30CDEXX	</td><td>Shah Arafat Rahman				</td><td>OTP Sup</td><td>U1137	   	</td><td>15,860</td>

<td>
<button id="myBtn">Click to View</button>

<!-- The Modal -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
	<p style="font-weight:bold;"><span class="m5"></span></p>
    <p><img src="asset-register/tab-sharmin-pervin.jpg" alt="No Image Available"></p>
  </div>
</div>
</td>
</tr>
 
<tr><td>04</td><td>CON/9504/IT/789</td><td>R52k30CDEQJ	</td><td>Suvra Nag - <span style='color:red;'>Lost</span>			</td><td>OTP Sup</td><td>U1137	   	</td><td>15,860</td>

<td>
<button id="myBtn">Click to View</button>

<!-- The Modal -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
	<p style="font-weight:bold;"><span class="m5"></span></p>
    <p><img src="asset-register/tab-sharmin-pervin.jpg" alt="No Image Available"></p>
  </div>
</div>
</td>
</tr>
 
<tr><td>05</td><td>CON/9504/IT/790</td><td>R52k30AR2YB	</td><td>IT Store				</td><td>OTP Sup</td><td>U1137	   	</td><td>15,860</td>

<td>
<button id="myBtn">Click to View</button>

<!-- The Modal -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
	<p style="font-weight:bold;"><span class="m5"></span></p>
    <p><img src="asset-register/tab-sharmin-pervin.jpg" alt="No Image Available"></p>
  </div>
</div>
</td>
</tr>
 
<tr><td>06</td><td>CON/9504/IT/791</td><td>R52k30CDFHA	</td><td>IT Store				</td><td>OTP Sup</td><td>U1137	   	</td><td>15,860</td>

<td>
<button id="myBtn">Click to View</button>

<!-- The Modal -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
	<p style="font-weight:bold;"><span class="m5"></span></p>
    <p><img src="asset-register/tab-sharmin-pervin.jpg" alt="No Image Available"></p>
  </div>
</div>
</td>
</tr>
 
<tr><td>07</td><td>CON/9504/IT/792</td><td>R52k30CDEVE	</td><td>IT Store				</td><td>OTP Sup</td><td>U1137	   	</td><td>15,860</td>

<td>
<button id="myBtn">Click to View</button>

<!-- The Modal -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
	<p style="font-weight:bold;"><span class="m5"></span></p>
    <p><img src="asset-register/tab-sharmin-pervin.jpg" alt="No Image Available"></p>
  </div>
</div>
</td>
</tr>
 
<tr><td>08</td><td>CON/9504/IT/841</td><td>R52k502VGZY	</td><td>IT Store <span style='color:red;'>(Damage)	</span>			</td><td>OTP Sup</td><td>XA393	   	</td><td>15,560</td>

<td>
<button id="myBtn">Click to View</button>

<!-- The Modal -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
	<p style="font-weight:bold;"><span class="m5"></span></p>
    <p><img src="asset-register/tab-sharmin-pervin.jpg" alt="No Image Available"></p>
  </div>
</div>
</td>
</tr>
 
<tr><td>09</td><td>CON/9503/IT/849</td><td>R52K40XCB7Y	</td><td>IT Store</td><td>OTP Sup</td><td>GD001	   	</td><td>15,550</td>

<td>
<button id="myBtn">Click to View</button>

<!-- The Modal -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
	<p style="font-weight:bold;"><span class="m5"></span></p>
    <p><img src="asset-register/tab-sharmin-pervin.jpg" alt="No Image Available"></p>
  </div>
</div>
</td>
</tr>
 
<tr><td>10</td><td>CON/9510/IT/880</td><td>R52KA0NJYAF	</td><td>IT Store</td><td>OTP Sup</td><td>DFID/UP001	</td><td>15,358</td>

<td>
<button id="myBtn">Click to View</button>

<!-- The Modal -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
	<p style="font-weight:bold;"><span class="m5"></span></p>
    <p><img src="asset-register/tab-sharmin-pervin.jpg" alt="No Image Available"></p>
  </div>
</div>
</td>
</tr>

 
<tr><td>11</td><td>CON/9510/IT/881</td><td>R52KA0NJYCV	</td><td>IT Store</td><td>OTP Sup</td><td>DFID/UP001	</td><td>15,358</td>

<td>
<button id="myBtn">Click to View</button>

<!-- The Modal -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
	<p style="font-weight:bold;"><span class="m5"></span></p>
    <p><img src="asset-register/tab-sharmin-pervin.jpg" alt="No Image Available"></p>
  </div>
</div>
</td>
</tr>
 
<tr><td>12</td><td>CON/9510/IT/882</td><td>R52KA0NK3LL	</td><td>IT Store</td><td>OTP Sup</td><td>DFID/UP001	</td><td>15,358</td>

<td>
<button id="myBtn">Click to View</button>

<!-- The Modal -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
	<p style="font-weight:bold;"><span class="m5"></span></p>
    <p><img src="asset-register/tab-sharmin-pervin.jpg" alt="No Image Available"></p>
  </div>
</div>
</td></tr>
 
</table>


@bangladesh05645

</body>
</html>






