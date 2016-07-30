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
                    <th style = "border: 1px solid #52c4a5; text-size: 15px; padding: 10px; text-align:center"> Username </th>
                    <th style = "border: 1px solid #52c4a5; text-size: 15px; padding: 10px; text-align:center"> First Name </th>
                    <th style = "border: 1px solid #52c4a5; text-size: 15px; padding: 10px; text-align:center"> Last Name </th>
                    <th style = "border: 1px solid #52c4a5; text-size: 15px; padding: 10px; text-align:center"> Address </th>
                    <th style = "border: 1px solid #52c4a5; text-size: 15px; padding: 10px; text-align:center"> City </th>
                    <th style = "border: 1px solid #52c4a5; text-size: 15px; padding: 10px; text-align:center"> State </th>
                    <th style = "border: 1px solid #52c4a5; text-size: 15px; padding: 10px; text-align:center"> Zip </th>
                    <th style = "border: 1px solid #52c4a5; text-size: 15px; padding: 10px; text-align:center"> Email </th>
                    <th style = "border: 1px solid #52c4a5; text-size: 15px; padding: 10px; text-align:center"> Approval Status </th>
                    <th style = "border: 1px solid #52c4a5; text-size: 15px; padding: 10px; text-align:center"> Approval </th>




                </tr>
                <form>
                    <?php
                    error_reporting(0);
                    include("connection.php");
                    $q = "SELECT * FROM eusers WHERE NOT role = 'super' ";
                    $r = mysqli_query($dbc, $q);

                    while ($row = mysqli_fetch_array($r)){
                        echo "<tr>";
                        echo "<td style = 'word-wrap: break-word; width: 100px;border: 1px solid #52c4a5; font-size: 10px; padding: 10px; text-align:center'>".$row['uname']."</td>";
                        echo "<td style = 'word-wrap: break-word; width: 100px; border: 1px solid #52c4a5;font-size: 10px; padding: 10px; text-align:center'>".$row['fname']."</td>";
                        echo "<td style = 'border: 1px solid #52c4a5; font-size: 10px; padding: 10px; text-align:center'>".$row['lname']."</td>";
                        echo "<td style = 'border: 1px solid #52c4a5; font-size: 10px; padding: 10px; text-align:center'>".$row['address']."</td>";
                        echo "<td style = 'border: 1px solid #52c4a5; font-size: 10px; padding: 10px; text-align:center'>".$row['city']."</td>";
                        echo "<td style = 'border: 1px solid #52c4a5;font-size: 10px; padding: 10px; text-align:center'>".$row['state']."</td>";
                        echo "<td style = 'border: 1px solid #52c4a5; font-size: 10px;padding: 10px; text-align:center'>".$row['zip']."</td>";
                        echo "<td style = 'border: 1px solid #52c4a5; font-size: 10px; padding: 10px; text-align:center'>".$row['email']."</td>";
                        if($row['approved'] == 1)
                        {
                            echo "<td style = 'border: 1px solid #52c4a5; font-size: 10px; padding: 10px; text-align:center'>Approved</td>";
                            echo "<td style = 'border: 1px solid #52c4a5; font-size: 10px; padding: 10px; text-align:center'><a href='deny_user.php?uname=".$row['uname']."'>Deny User</td>";

                        }
                        else
                        {
                            echo "<td style = 'border: 1px solid #52c4a5; font-size: 10px; padding: 10px; text-align:center'>Not Approved</td>";
                             echo "<td style = 'border: 1px solid #52c4a5; font-size: 10px; padding: 10px; text-align:center'><a href='approve_user.php?uname=".$row['uname']."'>Approve User</td>";

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