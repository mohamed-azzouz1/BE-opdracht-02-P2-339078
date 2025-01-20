USE jamin_mohamed_azzouz;

DROP PROCEDURE IF EXISTS spUpdateLeverancier;

DELIMITER //

CREATE PROCEDURE spUpdateLeverancier(
    IN leverancierId INT,
    IN naam VARCHAR(255),
    IN contactPersoon VARCHAR(255),
    IN leverancierNummer VARCHAR(11),
    IN mobiel VARCHAR(11)
)
BEGIN
    UPDATE Leverancier 
    SET 
        naam = naam, 
        ContactPersoon = contactPersoon, 
        LeverancierNummer = leverancierNummer, 
        Mobiel = mobiel 
    WHERE Id = leverancierId;
END //

DELIMITER ;