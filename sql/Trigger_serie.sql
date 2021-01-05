-- Trigger para validar que los numeros de serie
-- no sean iguales a uno ya ingresado en la BD 


DROP TRIGGER IF EXISTS Serie_valida_BU;
DELIMITER !!


create trigger Serie_valida_BU
before update on cliente 
for each row 
BEGIN 
		if new.NumSerie = old.NumSerie and old.estado = 0 then
			SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = "EL numero de serie esta existente como un auto vigente!!!!";
			end if;
END
END;!!			
DELIMITER ;

--                             $query = "SELECT * from cliente inner join servicios on (Servicio_ID_fk= servicios.Id_servicio)";
