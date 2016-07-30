<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
	<title>Amazoff</title>
        <link href= "shopstyle.css" type="text/css" rel="stylesheet"/> 
	<meta http-equiv = "content-type" content = "text/html; charset = utf-8" />
</head>

<body>
	<div id = "container">
    <div id = "logcontent">
        <?php

        include ("connection.php");

        if(!isset($_COOKIE['uname'])) header ('LOCATION: log_in.php');
        $uname = $_COOKIE['uname'];
        $fname = $_COOKIE['fname'];



        $q = "SELECT * FROM eusers WHERE uname = '$uname'";
        $s = mysqli_query($dbc, $q);
        $row = mysqli_fetch_array($s);
        if($row['role'] == 'super')
        {
            include("shopadmin.html");
        }
        else
        {
            include("shopheader.php");
        }



        ?>
        
            <div>
            <?php
            //if(isset($_COOKIE['fname'])) {

               // echo "Welcome, " . $fname;
            //}
            ?></div>
    <div>
        <div style="padding-top:300px"></div>
		<div style="text-align:center; font-size:20px; color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000;  padding:10px"><h3>Welcome to Amazoff, The Internet's Newest Premier Buy & Sell Marketplace!</h1></div>
		<div id = "par"><center><p style = "word-wrap: normal; width: 600px; font-size: 15px;color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000;  padding: 10px 0 0 100px; text-align:left">Amazoff was established in 2015 by both Nico Flora & Richard Alindogan.
		Amazoff offers user a safe and secure way to interact with others across
		the globe.</p></center></div>
         <div style="padding-top:400px"></div>
	   </div>
    </div>
	
	<div id = "footer">
		<p>Copyright 2015 Nico Flora & Richard Alindogan</p>
	</div>
	</div>
</body>
</html>