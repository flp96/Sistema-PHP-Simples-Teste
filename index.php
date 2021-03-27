<?php
	session_start();
	session_destroy();
	if(!isset($_SESSION['etapa_formulario'])){
	$_SESSION['etapa_formulario'] = 0;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sistema rápido em PHP</title>
</head>
<body>
	<!--validação-->
	<?php
		if(isset($_POST['acao_form1'])){
			$_SESSION['etapa_formulario'] = $_SESSION['etapa_formulario'] +1;
			$_SESSION['nome'] = $_POST['nome'];
			header('location: index.php');
			die();
	}else if(isset($_POST['acao_form2'])){
			$_SESSION['etapa_formulario'] = $_SESSION['etapa_formulario'] +1;
			$_SESSION['email'] = $_POST['email'];
			header('location: index.php');
			die();
	}else if(isset($_POST['acao_form3'])){
			$_SESSION['etapa_formulario'] = $_SESSION['etapa_formulario'] +1;
			$_SESSION['telefone'] = $_POST['telefone'];
			header('location: index.php');
			die();

}

	?>

	<?php
		if(isset($_SESSION['etapa_formulario']) && $_SESSION['etapa_formulario'] == 0){
	?>
	<form method="post">
		<input type="text" name="nome" placeholder="Digite o seu nome...">
		<input type="hidden" name="acao_form1">
		<input type="submit" value="Enviar!">
	</form>


	<?php }else if(isset($_SESSION['etapa_formulario']) && $_SESSION['etapa_formulario'] == 1){ ?>

	<form method="post">
		<input type="text" name="email" placeholder="Digite o seu E-mail...">
		<input type="hidden" name="acao_form2">
		<input type="submit" value="Enviar!">
	</form>

	<?php }else if(isset($_SESSION['etapa_formulario']) && $_SESSION['etapa_formulario'] == 2){ ?>

	<form method="post">
		<input type="text" name="telefone" placeholder="Digite o seu Telefone...">
		<input type="hidden" name="acao_form3">
		<input type="submit" value="Enviar!">
	</form>

	<?php }else{ ?>

		<h2>Parabéns, você chegou no final do formulário. Abaixo suas informações:</h2>
		<?php
			echo 'Nome: '.$_SESSION['nome'];
			echo '<br>';
			echo 'E-mail:'.$_SESSION['email'];
			echo '<br>';
			echo 'Telefone: '.$_SESSION['telefone'];
		?>


	<?php } ?>
</body>
</html>