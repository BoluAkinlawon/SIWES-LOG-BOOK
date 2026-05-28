<?php
session_start();
require_once "includes/config.php";
$error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = trim($_POST['firstname'] ?? '');
    $lastname  = trim($_POST['lastname']  ?? '');
    $username  = trim($_POST['username']  ?? '');
    $email     = trim($_POST['email']     ?? '');
    $password  = trim($_POST['password']  ?? '');
    if (!$firstname || !$lastname || !$username || !$email || !$password) {
        $error = "Please fill in all fields.";
    } else {
        $check = $pdo->prepare("SELECT id FROM supervisor WHERE username = ? LIMIT 1");
        $check->execute([$username]);
        if ($check->fetch()) {
            $error = "This username is already taken.";
        } else {
            $stmt = $pdo->prepare("INSERT INTO supervisor (firstname, lastname, username, email, password) VALUES (?,?,?,?,?)");
            $stmt->execute([$firstname, $lastname, $username, $email, password_hash($password, PASSWORD_BCRYPT)]);
            header("Location: login.php"); exit;
        }
    }
}
?>
<?php require "includes/header.php"; ?>
<div class="container">
    <h2>Supervisor Registration</h2><hr>
    <?php if ($error): ?><p class="error"><?= htmlspecialchars($error) ?></p><?php endif; ?>
    <form method="post">
        <input type="text"     name="firstname" placeholder="First Name"    required>
        <input type="text"     name="lastname"  placeholder="Last Name"     required>
        <input type="email"    name="email"     placeholder="Email Address" required>
        <input type="text"     name="username"  placeholder="Username"      required>
        <input type="password" name="password"  placeholder="Password"      required>
        <button type="submit">Register</button>
    </form>
</div>
<?php require "includes/footer.php"; ?>
