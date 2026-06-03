<?php
require_once 'db.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM reservations WHERE id = $1");
$stmt->execute([$id]);

header("Location: list.php");
exit;
?>
