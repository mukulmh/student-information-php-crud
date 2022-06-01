<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
	<h2>Register for this website</h2>
    <form action="function.php" method="post">
        Name : <br>
		<input name="name" type="text" placeholder="Type your name" required><br>
        Email : <br>
		<input name="email" type="email" placeholder="Type your email" required><br>
        Password : <br>
		<input name="password" type="password" placeholder="Type your password" required><br><br>
        <input type="submit" name="register" value="Register">
        <br><br>
        Or <a href="login.php">Already have account?</a>
    </form>
</body>
</html>