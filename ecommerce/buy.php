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
           Full Catalogue
        </h1>
        <center><table style =" background-color:  rgba(100, 100, 100, 0.5)">
                <tr>
                    <th style = "border: 1px solid #52c4a5; text-size: 18px; padding: 10px; text-align:center;  color:white;text-shadow:
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
    1px 1px 0 #000"> Seller </th>
                    <th style = "border: 1px solid #52c4a5; text-size: 18px; padding: 10px; text-align:center; color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000"> Purchase </th>


                </tr>
                <form>
                <?php
                include("connection.php");
                $q = "SELECT * FROM product WHERE NOT uname = '$uname' ";
                $r = mysqli_query($dbc, $q);

                while ($row = mysqli_fetch_array($r)){
                    if($row['approved']!=0) {
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

                        } else {
                            echo "<td style = 'border: 1px solid #52c4a5; text-size: 18px; padding: 10px;color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000; text-align:center'><a href='purchase.php?id=" . $row['id'] . "'>Purchase</td>";

                        }

                        echo "</tr>";
                    }
                }
                ?>
                    </form>
            </table><center>
              <div style="padding-top:400px"></div>
	</div>
	
	<div id = "footer">
		<p>Copyright 2015 Nico Flora & Richard Alindogan</p>
	</div>
	</div>
</body>
</html>