<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
    <title>Amazoff</title>
    <link rel = "stylesheet" href = "shopstyle.css" type = "text/css" media = "screen" />
    <meta http-equiv = "content-type" content = "text/html; charset = utf-8" />
</head>

<body>
<div id = "container">
    <?php include("shopadmin.html"); ?>


    <div id = "content">
        <?php
        error_reporting(0);
        if(isset($_GET['uname']))
            $uname = $_GET['uname'];

        include("connection.php");
        
        $t = "SELECT * FROM eusers WHERE uname = '$uname'";
        $s = mysqli_query($dbc, $t);
        $row = mysqli_fetch_array($s);

        if(mysqli_num_rows($s) == 1){
					$email = $row['email'];
			} 

        $q = "UPDATE eusers SET approved = '0' WHERE uname = '$uname'";
        $r = mysqli_query($dbc,$q);
    
    if($r){
        $message = $uname. ', you have been denied to access AmazOff, we are sorry.';
        $subject = "Registration Status";
        $headers = "From: AmazOff";

        mail($email,$subject,$message,$headers);
         echo'<center><table>
                <tr>
                    <th style = "border: 1px solid #52c4a5; text-size: 18px; padding: 10px; text-align:center"> User Has Been Denied </th>

            </table><center>';
  
           header("Refresh: 1;URL=home.php");

    }
    else{
        echo    "something wrong";
    }


        ?>


    </div>

    <div id = "footer">
        <p>Copyright 2015 Nico Flora & Richard Alindogan</p>
    </div>
</div>
</body>
</html>