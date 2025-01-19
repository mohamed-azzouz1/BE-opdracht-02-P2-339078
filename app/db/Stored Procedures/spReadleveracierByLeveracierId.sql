USE jamin_mohamed_azzouz;

DROP PROCEDURE IF EXISTS spReadleveracierByLeveracierId;

DELIMITER //

CREATE PROCEDURE spReadleveracierByLeveracierId(
    IN LevId INT
)
BEGIN

    SELECT
         PROD.naam AS ProductNaam
        ,L.naam AS LeverancierNaam
        ,L.ContactPersoon
        ,L.LeverancierNummer
        ,L.Mobiel
        ,(M.AantalAanwezig + PPL.Aantal) as AantalAanwezig
        ,M.VerpakkingsEenheid
        ,PPL.DatumLevering
    FROM 
        Leverancier AS L
    LEFT JOIN 
        ProductPerLeverancier AS PPL 
        ON L.Id = PPL.LeverancierId
    LEFT JOIN
        Product AS PROD
        ON PPL.ProductId = PROD.Id
    LEFT JOIN
        Magazijn AS M
        ON M.ProductId = PROD.Id
    WHERE
        L.Id = LevId
    GROUP By ProductNaam
    ORDER BY AantalAanwezig desc;
END //

DELIMITER ;
