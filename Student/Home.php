<?php
	$fonts= "verdana";
	session_start();
	if(!isset($_SESSION['nname'])){  
		header("location: index.php");
	}
?>

<html>
<head>
		<title>Home page</title>
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
	<h2> Welcome <?php echo $_SESSION['fname'].","; ?> to your HOME PAGE </h2>
</section>
<section class="main">

		<a href="Profile.php"> <p style="text-align:center">PROFILE</p></a>
		
		<a href="StudentList.php"> <p style="text-align:center">STUDENT LIST</p></a>
		
		<a href="Query.php"> <p style="text-align:center">QUERY</p></a>
		
		<a href="StudentNotes.php"> <p style="text-align:center">STUDENT NOTES</p></a>
		
		
		<a href="RegistrationRules.php"> <p style="text-align:center">REGISTRATION RULES</p></a>
		</br>
		<a href="TeacherAvailableTime.php"> <p style="text-align:center"> Teacher Available Time </p></a>
		
		<a href="TeacherNotice.php"> <p style="text-align:center"> Teacher Notice </p></a>
		
		<a href="TeacherNotes.php"> <p style="text-align:center"> Teacher Notes </p></a>
		
		<a href="TeacherAvailableTime.php"> <p style="text-align:center">Teacher's Rating</p></a>
		
		<a href="SubmitExam.php"> <p style="text-align:center">Submit Exam</p></a>
		</br>
		
		<a href="TP_Tuition.php"> <p style="text-align:center">Request Tuition Provider for Tuition</p></a>
		</br>
		<a href="Logout.php"> <p style="text-align:center">LOG OUT</p></a>
		</br>
		
</section>
	
<section class="footer">
	<h2><?php echo $_SERVER['PHP_SELF'] ; ?></h2>
</section>
</div>
</body>

</html>
