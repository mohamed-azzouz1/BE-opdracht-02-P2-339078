USE jamin_mohamed_azzouz;

DROP PROCEDURE IF EXISTS spAddLeverancier;

DELIMITER //

CREATE PROCEDURE spAddLeverancier(
    IN Aantal INT UNSIGNED,
    IN DatumEerstVolgendeLevering DATE
)
BEGIN
    INSERT INTO ProductPerLeverancier (Aantal, DatumEerstVolgendeLevering)
    VALUES (Aantal, DatumEerstVolgendeLevering);
END //

DELIMITER ;