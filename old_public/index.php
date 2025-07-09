<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/conexion.php';

if (isset($_SESSION['usuario_id'])) {
    header('Location: '.$base_url.'/dashboard.php');
    exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['correo'] ?? '';
    $clave  = $_POST['clave'] ?? '';

    $stmt = $pdo->prepare('SELECT id, clave, rol FROM usuarios WHERE correo = ?');
    $stmt->execute([$correo]);
    $usuario = $stmt->fetch();

    if ($usuario && password_verify($clave, $usuario['clave'])) {
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['rol'] = $usuario['rol'];
        header('Location: '.$base_url.'/dashboard.php');
        exit;
    } else {
        $error = 'Credenciales incorrectas';
    }
}
?>
<?php include 'includes/header.php'; ?>
<div class="max-w-md mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-xl mb-4">Iniciar Sesión</h2>
    <?php if ($error): ?>
    <div class="bg-red-100 text-red-700 p-2 mb-4"><?php echo $error; ?></div>
    <?php endif; ?>
    <form method="post">
        <div class="mb-4">
            <label class="block">Correo</label>
            <input type="email" name="correo" class="w-full border p-2" required>
        </div>
        <div class="mb-4">
            <label class="block">Contraseña</label>
            <input type="password" name="clave" class="w-full border p-2" required>
        </div>
        <button class="bg-blue-600 text-white px-4 py-2 rounded" type="submit">Entrar</button>
    </form>
</div>
<?php include 'includes/footer.php'; ?>
