CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Login`(IN `d_nombre_usuario` VARCHAR(45))
    NO SQL
select idEquipo, contrasena, administrador, nombre_equipo from equipo where nombre_usuario = d_nombre_usuario