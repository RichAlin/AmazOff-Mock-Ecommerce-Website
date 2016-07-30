<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
    <title>Amazoff</title>
    <link rel = "stylesheet" href = "shopstyle.css" type = "text/css" media = "screen" />
    <meta http-equiv = "content-type" content = "text/html; charset = utf-8" />
</head>

<body>
<div id = "container">
    <div id = "contentadmin">
    <?php include("shopheader.php"); ?>
    
        <?php
        if(isset($_COOKIE['uname']))
        {
            unset($_COOKIE['uname']);
            setcookie('uname', '', time()-3600);
        }


        ?>
        <center><table>
                <tr>
                    <th style = "border: 1px solid #52c4a5; text-size: 18px; padding: 10px; text-align:center"> Thank You For Visiting Our Site </th>

                </tr>


                <?php

                header("Refresh: 1;URL=home.php");


                ?>




            </table><center>





    </div>

    <div id = "footer">
        <p>Copyright 2015 Nico Flora & Richard Alindogan</p>
    </div>
</div>
</body>
</html>