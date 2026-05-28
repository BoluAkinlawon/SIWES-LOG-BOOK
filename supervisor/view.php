<?php
session_start();
if (!isset($_SESSION['username'])) { header("Location: login.php"); exit; }
require_once "includes/config.php";
$records = [];
$searched = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
    $matric = trim($_POST['matric'] ?? '');
    $searched = true;
    if ($matric) {
        $stmt = $pdo->prepare("
            SELECT s.firstname, s.lastname, r.matric_number, r.activity, r.date
            FROM student s
            JOIN records r ON s.matric_number = r.matric_number
            WHERE r.matric_number = ?
            ORDER BY r.date DESC
        ");
        $stmt->execute([$matric]);
        $records = $stmt->fetchAll();
    }
}
?>
<?php require "includes/header.php"; ?>
<div class="table-wrap">
    <h2 style="color:#2c5f2e;margin-bottom:16px;">Student Logbook Records</h2>
    <form method="post" style="margin-bottom:16px;display:flex;gap:10px;">
        <input type="text" name="matric" placeholder="Enter Matric Number" style="margin:0;width:auto;flex:1;">
        <button name="search" style="width:auto;padding:10px 20px;">Search</button>
        <a href="view.php" class="btn-secondary" style="width:auto;padding:10px 20px;">Reset</a>
    </form>
    <?php if ($searched): ?>
        <?php if ($records): ?>
        <table>
            <tr><th>First Name</th><th>Last Name</th><th>Matric No.</th><th>Activity</th><th>Date</th></tr>
            <?php foreach ($records as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row['firstname']) ?></td>
                <td><?= htmlspecialchars($row['lastname']) ?></td>
                <td><?= htmlspecialchars($row['matric_number']) ?></td>
                <td><?= htmlspecialchars($row['activity']) ?></td>
                <td><?= htmlspecialchars($row['date']) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php else: ?><p>No records found for this matric number.</p><?php endif; ?>
    <?php endif; ?>
</div>
<?php require "includes/footer.php"; ?>
