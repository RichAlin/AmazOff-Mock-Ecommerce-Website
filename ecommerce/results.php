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
                    <div style="padding-top: 50px"></div>

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
    1px 1px 0 #000; text-align:center"> Quantity </th>
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
    1px 1px 0 #000; text-align:center"> Discount </th>
                    <th style = "border: 1px solid #52c4a5; text-size: 18px; padding: 10px;color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000; text-align:center"> Seller </th>
                    <th style = "border: 1px solid #52c4a5; text-size: 18px; padding: 10px;color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000; text-align:center"> Purchase </th>


                </tr>
                <form>
                    <?php
                    include("connection.php");
                    if(!isset($_POST['name']))
                        header("LOCATION: home.php");



                    $q = "SELECT * FROM product WHERE name LIKE '%".$_POST['name']."%' OR category LIKE '%".$_POST['name']."%' OR description LIKE '%".$_POST['name']."%'";
                    $s = mysqli_query($dbc, $q);

                    if(mysqli_num_rows($s)!=0) {
                        while ($row = mysqli_fetch_array($s)) {
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
    1px 1px 0 #000; text-align:center'>" . $row['discount'] . "%</td>";
                            echo "<td style = 'border: 1px solid #52c4a5; text-size: 18px; padding: 10px;color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000; text-align:center'>" . $row['uname'] . "</td>";
                            
                            if ($row['stock'] == 0) {
                                echo "<td style = 'border: 1px solid #52c4a5; text-size: 18px; padding: 10px;color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000; text-align:center'>Item Currently Out of Stock</td>";

                            } else if ($row['approved'] == 0){ echo "<td style = 'border: 1px solid #52c4a5; text-size: 18px; padding: 10px;color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000; text-align:center'>Not Approved</td>";

                            }
                            else{
                                echo "<td style = 'border: 1px solid #52c4a5; text-size: 18px; padding: 10px;color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000; text-align:center'><a href='purchase.php?id=" . $row['id'] . "'>Purchase</td>";

                            }

                            echo "</tr>";


                        }
                    }
                    else
                    {
                        echo "<td style = 'border: 1px solid #52c4a5; text-size: 18px; padding: 10px;color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000; text-align:center'>No Items With Search Results Available</td>";

                    }
                    ?>
                </form>
            </table><center>

  <div style="padding-top:125px"></div>

    </div>

    <div id = "footer">
        <p>Copyright 2015 Nico Flora & Richard Alindogan</p>
    </div>
</div>
</body>
</html>