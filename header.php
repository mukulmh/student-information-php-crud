<?php
	$con = mysqli_connect("localhost","root","","mukul");
	$sl = $_SESSION['loggedInID'];
	$data = "SELECT * from users WHERE id=$sl";
	$user = mysqli_query($con,$data);
	$row = mysqli_fetch_assoc($user);
	$pic = $row['imglocation'];
?>

<?php if(!isset($_SESSION['loggedInID'])){
	// if not logged in then it will redirect to login page
	header("Location:login.php"); }
?>

<?php 
	if($_SESSION['role']==1){
		echo "<table>";
		echo "<tr>";
		echo "<td style='text-align: center'> <abbr title='Home'><a href='home.php'><img src='files/home.png' height='30px' width='35px'></a></abbr><br><b>Home </b> |</td>";
		echo "<td style='text-align: center'><abbr title='View'><a href='information.php'><img src='files/form1.png' height='30px' width='35px'></a></abbr><br><b>View </b> | </td>";
		echo "<td style='text-align: center'><abbr title='Edit'><a href='update.php'><img src='files/edit.png' height='30px' width='35px'></a></abbr><br><b>Edit </b> | </td>";
		echo "<td style='text-align: center'><abbr title='Delete'><a href='delete.php'><img src='files/delete1.png' height='30px' width='35px'></a></abbr><br><b>Delete </b> | </td>";
		echo "<td style='text-align: center'><abbr title='Search'><a href='search.php'><img src='files/search.png' height='30px' width='35px'></a></abbr><br><b>Search </b> | </td>";
		echo "<td style='text-align: center'><abbr title='Profile'><a href='profile.php'><img src='".$pic."'width='35px' height='35px' ></a></abbr><br><b>";
		echo $_SESSION['username']; 
		echo "</b></td>";
		echo "</tr>";
		echo "</table>";
		echo "<hr>";
	} 

	else{
		echo "<table>";
		echo "<tr>";
		echo "<td style='text-align: center'><abbr title='Profile'><a href='profile.php'><img src='".$pic."'width='35px' height='35px' ></a></abbr><br><b>";
		echo $_SESSION['username']; 
		echo "</b></td>";
		echo "</tr>";
		echo "</table>";
		echo "<hr>";
	}
?>

	

