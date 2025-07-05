<?php
require_once __DIR__.'/includes/conexion.php';
$token=$_GET['token'] ?? '';
$dominio=$_GET['dominio'] ?? '';
header('Content-Type: application/json');
$stmt=$pdo->prepare('SELECT * FROM licencias WHERE token=? AND dominio=?');
$stmt->execute([$token,$dominio]);
$lic=$stmt->fetch();
if($lic && $lic['fecha_fin'] >= date('Y-m-d')){
    echo json_encode(['valida'=>true,'fin'=>$lic['fecha_fin']]);
} else {
    echo json_encode(['valida'=>false]);
}
?>
