<?php

session_start();
if (isset($_SESSION['user_logged_in']) === true) {
    header("Location: dashboard.php");
    exit;
}

$error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];

   
    $correct_username = "admin";
    $correct_password = "12345";

    if ($username === $correct_username && $password === $correct_password) {

        
        $_SESSION['user_logged_in'] = true;
        $_SESSION['username'] = $username;

        header("Location: dashboard.php");
        exit;

    } else {
        $error = "Invalid username or password!";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

<?php if ($error): ?>
    <p style="color:red;"><?php echo $error; ?></p>
<?php endif; ?>

<form method="post">
    <input type="text" name="username" placeholder="Username" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit">Login</button>
</form>

</body>
</html>

