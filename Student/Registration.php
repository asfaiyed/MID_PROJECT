<?php
	$fonts= "verdana";
	session_start();
	if(isset($_SESSION['nname'])){  
		header("location: Home.php");
	}
	$errmassage="";
		if($_SERVER["REQUEST_METHOD"] == "POST" )
					{
						if(empty($_POST['fname']) or empty($_POST['nname']) or empty($_POST['password']) )
							{
								
								$errmassage="<span style='color:red'>** field can not be empty</span>";
							}
					}
?>

<html>
<head>
		<title>PHP SYNTEX</title>
		<style>
		body{font-family:$fonts;}
		.phpcoding{width:1500px ;margin: 10; background:#ddd;}
		.header,.footer {background:#444;color:#FC8C41 ;text-align:center;padding: 10px;}
		.main{min-height:580px;text-align:center;}
		.header h2,.footer h2 {margin:0 auto;}
		</style>
</head>
<body>
<div class="phpcoding">
<section class="header">
	<h2>WELCOME To The Registration PAGE </h2>
</section>
<section class="main">
		
		<html>
			<head>
				<title><b>Registration</b></title>
			</head>
			<body>
				<form action=<?php echo $_SERVER['PHP_SELF']; ?> method="post">
					<table>
					<p style="color:red" align=left>** Requirement of the field <a href="RegistrationRules.php">RULES</a></p>
					<tr>
						<td><b>Full NAME</b></td>
						<td><input type="text" name="fname" value=""/><?php echo "<b>".$errmassage."</b>"; ?></td>
					</tr>
					<tr>
						<td> </td>
						<td> </td>
					</tr>
					<tr>
						<td> </td>
						<td> </td>
					</tr>
					<tr>
					<td><b>Nick NAME</b></td>
					<td><input type="text" name="nname" value=""/><?php echo "<b>".$errmassage."</b>"; ?></td>
					</tr>
					<tr>
						<td> </td>
						<td> </td>
					</tr>
					<tr>
						<td> </td>
						<td> </td>
					</tr>
					<tr>
					<td><b>Password</b></td>
					<td><input type="password" name="password" value="" /><?php echo "<b>".$errmassage."</b>"; ?></td>
					</tr>
					<tr>
						<td> </td>
						<td> </td>
					</tr>
					<tr>
						<td></td>
						<td></td>
					</tr>
					<tr>
					<td><b>GENDER</b></td>
					<td><input type="radio" name="gender" value="M" required/>Male
						<input type="radio" name="gender" value="F" />Female
						<input type="radio" name="gender" value="O" />Other
					</td>
					</tr>
					<tr>
						<td> </td>
						<td> </td>
					</tr>
					<tr>
						<td> </td>
						<td> </td>
					</tr>
					<tr>
					<td><b>EDUCATION</b></td>
					<td><input type="checkbox" name="education[]" value="ssc" required/>S.S.C.
						<input type="checkbox" name="education[]" value="hsc" />H.S.C
						<input type="checkbox" name="education[]" value="bsc" />B.SC.
					</td>
					</tr>
					<tr>
						<td> </td>
						<td> </td>
					</tr>
					<tr>
						<td> </td>
						<td> </td>
					</tr>
					<tr>
					<td><input type="submit" name="Registration" value="Submit" /></td>
					<td><a href="index.php">LogIn page</a> </td>
					<tr>
					</table>
				</form>
			</body>
		</html>
		<?php
				if($_SERVER["REQUEST_METHOD"] == "POST" )
					{
						
						$fname=		Validation($_POST["fname"]);
						$nname=		Validation($_POST["nname"]);
						$pass=		Validation($_POST["password"]);
						$gender=	Validation($_POST["gender"]);
						$education=	$_POST["education"];
						
						if(str_word_count($fname)<2)
							{
								$fname="";
								echo "<table align='center' border='1' color='black'>
									<tr>
									<td width=300px text-align:center><span style='color:red'><b>FULL NAME:you have to use your full name which contains minimum 2 WORDS!!</b></span></td>
									</tr>
									</table>";
							}
						else if(strlen($pass) < 5)
							{
								echo "<table align='center' border='1' color='black'>
									<tr>
									<td width=300px text-align:center><span style='color:red'><b>PASSWORD:you have to use atleast 5 character!!</b></span></td>
									</tr>
									</table>";
							}
						else if(nickname($nname))
							{
								echo "<table align='center' border='1' color='black'>
									<tr>
									<td width=300px text-align:center><span style='color:red'><b>Nick Name:you have to submit a unique name!!</b></span></td>
									</tr>
									</table>";
							}
						else if(nickname2($nname))
							{
								echo "<table align='center' border='1' color='black'>
									<tr>
									<td width=300px text-align:center><span style='color:red'><b>NICK NAME:you have to submit only 1 word!!</b></span></td>
									</tr>
									</table>";
							}
						else
							{
								
								
								$data = [
									'fname' => $fname,
									'nname' => $nname,
									'password' => md5($pass),
									'gender' => $gender,
									'education' => $education
								];
								
								$encodedData = json_encode($data);
								$file = fopen('db.txt', 'a');
								fwrite($file, $encodedData . PHP_EOL);
								echo "</br></br>";
								echo "<table align='center' border='1' color='black'>
									<tr>
									<td width=300px text-align:center><span style='color:green'><b>You have Completed Your Registration.</br>Your user name is ".$nname." !!</b></span></td>
									</tr>
									</table>";
								fclose($file);
							}
							
					}
					function Validation($data)
						{
							$data=trim($data);
							
							$data=htmlspecialchars($data);
							return $data;
							
						}
						
					function nickname($data)
						{
								$file = fopen("db.txt", "r");
                          
							while(!feof($file)) {
								$studentDataString = fgets($file);
								
								if (!$studentDataString) continue;

								$studentData = json_decode($studentDataString, true);
								
								
								if ($data == $studentData['nname'] ) 
									{
										return true;
									}
									
								else
									{
										return false;
									}
							}
							

							fclose($file);
						}
						function nickname2($data)
							{
								if(str_word_count($data)>1)
									{
										return true;
									}
								else
									{
										return false;
									}
							}
				
		?>
		
		
</section>
	
<section class="footer">
	<h2><?php echo $_SERVER['PHP_SELF'] ; ?></h2>
</section>
</div>
</body>

</html>
