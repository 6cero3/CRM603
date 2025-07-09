<?php
require_once '../../config/config.php';
if (!isset($_SESSION['usuario_id'])) {
    header('Location: '.$base_url.'/index.php');
    exit;
}
?>
<?php include '../../includes/header.php'; ?>
<h2 class="text-xl mb-4">Módulo: finanzas</h2>
<p>Contenido próximamente...</p>
<?php include '../../includes/footer.php'; ?>
