USE jamin_mohamed_azzouz;

DROP PROCEDURE IF EXISTS spReadLeverancierUpdateOverzicht;

DELIMITER //

CREATE PROCEDURE spReadLeverancierUpdateOverzicht()
BEGIN
    SELECT
        LEV.id AS LeverancierId
        ,LEV.naam AS LeverancierNaam
        ,LEV.ContactPersoon
        ,LEV.LeverancierNummer
        ,LEV.Mobiel
    FROM Leverancier AS LEV
    LEFT JOIN ProductPerLeverancier AS PPL
        ON LEV.id = PPL.LeverancierId
    GROUP BY LEV.id, LEV.naam, LEV.ContactPersoon, LEV.LeverancierNummer, LEV.Mobiel;




END //

DELIMITER ;


