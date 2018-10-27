<?php 

# urls - directory
define('BASE_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/sys/' );
define('CSS_URL', BASE_URL . 'includes/assets/css/');
define('JS_URL', BASE_URL . 'includes/assets/css/');
define('IMG_URL', BASE_URL . 'includes/assets/css/');

# database server
//defined in connection.php
  
  ## database name
  //defined in connection.php
	
	### database table
	define ('USERS', 'users');
	  
	  #### database columns
	  define ('USER_NAME', 'user_name');
	  define ('USER_LASTNAME', 'user_lastname');
	  define ('USER_EMAIL', 'user_email');
	  define ('USER_PASS', 'user_pass');
	  define ('USER_DATE', 'user_date');

# title - site name
define ('SITE_NAME', 'Site Nome');