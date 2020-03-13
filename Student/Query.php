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
		.main{min-height:580px;text-align:center}
		.header h2,.footer h2 {margin:0 auto;}
		</style>
</head>
<body>
<div class="phpcoding"><p style="text-align:center">
<section class="header">
	<h2> Query </h2>
</section>
<section class="main">
		
		<a href="GetQuery.php"><p style="text-align:center"><span style='color:#F4FF09'><h3>GET QUERY</h3></span></p></a>
		
		</br></br></br></br></br></br></br></br></br></br></br>
		<a href="UploadQuery.php"><p style="text-align:center"><span style='color:#F4FF09'><h3>Upload Query</h3></span></p></a>
		
			<table>
								<tr>
								</tr>
								<tr>
									<td><a href="Home.php"><span style='color:#FC8C41'><h3>back</h3></span></a></td>
								</tr>
							</table>
</section>
	
<section class="footer">
	<h2> <?php echo $_SERVER['PHP_SELF'] ; ?> </h2>
</section>
</div>
</body>

</html>
