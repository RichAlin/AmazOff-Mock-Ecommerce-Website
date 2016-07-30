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
        if(isset($_GET['id']))
            $id = $_GET['id'];


        ?>
        <center><table>
                <tr>
                    <th style = "border: 1px solid #52c4a5; text-size: 18px; padding: 10px; text-align:center"> Item Has Been Removed From Your Cart </th>
                </tr>

                <?php

                include("connection.php");

                $q = "SELECT * FROM cart WHERE id = '$id'";
                $r = mysqli_query($dbc, $q);
                $row = mysqli_fetch_assoc($r);
                $add_stock = $row['stock'];

                $t = "SELECT stock FROM product WHERE id = '$id'";
                $y = mysqli_query($dbc, $t);
                $row1 = mysqli_fetch_assoc($y);

                $update_stock = $row1['stock']+$add_stock;

                $a = "UPDATE product SET stock = '$update_stock' WHERE id = '$id'";
                $b = mysqli_query($dbc, $a);

                $u = "DELETE FROM cart WHERE id = '$id'";
                $i = mysqli_query($dbc, $u);
                
                header("Refresh: 1;URL=cart.php");

                ?>

            </table><center>

    </div>

    <div id = "footer">
        <p>Copyright 2015 Nico Flora & Richard Alindogan</p>
    </div>
</div>
</body>
</html>