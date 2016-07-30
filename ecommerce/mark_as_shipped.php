<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
    <title>Amazoff</title>
    <link rel = "stylesheet" href = "shopstyle.css" type = "text/css" media = "screen" />
    <meta http-equiv = "content-type" content = "text/html; charset = utf-8" />
</head>

<body>
<div id = "container">
         <div id = "logcontent">
    <?php include("shopheader.php"); ?>

        <?php
        if(!isset($_COOKIE['uname'])) header ('LOCATION: log_in.php');
        $uname = $_COOKIE['uname'];
        $fname = $_COOKIE['fname'];

        ?>
        <h1>
            <?php
            if(isset($_COOKIE['fname']))
                echo "Welcome, ".$fname;

            if(isset($_GET['id']))
                $cart_id = $_GET['id'];

            ?>
        </h1>
        <center><table>
                <tr>

                    <?php

                    error_reporting(0);
                    
                    include("connection.php");




                    $q = "SELECT * FROM cart WHERE cart_id = '$cart_id'";
                    $s = mysqli_query($dbc, $q);

                    $r = "UPDATE cart SET shipping_status = '1' WHERE cart_id = '$cart_id'";
                    $t = mysqli_query($dbc, $r);

                    $row = mysqli_fetch_array($s);

                    $buname = $row['buyer_uname'];



                    $h = "SELECT * FROM eusers WHERE uname = '$buname' ";
                    $j = mysqli_query($dbc, $h);
                    $row1 = mysqli_fetch_array($j);
                    $email = $row1['email'];




                     echo "<th style = 'border: 1px solid #52c4a5; text-size: 18px; padding: 10px; text-align:center'> Item ".$row['name']." has been marked as shipped and confirmation email has been sent.</th>";

                        $message = "Your item ".$row['name']." has been shipped, thank you for shopping with us.";
                        $subject = "Item Shipping Confirmation";
                        $headers = "AmazOff";

                         mail($email,$subject,$message,$headers);
                        
                            header("Refresh: 1;URL=home.php");
                    ?>


                </tr>

                </form>
            </table><center>



    </div>

    <div id = "footer">
        <p>Copyright 2015 Nico Flora & Richard Alindogan</p>
    </div>
</div>
</body>
</html>