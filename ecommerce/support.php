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
        //make sure all fields are entered
        //two passwords are the same
        if(isset($_POST['Button1']))
        {
            $message = $_POST['term'];

            //$role = 'Student';

            $error = array();
            if(empty($message))
                $error[] = "You forgot to enter a support question.";



            if(empty($error)){
                //DB connection
                include("connection.php");

                //define a query
                $q = "SELECT * FROM eusers WHERE role = 'super'";
                $s = mysqli_query($dbc, $q);


                $u = "SELECT * FROM eusers WHERE uname = '$uname'";
                $i = mysqli_query($dbc, $u);
                $row1 = mysqli_fetch_array($i);

                if(mysqli_num_rows($s)==1)
                {
                    $row = mysqli_fetch_array($s);
                    $email = $row['email'];

                    $message = "Support message from ".$uname.": ".$message." Please send response to: ".$row1['email'];
                    $subject = "Support Inquiry";
                    $headers = "AmazOff";

                    mail($email,$subject,$message,$headers);

                    echo '<p style="color:white>"Successfully sent support inquiry, thank you."</p>';

                }


            }
            else
            {
                foreach($error as $msg) //for each element in error array we assign to msg
                {
                    echo $msg;
                    echo"<br>";
                }
            }
        }

        ?>







        <div style="text-align:center; font-size:20px; color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000; padding:10px"><h3>Welcome to Amazoff, The Internet's Newest Premier Buy & Sell Marketplace!</h1></div>

        <table style = "padding: 10px 10px 10px 10px">
            <tr>
                <td>
                    <form acton="" method="POST">
                        <table style="padding: 20px 100px 0px 500px">
                            <div style = "word-wrap: break-word; width: 500px; font-size:25px; margin:10px; color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000; padding: 0px 50px 0px 500px"><p>Need some assistance?:</p>
                                <tr>
                                    <td style=" color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000;">Support Question:</td>
                                    <td>
                                    <textarea class="FormElement" name="term" id="term" style="border: 1px solid #52c4a5; width: 200px; height: 140px; border:"></textarea>
                                    </td>
                                </tr>
                        </table>

                        <div style="padding: 0px 200px 0px  590px">
                            <input type="submit" name="Button1" value="Send Support Question" />
                        </div>
                    </form>
                </td>
            </tr>
        </table>
    </div>

    <div id = "footer">
        <p style = "padding:5px 5px 5px 5px">Copyright 2015 Nico Flora & Richard Alindogan</p>
    </div>

</body>
</html>