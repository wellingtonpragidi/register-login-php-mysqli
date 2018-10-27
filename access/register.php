<?php 
	$page_title = 'Criar conta';
	include ('header.php'); 
?>
<div class="col-md-5 ml-auto mr-auto">
  <h1 class="text-center display-4"><?php echo $page_title; ?></h1>
<?php
if(isset($_POST['register'])) : 
	$name 		  = $_POST['f_name'];
	$lastname 	  = $_POST['f_lastname'];
	$email 		  = $_POST['f_email'];
	$pass 		  = $_POST['f_pass'];
	$confirm_pass = $_POST['f_confirm_pass'];
	$date         = date('d/m/Y');
	$hash_pass 	  = password_hash($pass, PASSWORD_DEFAULT);
	
	$user_email_check = mysqli_query($conn, "SELECT * FROM ".USERS." WHERE ".USER_EMAIL." = '$email'");
    $user_email_count = mysqli_num_rows($user_email_check);
	
	if($user_email_count > 0) {
		AlertError('Email já cadastrado');
	}
	elseif($pass != $confirm_pass) {
		AlertError('As senhas não coincidem');
	}
	else {
		$query = "
			INSERT INTO ".USERS." 
				(".USER_NAME.", ".USER_LASTNAME.", ".USER_EMAIL.", ".USER_PASS.", ".USER_DATE.")
			VALUES 
				('$name', '$lastname', '$email', '$hash_pass', '$date')
		";
		mysqli_query($conn, $query);
		AlertSuccess('Usuario <strong>'.$name.' '.$lastname.'</strong> registrado');
	}
endif;
?>
    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
            <label for="name" class="sr-only">Nome</label>
            <input name="f_name" type="text" class="form-control" id="name" placeholder="Nome" required value="<?php if(isset($_POST['register'])) {echo $name;} ?>" />
        </div>
        <div class="form-group">
            <label for="lastname" class="sr-only">Sobrenome</label>
            <input name="f_lastname" type="text" class="form-control" id="lastname" placeholder="Sobrenome" required value="<?php if(isset($_POST['register'])) {echo $lastname;} ?>" />
        </div>
        <div class="form-group">
            <label for="email" class="sr-only">E-mail</label>
            <input name="f_email" type="email" class="form-control" id="email" placeholder="E-mail" required value="<?php if(isset($_POST['register'])) {echo $email;} ?>" />
        </div>
        <div class="form-group">
            <label for="pass" class="sr-only">Senha</label>
            <input name="f_pass" type="password" class="form-control" id="pass" placeholder="Senha" required />
        </div>
        <div class="form-group">
            <label for="confirm-pass" class="sr-only">Confirmar Senha</label>
            <input name="f_confirm_pass" type="password" class="form-control" id="confirm-pass" placeholder="Confirmar Senha" required />
        </div>
        <div class="text-center">
            <input name="register" type="submit" class="btn btn-secondary text-uppercase" value="Registrar" />
        </div>
    </form>
    <nav class="mt-5">
    	<ul class="text-center list-unstyled">
        	<li><a href="login.php">Login</a></li>
        </ul>
    </nav>
</div>
<?php include ('footer.php'); ?>