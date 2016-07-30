<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
    <title>Amazoff</title>
    <link rel = "stylesheet" href = "shopstyle.css" type = "text/css" media = "screen" />
    <meta http-equiv = "content-type" content = "text/html; charset = utf-8" />
</head>

<body>
<div id = "container">
    <?php include("shopheader.php"); ?>


    <div id = "content">



        <?php
        //make sure all fields are entered
        //two passwords are the same

        if(isset($_GET['uname']))
            $uname = $_GET['uname'];

        if(isset($_POST['Button1']))
        {


            $psword1 = $_POST['psword1'];
            $psword2 = $_POST['psword2'];
            //$role = 'Student';

            $error = array();

            if(empty($psword1))
                $error[] = "You forgot to enter a new password.";
            if(empty($psword2))
                $error[] = "You forgot to confirm new password.";



            if(empty($error)){
                //DB connection
                include("connection.php");

                //define a query
                $q = "SELECT * FROM EUsers WHERE uname = '$uname'";
                $s = mysqli_query($dbc, $q);
                if(mysqli_num_rows($s)==1)
                {
                    if($psword1 == $psword2)
                    {
                        $t = "UPDATE EUsers SET psword = '$psword1' WHERE uname = '$uname'";
                        $y = mysqli_query($dbc,$t);
                        if($y) {
                            echo "Password Successfully Reset";
                            header("Refresh: 3;URL=log_in.php");
                        }

                    }
                    else
                    {
                        echo "Passwords do not match, try again";
                    }



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







        <div style="text-align:center; font-size:20px; padding:10px"><h3>Welcome to Amazoff, The Internets Newest Premier Buy & Sell Marketplace!</h1></div>

        <table style = "padding: 10px 10px 10px 10px">
            <tr>
                <td>
                    <form acton="" method="POST">
                        <table style="padding: 20px 100px 0px 500px">
                            <div style = "word-wrap: break-word; width: 500px; font-size:25px; margin:10px; padding: 0px 50px 0px 500px"><p>Already Registered User? Forgot Password?:</p>
                                <tr>
                                    <td>New Password:</td>
                                    <td><input type="text" name="psword1" value =<?php if(isset($_POST['psword1'])) echo $_POST['psword2']; ?>  ></td>
                                </tr>
                                <tr>
                                    <td>Confirm New Password:</td>
                                    <td><input type="text" name="psword2" value =<?php if(isset($_POST['psword1'])) echo $_POST['psword2']; ?>  ></td>
                                </tr>
                        </table>

                        <div style="padding: 0px 200px 0px  590px">
                            <input type="submit" name="Button1" value="Reset Password" />
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