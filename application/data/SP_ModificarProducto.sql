-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ModificarProducto`(IN `d_NombreProducto` VARCHAR(45), IN `d_Descripcion` VARCHAR(100), IN `d_IdEquipo` INT(11))
    NO SQL
UPDATE producto SET nombre_producto = d_NombreProducto, descripcion = d_Descripcion WHERE equipo_idEquipo = d_idEquipo