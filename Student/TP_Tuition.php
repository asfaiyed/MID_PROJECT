<?php
	$fonts= "verdana";
	session_start();
	if(!isset($_SESSION['nname'])){  
		header("location: index.php");
	}
?>

<html>
<head>
		<title>PHP SYNTEX</title>
		<style>
		body{font-family:$fonts;}
		.phpcoding{width:1500px ;margin: 10; background:#ddd;}
		.header,.footer {background:#444;color:#FC8C41 ;text-align:center;padding: 10px;}
		.main{min-height:580px;}
		.header h2,.footer h2 {margin:0 auto;}
		</style>
</head>
<body>
<div class="phpcoding">
<section class="header">
	<h2> Request Tution provider</h2>
</section>
<section class="main">
		
		<form action=<?php echo $_SERVER['PHP_SELF']; ?> method="post">
					<table>
					<tr>
					<td><b>Category(ssc,hsc,bsc):</b></td>
					<td><input type="text" name="category" value="" required/></td>
					</tr>
					<tr>
					<td><b>SUBJECT:</b></td>
					<td><input type="text" name="subject" value="" required/></td>
					</tr>
					<tr>
					<td><b>Preference Time:</b></td>
					<td><input type="text" name="time" value=""/></td>
					</tr>
					
					<tr>
					<td><input type="submit" name="submit" value="Submit" /></td>
					<td><a href="Home.php">back</a> </td>
					<tr>
					</table>
					</form>
					
					<?php
					if($_SERVER["REQUEST_METHOD"] == "POST" )
						{
							
								
								$category=	$_POST["category"];
								$subject=	$_POST["subject"];
								$time=		$_POST["time"];
						
								$data = [
									'nname' => $_SESSION['nname'],
									'category' => $category,
									'subject' => $subject,
									'time' => $time
									
								];
								
								$encodedData = json_encode($data);
								$file = fopen('dbTutionReqUp.txt', 'a');
								fwrite($file, $encodedData . PHP_EOL);
								echo "</br></br>";
								echo "<table align='center' border='1' color='black'>
									<tr>
									<td width=300px text-align:center><span style='color:green'><b>You have Completed Your submission!!</b></span></td>
									</tr>
									</table>";
									echo "</br>";
								fclose($file);
								
						}
					?>
		
		
		
</section>
	
<section class="footer">
	<h2> <?php echo $_SERVER['PHP_SELF'] ; ?> </h2>
</section>
</div>
</body>

</html>
