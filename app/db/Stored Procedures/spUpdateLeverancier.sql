USE jamin_mohamed_azzouz;

DROP PROCEDURE IF EXISTS spUpdateLeverancier;

DELIMITER //

CREATE PROCEDURE spUpdateLeverancier(
    IN GIVleverancierId INT,
    IN GIVnaam VARCHAR(255),
    IN GIVcontactPersoon VARCHAR(255),
    IN GIVleverancierNummer VARCHAR(11),
    IN GIVmobiel VARCHAR(11)
)
BEGIN
    UPDATE Leverancier 
    SET 
        naam = GIVnaam, 
        ContactPersoon = GIVcontactPersoon, 
        LeverancierNummer = GIVleverancierNummer, 
        Mobiel = GIVmobiel 
    WHERE Id = GIVleverancierId;
END //

DELIMITER ;