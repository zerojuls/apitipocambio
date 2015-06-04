DELIMITER $$

DROP PROCEDURE IF EXISTS `EXCHANGE_RATE_ALL_GET`$$

CREATE PROCEDURE `EXCHANGE_RATE_ALL_GET`(
)
BEGIN
	SELECT 	    exchange_rate_purchase AS erp, 
				DATE_FORMAT(exchange_rate_date,'%Y-%m') AS erd
	FROM 	exchange_rate 
    ORDER BY exchange_rate_date
	;
END$$
