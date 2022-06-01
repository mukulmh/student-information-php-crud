<a href="information.php"><img src="files/back.png" height="20px" width="20px"></a>
<br><br>
<?php session_start() ?>
<?php
include ('header.php');
if(!isset($_SESSION['loggedInID'])){
    header("Location:login.php"); 
	} 
?>

<html>
<head>
	<title>Search Information</title>
	<?php
	$con=mysqli_connect('localhost','root','','mukul');
	?>
</head>

<body>
	<h2>Search student information</h2>
	<table>
		<tr>
			<td >
			<div align="center">
			<form action="" method="post">
				<input type="text" name="id" placeholder="Enter student id or name" required><br><br>
				<input type="submit" name="search1" value="Search">
			</form>
			</div>
			</td>
		</tr>
	</table>

	<?php
	if(isset($_POST['search1']))
	{
		$data=$_POST['id'];
		$sql="SELECT * FROM informations WHERE id='$data' or name='$data'";
		$query=mysqli_query($con,$sql);
		while ($row=mysqli_fetch_array($query))
		{
			?>
			<table border="1">
			<tr>
			<th>Student ID</th>
			<th>Name</th>
			<th>Age</th>
			<th>Gender</th>
			<th>Country</th>
			<th>Image</th>
			<th>Video</th>
			</tr>

			<tr>
			<?php
			$imglocation= $row["imglocation"];
			$vidlocation= $row["vlocation"];
			?>
			<td ><?php echo $row["id"]; ?> </td>
			<td ><?php echo $row["name"]; ?> </td>
			<td ><?php echo $row["age"]; ?> </td>
			<td ><?php echo $row["gender"]; ?> </td>
			<td ><?php echo $row["country"]; ?> </td>
			<td><?php echo "<img src='".$imglocation."'width='300px' height='150px' >";?></td>
			<td><?php echo "<video src='".$vidlocation."' controls width='300px' height='150px' >";?></td>
			</tr>

			</body>
			</table>
			<?php
		}
	}
	?>
</body>
</html>