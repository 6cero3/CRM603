<?php
header('Content-Type: application/json');
require_once __DIR__.'/../includes/db.php';
$stmt = $pdo->query("SELECT id, folio, type, status FROM reports ORDER BY created_at DESC LIMIT 50");
$rows = $stmt->fetchAll();
echo json_encode($rows);
?>
