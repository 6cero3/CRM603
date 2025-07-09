<?php
function generate_folio(PDO $pdo): string {
    $stmt = $pdo->query("SELECT COUNT(*) FROM reports");
    $count = (int)$stmt->fetchColumn() + 1;
    return 'ZC-' . str_pad($count, 6, '0', STR_PAD_LEFT);
}
?>
