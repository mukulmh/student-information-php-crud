<a href="login.php">Back</a><br><br>

<?php
// to store session data and become logged in we have to start session
session_start();

// mysql database connection 
$con = mysqli_connect("localhost", "root", "", "mukul");

// to check if there any connection fault with mysql db
if (!$con) {
    echo "DB CONNECTION PROBLEM";
}

// for checking login request
if (isset($_POST['login'])) {
    $password = md5($_POST['password']);
    $query = "SELECT * FROM users where email = '" . $_POST['email'] . "' AND password = '" . $password . "'";
    $user_resources = mysqli_query($con, $query);
    if (mysqli_num_rows($user_resources) > 0) {
        $user = $user_resources->fetch_assoc();

        // store value in session 
        $_SESSION['loggedInID'] = $user['id'];
        $_SESSION['username'] = $user['name'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['pass'] = $user['password'];
        $_SESSION['role'] = $user['user_role'];
        // after login successfully redirect to homepage
        if($user['user_role']==1){
            header("Location:home.php");
        }
        else{
            header('location:profile.php');
        }

    }
    echo "<b>Provided information is incorrect!</b>";
}

// for registering
if (isset($_POST['register'])) {
    // to secure password in database encrypting it into md5 hash
    $password = md5($_POST['password']);
    $imgloc = "files/";
    $imgname = "files/profile.png";
    // id is auto increment so it will autometic update
    $query = "INSERT INTO users( name, email, password, imgname, imglocation, user_role) VALUES ('" . $_POST['name'] . "','" . $_POST['email'] . "','" . $password . "','" . $imgloc . "','" . $imgname . "', 2)";

    if (mysqli_query($con, $query)) {
        // storing data in session to become logged in 
        $_SESSION['loggedInID'] = mysqli_insert_id($con);
        $_SESSION['username'] = $_POST['name'];
        $_SESSION['email'] = $_POST['email'];

        header("Location:profile.php");
    }
}

if (isset($_POST['logout'])) {
    // to logout session have to unset
    unset($_SESSION['loggedInID']);
    unset($_SESSION['username']);
    unset($_SESSION['email']);
    // then it will redirect to login page
    header("Location:login.php");
}
?>