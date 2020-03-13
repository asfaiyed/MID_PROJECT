<?php
	$fonts= "verdana";
	$Global['flag']=1;
	session_start();
	if(isset($_SESSION['nname'])){  
		header("location: Home.php");
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
	<h2> Welcome to Our Site </h2>
</section>
<section class="main">
		
		<html>
			<head>
				<title><b>Log IN</b></title>
			</head>
			<form action=<?php echo $_SERVER['PHP_SELF']; ?> method="post">
				<body>
					<h3>Nick NAME</h3>
					<input type="text" name="nname" value="arnob" required />
					<h3>Password</h3>
					<input type="password" name="password" value="12345" required />
					<br /><br />
					<input type="submit" name="Login" value="Login" />
					<a href="RegistrationRules.php">GO to Registration</a>
					<?php
						if ($_SERVER["REQUEST_METHOD"]=="POST")
						{
							$name = $_POST['nname'];
							$password = $_POST['password'];
							$file = fopen("db.txt", "r");

							while(!feof($file)) {
								
								$Global['flag']+=1;
								$studentDataString = fgets($file);
								
								if (!$studentDataString) continue;

								$studentData = json_decode($studentDataString, true);
								
								
								if ($name == $studentData['nname'] && md5($password) == $studentData['password']) {
									$Global['flag']=0;
									$_SESSION['fname']= $studentData['fname'];
									$_SESSION['gender']= $studentData['gender'];
									$_SESSION['education']= $studentData['education'];
									//echo "<span style='color:green'><h3>found!!</h3></span>";
									break;
								}
							}
							

							fclose($file);
						}
						
						if($Global['flag'] == 0)
							{
								
								
								$_SESSION['nname']= $_POST['nname'];
								
								header("location: Home.php");
								
								
								
							}
						else if($Global['flag'] > 1)
							{
								echo "</br></br>";
								echo "<table align='center' border='1' color='black'>
									<tr>
									<td width=300px text-align:center><span style='color:red'><b>NAME OR PASSWORD IS NOT CORRECT!!</b></span></td>
									</tr>
									</table>";
							}
							
					?>
					
					
				</body>
			</form>
		</html>
		
		
		

</section>	
<section class="footer">
	<h2><?php echo $_SERVER['PHP_SELF'] ; ?></h2>
</section>
</div>
</body>
</html>
