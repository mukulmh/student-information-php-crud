<?php session_start() ?>
<?php
if(!isset($_SESSION['loggedInID'])){
    header("Location:login.php"); 
	} 
?>

<abbr title="Back"><a href="information.php"><img src="files/back.png" height="20px" width="20px"></a></abbr>
<br><br>
<?php
	include ('header.php');
	$con=mysqli_connect('localhost','root','','mukul');
	
	if (isset($_GET['del'])) {
		$sl = $_GET['del'];
		
		$delete = "DELETE FROM informations WHERE sl='$sl'";
		$query = mysqli_query($con,$delete);
		if($query){
			echo"<h2>Delete successful!</h2>";
		}
	}
?>

<?php
	$sql = "select * from informations";
	$data = mysqli_query($con,$sql);
?>
<html>
<head>
	<title>Delete Information</title>
</head>
</html>
<h2>Delete student informations</h2>
<table border="1">
<th>ID</th>
<th>Name</th>
<th>Age</th>
<th>Gender</th>
<th>Country</th>
<th>Image</th>
<th>Video</th>
<th>Action</th>

<?php
	while($row=mysqli_fetch_assoc($data))
	{
?>
	<tr>
		<?php
		$imglocation= $row["imglocation"];
		$vidlocation= $row["vlocation"];
		?>
		<td><?php echo $row["id"];?></td>
		<td><?php echo $row["name"];?></td>
		<td><?php echo $row["age"];?></td>
		<td><?php echo $row["gender"];?></td>
		<td><?php echo $row["country"];?></td>
		<td><?php echo "<img src='".$imglocation."'width='300px' height='150px' >";?></td>
		<td><?php echo "<video src='".$vidlocation."' controls width='300px' height='150px' >";?></td>
		<td style="text-align: center"><abbr title="Delete"><a href="delete.php?del=<?php echo $row['sl']; ?>"><img src="files/delete1.png" height="40px" width="40px"></a></abbr><br><b>Delete</b></td>
	</tr>
<?php
	}
?>

</table>