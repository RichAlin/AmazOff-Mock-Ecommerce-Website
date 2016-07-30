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
                    <th style = "border: 1px solid #52c4a5; text-size: 15px; padding: 10px; text-align:center"> Category </th>
                    <th style = "border: 1px solid #52c4a5; text-size: 15px; padding: 10px; text-align:center"> Delete Category </th>






                </tr>
                <form>
                    <?php
                    include("connection.php");
                    $q = "SELECT * FROM category";
                    $r = mysqli_query($dbc, $q);

                    while ($row = mysqli_fetch_array($r)){

                        echo "<tr>";
                        echo "<td style = 'word-wrap: break-word; width: 100px;border: 1px solid #52c4a5; font-size: 10px; padding: 10px; text-align:center'>".$row['category_name']."</td>";
                        echo "<td style = 'border: 1px solid #52c4a5; font-size: 10px; padding: 10px; text-align:center'><a href='delete_category.php?id=".$row['id']."'>Delete Category</td>";
                        echo "</tr>";

                    }

                    echo "<tr>";

                    echo "<td style = 'border: 1px solid #52c4a5; font-size: 10px;color:black; padding: 10px; text-align:center'><a href='add_category.php'>Add Category</td>";

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