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
              <div style="padding-top: 50px"></div>
		<?php 
            error_reporting(0);
			if(!isset($_COOKIE['uname'])) header ('LOCATION: log_in.php');
			$uname = $_COOKIE['uname'];
			$fname = $_COOKIE['fname'];
		/*
			session_start();
			if(isset($_SESSION['UserName']))
				$uname = $_SESSION['UserName'];
			else
				echo "<script>window.open('index4.php')</script>";*/

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
                    $error[] = "You forgot to enter a prouct name.";
                if (empty($stock))
                    $error[] = "You forgot to enter a prouct quantity.";
                if (empty($price))
                    $error[] = "You forgot to enter a prouct price.";
                if (empty($discount))
                    $error[] = "You forgot to enter a prouct discount.";
                if (empty($description))
                    $error[] = "You forgot to enter a prouct description.";
                if (empty($category))
                    $error[] = "You forgot to select a prouct category.";


                if (empty($error)) {

                    include("connection.php");

                    $q = "INSERT INTO product (name, stock, price, discount, description, uname, category) VALUES ('$name', '$stock', '$price', '$discount', '$description', '$uname', '$category')";
                    $r = mysqli_query($dbc, $q);
                    //echo mysqli_error($dbc)."<br>".$q;

                    if ($r)
                        echo "Successfully listed product";
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
						<div style = "word-wrap: break-word; width: 500px; font-size:25px; margin:10px; color:white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000; padding: 0px 150px"><p>Product Information:</p>
						<col style="width: 150px;">
						<col style="width: 150px;">
						<tr>
							<td>Product Name:</td>
							<td><input  type="text" name="name" value=
								<?php if (isset($_POST['name'])) echo $_POST['name'] ?> ></td>
						</tr>
						<tr>
							<td>Description:</td>
							<td> <textarea class="FormElement" name="description" id="term" style="border: 1px dotted black; width: 204px; height: 140px; border:"></textarea></td>
						</tr>

						<tr>
							<td>Price:</td>
							<td><input type="price" name="price" value =
							<?php if (isset($_POST['price'])) echo $_POST['price'] ?>></td>
						</tr>
						<tr>
							<td>Quantity:</td>
							<td><input type="text" name="stock" value=
								<?php if (isset($_POST['stock'])) echo $_POST['stock'] ?> ></td>
						</tr>
						<tr>
							<td>Discount:</td>
							<td><input type="text" name="discount" value=
								<?php if (isset($_POST['discount'])) echo $_POST['discount'] ?> ></td>
						</tr>
                            <tr>
                                <td>Category:
                                    <select name="category">
                                        <?php
                                        include("connection.php");
                                        $q = "SELECT category_name FROM category";
                                        $r = mysqli_query($dbc, $q);
                                        //$row = mysqli_fetch_assoc($r);
                                        //for ($i = $row['category_name']; $i <= $stock_num; $i++) :
                                        while($row = mysqli_fetch_array($r))
                                        {
                                            $category = $row['category_name'];
                                            echo "<option value='$category'>".$category."</option>";


                                        }
                                        menu($category, "category", $_POST['category']);
                                        ?>
                                    </select>

                                </td>
                            </tr>


					</table>
                        <div style="padding: 0px 300px" >

                            <input  type="submit" name="button1" value="Item Listing">
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