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
		.header h2,.footer h2 {margin:0 auto; text-align:center;}
		</style>
</head>
<body>
<div class="phpcoding">
<section class="header">
	<h2> <?php echo "<b>".$_SESSION['fname']."'s PROFILE</b>" ;?> </h2>
</section>
<section class="main">
			</br></br></br>
			<table color:#FC8C41>
			<tr>
					<td ><span style=color:#FC8C41><b>FULL NAME :</b></span></td>
					<td></td><td></td><td></td>
					<td><span style=color:#FC8C41><?php echo "<b>".$_SESSION['fname']."</b>";?></span></td>
			</tr>
			
			<tr>
					<td ><span style=color:#FC8C41><b>NICK NAME :</b></span></td>
					<td></td><td></td><td></td>
					<td><span style=color:#FC8C41><?php echo "<b>".$_SESSION['nname']."</b>";?></span></td>
			</tr>
			
			<tr>
					<td ><span style=color:#FC8C41><b> GENDER :</b></span></td>
					<td></td><td></td><td></td>
					<td><span style=color:#FC8C41><?php echo "<b>".$_SESSION['gender']."</b>";?></span></td>
			</tr>
			
			<tr>
					<td ><span style=color:#FC8C41><b> EDUCATION :</b></span></td>
					<td></td><td></td><td></td>
					<td><span style=color:#FC8C41><?php print_r ($_SESSION['education']);?></span></td>
			</tr>
			
			</table>
			
			</br></br>
			<a href="Home.php"><span style=color:#FC8C41><b>BACK</b></span></a>
				
		
</section>
	
<section class="footer">
	<h2><?php echo $_SERVER['PHP_SELF'] ; ?> </h2>
</section>
</div>
</body>

</html>
