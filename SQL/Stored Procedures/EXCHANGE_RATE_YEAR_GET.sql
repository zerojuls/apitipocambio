DELIMITER $$

DROP PROCEDURE IF EXISTS `EXCHANGE_RATE_YEAR_GET`$$

CREATE PROCEDURE `EXCHANGE_RATE_YEAR_GET`(
 IN P_YEAR INT(11)
)
BEGIN
	SELECT 	exchange_rate_purchase AS erp, 
			DATE_FORMAT(exchange_rate_date,'%Y-%m') AS erd
	FROM 	exchange_rate 
	WHERE 	YEAR(exchange_rate_date) = P_YEAR 
    ORDER BY MONTH(exchange_rate_date)
	;
END$$

