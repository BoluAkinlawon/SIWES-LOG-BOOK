<?php
session_start();
if (!isset($_SESSION['matric_number'])) { header("Location: login.php"); exit; }
require_once "includes/config.php";
$matric  = $_SESSION['matric_number'];
$success = "";
$error   = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $activity = trim($_POST['activity'] ?? '');
    if ($activity) {
        $stmt = $pdo->prepare("INSERT INTO records (activity, matric_number, date) VALUES (?, ?, CURDATE())");
        $stmt->execute([$activity, $matric]);
        $success = "Log entry submitted successfully!";
    } else { $error = "Please enter your activity before submitting."; }
}
?>
<?php require "includes/header.php"; ?>
<div class="container">
    <h2>Student Dashboard</h2><hr>
    <p>Welcome, <strong><?= htmlspecialchars($_SESSION['firstname']) ?></strong> &nbsp;|&nbsp; <?= date('d M Y') ?></p>
    <p class="note" style="margin-bottom:16px;"><a href="view.php">View My Logbook Records</a> &nbsp;|&nbsp; <a href="logout.php">Logout</a></p>
    <?php if ($success): ?><p class="success"><?= $success ?></p><?php endif; ?>
    <?php if ($error):   ?><p class="error"><?= $error ?></p><?php endif; ?>
    <form method="post">
        <label style="font-size:13px;font-weight:bold;display:block;margin-bottom:6px;">Activities for today:</label>
        <textarea name="activity" placeholder="Describe what you did today..." required></textarea>
        <button type="submit">Submit Log Entry</button>
    </form>
</div>
<?php require "includes/footer.php"; ?>
