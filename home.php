<form action="function.php" method="post">
	<input type="submit" name="logout" value="Logout">
</form>
<?php session_start() ?>
<?php
if(!isset($_SESSION['loggedInID'])){
    header("Location:login.php"); 
	} 

include ('header.php');
?>

<html>
<head>
<title>Home Page</title>
</head>
<body>
	<h2>Add student information</h2>
	<div >
	<form name="registration" action="save.php" method="post" enctype='multipart/form-data'>
		Student ID : <br>
		<input type="text" name="sid" placeholder="Type your ID" required> <br> <br>
		Name : <br> 
		<input type="text" name="sname" placeholder="Type your name" required> <br> <br>
		Age : <br>
		<input type="text" name="age" placeholder="Type your Age" required> <br> <br>
		Gender : <br>
		<input type="radio" name="gender" value="Male" required>
		<label >Male</label><br>
		<input type="radio" name="gender" value="Female">
		<label >Female</label><br><br>
		Country : 
		<select name="country" required>
		<option selected disabled> Choose one</option>
		<option value="Bangladesh"> Bangladesh</option>
		<option value="India"> India</option>
		<option value="Pakistan"> Pakistan</option>
		</select>
		<br> <br>
		Upload Image: 
		<input type="file" name="image" value="upload" required><br><br>
		Upload Video: 
		<input type="file" name="video" value="upload" required><br><br>
		<input type="submit" name="sub" value="Submit"> 
	</form>
	</div>
	<br><br>
</body>
</html>