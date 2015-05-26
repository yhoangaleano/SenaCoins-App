CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_GaleriaProducto`(IN `d_idProducto` INT)
    NO SQL
SELECT idImagen, url_imagen FROM imagen WHERE producto_idProducto = d_idProducto ORDER BY estado DESC