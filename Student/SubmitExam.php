<?php
	$fonts= "verdana";
	session_start();
	if(!isset($_SESSION['nname'])){  
		header("location: index.php");
	}
	$ques;
?>

<html>
<head>
		<title>PHP SYNTEX</title>
		<style>
		body{font-family:$fonts;}
		.phpcoding{width:1500px ;margin: 10; background:#ddd;}
		.header,.footer {background:#444;color:#FC8C41 ;text-align:center;padding: 10px;}
		.main{min-height:580px; background:#444;}
		.header h2,.footer h2 {margin:0 auto;}
		</style>
</head>
<body>
<div class="phpcoding">
<section class="header">
	<h2> Exam paper </h2>
</section>
<section class="main">
			<form action=<?php echo $_SERVER['PHP_SELF']; ?> method="post">
				<?php		
							echo "<table  BORDERCOLOR=#FC8C41>
									<tr>
										<td><span style='color:#FC8C41 '><b>id</b></span></td>
										<td><span style='color:#FC8C41 '><b>category</b></span></td>
										<td><span style='color:#FC8C41 '><b>subject</b></span></td>
										<td><span style='color:#FC8C41 '><b>ques</b></span></td>
										<td><span style='color:#FC8C41 '><b>ANSWER</b></span></td>
										</tr>
									";
							$file = fopen("dbques.txt", "r");

							while(!feof($file)) {
								
									$id;
									$category;	
									$subject;
									$ques;
								$teacherDataString = fgets($file);
								
								if (!$teacherDataString) continue;

								$studentData = json_decode($teacherDataString, true);
									$id= 	$studentData["id"];
									$category= $studentData["category"];
									$subject= 	$studentData["subject"];
									$ques= 	$studentData["ques"];
									
									echo "<tr>
												<td><span style='color:#2BD790 '>".$id."</span></td>
												<td><span style='color:#2BD790 '>".$category."</span></td>
												<td><span style='color:#2BD790 '>".$subject."</span></td>
												<td><span style='color:#2BD790 '>".$ques."</span></td>
												<td><textarea name='ans' rows='5' cols='20' required></textarea></td>
												";
								
							}
							echo "</table>";

							fclose($file);
		?>
							</br></br>
							<table>
								<tr>
								</tr>
								<tr>
									<td><a href="Home.php"><span style='color:#F4FF09'><h3>back</h3></span></a></td>
									<td></td>
								</tr>
								<tr>
									<td><input type="submit" name="submit" value="Submit" /></td>
								</tr>
							</table>
						</form>
						
						
						<?php
					if($_SERVER["REQUEST_METHOD"] == "POST" )
						{
								$nname=	$_SESSION['nname'];
								$ans=	$_POST["ans"];
						
								$data = [
									'nname'=> $_SESSION['nname'],
									'ques' => $ques,
									'ans' => $ans
								];
								
								$encodedData = json_encode($data);
								$file = fopen('dbans.txt', 'a');
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
