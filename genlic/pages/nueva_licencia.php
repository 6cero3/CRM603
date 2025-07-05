<?php
require_once '../includes/functions.php';
check_login();

$mensaje='';
if($_SERVER['REQUEST_METHOD']==='POST'){
    $cliente=$_POST['cliente'];
    $dominio=$_POST['dominio'];
    $tipo=$_POST['tipo'];
    $inicio=date('Y-m-d');
    switch($tipo){
        case 'mensual': $fin=date('Y-m-d',strtotime('+1 month')); break;
        case '6meses': $fin=date('Y-m-d',strtotime('+6 months')); break;
        default: $fin=date('Y-m-d',strtotime('+1 year')); break;
    }
    $token=bin2hex(random_bytes(16));
    $stmt=$pdo->prepare('INSERT INTO licencias (cliente,dominio,tipo,fecha_inicio,fecha_fin,token) VALUES (?,?,?,?,?,?)');
    $stmt->execute([$cliente,$dominio,$tipo,$inicio,$fin,$token]);
    $mensaje='Licencia creada correctamente';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<title>Nueva Licencia</title>
</head>
<body class="bg-gray-100 min-h-screen">
<div class="container mx-auto p-4">
<a href="dashboard.php" class="underline">&lt; Volver</a>
<h2 class="text-xl mb-4">Generar licencia</h2>
<?php if($mensaje): ?><div class="bg-green-100 text-green-700 p-2 mb-4"><?php echo $mensaje; ?></div><?php endif; ?>
<form method="post" class="bg-white p-4 rounded shadow max-w-md">
<label class="block mb-2">Cliente
<input type="text" name="cliente" class="border w-full p-2" required></label>
<label class="block mb-2">Dominio
<input type="text" name="dominio" class="border w-full p-2" required></label>
<label class="block mb-2">Tipo
<select name="tipo" class="border w-full p-2">
<option value="mensual">Mensual</option>
<option value="6meses">6 meses</option>
<option value="anual">1 año</option>
</select></label>
<button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Crear</button>
</form>
</div>
</body>
</html>
