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
        if(isset($_GET['id']))
            $id = $_GET['id'];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST['button1'])) {


                $name = $_POST['name'];
                $stock = $_POST['stock'];
                $price = $_POST['price'];
                $discount = $_POST['discount'];
                $description = $_POST['description'];
                $category = $_POST['category'];

                $error = array();

                if (empty($name))
                {}
                else{
                    include("connection.php");
                    $q = "UPDATE product SET name = '$name' WHERE id = $id";
                    $r = mysqli_query($dbc, $q);
                    if($r)
                        "Successfully updated new product name.";
                }
                if (empty($stock))
                {}
                else{
                    include("connection.php");
                    $q = "UPDATE product SET stock = '$stock' WHERE id = $id";
                    $r = mysqli_query($dbc, $q);
                    if($r)
                        "Successfully updated new product quantity.";
                }
                if (empty($price))
                {}
                else{
                    include("connection.php");
                    $q = "UPDATE product SET price = '$price' WHERE id = $id";
                    $r = mysqli_query($dbc, $q);
                    if($r)
                        "Successfully updated new product price.";
                }
                if (empty($discount))
                {}
                else{
                    include("connection.php");
                    $q = "UPDATE product SET discount = '$discount' WHERE id = $id";
                    $r = mysqli_query($dbc, $q);
                    if($r)
                        "Successfully updated new product discount.";
                }
                if (empty($description))
                {}
                else{
                    include("connection.php");
                    $q = "UPDATE product SET description = '$description' WHERE id = $id";
                    $r = mysqli_query($dbc, $q);
                    if($r)
                        "Successfully updated new product description.";
                }
                if ($category = "Do Not Change")
                {}
                else {
                    include("connection.php");
                    $q = "UPDATE product SET category = '$category' WHERE id = $id";
                    $r = mysqli_query($dbc, $q);
                    if ($r)
                        "Successfully updated new product category.";
                }
                header("LOCATION:my_items.php");
            }
        }
        ?>

        <div style = "text-align:center; font-size: 35px; font-color:black; ">
            <?php
                include("connection.php");
                $a = "SELECT * FROM product WHERE id = '$id'";
                $b = mysqli_query($dbc, $a);
                $row = mysqli_fetch_assoc($b);
                echo "You are now editing product ".$row['name'];
            ?>
            </div>
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
                                <div style = "word-wrap: break-word; width: 500px; font-size:25px; margin:10px; padding: 0px 150px"><p>Product Information:</p>
                                    <col style="width: 150px;">
                                    <col style="width: 150px;">
                                    <tr>
                                        <td>New Product Name:</td>
                                        <td><input  type="text" name="name" value=
                                            <?php if (isset($_POST['name'])) echo $_POST['name'] ?> ></td>
                                    </tr>
                                    <tr>
                                        <td>New Description:</td>
                                        <td><textarea class="FormElement" name="description" id="term" style="border: 1px dotted black; width: 204px; height: 140px; border:"></textarea></td>
                                    </tr>

                                    <tr>
                                        <td>New Price:</td>
                                        <td><input type="price" name="price" value =
                                                <?php if (isset($_POST['price'])) echo $_POST['price'] ?>></td>
                                    </tr>
                                    <tr>
                                        <td>New Quantity:</td>
                                        <td><input type="text" name="stock" value=
                                            <?php if (isset($_POST['stock'])) echo $_POST['stock'] ?> ></td>
                                    </tr>
                                    <tr>
                                        <td>New Discount:</td>
                                        <td><input type="text" name="discount" value=
                                            <?php if (isset($_POST['discount'])) echo $_POST['discount'] ?> ></td>
                                    </tr>
                                    <tr>
                                        <td>New Category:
                                            <?php
                                            //select mysqli_rows
                                            //mysqli_fetch_assoc();
                                            //mysqli_fetch_array();
                                            $category = array("Do Not Change","Electronics","Clothes", "Tools", "Accessories", "Toys");
                                            menu($category, "category", $_POST['category']);
                                            ?>
                                        </td>
                                    </tr>


                            </table>
                            <div style="padding: 0px 300px" >

                                <input  type="submit" name="button1" value="Update Listing">
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