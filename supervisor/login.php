<?php
session_start();
require_once "includes/config.php";
$error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    if ($username && $password) {
        $stmt = $pdo->prepare("SELECT * FROM supervisor WHERE username = ? LIMIT 1");
        $stmt->execute([$username]);
        $user = $stmt->fetch();
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['username']  = $user['username'];
            $_SESSION['firstname'] = $user['firstname'];
            header("Location: dashboard.php"); exit;
        } else { $error = "Invalid username or password."; }
    } else { $error = "Please fill in all fields."; }
}
?>
<?php require "includes/header.php"; ?>
<div class="container">
    <h2>Supervisor Login</h2><hr>
    <?php if ($error): ?><p class="error"><?= htmlspecialchars($error) ?></p><?php endif; ?>
    <form method="post">
        <input type="text"     name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
    <p class="note">No account? <a href="register.php">Register here</a></p>
</div>
<?php require "includes/footer.php"; ?>
