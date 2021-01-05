-- Procedimiento para poder hacer el cobro del hospedaje del cliente con todo y sus servicios extras utulizados......

DELIMITER !!
CREATE FUNCTION Calcular_cobro(c_id INTEGER)
RETURNS INTEGER 
BEGIN 

	declare fecha DATE;
	declare x ,servicio, precio_x, N_dias, importe , cost, Total integer;
	
	SELECT Cliente_ID into x FROM cliente WHERE Cliente_ID=c_id;
	SELECT Fecha_in into fecha FROM cliente where Cliente_ID=c_id;			-- obtenemos la fecha del cliente 
	
	SELECT Servicio_ID_fk into servicio FROM cliente WHERE Cliente_ID=c_id;	-- obtenemos el ID servicio del cliente 
	SELECT precio_s into precio_x FROM servicios WHERE Id_servicio=servicio;
    
    SELECT precio_id into importe FROM cliente WHERE Cliente_ID=c_id;
    SELECT costo into cost FROM precio WHERE id_precio=importe;
		
	SELECT TO_DAYS(CURRENT_DATE()) - TO_DAYS(fecha) INTO N_dias;						-- tenemos el numero de dias de hospedaje del cliente 
	UPDATE `cliente` SET `estado` = '1' WHERE `cliente`.`Cliente_ID` =  c_id;
	
	if(N_dias = 0) then 
		set N_dias = 1;
	end if;
		
	SET Total = N_dias*cost+precio_x;
	RETURN Total;
						-- N_dias numero de dias de hospedaje
						-- 40 precio por dia del parking 
						-- PRECIO es el precio del servicio 	
					-- retornamos el valor de precio de hospedaje
	-- 4dlls dia
	-- 80 pesos dia 
	-- query para calcular el numero de dias transcurridos.
	-- SELECT TO_DAYS( CURRENT_DATE) - TO_DAYS(Fecha_in) AS dias
	-- FROM cliente ORDER BY dias
END;!!
DELIMITER ;











