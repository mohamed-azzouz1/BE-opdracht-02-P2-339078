USE jamin_mohamed_azzouz;

DROP PROCEDURE IF EXISTS spReadLeverancierOverzicht;

DELIMITER //

CREATE PROCEDURE spReadLeverancierOverzicht()
BEGIN
    SELECT
        PPL.ProductId 
        ,LEV.id AS LeverancierId
        ,LEV.naam AS LeverancierNaam
        ,LEV.ContactPersoon
        ,LEV.LeverancierNummer
        ,LEV.Mobiel
        ,COUNT(DISTINCT PROD.naam) AS ProductCount
    FROM Leverancier AS LEV
    LEFT JOIN ProductPerLeverancier AS PPL
        ON LEV.id = PPL.LeverancierId
    LEFT JOIN product AS PROD
        ON PROD.Id = PPL.ProductId
    GROUP BY LEV.id, LEV.naam, LEV.ContactPersoon, LEV.LeverancierNummer, LEV.Mobiel
    ORDER BY ProductCount desc;



END //

DELIMITER ;

