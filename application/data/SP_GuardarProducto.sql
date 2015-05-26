CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_GuardarProducto`(IN `d_NombreProducto` VARCHAR(45), IN `d_Descripcion` VARCHAR(100), IN `d_IdEquipo` INT(11))
    NO SQL
INSERT INTO producto (nombre_producto, descripcion, equipo_idEquipo) values (d_NombreProducto, d_Descripcion, d_IdEquipo)