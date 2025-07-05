<?php
require_once '../includes/functions.php';
check_login();

// contar licencias
$stmt = $pdo->query("SELECT COUNT(*) as total, SUM(fecha_fin < CURDATE()) as expiradas FROM licencias");
$stats = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<title>Panel Licencias</title>
</head>
<body class="bg-gray-100 min-h-screen">
<header class="bg-blue-600 text-white p-4 flex justify-between">
<h1 class="text-xl">Generador de Licencias</h1>
<a href="logout.php" class="underline">Cerrar sesión</a>
</header>
<main class="p-4 grid grid-cols-1 md:grid-cols-3 gap-4">
<div class="bg-white p-4 rounded shadow">
<h2 class="text-lg">Licencias totales</h2>
<p class="text-2xl"><?php echo $stats['total'] ?? 0; ?></p>
</div>
<div class="bg-white p-4 rounded shadow">
<h2 class="text-lg">Expiradas</h2>
<p class="text-2xl"><?php echo $stats['expiradas'] ?? 0; ?></p>
</div>
<div class="bg-white p-4 rounded shadow flex items-end">
<a href="nueva_licencia.php" class="bg-green-600 text-white px-4 py-2 rounded">Nueva licencia</a>
</div>
<div class="col-span-full">
<h2 class="text-xl mb-2">Listado de Licencias</h2>
<table class="min-w-full bg-white">
<thead><tr><th class="border p-2">ID</th><th class="border p-2">Cliente</th><th class="border p-2">Dominio</th><th class="border p-2">Tipo</th><th class="border p-2">Fin</th><th class="border p-2">Token</th><th class="border p-2">Acciones</th></tr></thead>
<tbody>
<?php
$stmt=$pdo->query('SELECT * FROM licencias ORDER BY id DESC');
while($row=$stmt->fetch()): ?>
<tr>
<td class="border p-2 text-center"><?php echo $row['id']; ?></td>
<td class="border p-2"><?php echo htmlspecialchars($row['cliente']); ?></td>
<td class="border p-2"><?php echo htmlspecialchars($row['dominio']); ?></td>
<td class="border p-2 text-center"><?php echo $row['tipo']; ?></td>
<td class="border p-2 text-center"><?php echo $row['fecha_fin']; ?></td>
<td class="border p-2 text-xs"><?php echo $row['token']; ?></td>
<td class="border p-2 text-center">
<a href="editar.php?id=<?php echo $row['id']; ?>" class="text-blue-600">Editar</a> |
<a href="eliminar.php?id=<?php echo $row['id']; ?>" class="text-red-600" onclick="return confirm('¿Eliminar?');">Eliminar</a>
</td>
</tr>
<?php endwhile; ?>
</tbody>
</table>
</div>
</main>
</body>
</html>
