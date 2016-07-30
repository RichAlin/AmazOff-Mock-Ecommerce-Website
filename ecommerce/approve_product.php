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

        if(isset($_GET['id']))
            $id = $_GET['id'];

        include("connection.php");

        $q = "UPDATE product SET approved = '1' WHERE id = '$id'";
        $r = mysqli_query($dbc,$q);





        ?>








        <center><table>
                <tr>
                    <th style = "border: 1px solid #52c4a5; text-size: 18px; padding: 10px; text-align:center"> Item Has Been Approved </th>

                </tr>


                <?php
                include("connection.php");
                $q = "SELECT * FROM product WHERE id = '$id'";
                $s = mysqli_query($dbc, $q);
                $row = mysqli_fetch_array($s);

                $email_uname = $row['uname'];

                $r = "SELECT * FROM eusers WHERE uname = '$email_uname'";
                $t = mysqli_query($dbc, $r);
                $row1 = mysqli_fetch_array($t);

                $email = $row1['email'];



                $message = "Item ".$row['name']." has been approved by admin.";
                $subject = "Product Approval";
                $headers = "AmazOff";

                mail($email,$subject,$message,$headers);
                header("Refresh: 1;URL=stock_report.php");


                ?>




            </table><center>





    </div>

    <div id = "footer">
        <p>Copyright 2015 Nico Flora & Richard Alindogan</p>
    </div>
</div>
</body>
</html>