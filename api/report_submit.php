<?php
header('Content-Type: application/json');
if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    http_response_code(405);
    echo json_encode(['error'=>'Method not allowed']);
    exit;
}
require_once __DIR__.'/../includes/db.php';
require_once __DIR__.'/../includes/functions.php';
$type = $_POST['type'] ?? '';
$anonymous = isset($_POST['anonymous']) ? 1 : 0;
$name = $_POST['name'] ?? '';
$contact = $_POST['contact'] ?? '';
$description = $_POST['description'] ?? '';
$lat = $_POST['lat'] ?? null;
$lng = $_POST['lng'] ?? null;
$evidence = '';
if(!empty($_FILES['evidence']['name'])){
    $allowed = ['jpg','jpeg','png','gif','mp4','mov'];
    $ext = strtolower(pathinfo($_FILES['evidence']['name'], PATHINFO_EXTENSION));
    if(in_array($ext,$allowed)){
        $fname = uniqid('evi_').'.'.$ext;
        $dest = __DIR__.'/../assets/'.$fname;
        if(move_uploaded_file($_FILES['evidence']['tmp_name'],$dest)){
            $evidence = $fname;
        }
    }
}
$folio = generate_folio($pdo);
$stmt = $pdo->prepare("INSERT INTO reports (folio,type,anonymous,name,contact,description,lat,lng,evidence,status,created_at) VALUES (?,?,?,?,?,?,?,?,?,'Pendiente',NOW())");
$stmt->execute([$folio,$type,$anonymous,$name,$contact,$description,$lat,$lng,$evidence]);
echo json_encode(['success'=>true,'folio'=>$folio]);
?>
