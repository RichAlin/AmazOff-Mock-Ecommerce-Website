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
                    <th style = "border: 1px solid #52c4a5; font-size: 10px; padding: 10px; text-align:center"> Approval Status </th>
                    <th style = "border: 1px solid #52c4a5; font-size: 10px; padding: 10px; text-align:center"> Approval</th>



                </tr>
                <form>
                    <?php
                    include("connection.php");
                    $q = "SELECT * FROM product";
                    $r = mysqli_query($dbc, $q);

                    while ($row = mysqli_fetch_array($r)){
                        echo "<tr>";
                        echo "<td style = 'word-wrap: break-word; width: 100px;border: 1px solid #52c4a5; font-size: 10px;  padding: 10px; text-align:center'>".$row['name']."</td>";
                        echo "<td style = 'word-wrap: break-word; width: 300px; border: 1px solid #52c4a5; font-size: 10px;  padding: 10px; text-align:center'>".$row['description']."</td>";
                        echo "<td style = 'border: 1px solid #52c4a5; font-size: 10px;  padding: 10px; text-align:center'>".$row['stock']."</td>";
                        echo "<td style = 'border: 1px solid #52c4a5; font-size: 10px;  padding: 10px; text-align:center'>".$row['category']."</td>";
                        echo "<td style = 'border: 1px solid #52c4a5;font-size: 10px;  padding: 10px; text-align:center'>$".$row['price']."</td>";
                        echo "<td style = 'border: 1px solid #52c4a5;font-size: 10px;  padding: 10px; text-align:center'>".$row['discount']."%</td>";
                        echo "<td style = 'border: 1px solid #52c4a5; font-size: 10px;  padding: 10px; text-align:center'>".$row['uname']."</td>";
                        echo "<td style = 'border: 1px solid #52c4a5; font-size: 10px;  padding: 10px; text-align:center'>".$row['stock']."</td>";

                        if($row['approved'] == 0)
                        {
                            echo "<td style = 'border: 1px solid #52c4a5; font-size: 10px;  padding: 10px; text-align:center'>Item Has Not Been Approved</td>";
                            echo "<td style = 'border: 1px solid #52c4a5; font-size: 10px;  padding: 10px; text-align:center'><a href='approve_product.php?id=".$row['id']."'>Approve</td>";
                        }
                        else
                        {
                            echo "<td style = 'border: 1px solid #52c4a5; font-size: 10px;  padding: 10px; text-align:center'>Item Has Been Approved</td>";
                            echo "<td style = 'border: 1px solid #52c4a5; font-size: 10px;  padding: 10px; text-align:center'><a href='deny_product.php?id=".$row['id']."'>Deny</td>";

                        }

                        echo "</tr>";

                    }
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