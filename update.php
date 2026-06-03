<?php
require_once 'db.php';

$sql = "UPDATE reservations SET 
    name=$1, date=$2, time=$3, people=$4, seat_number=$5,
    course=$6, phone=$7, memo=$8
WHERE id=$9";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    $_POST['name'],
    $_POST['date'],
    $_POST['time'],
    $_POST['people'],
    $_POST['seat_number'],
    $_POST['course'],
    $_POST['phone'],
    $_POST['memo'],
    $_POST['id']
]);

header("Location: list.php");
exit;
?>
