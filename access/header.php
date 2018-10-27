<?php 
ob_start();
session_start();
if (isset($_SESSION['user_logged_in'])) {
	header('location: ../admin/');
}
	require('../load.php'); 
	#Brazil's time
	date_default_timezone_set('America/Sao_Paulo');
?>
<!doctype html>
<html lang="pt-br">
<head>
<?php Head($page_title); ?>
</head>
<body>