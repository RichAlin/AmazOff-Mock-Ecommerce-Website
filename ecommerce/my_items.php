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
     <h1 style="padding-left: 100px; color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000;">
            My Items
        </h1>

        <center><table style =" background-color:  rgba(100, 100, 100, 0.5)">
                <tr>
                    <th style = "border: 1px solid #52c4a5; text-size: 18px; padding: 10px; text-align:center; color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000"> Item Name </th>
                    <th style = "border: 1px solid #52c4a5; text-size: 18px; padding: 10px; text-align:center; color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000"> Description </th>
                    <th style = "border: 1px solid #52c4a5; text-size: 18px; padding: 10px; text-align:center; color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000"> Quantity </th>
                    <th style = "border: 1px solid #52c4a5; text-size: 18px; padding: 10px; text-align:center; color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000"> Category </th>
                    <th style = "border: 1px solid #52c4a5; text-size: 18px; padding: 10px; text-align:center; color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000"> Price </th>
                    <th style = "border: 1px solid #52c4a5; text-size: 18px; padding: 10px; text-align:center; color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000"> Discount </th>
                    <th style = "border: 1px solid #52c4a5; text-size: 18px; padding: 10px; text-align:center; color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000"> Approval Status </th>
                    <th style = "border: 1px solid #52c4a5; text-size: 18px; padding: 10px; text-align:center; color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000"> Edit </th>
                    <th style = "border: 1px solid #52c4a5; text-size: 18px; padding: 10px; text-align:center; color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000"> Delete </th>



                </tr>

                <?php
                include("connection.php");
                $q = "SELECT * FROM product WHERE uname = '$uname'";
                $r = mysqli_query($dbc, $q);


                while ($row = mysqli_fetch_array($r)){
                    echo "<tr>";
                    echo "<td style = 'word-wrap: break-word; width: 100px;border: 1px solid #52c4a5; text-size: 18px; padding: 10px;color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000; text-align:center'>".$row['name']."</td>";
                    echo "<td style = 'word-wrap: break-word; width: 300px; border: 1px solid #52c4a5; text-size: 18px; padding: 10px;color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000; text-align:center'>".$row['description']."</td>";
                    echo "<td style = 'border: 1px solid #52c4a5; text-size: 18px; padding: 10px;color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000; text-align:center'>".$row['stock']."</td>";
                    echo "<td style = 'border: 1px solid #52c4a5; text-size: 18px; padding: 10px;color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000; text-align:center'>".$row['category']."</td>";
                    echo "<td style = 'border: 1px solid #52c4a5; text-size: 18px; padding: 10px;color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000; text-align:center'>$".$row['price']."</td>";
                    echo "<td style = 'border: 1px solid #52c4a5; text-size: 18px; padding: 10px;color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000; text-align:center'>".$row['discount']."%</td>";
                    if($row['approved']==1)
                    {
                        echo "<td style = 'border: 1px solid #52c4a5; text-size: 18px; padding: 10px;color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000; text-align:center'>Item Has Been Approved</td>";

                    }
                    else
                    {
                        echo "<td style = 'border: 1px solid #52c4a5; text-size: 18px; padding: 10px; text-align:center'>Item Is Waiting Approval</td>";

                    }
                    echo "<td style = 'border: 1px solid #52c4a5; text-size: 18px; padding: 10px; text-align:center'><a href='edit_item.php?id=".$row['id']."'>Edit Item</td>";
                    echo "<td style = 'border: 1px solid #52c4a5; text-size: 18px; padding: 10px; text-align:center'><a href='delete_item.php?id=".$row['id']."'>Delete Item</td>";

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