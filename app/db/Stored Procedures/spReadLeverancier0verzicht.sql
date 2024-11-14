USE jamin_mohamed_azzouz;

DROP PROCEDURE IF EXISTS spReadLeverancierOverzicht;

DELIMITER //

CREATE PROCEDURE spReadLeverancierOverzicht()
BEGIN
    SELECT
        LEV.naam AS LeverancierNaam,
        LEV.ContactPersoon,
        LEV.LeverancierNummer,
        LEV.Mobiel,
        COUNT(ppl.ProductId) AS ProductCount
    FROM Leverancier AS LEV
    LEFT JOIN ProductPerLeverancier AS ppl
        ON LEV.id = ppl.LeverancierId
    GROUP BY LEV.id, LEV.naam, LEV.ContactPersoon, LEV.LeverancierNummer, LEV.Mobiel
    ORDER BY ProductCount desc;


END //

DELIMITER ;

