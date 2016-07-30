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
        error_reporting(0);
        if(isset($_COOKIE['uname'])) header ('LOCATION: home.php');

		//when the form in this page is submitted
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
		
			if(isset($_POST['Button1']))
			{
					$uname = $_POST['uname1'];
					$psword = $_POST['psword1'];
		
					
					//define an array of error
					$error = array();
				
					if (empty($uname)){
						$error[] = '<p style="color: white">"You forgot to enter user name."</p>';
					}
					if (empty($psword)){
						$error[] ='<p style="color: white"> "You forgot to enter password."</p>';
					}
				
					//check to see if anything in $error.
					//if there are, output them.
					if (empty($error)){
						include("connection.php");					
						$q = "SELECT * FROM eusers WHERE uname = '$uname'";
					
						$r = mysqli_query($dbc, $q);
					
						if (mysqli_num_rows($r) == 1){
							$row = mysqli_fetch_array($r);
					
							if ($psword == $row['psword']){
                                if($row['approved']==0)
                                {
                                    echo '<p style="color: white">"You are not an approved user yet"</p>';
                                }
                                else {
                                    date_default_timezone_set(America/New_York);
                                    if ($row['login_attempts'] == 3) {
                                        if (time() < strtotime($row['lockoutTS'] . 'EDT') + 60) {
                                            echo '<p style="color: white">"You are still locked out for "</p>';
                                            echo (strtotime($row['lockoutTS'] . 'EDT') + 60) - time();
                                            echo " seconds";
                                        }
                                        else
                                        {
                                            $q = "UPDATE eusers SET login_attempts = 0, lockoutTS = 0 WHERE uname = '$uname'";
                                            $y = mysqli_query($dbc, $q);
                                            setcookie('uname', $uname, time()+1000);
                                            setcookie('fname', $row['fname'], time()+1000);
                                            header ("LOCATION: home.php");

                                        }
                                    }
                                    else
                                    {
                                        $c = "UPDATE eusers SET login_attempts = 0, lockoutTS = 0 WHERE uname = '$uname'";
                                        $v = mysqli_query($dbc, $c);
                                        setcookie('uname', $uname, time()+1000);
                                        setcookie('fname', $row['fname'], time()+1000);
                                        header ("LOCATION: home.php");


                                    }
                                }

							}
							else
                            {
                                if($row['login_attempts']<2)
                                {
                                    echo '<p style="color: white">"Incorrect Password"</p>';
                                    $b = "UPDATE eysers SET login_attempts = login_attempts+1 WHERE uname = '$uname'";
                                    $n = mysqli_query($dbc, $b);
                                }
                                if($row['login_attempts'] == 2)
                                {
                                    echo "You are now locked out for 1 minute.";
                                    $w = "UPDATE eusers SET login_attempts = login_attempts+1, lockoutTS = now() WHERE uname = '$uname'";
                                    $p = mysqli_query($dbc, $w);
                                }
                            }

						} 
						else {
					 		echo '<p style="color: white">"Unknown username."</p>';
						}	 
					}
					else {
						foreach ($error as $msg){
							echo $msg;
						}
					
			  }
			  }
			//make sure all fields are entered
			//two passwords are the same
			if(isset($_POST['Button2']))
			{
				$uname = $_POST['uname2'];
				$psword = $_POST['psword2'];
				$psword2 = $_POST['psword3'];
				$fname = $_POST['fname'];
				$lname = $_POST['lname'];
				$address = $_POST['address'];
				$city = $_POST['city'];
				$state = $_POST['state'];
				$zipcode = $_POST['zipcode'];
				$email = $_POST['email'];
				$phone = $_POST['phone'];
			
				//$role = 'Student';
		
				$error = array();
							if(empty($uname)) 
								$error[] = '<p style="color: white">"You forgot to enter user name."</p>'; 
							if(empty($psword))
								$error[] = '<p style="color: white">"You forgot to enter password."</p>';
							//if(!preg_match(range('A','Z'), $psword))
								//$error[] = "You forgot to add a letter to the password.";
							if(empty($fname))
								$error[] = '<p style="color: white">"You forgot to enter a first name."</p>';
							if(empty($lname))
								$error[] = '<p style="color: white">"You forgot to enter a last name."</p>';
							if(empty($address))
								$error[] = '<p style="color: white">"You forgot to enter an address."</p>';
							if(empty($city))
								$error[] = '<p style="color: white">"You forgot to enter a city."</p>';
							if(empty($state))
								$error[] = '<p style="color: white">"You forgot to enter a state."</p>';
							if(empty($email))
								$error[] ='<p style="color: white">"You forgot to enter an email."</p>';
							if(empty($phone))
								$error[] = '<p style="color: white">"You forgot to enter a phone number."</p>';
			
			
				if(empty($error)){
								if($psword == $psword2)
									{
									
										//DB connection
										include("connection.php");	
			
										//define a query		
										$q = "INSERT INTO eusers (uname, psword, fname, lname, address, city, state, zip, email, phone) VALUES 
										('$uname',
										 '$psword',
										 '$fname', 
										 '$lname',
										 '$address',
										 '$city',
										 '$state',
										 '$zipcode',
										 '$email',
										 '$phone')";

										//execute the query
										$r = mysqli_query($dbc, $q);
										if ($r) 
											echo '<p style="color: white">"Thank you for registering! "</p>';
									
									}
								else
								{
									echo '<p style="color: white">"Sorry, but something is wrong with the system."</p>';		
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
		}
	?>
		
		
		
		
		
		
		
		<div style="text-align:center; color: white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000;  font-size:20px; padding-top:30px"><h3>Welcome to Amazoff, The Internets Newest Premier Buy & Sell Marketplace!</h1></div>
		<div id="tablelog">
		<table style = "padding: 10px 10px 10px 10px">
		<tr>
			<td>
					<form acton="" method="POST">
					   <table style="padding: 20px 100px">
						<div style = "word-wrap: break-word; color: white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000;  width: 500px; font-size:25px; margin:10px; padding: 0px 50px"><p>Already Registered User? Log in:</p>
							<tr>
								<td style ="color: white;text-shadow:
                                -1px -1px 0 #000,
                                1px -1px 0 #000,
                                -1px 1px 0 #000,
                                1px 1px 0 #000; ">Username:</td>
								<td><input type="text" name="uname1" value =<?php if(isset($_POST['uname'])) echo $_POST['uname']; ?>  ></td>
							</tr>
							<tr>
								<td style ="color: white;text-shadow:
                                -1px -1px 0 #000,
                                1px -1px 0 #000,
                                -1px 1px 0 #000,
                                1px 1px 0 #000; ">Password:</td>
								<td><input type="password" name="psword1" /></td>
							</tr>   
					   </table>
                           
					   <div style="padding: 0px 200px">
							<input type="submit" name="Button1" value="Log in" />	
					   </div>
					</form>
                        <center><div style="padding-right:100px">  <a href="forgot_password.php">Forgot your password?</a></div></center>
			</td>
			
			<td>
					<form action="", method = "POST">
					<table style="padding: 20px 100px">
						<div style = "word-wrap: break-word; width: 500px; color: white;text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000;  font-size:25px; margin:10px; padding: 0px 150px"><p>New User? Register Here:</p>
						<col style="width: 150px;">
						<col style="width: 150px;">
						<tr>
							<td style ="color: white; text-shadow:
                            -1px -1px 0 #000,
                            1px -1px 0 #000,
                            -1px 1px 0 #000,
                            1px 1px 0 #000; ">Username:</td>
							<td><input type="text" name="uname2" value=
								<?php if (isset($_POST['uname'])) echo $_POST['uname'] ?> ></td>
						</tr>
						<tr>
							<td style ="color: white;text-shadow:
                            -1px -1px 0 #000,
                            1px -1px 0 #000,
                            -1px 1px 0 #000,
                            1px 1px 0 #000; ">Password:</td>
							<td><input type="password" name="psword2" /></td>
						</tr>
						<tr>
							<td style ="color: white; text-shadow:
                            -1px -1px 0 #000,
                            1px -1px 0 #000,
                            -1px 1px 0 #000,
                            1px 1px 0 #000; ">Confirm Password:</td>
							<td><input type="password" name="psword3" /></td>
						</tr>
						<tr>
							<td style ="color: white;text-shadow:
                            -1px -1px 0 #000,
                            1px -1px 0 #000,
                            -1px 1px 0 #000,
                            1px 1px 0 #000; ">First Name:</td>
							<td><input type="text" name="fname" value=
								<?php if (isset($_POST['fname'])) echo $_POST['fname'] ?> ></td>
						</tr>
						<tr>
							<td style ="color: white;text-shadow:
                            -1px -1px 0 #000,
                            1px -1px 0 #000,
                            -1px 1px 0 #000,
                            1px 1px 0 #000; ">Last Name:</td>
							<td><input type="text" name="lname" value=
								<?php if (isset($_POST['lname'])) echo $_POST['lname'] ?> ></td>
						</tr>
						<tr>
							<td style ="color: white;text-shadow:
                            -1px -1px 0 #000,
                            1px -1px 0 #000,
                            -1px 1px 0 #000,
                            1px 1px 0 #000; ">Address:</td>
							<td><input type="text" name="address" value=
								"<?php if (isset($_POST['address'])) echo $_POST['address'] ?> "></td>
						</tr>
						<tr>
							<td style ="color: white;text-shadow:
                            -1px -1px 0 #000,
                            1px -1px 0 #000,
                            -1px 1px 0 #000,
                            1px 1px 0 #000; ">City:</td>
							<td><input type="text" name="city" value=
								"<?php if (isset($_POST['city'])) echo $_POST['city'] ?> "></td>
						</tr>
						<tr>
							<td style ="color: white;text-shadow:
                            -1px -1px 0 #000,
                            1px -1px 0 #000,
                            -1px 1px 0 #000,
                            1px 1px 0 #000; ">State:</td>
							<td>
								<input type="text" name="state" value=
								"<?php if (isset($_POST['state'])) echo $_POST['state'] ?>"> 
							</td>
						</tr>	
						<tr>
							<td style ="color: white;text-shadow:
                            -1px -1px 0 #000,
                            1px -1px 0 #000,
                            -1px 1px 0 #000,
                            1px 1px 0 #000; ">Zip Code:</td>
							<td>
								<input type="text" name="zipcode" value=
								<?php if (isset($_POST['zipcode'])) echo $_POST['zipcode'] ?> >
							</td>
						</tr>
						<tr>
							<td style ="color: white;text-shadow:
                            -1px -1px 0 #000,
                            1px -1px 0 #000,
                            -1px 1px 0 #000,
                            1px 1px 0 #000; ">Email:</td>
							<td><input type="text" name="email" value=
								<?php if (isset($_POST['email'])) echo $_POST['email'] ?> ></td>
						</tr>	
						<tr>
							<td style ="color: white;text-shadow:
                            -1px -1px 0 #000,
                            1px -1px 0 #000,
                            -1px 1px 0 #000,
                            1px 1px 0 #000; ">Phone:</td>
							<td><input type="text" name="phone" value=
								<?php if (isset($_POST['phone'])) echo $_POST['phone'] ?> ></td>
						</tr>	
								
					</table>
					<div style="padding: 0px 300px" >
						<input type="submit" name = "Button2" value="Register" />
					</div>


					</form>
			</td>
		</tr>	
		</table>
	</div>
        </div>
    </div>
	<div id = "footer">
		<p style = "padding:5px 5px 5px 5px">Copyright 2015 Nico Flora & Richard Alindogan</p>
	</div>
	
</body>
</html>