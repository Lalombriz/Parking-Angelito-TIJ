DELIMITER !!
CREATE FUNCTION Dolar_convert(valor INTEGER)
RETURNS FLOAT 
BEGIN 
	declare total integer;
	
	set total = valor/22.50;	
	
	RETURN total;
END;!!
DELIMITER ;