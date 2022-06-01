<abbr title="Edit"><a href="home.php"><img src="files/back.png" height="20px" width="20px"></a></abbr>
<br> <br>

<?php session_start() ?>
<?php
include ('header.php');
$con=mysqli_connect('localhost','root','','mukul');

if(!isset($_SESSION['loggedInID'])){
	// if not logged in then it will redirect to login page
	header("Location:login.php"); 
	}

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
	if( in_array($videoFileType,$vid_extensions_arr) && in_array($imageFileType,$img_extensions_arr) ){
		$sql="insert into informations(id, name, age, gender, country, imgname, imglocation, vname, vlocation) values('$sid','$name','$age','$gender','$country', '$imgname', '$img_target_file', '$vname','$vid_target_file')";
		mysqli_query($con,$sql);

		echo "<h2>Informations stored into DB!</h2>";

		echo "Name: $name";
		echo "<br>";
		echo "ID: $sid";
		echo "<br>";
		echo "Age: $age";
		echo "<br>";
		echo "Gender: $gender";
		echo "<br>";
		echo "Country: $country";
		echo "<br>";
		if(move_uploaded_file($_FILES['video']['tmp_name'],$vid_target_file)){
			echo "Video upload successfully.<br>";
		}
		if(move_uploaded_file($_FILES['image']['tmp_name'],$img_target_file)){
			echo "Image upload successfully.";
		}
	}
}


?>