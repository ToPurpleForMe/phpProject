<html>
<header>
	<link rel="stylesheet" title="css14" type="text/css" href="css.css"/>
</header>
<body>
	<div id='MenuSuperior'>
		<?php
		function __autoload($class_name) {
	if(file_exists("../model/BussinesLayer/classe.".$class_name.".php")){
		require_once "../model/BussinesLayer/classe.".$class_name.".php";
	}
	else if(file_exists("../model/DAO/classe.".$class_name.".php"))
	{
		require_once "../model/DAO/classe.".$class_name.".php";
	}
}
		$fitxer = basename($_SERVER['PHP_SELF']);
		
		$pieces = explode( "_", $fitxer);
		$accio = $pieces[0];

		include('../controller/comprovarSessio.php');
		if(isset($_SESSION['usuario'])){	
		$usuario = unserialize($_SESSION['usuario']);		
			?>
			<div id='TancarSessio'>
				<a href='../controller/TancarSessio.php'>Tancar Sessio</a>
			</div>
			<?php 
			if ($usuario->getPermisos()==1){
				?>
			</br>
			<a href="formActor.php" onClick="return avisar();">Registrar Actor</a>
			<a href="formDirector.php" onClick="return avisar();">Registrar Director</a>
			<a href="formObra.php" onClick="return avisar();">Registrar Obra</a>
			<a href="MenuInicial.php" onClick="return avisar();">Inici</a>
			<?php
			}
		}
		?>
	</div>
</body>
<script type="text/javascript">
function avisar(){

	var fitx = '<?php echo $accio; ?>';

	if(fitx=='formActor.php'||fitx=='formDirector.php'||fitx=='formObra.php'){
		return confirm ("Sortir sense desar les modificacions?");
	}
}
</script>
</html>