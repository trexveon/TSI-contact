<?php
require_once("../assets/inc/conexao.php");
if(!$_SESSION['admin']){
header('location:../ops.php');
}
	$id=$_GET['id'];
	
	$sql = "SELECT* FROM usuarios WHERE id=".$id;
	$consulta = mysqli_query($conexao,$sql);
	if($consulta){
		$linha = mysqli_fetch_array($consulta);
		if(mysqli_num_rows($consulta)>='1'){
			header('location:../perfil.php?id='.$id);
		}
		else{
			$_SESSION['mensagem']="O usuario ainda não possui perfil cadastrado.";
			$_SESSION['estilo'] = 'alert-warning';
			header('location:usuarios.php');
		}

	}
	else{
		$_SESSION['mensagem']="Problemas ao fazer a consulta. Contate o administrador do sistema.";
		$_SESSION['estilo'] = 'alert-danger';
		header('location:usuarios.php');
	}
	
	

	
