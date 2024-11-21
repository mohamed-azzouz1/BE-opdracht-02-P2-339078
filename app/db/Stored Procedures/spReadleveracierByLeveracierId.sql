spReadleveracierByLeveracierId
USE jamin_mohamed_azzouz;

DROP PROCEDURE IF EXISTS spReadleveracierByLeveracierId;

DELIMITER //

CREATE PROCEDURE spReadleveracierByLeveracierId()
BEGIN
    SELECT
        p.naam as ProductNaam
        ,l.naam AS LeverancierNaam
        ,l.ContactPersoon
        ,l.LeverancierNummer
        ,l.Mobiel
    FROM 
        Product p
    JOIN 
        ProductPerLeverancier ppl ON p.Id = ppl.ProductId
    JOIN 
        Leverancier l ON ppl.LeverancierId = l.Id
    WHERE 
        p.id = pId
END //

DELIMITER ;