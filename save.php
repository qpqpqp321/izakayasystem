<?php
require_once 'db.php';

$sql = "INSERT INTO reservations 
(name, date, time, course, people, seat_type, seat_number, phone, memo)
VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9)";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    $_POST['name'],
    $_POST['date'],
    $_POST['time'],
    $_POST['course'],
    $_POST['people'],
    $_POST['seat_type'],
    $_POST['seat_number'],
    $_POST['phone'],
    $_POST['memo']
]);

header("Location: menu.php");
exit;
?>
