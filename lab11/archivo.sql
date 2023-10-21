DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_obtener_total_noticias`()
BEGIN
    SELECT COUNT(*) as total_registros FROM noticias;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_noticias_paginacion`(IN `inicio` INT, IN `elementos_por_pagina` INT)
BEGIN
SET @sql = CONCAT('SELECT * FROM noticias ORDER BY id ASC LIMIT ', inicio, ',', elementos_por_pagina);
    PREPARE stmt FROM @sql;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
END$$
DELIMITER ;