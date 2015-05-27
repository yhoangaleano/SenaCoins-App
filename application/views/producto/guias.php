
<form action="/target" class="dropzone" id="my-dropzone">

</form>
<br>
<button class="btn btn-primary pull-right" id="submit-all">Guardar</button>


<?php
$js = '<script src="'.URL.'js/application-selects.js" type="text/javascript"></script>';
$js .= '<script src="'.URL.'js/application-producto.js" type="text/javascript"></script>';
$js .= '<script>producto.subirGuia();</script>';

?>