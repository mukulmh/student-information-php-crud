<abbr title="back"><a href="home.php"><img src="files/back.png" height="20px" width="20px"></a></abbr> <br><br>

<?php session_start() ?>
<?php
if(!isset($_SESSION['loggedInID'])){
    header("Location:login.php"); 
	} 
?>
<?php
$con=mysqli_connect('localhost','root','','mukul');
if (isset($_POST['upd'])){

	$name=$_POST['name'];
	$email=$_POST['email'];
	$password=md5($_POST['password']);
	$id=$_SESSION['loggedInID'];
	$userpass=$_SESSION['pass'];
	
	$imgname = $_FILES['image']['name'];
	$target_dir = "files/";
	$img_target_file = $target_dir . $_FILES["image"]["name"];
	$imageFileType = strtolower(pathinfo($img_target_file,PATHINFO_EXTENSION));
	$img_extensions_arr = array("jpg","png","jpeg","gif");
	
	if($password==$_SESSION['pass']){
	
		if($imgname == NULL){
		
			$update = "UPDATE users SET name = '$name', email = '$email' WHERE id='$id'";
			$query = mysqli_query($con,$update);
		}
		else
		{
			$update = "UPDATE users SET name = '$name', email = '$email', imgname = '$imgname', imglocation = '$img_target_file' WHERE id='$id'";
			$query = mysqli_query($con,$update);
		}
		
		$_SESSION['username'] = $name;
		$_SESSION['email'] = $email;
		
		if($query){
			//echo("<script>alert('Profile Update Successful!')</script>");
		}
		if(move_uploaded_file($_FILES['image']['tmp_name'],$img_target_file)){
				//echo "Image upload successfully.<br><br>";
		}
	}
	else echo ("<script>alert('Incorrect Password!')</script>");
}
include ('header.php');
?>

<html>
<head>
	<title>User Profile</title>
</head>
<body>
	
	<h2>User Profile</h2>
	
	<?php
	$sl = $_SESSION['loggedInID'];
	$data = "SELECT * from users WHERE id=$sl";
	$user = mysqli_query($con,$data);
	$row = mysqli_fetch_assoc($user);
	$pic = $row['imglocation'];
	
	echo "<img src='".$pic."'width='100px' height='100px' ><br>";
	?>
	<?php
        // to show logged in user name and email;
        if(isset($_SESSION['loggedInID'])) { ?>
            
			<form action="profile.php" method="post" enctype='multipart/form-data'>
				<b>Change Picture :</b>
				<input type="file" name="image">
				<br><br>
				<b> Change Name : </b>
				<input type="text" name="name" value="<?php echo $row['name']; ?>">
				<br><br>
				<b>Change Email : </b> 
				<input type="text" name="email" value="<?php echo $row['email']; ?>">
				<br><br>
				<p>You need to type your password in order to make changes..</p>
				<b>Your Password : </b> 
				<input type="password" name="password" placeholder="Type your password">
				<br><br>
                <input type="submit" name="upd" value="Update Profile">
            </form>
			
			<form action="function.php" method="post">
                <input type="submit" name="logout" value="Logout">
            </form>
        <?php } ?>
</body>
</html>