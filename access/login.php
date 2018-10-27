<?php 
	$page_title = 'Login';
	include ('header.php'); 
?>
<div class="col-md-5 ml-auto mr-auto">
  <h1 class="text-center display-4"><?= $page_title; ?></h1>
<?php

	
if(isset($_POST['access'])) : 
	$email = mysqli_escape_string($conn, $_POST['f_email']);
	$pass  = mysqli_escape_string($conn, $_POST['f_pass']);
	
	if( empty($email) or empty($pass) ) {
		AlertError('Todos os campos são obrigatórios.');
	} 
	else {
		$query = "SELECT * FROM ".USERS." WHERE ".USER_EMAIL." = '$email'";
		$result = mysqli_query($conn, $query);
		
		if(mysqli_num_rows($result) > 0) {
			$query = "SELECT * FROM ".USERS." WHERE ".USER_EMAIL." = '$email' AND ".USER_PASS." = '$pass'";
		    $result_check = mysqli_num_rows($result);
        	$row = mysqli_fetch_assoc($result);
        	$hash_pass_check = password_verify($pass, $row[''.USER_PASS.'']);

			if($hash_pass_check == true) {
				$_SESSION['user_logged_in'] = true;
				AlertSuccess('Redirecionando para o sistema...');
                header('Refresh:3, ../admin/'); 
			}
			else {
				AlertError('E-mail e senha não conferem.');
			}
		}
		else {
			AlertError('Usuário inexistente.');
		}
	}		
endif;
?>

    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
    <input name="id" type="hidden" />
        <div class="form-group">
            <label for="email" class="sr-only">E-mail</label>
            <input name="f_email" type="text" class="form-control" id="email" placeholder="E-mail" value="<?php if(isset($_POST['access'])){echo $email;} ?>" />
      </div>
        <div class="form-group">
            <label for="pass" class="sr-only">Senha</label>
            <input name="f_pass" type="password" class="form-control" id="pass" placeholder="Senha" />
        </div>
        <div class="text-center">
            <input name="access" type="submit" class="btn btn-secondary text-uppercase" value="Acessar" />
        </div>
    </form>
    <nav class="mt-5">
    	<ul class="text-center list-unstyled">
        	<li><a href="register.php">Registrar</a></li>
        </ul>
    </nav>
</div>
<?php include ('footer.php'); ?>
