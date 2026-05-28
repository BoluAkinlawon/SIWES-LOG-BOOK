<?php
session_start();
require_once "includes/config.php";
$error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $matric   = trim($_POST['matric']   ?? '');
    $password = trim($_POST['password'] ?? '');
    if ($matric && $password) {
        $stmt = $pdo->prepare("SELECT * FROM student WHERE matric_number = ? LIMIT 1");
        $stmt->execute([$matric]);
        $user = $stmt->fetch();
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['matric_number'] = $user['matric_number'];
            $_SESSION['firstname']     = $user['firstname'];
            header("Location: dashboard.php"); exit;
        } else { $error = "Invalid matric number or password."; }
    } else { $error = "Please fill in all fields."; }
}
?>
<?php require "includes/header.php"; ?>
<div class="container">
    <h2>Student Login</h2><hr>
    <?php if ($error): ?><p class="error"><?= htmlspecialchars($error) ?></p><?php endif; ?>
    <form method="post">
        <input type="text"     name="matric"   placeholder="Matric Number" required>
        <input type="password" name="password" placeholder="Password"      required>
        <button type="submit">Login</button>
    </form>
    <p class="note">No account? <a href="register.php">Register here</a></p>
</div>
<?php require "includes/footer.php"; ?>
