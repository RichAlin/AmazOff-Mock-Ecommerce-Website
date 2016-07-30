<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
    <title>Amazoff</title>
    <link rel = "stylesheet" href = "shopstyle.css" type = "text/css" media = "screen" />
    <meta http-equiv = "content-type" content = "text/html; charset = utf-8" />
</head>

<body>
<div id = "container">
    <?php include("shopadmin.html"); ?>


    <div id = "contentadmin">
        <?php
        if(!isset($_COOKIE['uname'])) header ('LOCATION: log_in.php');
        $uname = $_COOKIE['uname'];
        $fname = $_COOKIE['fname'];

        ?>
        <h1>
            <?php
            if(isset($_COOKIE['fname']))
                echo "Welcome, ".$fname;
            ?>
        </h1>
        <center><table>
                <tr>
                    <th style = "border: 1px solid #52c4a5; font-size: 10px; padding: 10px; text-align:center"> Item Name </th>
                    <th style = "border: 1px solid #52c4a5; font-size: 10px; padding: 10px; text-align:center"> Description </th>
                    <th style = "border: 1px solid #52c4a5; font-size: 10px; padding: 10px; text-align:center"> Quantity </th>
                    <th style = "border: 1px solid #52c4a5; font-size: 10px; padding: 10px; text-align:center"> Category </th>
                    <th style = "border: 1px solid #52c4a5; font-size: 10px; padding: 10px; text-align:center"> Price </th>
                    <th style = "border: 1px solid #52c4a5; font-size: 10px; padding: 10px; text-align:center"> Discount </th>
                    <th style = "border: 1px solid #52c4a5; font-size: 10px; padding: 10px; text-align:center"> Seller </th>
                    <th style = "border: 1px solid #52c4a5; font-size: 10px; padding: 10px; text-align:center"> Quantity </th>
                    <th style = "border: 1px solid #52c4a5; font-size: 10px; padding: 10px; text-align:center"> Discount Price </th>
                    <th style = "border: 1px solid #52c4a5; font-size: 10px; padding: 10px; text-align:center"> Shipping Status </th>




                </tr>
                <form>
                    <?php
                    error_reporting(0);
                    include("connection.php");
                    $q = "SELECT * FROM cart WHERE shipping_status = '1'";
                    $r = mysqli_query($dbc, $q);

                    while ($row = mysqli_fetch_array($r)){
                        echo "<tr>";
                        $discount_price = ($row['stock']*$row['price'])-($row['stock']*$row['price']*($row['discount']/100));
                        $total += $discount_price;
                        echo "<td style = 'word-wrap: break-word; width: 100px;border: 1px solid #52c4a5; font-size: 10px;  padding: 10px; text-align:center'>".$row['name']."</td>";
                        echo "<td style = 'word-wrap: break-word; width: 300px; border: 1px solid #52c4a5; font-size: 10px;  padding: 10px; text-align:center'>".$row['description']."</td>";
                        echo "<td style = 'border: 1px solid #52c4a5; font-size: 10px;  padding: 10px; text-align:center'>".$row['stock']."</td>";
                        echo "<td style = 'border: 1px solid #52c4a5; font-size: 10px;  padding: 10px; text-align:center'>".$row['category']."</td>";
                        echo "<td style = 'border: 1px solid #52c4a5;font-size: 10px;  padding: 10px; text-align:center'>$".$row['price']."</td>";
                        echo "<td style = 'border: 1px solid #52c4a5;font-size: 10px;  padding: 10px; text-align:center'>".$row['discount']."%</td>";
                        echo "<td style = 'border: 1px solid #52c4a5; font-size: 10px;  padding: 10px; text-align:center'>".$row['seller_uname']."</td>";
                        echo "<td style = 'border: 1px solid #52c4a5; font-size: 10px;  padding: 10px; text-align:center'>".$row['stock']."</td>";
                        echo "<td style = 'border: 1px solid #52c4a5; font-size: 10px;  padding: 10px; text-align:center'>$".$discount_price."</td>";
                        echo "<td style = 'border: 1px solid #52c4a5; font-size: 10px;  padding: 10px; text-align:center'>Item Has Shipped</td>";




                        echo "</tr>";

                    }
                    echo "<tr>";
                    echo "<td></td>";
                    echo "<td></td>";

                    echo "<td></td>";

                    echo "<td></td>";

                    echo "<td></td>";
                    echo "<td></td>";

                    echo "<td></td>";
                    echo "<td></td>";


                    echo "<td style = 'border: 1px solid #52c4a5; font-size: 10px;  padding: 10px; text-align:center'>Total Sales: $".$total."</td>";

                    echo "</tr>";
                    ?>
                </form>
            </table><center>

    </div>

    <div id = "footer">
        <p>Copyright 2015 Nico Flora & Richard Alindogan</p>
    </div>
</div>
</body>
</html>