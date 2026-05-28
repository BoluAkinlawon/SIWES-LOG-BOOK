<?php
session_start();
if (!isset($_SESSION['matric_number'])) { header("Location: login.php"); exit; }
require_once "includes/config.php";
$matric = $_SESSION['matric_number'];
$stmt = $pdo->prepare("SELECT activity, date FROM records WHERE matric_number = ? ORDER BY date DESC");
$stmt->execute([$matric]);
$records = $stmt->fetchAll();
?>
<?php require "includes/header.php"; ?>
<div class="table-wrap">
    <h2 style="color:#2c5f2e;margin-bottom:16px;">My Logbook Records</h2>
    <a href="dashboard.php" class="btn-secondary" style="width:auto;display:inline-block;margin-bottom:16px;">&larr; Back to Dashboard</a>
    <?php if ($records): ?>
    <table>
        <tr><th>Activity</th><th>Date</th></tr>
        <?php foreach ($records as $row): ?>
        <tr>
            <td><?= htmlspecialchars($row['activity']) ?></td>
            <td><?= htmlspecialchars($row['date']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php else: ?>
        <p>No log entries yet. <a href="dashboard.php">Add your first entry.</a></p>
    <?php endif; ?>
</div>
<?php require "includes/footer.php"; ?>
