<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
    <title>Amazoff</title>
    <link rel = "stylesheet" href = "shopstyle.css" type = "text/css" media = "screen" />
    <meta http-equiv = "content-type" content = "text/html; charset = utf-8" />
</head>

<body>
<div id = "container">
    <?php include("shopadmin.html"); ?>


    <div id = "content">

        <?php
        if(!isset($_COOKIE['uname'])) header ('LOCATION: log_in.php');
        $uname = $_COOKIE['uname'];
        $fname = $_COOKIE['fname'];





            if(isset($_GET['id']))
                $id = $_GET['id'];

            include("connection.php");

            $q = "DELETE FROM category WHERE id = '$id'";
            $r = mysqli_query($dbc, $q);

            header("Refresh: 1; url=categories.php");




        ?>


        <?php
        //Accepts an array and the name of what we are looking at so it makes a dropdown menu of those items.

        function menu($array, $name, $value)
        {
            echo '<select name ='.$name.'>';
            for($i=0; $i<count($array); $i++)
            {

                echo '<option value="'.$array[$i].'"';
                if($array[$i] == $value) echo 'selected="selected"';
                echo '>'.$array[$i].'</option>';
                echo '<br>';
            }
            echo '</select>';
        }

        ?>

        <center>
            <table>
                <tr>
                    <th style = "border: 1px solid #52c4a5; text-size: 15px; padding: 10px; text-align:center"> Deleted Category </th>

                </tr>

            </table>
        </center>




    </div>

    <div id = "footer">
        <p>Copyright 2015 Nico Flora & Richard Alindogan</p>
    </div>
</div>
</body>
</html>