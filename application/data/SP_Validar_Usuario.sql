
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ValidarUsuario`(IN `d_NombreUsuario` VARCHAR(30))
    NO SQL
SELECT i.url_imagen as imagen 
FROM equipo e
INNER JOIN producto p ON (e.idEquipo = p.equipo_idEquipo)
INNER JOIN imagen i  ON (p.idProducto = i.producto_idProducto)
WHERE e.nombre_usuario = d_NombreUsuario and i.estado = 1