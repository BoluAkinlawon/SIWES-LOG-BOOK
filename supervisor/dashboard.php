<?php
session_start();
if (!isset($_SESSION['username'])) { header("Location: login.php"); exit; }
require_once "includes/config.php";
$success = $error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $matric = trim($_POST['matric']  ?? '');
    $remark = trim($_POST['remark'] ?? '');
    if ($matric && $remark) {
        $stmt = $pdo->prepare("INSERT INTO verify (matric_number, remark, date) VALUES (?, ?, CURDATE())");
        $stmt->execute([$matric, $remark]);
        $success = "Remark submitted successfully.";
    } else { $error = "Please fill in both fields."; }
}
?>
<?php require "includes/header.php"; ?>
<div class="container">
    <h2>Supervisor Dashboard</h2><hr>
    <p>Welcome, <strong><?= htmlspecialchars($_SESSION['firstname']) ?></strong> &nbsp;|&nbsp; <?= date('d M Y') ?></p>
    <p class="note" style="margin-bottom:16px;"><a href="view.php">View Student Records</a> &nbsp;|&nbsp; <a href="logout.php">Logout</a></p>
    <?php if ($success): ?><p class="success"><?= $success ?></p><?php endif; ?>
    <?php if ($error):   ?><p class="error"><?= $error ?></p><?php endif; ?>
    <h3 style="margin-bottom:12px;font-size:15px;">Add Remark for a Student</h3>
    <form method="post">
        <input type="text" name="matric" placeholder="Student Matric Number" required>
        <textarea name="remark" placeholder="Enter remark / supervisor signature..." required></textarea>
        <button type="submit">Submit Remark</button>
    </form>
</div>
<?php require "includes/footer.php"; ?>
