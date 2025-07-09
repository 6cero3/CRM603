<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/conexion.php';

if (!isset($_SESSION['usuario_id'])) {
    header('Location: '.$base_url.'/index.php');
    exit;
}
?>
<?php include 'includes/header.php'; ?>
<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    <a href="modules/usuarios/index.php" class="bg-white p-4 rounded shadow">Usuarios</a>
    <a href="modules/clientes/index.php" class="bg-white p-4 rounded shadow">Clientes</a>
    <a href="modules/proyectos/index.php" class="bg-white p-4 rounded shadow">Proyectos</a>
    <a href="modules/tareas/index.php" class="bg-white p-4 rounded shadow">Tareas</a>
    <a href="modules/finanzas/index.php" class="bg-white p-4 rounded shadow">Finanzas</a>
    <a href="modules/cotizaciones/index.php" class="bg-white p-4 rounded shadow">Cotizaciones</a>
</div>
<?php include 'includes/footer.php'; ?>
