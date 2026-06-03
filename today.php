<?php
require_once 'db.php';

$today = date("Y-m-d");

$stmt = $pdo->prepare("SELECT * FROM reservations WHERE date=$1 ORDER BY time");
$stmt->execute([$today]);
$reservations = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>今日の予約</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<h1 class="title">今日の予約（<?= $today ?>）</h1>
<a href="menu.php" class="back-menu-btn">← メニューに戻る</a>

<?php if(empty($reservations)): ?>
<p>本日の予約はありません。</p>
<?php else: ?>

<table class="reservation-table">
<tr>
    <th>名前</th><th>時間</th><th>人数</th><th>席</th><th>コース</th><th>電話</th><th>メモ</th><th>操作</th>
</tr>

<?php foreach($reservations as $row): ?>
<tr>
    <td><?= htmlspecialchars($row['name']) ?></td>
    <td><?= htmlspecialchars($row['time']) ?></td>
    <td><?= htmlspecialchars($row['people']) ?></td>
    <td><?= htmlspecialchars($row['seat_number']) ?></td>
    <td><span class="course-tag course-<?= $row['course'] ?>"><?= courseLabel($row['course']) ?></span></td>
    <td><?= htmlspecialchars($row['phone']) ?></td>
    <td><?= nl2br(htmlspecialchars($row['memo'])) ?></td>
    <td>
        <a class="action-btn edit-btn" href="edit.php?id=<?= $row['id'] ?>">編集</a>
        <a class="action-btn delete-btn" href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('削除しますか？');">削除</a>
    </td>
</tr>
<?php endforeach; ?>

</table>

<?php endif; ?>

</body>
</html>
