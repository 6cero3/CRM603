<?php
require_once __DIR__ . '/../config/config.php';
session_destroy();
header('Location: '.$base_url.'/index.php');
exit;
?>
