USE jamin_mohamed_azzouz;

DROP PROCEDURE IF EXISTS spReadLeverancier;

DELIMITER //

CREATE PROCEDURE spReadLeverancier(
    IN pId INT unsigned       
)
BEGIN
    SELECT
        p.naam as ProductNaam
        ,l.naam AS LeverancierNaam
        ,l.ContactPersoon
        ,l.LeverancierNummer
        ,l.Mobiel
        ,ppl.DatumLevering
        ,ppl.Aantal
        ,ppl.DatumEerstVolgendeLevering
    FROM 
        Product p
    JOIN 
        ProductPerLeverancier ppl ON p.Id = ppl.ProductId
    JOIN 
        Leverancier l ON ppl.LeverancierId = l.Id
    WHERE 
        p.id = pId
    ORDER BY ppl.DatumLevering ASC;

END //

DELIMITER ;
