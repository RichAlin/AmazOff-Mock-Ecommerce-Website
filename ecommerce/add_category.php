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





            if(isset($_POST['button1'])) {


                $category = $_POST['category'];

                include("connection.php");

                $q = "INSERT INTO category (category_name) VALUES ('$category')";
                $r = mysqli_query($dbc, $q);
                if($r)
                    echo "Successfully inserted category into database.";
                header("Refresh: 3; url=categories.php");

            }








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


                    <td>

                        <form action="", method = "POST">
                            <table style="padding: 20px 100px">
                                <div style = "word-wrap: break-word; width: 500px; font-size:25px; margin:10px; padding: 0px 150px"><p>New Category Information:</p>
                                    <col style="width: 150px;">
                                    <col style="width: 150px;">
                                    <tr>
                                        <td>New Category Name:</td>
                                        <td><input  type="text" name="category" value=
                                            <?php if (isset($_POST['category'])) echo $_POST['category'] ?> ></td>
                                    </tr>



                            </table>
                            <div style="padding: 0px 300px" >

                                <input  type="submit" name="button1" value="Add Category">
                            </div>

                        </form>



                    </td>


                </tr>
                <tr>
                    <td>

                    </td>
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