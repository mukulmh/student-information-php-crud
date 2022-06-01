<a href="information.php"><img src="files/back.png" height="20px" width="20px"></a>
<br> <br>
<?php session_start() ?>
<?php
if(!isset($_SESSION['loggedInID'])){
    header("Location:login.php"); 
	} 
?>

<?php
include ('header.php');
$con=mysqli_connect('localhost','root','','mukul');
?>

<?php
if (isset($_GET['upd'])){

$name=$_POST['sname'];
$sid=$_POST['sid'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$country=$_POST['country'];

$imgname = $_FILES['image']['name'];
$target_dir = "files/";
$img_target_file = $target_dir . $_FILES["image"]["name"];
$imageFileType = strtolower(pathinfo($img_target_file,PATHINFO_EXTENSION));
$img_extensions_arr = array("jpg","png","jpeg","gif");

$vname = $_FILES['video']['name'];
$vid_target_file = $target_dir . $_FILES["video"]["name"];
$videoFileType = strtolower(pathinfo($vid_target_file,PATHINFO_EXTENSION));
$vid_extensions_arr = array("mp4","avi","mkv","3gp");

if($age<18){
echo "<b>Age can not be less than 18.</b>";
}

else{
	$sl = $_GET['upd'];
	
	if($imgname==NULL && $vname==NULL){
	$update = "UPDATE informations SET id = '$sid', name = '$name', age = '$age', gender = '$gender', country = '$country' WHERE sl='$sl'";
	$query = mysqli_query($con,$update);
	}
	else{
	$update = "UPDATE informations SET id = '$sid', name = '$name', age = '$age', gender = '$gender', country = '$country' , imgname = '$imgname', imglocation = '$img_target_file', vname = '$vname', vlocation = '$vid_target_file' WHERE sl='$sl'";
	$query = mysqli_query($con,$update);
	}
	if($query){
		echo"<h2>Update successful!</h2>";
		echo "Name: $name";
		echo "<br>";
		echo "ID: $sid";
		echo "<br>";
		echo "Age: $age";
		echo "<br>";
		echo "Gender: $gender";
		echo "<br>";
		echo "Country: $country";
		echo "<br><br>";
		if(move_uploaded_file($_FILES['video']['tmp_name'],$vid_target_file)){
			echo "Video upload successfully.<br>";
		}
		if(move_uploaded_file($_FILES['image']['tmp_name'],$img_target_file)){
			echo "Image upload successfully.";
		}
	}
}
}
?>

<?php
	$sql = "select * from informations";
	$data = mysqli_query($con,$sql);
?>
<html>
<head>
	<title>Update Information</title>
</head>
</html>
<h2>Update student informations</h2>
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
		<td style="text-align: center"><abbr title="Edit"><a href="updateview.php?upd=<?php echo $row['sl']; ?>"><img src="files/edit.png" height="40px" width="40px"></a></abbr><br><b>Edit</b></td>
	</tr>
<?php
	}
?>

</table>

