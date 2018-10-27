<?php 
ob_start();
session_start();
if (!isset($_SESSION['user_logged_in'])) {
	header('location: ../access/');
}
$page_title = 'Admin';
require('../load.php'); ?>
<!doctype html>
<html lang="pt-br">
<head>
<?php Head($page_title); ?>
</head>
<body>
	<h1 class="text-center display-4"><?php echo $page_title; ?></h1>
    <nav class="mt-5">
    	<ul class="text-center list-unstyled">
        	<li><a href="../access/logout.php" onClick="javascript: return confirm('Deseja realmente sair')">Logout</a></li>
        </ul>
    </nav>
</body>
</html>