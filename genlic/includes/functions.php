<?php
require_once __DIR__.'/config.php';
require_once __DIR__.'/conexion.php';

function check_login() {
    session_start();
    if(!isset($_SESSION['user'])) {
        header('Location: '.$GLOBALS['base_url'].'/pages/login.php');
        exit;
    }
}
?>
