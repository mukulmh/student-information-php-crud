<abbr title="back"><a href="update.php"><img src="files/back.png" height="20px" width="20px"></a></abbr> <br><br>

<?php session_start() ?>
<?php
include ('header.php');
if(!isset($_SESSION['loggedInID'])){
    header("Location:login.php"); 
	} 
?>

<?php

    $con=mysqli_connect('localhost','root','','mukul');
	
	if (isset($_GET['upd'])) {
		$sl = $_GET['upd'];
		
		$show = "SELECT * from informations WHERE sl='$sl'";
		$data = mysqli_query($con,$show);
	}
	$row=mysqli_fetch_assoc($data);
?>
<html>
<head>
<title>Update information</title>
</head>

<body>
	<h2>Update student informations</h2>
	<div >
		<form name="update" action="update.php?upd=<?php echo $row['sl']; ?>" method="post" enctype='multipart/form-data'>
			<input type="hidden" name="sl" value="<?php echo $sl; ?>">
			Student ID : <br>
			<input type="text" name="sid" placeholder="Type your ID" value="<?php echo $row["id"];?>" required> <br> <br>
			Name : <br> 
			<input type="text" name="sname" placeholder="Type your name" value="<?php echo $row["name"];?>" required> <br> <br>
			Age : <br>
			<input type="text" name="age" placeholder="Type your Age" value="<?php echo $row["age"];?>" required> <br> <br>
			Gender : <br>
			<input type="text" name="gender" placeholder="Choose your gender" value="<?php echo $row["gender"];?>" required> <br> <br>
			Country :
			<select name="country" required value="<?php echo $row["country"];?>">
			<option selected disabled> Select an option</option>
			<option value="Bangladesh"> Bangladesh</option>
			<option value="India"> India</option>
			<option value="Pakistan"> Pakistan</option>
			<option value="Others"> Others</option>
			</select><br> <br>
			Upload Image: 
			<input type="file" name="image">
			<br> <br>
			Upload Video: 
			<input type="file" name="video">
			<br> <br>
			<input type="submit" name="upd" value="Update"> 
		</form>
	</div>
</body>

</html>