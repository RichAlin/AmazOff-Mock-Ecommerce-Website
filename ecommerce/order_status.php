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
        error_reporting(0);
        if(!isset($_COOKIE['uname'])) header ('LOCATION: log_in.php');
        $uname = $_COOKIE['uname'];
        $fname = $_COOKIE['fname'];
        if(isset($_GET['id']))
            $id = $_GET['id'];
        if(isset($_GET['buyer_uname']))
            $buyer_uname = $_GET['buyer_uname'];

        ?>
       <h1 style="padding-left: 100px; color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000;">
            Order Status
        </h1>

        <?php

        //check if the login button was clicked
        if (isset($_POST['Button2'])) {

            echo $total;

            include("connection.php");
            $q = "SELECT * FROM cart WHERE buyer_uname = '$buyer_uname'";
            $r = mysqli_query($dbc, $q);

            while ($row = mysqli_fetch_assoc($r)) {


            }
        }


        ?>






            <center><table style =" background-color:  rgba(100, 100, 100, 0.5)">
                    <tr>
                        <th style = "border: 1px solid #52c4a5; text-size: 18px; padding: 10px;color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000; text-align:center"> Item Name </th>
                        <th style = "border: 1px solid #52c4a5; text-size: 18px; padding: 10px;color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000; text-align:center"> Quantity Ordered</th>
                        <th style = "border: 1px solid #52c4a5; text-size: 18px; padding: 10px;color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000; text-align:center"> Seller Information </th>
                        <th style = "border: 1px solid #52c4a5; text-size: 18px; padding: 10px;color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000; text-align:center"> Shipping Status </th>



                    </tr>

                    <?php
                    include("connection.php");



                    $q = "SELECT * FROM cart WHERE buyer_uname = '$uname' AND confirmed_order = '1'";
                    $r = mysqli_query($dbc, $q);



                    $product_name = $row2['name'];
                    $product_stock = $row2['stock'];
                    $product_shipping = $row2['shipping_status'];

                    $y = "SELECT * FROM orderstatus WHERE uname = '$uname'";
                    $u = mysqli_query($dbc, $y);
                    $row4 = mysqli_fetch_array($u);


                    $s = "UPDATE cart SET display = '1' WHERE buyer_uname = '$uname'";
                    $p = mysqli_query($dbc,$s);




                    $n = "SELECT * FROM cart WHERE buyer_uname = '$uname' AND confirmed_order = '1'";
                    $m = mysqli_query($dbc, $n);



                    while ($row = mysqli_fetch_array($r)){
                        $discount_price = ($row['stock']*$row['price'])-($row['stock']*$row['price']*($row['discount']/100));
                        $total += $discount_price;

                        while($row2 = mysqli_fetch_array($m)) {


                            $s_uname = $row2['seller_uname'];

                            $a = "SELECT * FROM eusers WHERE uname = '$s_uname'";
                            $b = mysqli_query($dbc, $a);
                            $row1 = mysqli_fetch_array($b);

                            $xx = "SELECT * FROM cart WHERE seller_uname = '$s_uname'";
                            $xxx = mysqli_query($dbc, $xx);
                            $row5 = mysqli_fetch_array($xxx);


                            echo "<tr>";

                            echo "<td style = 'word-wrap: break-word; width: 100px;border: 1px solid #52c4a5; text-size: 18px; padding: 10px;color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000; text-align:center'>" . $row5['name'] . "</td>";
                            echo "<td style = 'word-wrap: break-word; width: 100px; border: 1px solid #52c4a5; text-size: 18px; padding: 10px;color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000; text-align:center'>" . $row5['stock'] . "</td>";
                            echo "<td style = 'border: 1px solid #52c4a5; text-size: 18px; padding: 10px;color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000; text-align:center'><br>" . $row1['fname'] . " " . $row1['lname'] . "<br>" . $row1['address'] . "<br>" . $row1['city'] . ", " . $row1['state'] . " " . $row1['zip'] . "</td>";


                            if ($row['shipping_status'] == 1) {
                                echo "<td style = 'border: 1px solid #52c4a5; text-size: 18px; padding: 10px;color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000; text-align:center'>Item Shipped</td>";
                            } else if($row['shipping_status'] == 0){
                                echo "<td style = 'border: 1px solid #52c4a5; text-size: 18px; padding: 10px;color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000; text-align:center'>Item Processing</td>";
                            }
                        }


                        echo "</tr>";
                    }



                    ?>



                </table><center>



  <div style="padding-top:400px"></div>

    </div>

    <div id = "footer">
        <p>Copyright 2015 Nico Flora & Richard Alindogan</p>
    </div>
</div>
</body>
</html>