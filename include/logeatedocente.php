<?php
session_start();
ob_start(); 

require_once('funciones.php'); //invoca
conectar('localhost','root', '', 'db_gamificame'); //declara

$nvchusername = strip_tags($_POST['username']);
//$vchpassword = strip_tags($_POST['vchpassword']);
$nvchpassword = strip_tags($_POST['password']);


$query = @mysql_query('SELECT * FROM tb_user WHERE nvchusername="'.mysql_real_escape_string($nvchusername).'" AND nvchpassword="'.mysql_real_escape_string($nvchpassword).'"');
if($existe = @mysql_fetch_object($query))
{
	$_SESSION['logged'] = 'yes';
	$_SESSION['nvchusername'] = $nvchusername;
	
	//echo '<script>window.location="principal.php"</script>';
	//echo '<script>window.location="ChatRoom.php"</script>'. $user ;

	//echo "Bienvenido ".$vchusername;
	echo '<script>window.location="../ddocentes.php"</script>';

	//echo 'estas en el select';

}else {
	//echo '<script>window.location="index.php"</script>';
	//echo "usuario: ".$vchusername."</br> contraseña:".$vchpassword ;

	echo '<script>window.location="../login.php"</script>';
	$_SESSION['mensaje']=$mensaje = "
		<div class='alert bg-danger' role='alert'>
			<span class='glyphicon glyphicon-exclamation-sign'></span> Error, revisa tus datos!!<a href='#'' class='pull-right'></a>
		</div>
		"; 
	//echo '<div>El usuario y/o password son incorrectos</div>';
    //echo "<script type=\"No existe el usuario/javascript\">alert(\"Fotos guardadas\");</script>";
	}
?>
