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
		.main{min-height:580px; background:#444; }
		.header h2,.footer h2 {margin:0 auto;}
		</style>
</head>
<body>
<div class="phpcoding">
<section class="header">
	<h2> SSC COMPLETED STUDENTS </h2>
</section>
<section class="main">
		<?php
				echo "<table border='5' BORDERCOLOR=#FC8C41>
									<tr>
										<td><span style='color:#FC8C41 '><b>FULL NAME</b></span></td>
										<td><span style='color:#FC8C41 '><b>NICK NAME</b></span></td>
										<td><span style='color:#FC8C41 '><b>GENDER</b></span></td>
										
										</tr>
									";
							$file = fopen("db.txt", "r");
							while(!feof($file)) {
									$nname;
									$fname;
									$education;
									$gender;
								$studentDataString = fgets($file);
								
								if (!$studentDataString) continue;

								$studentData = json_decode($studentDataString, true);
									$nname= $studentData['nname'];
									$fname= $studentData['fname'];
									$education= $studentData['education'];
									$gender= $studentData['gender'];
								
								foreach($education as $value)
									{
										if($value=="ssc")
											{
												echo "<tr>
												<td><span style='color:#2BD790 '>".$fname."</span></td>
												<td><span style='color:#2BD790 '>".$nname."</span></td>
												<td><span style='color:#2BD790 '>".$gender."
												</span></td></tr>
												";
											}
											
									
									}
									
								
							}
							
							echo "</table>";
							fclose($file);
						
							
					?>
					<a href="StudentList.php"><span style='color:#F4FF09'><b>back</b></span></a>
</section>
	
<section class="footer">
	<h2> <?php echo $_SERVER['PHP_SELF'] ; ?> </h2>
</section>
</div>
</body>

</html>
