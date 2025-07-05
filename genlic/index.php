<?php
require_once __DIR__.'/includes/config.php';
session_start();
if(isset($_SESSION['user'])) {
    header('Location: '.$base_url.'/pages/dashboard.php');
} else {
    header('Location: '.$base_url.'/pages/login.php');
}
exit;
?>
