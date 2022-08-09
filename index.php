<?php  
	session_start();
	require('deliveryController.php');
	require('deliveryModel.php');

	define('INCLUDE_PATH','http://localhost/deliveryplug/');

	$deliveryController = new deliveryController();

	$deliveryController->index();
?>