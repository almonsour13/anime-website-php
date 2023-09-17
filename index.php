<?php 
require_once 'config.php';
require_once 'controller/controller.php';
require_once 'view/view.php';

$view = new View();
$controller = new Controller($view); 

include 'view/template/header.php';
$controller->handleRequest(); 
// include 'view/page/home.php'; 
?>
