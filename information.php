<abbr title="back"><a href="home.php"><img src="files/back.png" height="20px" width="20px"></a></abbr> <br><br>
<?php session_start() ?>
<?php
include ('header.php');
if(!isset($_SESSION['loggedInID'])){
    header("Location:login.php"); 
	} 
?>

<?php
	$con=mysqli_connect('localhost','root','','mukul');
	$sql = "select * from informations";
	$data = mysqli_query($con,$sql);
?>
<html>
<head>
	<title>Information</title>
</head>
</html>
<h2>View student informations</h2>
<table border="1">

<button onclick="myFunction()">Print this page</button>

<script>
function myFunction() {
window.print();
}
</script>
<br></br>

<th>ID</th>
<th>Name</th>
<th>Age</th>
<th>Gender</th>
<th>Country</th>
<th>Image</th>
<th>Video</th>

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
	</tr>
<?php
	}
?>

</table>