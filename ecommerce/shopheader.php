<html>
<body>

<div id = "header">
    <h2> Amazoff </h2>
    <h1> Premier Buying & Selling Marketplace</h1>
   <link href= "shopsty.css" type="text/css" rel="stylesheet"/> 
</div>


<?php
    include("connection.php");

?>

<div id = "navigation">
        <div>
            <div class="content"><a href = "home.php" style="color:white">Home</a></div>
            <div class="content"><a href = "buy.php" style="color:white">Full Catalogue</a></div>
            
             <div class="content3">
            <div style = "padding-top: 5px">
                <form   id = "f1" name = "form1" method="post" action="results.php" >
                    <input  type="text" name="name">
                      <input  form = "f1" type="submit" name="submit" value="Search">
                </form>
        </div>
            </div>
        <div class="content3">
               <div style = "padding-top: 5px">
        <form action="catresults.php" method="get">
            <select name="category">
                <?php
                include("connection.php");
                $q = "SELECT category_name FROM category";
                $r = mysqli_query($dbc, $q);
                while($row = mysqli_fetch_array($r))
                {
                    $category = $row['category_name'];
                    echo "<option value='$category'>".$category."</option>";
                }

                ?>
            </select>
            <input type='hidden' name='action' value='category_result' />
            <input type="submit" value="Submit" />
        </form>
            </div>
            </div>    
    <div>
        <?php
        if(!isset($_COOKIE['uname'])){
            echo'<div class="content2"><a href = "log_in.php" style="color:white">Log In</a></div>';
        }
        else if(isset($_COOKIE['uname'])){
            echo'<div id="bar" class="content3"></div>';
            echo'<div class="content"><a href = "my_items.php" style="color:white">My Items</a></div>';
            echo'<div class="content"><a href = "sell.php" style="color:white">Sell Item</a></div>';    
            echo'<div class="content"><a href = "sold_items.php" style="color:white">Sold Items</a></div>';
            echo'<div class="content"><a href = "cart.php" style="color:white">My Cart</a></div>';
			echo'<div class="content"><a href = "order_status.php" style="color:white">Order Status</a></div>';
            echo'<div class="content2"><a href = "log_out.php" style="color:white"> Log Out </a></div>';
        }
            ?>
                 </div>
        <div class="content2"><a href = "support.php" style="color:white">Support</a></div>

</div>
    </div>

</body>
</html>