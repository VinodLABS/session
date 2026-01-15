<?php
session_start();

$error = "";
$already_logged_in = false; 

if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true) {
    $already_logged_in = true;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $correct_username = "admin";
    $correct_password = "12345";

    if ($username === $correct_username && $password === $correct_password) {
        $_SESSION['user_logged_in'] = true;
        $_SESSION['username'] = $username;
        unset($_SESSION['username']);
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

<?php if ($already_logged_in): ?>
    <p style="color:blue;">You are already logged in!</p>
    <p><a href="dashboard.php">Go to Dashboard</a></p>
<?php endif; ?>

<?php if ($error): ?>
    <p style="color:red;"><?php echo $error; ?></p>
<?php endif; ?>
<?php if (!$already_logged_in): ?>
<form method="post">
    <input type="text" name="username" placeholder="Username" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit">Login</button>
</form>
<?php endif; ?>

</body>
</html>
