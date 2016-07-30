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
            My Cart
        </h1>






        <form action='order_status.php' method='GET'>

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
    1px 1px 0 #000; text-align:center"> Description </th>
                    <th style = "border: 1px solid #52c4a5; text-size: 18px; padding: 10px;color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000; text-align:center"> Quantity Ordered</th>
                    <th style = "border: 1px solid #52c4a5; text-size: 18px; padding: 10px;color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000; text-align:center"> Category </th>
                    <th style = "border: 1px solid #52c4a5; text-size: 18px; padding: 10px;color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000; text-align:center"> Price </th>
                    <th style = "border: 1px solid #52c4a5; text-size: 18px; padding: 10px;color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000; text-align:center"> Discounted Price </th>
                    <th style = "border: 1px solid #52c4a5; text-size: 18px; padding: 10px;color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000; text-align:center"> Seller </th>
                    <th style = "border: 1px solid #52c4a5; text-size: 18px; padding: 10px;color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000; text-align:center"> Remove From Cart </th>


                </tr>

                <?php
                include("connection.php");
                $q = "SELECT * FROM product WHERE id = '$id' ";
                $r = mysqli_query($dbc, $q);
                $row = mysqli_fetch_array($r);
                $name = $row['name'];
                $stock = $_GET['stock'];
                $price = $row['price'];
                $discount = $row['discount'];
                $description = $row['description'];
                $category = $row['category'];
                $seller_uname = $row['uname'];
                $shipping_status = '0';
                $confirmed_order = '1';

                $new_stock = $row['stock']-$_GET['stock'];

//                $d = "SELECT * FROM Product WHERE id = '$id'";
//                $f = mysqli_query($dbc, $d);
//                $row2 = mysqli_fetch_array($f);


//                if($row2['stock']!=0) {
//                    echo "hehehehe";
//                    $updated_stock = $_GET['stock']+$row2['stock'];
//                    $h = "UPDATE Product SET stock = '$new_stock' WHERE id = '$id'";
//                    $j = mysqli_query($dbc, $h);
//                }

                $a = "INSERT INTO cart (name, stock, price, discount, description, category, seller_uname, buyer_uname, id, confirmed_order, shipping_status) VALUES ('$name', '$stock', '$price', '$discount', '$description', '$category', '$seller_uname', '$buyer_uname', '$id', '$confirmed_order', '$shipping_status')";
                $b = mysqli_query($dbc, $a);


                $q = "UPDATE product SET stock = '$new_stock' WHERE id = '$id'";
                $s = mysqli_query($dbc, $q);



                $v = "SELECT * FROM cart WHERE buyer_uname = '$uname'";
                $b = mysqli_query($dbc, $v);




                while ($row = mysqli_fetch_array($b)){




                    if($row['display'] == 0) {
                        $discount_price = ($row['stock']*$row['price'])-($row['stock']*$row['price']*($row['discount']/100));
                        $total += $discount_price;
                        echo "<tr>";

                        echo "<td style = 'word-wrap: break-word; width: 100px;border: 1px solid #52c4a5; text-size: 18px; padding: 10px;color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000; text-align:center'>" . $row['name'] . "</td>";
                        echo "<td style = 'word-wrap: break-word; width: 300px; border: 1px solid #52c4a5; text-size: 18px; padding: 10px;color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000; text-align:center'>" . $row['description'] . "</td>";
                        echo "<td style = 'border: 1px solid #52c4a5; text-size: 18px; padding: 10px;color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000; text-align:center'>" . $row['stock'] . "</td>";
                        echo "<td style = 'border: 1px solid #52c4a5; text-size: 18px; padding: 10px;color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000; text-align:center'>" . $row['category'] . "</td>";
                        echo "<td style = 'border: 1px solid #52c4a5; text-size: 18px; padding: 10px;color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000; text-align:center'>$" . $row['price'] . "</td>";
                        echo "<td style = 'border: 1px solid #52c4a5; text-size: 18px; padding: 10px;color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000; text-align:center'>$" . $discount_price . "</td>";
                        echo "<td style = 'border: 1px solid #52c4a5; text-size: 18px; padding: 10px;color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000; text-align:center'>" . $row['seller_uname'] . "</td>";

                        echo "<td style = 'border: 1px solid #52c4a5; text-size: 18px; padding: 10px;color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000; text-align:center'><a href='remove_cart.php?id=" . $row['id'] . "'>Remove</td>";

                        echo "</tr>";
                    }
                    else
                    {

                    }
                }
                echo "<input type='hidden' name ='uname' value ='$uname'/>";
                echo "<input type='hidden' name ='id' value ='$id'/>";

                ?>

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <?php
                    echo "<td style = 'border: 1px solid #52c4a5; text-size:18px; padding:10px;color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000; text-align: center'>Total Price: $".$total."</td>";

                ?>
                </tr>

            </table><center>
                <div style="padding: 0px 500px">
                    <input type="submit" name="Button2" value="Confirm Purchase" />
                </div>
                </form>



    </div>

    <div id = "footer">
        <p>Copyright 2015 Nico Flora & Richard Alindogan</p>
    </div>
</div>
</body>
</html>