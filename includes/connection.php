<?php 
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'ds_register');

$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME) or die('Falha na conexao: ' . mysqli_error($conn));
