<?php
session_start();
require_once 'src/common.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/signin.css">
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
    <title>Sign in</title>
</head>

<?php
if(isset($_POST['Submit']))
{
    $user = login($_POST['Username'], $_POST['Password']);

    if( count($user) > 0 )
    {
        $_SESSION['Username'] = $user['username'];
        $_SESSION['Active'] = true;
        header("location:index.php");
        exit;
    }
    else
        echo 'Incorrect Username or Password';
}
?>

<body>
<div class="container">
    <form action="" method="post" name="Login_Form" class="form-signin">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputUsername" >Username</label>
        <input name="Username" type="username" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword">Password</label>
        <input name="Password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <button name="Submit" value="Login" class="button" type="submit">Sign in</button>

    </form>
</div>
</body>
</html>
