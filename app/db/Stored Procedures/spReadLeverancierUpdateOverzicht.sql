USE jamin_mohamed_azzouz;

DROP PROCEDURE IF EXISTS spReadLeverancierUpdateOverzicht;

DELIMITER //

CREATE PROCEDURE spReadLeverancierUpdateOverzicht()
BEGIN
    SELECT
        LEV.id AS LeverancierId,
        LEV.naam AS LeverancierNaam,
        LEV.ContactPersoon,
        LEV.LeverancierNummer,
        LEV.Mobiel,
        CON.Straat,
        CON.Huisnummer,
        CON.Postcode,
        CON.Stad
    FROM Leverancier AS LEV
    LEFT JOIN Contact AS CON
        ON LEV.ContactId = CON.Id
    GROUP BY LEV.id, LEV.naam, LEV.ContactPersoon, LEV.LeverancierNummer, LEV.Mobiel, CON.Straat, CON.Huisnummer, CON.Postcode, CON.Stad;
END //

DELIMITER ;