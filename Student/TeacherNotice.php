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
		.main{min-height:580px;background:#444;}
		.header h2,.footer h2 {margin:0 auto;}
		</style>
</head>
<body>
<div class="phpcoding">
<section class="header">
	<h2> Teacher Notice </h2>
</section>
<section class="main">
		<?php
			echo "<table border='5' BORDERCOLOR=#FC8C41>
									<tr>
										<td><span style='color:#FC8C41 '><b>NAME</b></span></td>
										<td><span style='color:#FC8C41 '><b>Notice</b></span></td>
										</tr>
									";
							$file = fopen("dbNotice.txt", "r");

							while(!feof($file)) {
								
									$name;
									$notice;	
								$teacherDataString = fgets($file);
								
								if (!$teacherDataString) continue;

								$studentData = json_decode($teacherDataString, true);
									$name= 	$studentData["name"];
									$notice= $studentData["notice"];
									
									echo "<tr>
												<td><span style='color:#2BD790 '>".$name."</span></td>
												<td><span style='color:#2BD790 '>".$notice."</span></td>
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
								</tr>
							</table>
</section>
	
<section class="footer">
	<h2> <?php echo $_SERVER['PHP_SELF'] ; ?> </h2>
</section>
</div>
</body>

</html>
