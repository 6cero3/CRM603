<?php
require_once '../includes/functions.php';
check_login();
$id=$_GET['id']??0;
$stmt=$pdo->prepare('DELETE FROM licencias WHERE id=?');
$stmt->execute([$id]);
header('Location: dashboard.php');
exit;
?>
