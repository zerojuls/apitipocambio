DELIMITER $$

DROP PROCEDURE IF EXISTS `EXCHANGE_RATE_MONTH_GET`$$

CREATE PROCEDURE `EXCHANGE_RATE_MONTH_GET`(
 IN P_MONTH INT(11)
)
BEGIN
	SELECT 	    exchange_rate_purchase AS erp, 
				DATE_FORMAT(exchange_rate_date,'%Y-%m-%d') AS erd
	FROM 	exchange_rate 
	WHERE 	MONTH(exchange_rate_date) = P_MONTH AND YEAR(exchange_rate_date) = 2014
    ORDER BY MONTH(exchange_rate_date)
    ;
END$$