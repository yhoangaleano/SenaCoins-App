CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ListarProducto`()
    NO SQL
SELECT producto.idProducto, producto.nombre_producto, producto.descripcion, producto.url_guia, producto.equipo_idEquipo ,equipo.nombre_equipo,(SELECT SUM(cantidad) FROM transaccion WHERE producto_idProducto = producto.idProducto) AS inversion, (SELECT url_imagen FROM imagen WHERE producto_idProducto = producto.idProducto AND estado = 1 LIMIT 1) AS imagen
    FROM producto
    INNER JOIN equipo ON producto.equipo_idEquipo = equipo.idEquipo ORDER BY inversion DESC