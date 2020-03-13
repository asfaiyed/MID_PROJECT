<?php

	session_start();
	if(!isset($_SESSION['nname'])){  
		header("location: index.php");
	}
	

?>


<?php
	$fonts= "verdana";
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
	<h2> LOGOUT </h2>
</section>
<section class="main">
		</br></br></br></br>
		<table border="1" align=center >
		<tr>
			<td width=300 height=140 ><span style='color:red'><b>DO YOU WANT TO LOGOUT</b></span></td>
		</tr>
		</table>
		<table align=center>
		<tr>
		<td><a href="LogCheck.php"><b>YES</b></td>
		<td><a href="Home.php"><b>NO</b></td>
		</tr>
		</table>
		
</section>
	
<section class="footer">
	<h2> <?php echo $_SERVER['PHP_SELF'] ; ?> </h2>
</section>
</div>
</body>

</html>
