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
            //make sure all fields are entered
            //two passwords are the same
            if(isset($_POST['Button1']))
            {
                $uname = $_POST['uname'];

                //$role = 'Student';

                $error = array();
                if(empty($uname))
                    $error[] = "You forgot to enter user name.";



                if(empty($error)){
                        //DB connection
                        include("connection.php");

                        //define a query
                        $q = "SELECT * FROM eusers WHERE uname = '$uname'";
                        $s = mysqli_query($dbc, $q);
                        if(mysqli_num_rows($s)==1)
                        {
                            $row = mysqli_fetch_array($s);
                            $email = $row['email'];

                           $message = "Your password is " .$row['psword']." Please click this link to reset your password: http://aristotleii.monmouth.edu/~s0876956/reset.php?uname=".$uname;
                            $subject = "Password Reset";
                            $headers = "AmazOff";

                            mail($email,$subject,$message,$headers);
                                   header("Refresh: 1;URL=log_in.php");

                                
                        }
                        else{
                            echo "Unknown Username";
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

        <table style = "padding: 10px 10px 10px 10px">
            <tr>
                <td>
                    <form acton="" method="POST">
                       <center> <table style="padding: 20px 100px 0px 500px">
                            <div style = "word-wrap: break-word; width: 750px; font-size:25px; margin:10px; padding: 0px 50px 0px 500px"><p>Already Registered User? Forgot Password?:</p>
                                <tr>
                                    <td>Username:</td>
                                    <td><input type="text" name="uname" value =<?php if(isset($_POST['uname'])) echo $_POST['uname']; ?>  ></td>
                                </tr>
                                </table>

                        <div style="padding: 0px 200px 0px  590px">
                            <input type="submit" name="Button1" value="Send Password & Reset Link" />
                        </div></center>
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