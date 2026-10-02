<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $_SESSION["username"] = $_POST["uname"] ?? "";
    $_SESSION["password_length"] = strlen($_POST["pword"] ?? "");
}

if (!isset($_SESSION["username"])) {
    header("Location: index.html");
    exit;
}

$username = htmlspecialchars($_SESSION["username"], ENT_QUOTES, "UTF-8");
$passwordLength = $_SESSION["password_length"] ?? 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome!</title>
</head>
<body>

    <h1>Account Created!</h1>
    <p>Welcome, <?php echo $username; ?>!</p>
    <h2>Your Account Details</h2>
    <p>Username: <?php echo $username; ?></p>

    <p>Password: <?php echo str_repeat("•", $passwordLength); ?></p>
    <form action="logout.php" method="post">
            <input type="submit" value="Log Out">
    </form>

</body>
</html>