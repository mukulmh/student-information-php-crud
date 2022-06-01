<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
	<h2>Please Login to continue</h2>
    <form action="function.php" method="post">
        Email : <br>
		<input name="email" type="email" placeholder="Type your email"><br>
        Password : <br>
		<input name="password" type="password" placeholder="Type your password"><br><br>
        <input type="submit" name="login" value="Login">
        <br><br>
        Or <a href="registration.php">Registration</a>
    </form>
</body>
</html>