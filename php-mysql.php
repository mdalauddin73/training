<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>The HTML5 Herald</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">

  <link rel="stylesheet" href="css/styles.css?v=1.0">

</head>

<style>
.indent{
	margin-left:3em;
}
.heading-1{
	font-size:21px;
	font-weight:bold;
	color:teal;
}
</style>

<body>
  <script src="js/scripts.js"></script>
  <p class='heading-1'> How to Install Apache </p><br>
  1. Download Apache from site like https://www.apachelounge.com/download/			<br>
  2. Download and extract it.                                                       <br>
  3. Copy ApacheXX folder and paste it into C:/ directory (XX is the verstion no.)  <br>
  4. Open C:/ApacheXX                                                               <br>
  5. Open conf folder                                                               <br>
  6. Open httpd.conf into any text editor                                           <br>
  7. Add index.php as like below:                                                   <br><br>
	<p><<IfModule dir_module>IfModule dir_module>                                    <br>
    DirectoryIndex <span style='color:red;'>index.php </span> index.html             <br>
	<</IfModule>/IfModule> </p>                                                      <br>
  <br>
  8. Add following three lines at the end of the file:<br><br>
	<span style='color:red;'> LoadModule php7_module "C:/PHP/php7apache2_4"   <br>
	AddHandler application/x-httpd-php .php         <br>
	PHPIniDir C:/PHP      </span>                          <br><br>
  9. Save the httpd.conf file<br>
  10. Install the httpd.exe, run cmd then go c:/Apache24/bin.<br>
  11. Write httpd -k install and hit enter<br>
  12. Restart apache by httpd -k restart.<br><br>
  
  <p class='heading-1'> How to Install PHP </p><br>
  1. Download php from the site like https://windows.php.net/    <br>
  2. Extract it.                                                 <br>
  3. Copy the entire folder into C:/ and rename it c:/php        <br>
  4. Rename php.ini-development file into php.ini                <br>
  5. Add c:/php at the system vaiable as a PATH <br>
  6. How to: This PC ==> Properties ==> Advanced System Settings ==> Environment Variables.. <br>
  6. Open php.ini in any text editor add extension_dir = "ext" (757 line) <br>
  7. Uncommented or remove ; from the following extension:<br>
		<span class='indent'>extension=mbstring		</span><br>
		<span class='indent'>extension=mysqli       </span><br>
		<span class='indent'>extension=openssl      </span><br>
		<span class='indent'>extension=pdo_mysql    </span><br>
		<span class='indent'>extension=pdo_odbc     </span><br>
		<span class='indent'>extension=pdo_pgsql    </span><br>
		<span class='indent'>extension=pdo_sqlite   </span><br>
		<span class='indent'>extension=sockets      </span><br>
		<span class='indent'>extension=sqlite3      </span><br>
		<span class='indent'>extension=tidy         </span><br>
		<span class='indent'>extension=xmlrpc       </span><br>
		<span class='indent'>extension=xsl          </span><br>
	8. Save the php.ini file.<br><br>
  
  <p class='heading-1'> How to Install MySQL </p><br>
  1. Download php from the site like https://dev.mysql.com/downloads/installer/  <br>
  2. File like that mysql-installer-community-8.0.18.0.msi installer            <br>
  3. Running the installation and follow the on-screen instruction      <br><br>
  
  <p class='heading-1'> How to Install phpMyAdmin </p><br>
  1. Download php from the site like https://www.phpmyadmin.net/  <br>
  2. Download file like that phpMyAdmin-4.9.2-all-languages           <br>
  3. Extract download folder into Apache htdocs folder.      <br>
  4. Rename the folder name to phpmyadmin<br><br>


  <p class='heading-1'> How to Install Workbench </p><br>
  1. Download php from the site like https://dev.mysql.com/downloads/workbench/5.2.html  <br>
  2. Download file like that mysql-workbench-community-8.0.18-winx64           <br>
  3. Running the installation and follow the on-screen instruction <br><br>

</body>
</html>
