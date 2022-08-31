<!DOCTYPE html>
<html>
<head>
<title>MyNotes</title>
<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<link rel="stylesheet" type="text/css" href="css/reset.css" />
<link rel="stylesheet" type="text/css" href="css/main.css" />
<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.11.4.css" />

<script src="scripts/jquery-3.2.1.js"></script>
<script src="scripts/jquery-ui.js"></script>
<script src="scripts/jquery.highlight-within-textarea.js"></script>
</head>
<body>
<style>
.author_bio_toggle_wrapper    
{
        
}

#author_bio_wrap 
{
    margin-top: 0px;  
    margin-bottom: 30px; 
    background: gray;
    width: auto; height: 50px;
}



#author_bio_wrap_toggle 
{
    display: block;
    width: 100%;
    height: 35px;
    line-height: 35px;
    background: #9E9E77;
    text-align: center;
    color: white;
    font-weight: bold;
    font-variant: small-caps;
    box-shadow: 2px 2px 3px #888888;
    text-decoration:none;
}

#author_bio_wrap_toggle:hover 
{
    text-decoration:none;
    border-top: 1px groove white;
    border-left: 1px groove white;
    border-bottom: 1px solid #7B7B78;
    border-right: 1px solid #7B7B78;
    color: #663200;
    background: #EBEBB3;
    box-shadow: 1px 1px 2px #888888;
}
</style>

<script>
jQuery(document).ready(function($)
{
  
  $("#author_bio_wrap_toggle").click(function()
  {
    
    $("#author_bio_wrap").slideToggle( "slow");
    
	  if ($("#author_bio_wrap_toggle").text() == "Expand Author Details")
      {			
        $("#author_bio_wrap_toggle").html("Hide Author Details")
      }
	  else 
      {		
        $("#author_bio_wrap_toggle").text("Expand Author Details")
      }
    
  });  
  
});
</script>

<div class="author_bio_toggle_wrapper"> 
  <a href="#0" id="author_bio_wrap_toggle">Expand Author Details</a>
</div> 
<div id="author_bio_wrap" style="display: none;"> 
<h2>Mohammad Alauddin</h2>
fgdsfgsg
</div>


</body>
</html>