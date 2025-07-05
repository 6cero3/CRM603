<?php
require_once '../includes/config.php';
require_once '../includes/conexion.php';
session_start();

$error='';
if($_SERVER['REQUEST_METHOD']==='POST'){
    $user=$_POST['usuario']??'';
    $pass=$_POST['clave']??'';
    if($user===$admin_user && password_verify($pass,$admin_pass)){
        $_SESSION['user']=$user;
        header('Location: '.$base_url.'/pages/dashboard.php');
        exit;
    }else{
        $error='Credenciales incorrectas';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<title>Login Generador Licencias</title>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
<div class="bg-white p-6 rounded shadow w-80">
<h2 class="text-xl mb-4 text-center">Acceso Administrador</h2>
<?php if($error): ?>
<div class="bg-red-100 text-red-700 p-2 mb-4"><?php echo $error; ?></div>
<?php endif; ?>
<form method="post">
<label class="block mb-2">Usuario
<input type="text" name="usuario" class="border w-full p-2" required></label>
<label class="block mb-2">Contraseña
<input type="password" name="clave" class="border w-full p-2" required></label>
<button class="bg-blue-600 text-white w-full py-2 rounded" type="submit">Entrar</button>
</form>
</div>
</body>
</html>
