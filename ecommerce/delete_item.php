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

        ?>
        <h1>
            <?php
            if(isset($_COOKIE['fname']))
                echo "Welcome, ".$fname;

            if(isset($_GET['id']))
                $id = $_GET['id'];
            ?>
        </h1>
        <center><table>
                <tr>

                    <?php
                    include("connection.php");

                    $q = "DELETE FROM product WHERE id = '$id'";
                    $s = mysqli_query($dbc, $q);

                    echo "<th style = 'border: 1px solid #52c4a5; text-size: 18px; padding: 10px; text-align:center'> Item has been removed from your store.</th>";
                        header("Refresh: 1;URL=home.php");
                    ?>


                </tr>

                </form>
            </table><center>



    </div>

    <div id = "footer">
        <p>Copyright 2015 Nico Flora & Richard Alindogan</p>
    </div>
</div>
</body>
</html>