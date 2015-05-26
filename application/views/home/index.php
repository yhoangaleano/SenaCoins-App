<?php 
	
	if (isset($_SESSION['ID'])) {
		header("Location:".URL."equipo/Index");
	}
 ?>
<div class="container">
	<form action="<?php echo URL ?>home/Index" method="post">
	    <input type="text" name="txtUser" placeholder="Nombre de Usuario"><br>
	    <input type="password" name="txtPass" placeholder="contraseña"><br>
	    <input type="submit" name="btnIngresar" value="Ingresar">
	</form>
	<?php echo $mensaje; ?>
	
</div>