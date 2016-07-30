<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
    <title>Amazoff</title>
    <link rel = "stylesheet" href = "shopstyle.css" type = "text/css" media = "screen" />
    <meta http-equiv = "content-type" content = "text/html; charset = utf-8" />
</head>

<body>
<div id = "container">
    <div id = "content">
    <?php include("shopheader.php"); ?>

        <?php
        if(!isset($_COOKIE['uname'])) header ('LOCATION: log_in.php');
        $uname = $_COOKIE['uname'];
        $fname = $_COOKIE['fname'];
        if(isset($_GET['id']))
            $id = $_GET['id'];
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
    1px 1px 0 #000; text-align:center"> Add To Cart </th>


                </tr>

                <?php
                error_reporting(0);
                include("connection.php");
                $q = "SELECT * FROM product WHERE id = '$id' ";
                $r = mysqli_query($dbc, $q);

                while ($row = mysqli_fetch_array($r)){

                    echo "<form action='cart.php' method='GET'>";
                    echo "<tr>";
                    echo "<input type='hidden' name ='id' value ='$id'/>";
                    echo "<input type='hidden' name ='buyer_uname' value ='$uname'/>";
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
                    $stock_num = $row['stock'];

                    echo "<td style = 'padding: 0 0 0 15px'>";
                    echo "<select name='stock'>";
                      for ($i = 1; $i <= $stock_num; $i++) :
                          echo "<option value='$i'>".$i. "</option>";
                      endfor;
                     echo "</select>";

                    $s = $_POST['stock'];

                    echo "</td>";
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
                    echo "<td style = 'border: 1px solid #52c4a5; text-size: 18px; padding: 10px;color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000; text-align:center'><input type='submit' value='Add To Cart'/></td>";
                    echo "</tr>";
                    echo "</form>";

                }
                ?>
            </table><center>
    </div>
            

    <div id = "footer">
        <p>Copyright 2015 Nico Flora & Richard Alindogan</p>
    </div>
</div>
</body>
</html>