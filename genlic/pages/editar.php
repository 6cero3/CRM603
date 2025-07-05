<?php
require_once '../includes/functions.php';
check_login();

$id=$_GET['id'] ?? 0;
$stmt=$pdo->prepare('SELECT * FROM licencias WHERE id=?');
$stmt->execute([$id]);
$lic=$stmt->fetch();
if(!$lic){
    die('Licencia no encontrada');
}

if($_SERVER['REQUEST_METHOD']==='POST'){
    $cliente=$_POST['cliente'];
    $dominio=$_POST['dominio'];
    $tipo=$_POST['tipo'];
    $fecha_fin=$_POST['fecha_fin'];
    $stmt=$pdo->prepare('UPDATE licencias SET cliente=?, dominio=?, tipo=?, fecha_fin=? WHERE id=?');
    $stmt->execute([$cliente,$dominio,$tipo,$fecha_fin,$id]);
    header('Location: dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<title>Editar Licencia</title>
</head>
<body class="bg-gray-100 min-h-screen">
<div class="container mx-auto p-4">
<a href="dashboard.php" class="underline">&lt; Volver</a>
<h2 class="text-xl mb-4">Editar licencia</h2>
<form method="post" class="bg-white p-4 rounded shadow max-w-md">
<label class="block mb-2">Cliente
<input type="text" name="cliente" value="<?php echo htmlspecialchars($lic['cliente']); ?>" class="border w-full p-2" required></label>
<label class="block mb-2">Dominio
<input type="text" name="dominio" value="<?php echo htmlspecialchars($lic['dominio']); ?>" class="border w-full p-2" required></label>
<label class="block mb-2">Tipo
<select name="tipo" class="border w-full p-2">
<option value="mensual" <?php if($lic['tipo']=='mensual') echo 'selected'; ?> >Mensual</option>
<option value="6meses" <?php if($lic['tipo']=='6meses') echo 'selected'; ?> >6 meses</option>
<option value="anual" <?php if($lic['tipo']=='anual') echo 'selected'; ?> >1 año</option>
</select></label>
<label class="block mb-2">Fecha fin
<input type="date" name="fecha_fin" value="<?php echo $lic['fecha_fin']; ?>" class="border w-full p-2" required></label>
<button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Guardar</button>
</form>
</div>
</body>
</html>
