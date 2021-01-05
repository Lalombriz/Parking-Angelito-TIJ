--triggers para validar la fecha de ingreso de un carro 
-- que sea la fecha actual del servido y no una fecha invalida 


DROP TRIGGER IF EXISTS Fecha_valida_BI;
DELIMITER !!

-- creamos un trigger para verificar antes de insertar si la fecha 
-- es iagual a la fecha actual de la base de datos.

create trigger Fecha_valida_BI
before insert on cliente 
for each row 
BEGIN 
		if new.fecha_in <> CURRENT_DATE() then
			SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = "Inserte la fecha correcta del dia POR FAVOR!!!!";
			end if;
END; !!			
DELIMITER ;

--                             $query = "SELECT * from cliente inner join servicios on (Servicio_ID_fk= servicios.Id_servicio)";
