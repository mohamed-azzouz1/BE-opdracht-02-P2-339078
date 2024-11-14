

USE jamin_mohamed_azzouz;

DROP PROCEDURE IF EXISTS spReadAllergenen;

DELIMITER //

CREATE PROCEDURE spReadAllergenen(
    IN GivenProductId INT unsigned       
)
BEGIN
    SELECT
        PROD.naam as ProductNaam
        ,PROD.Barcode
        ,ALLE.naam as Allergeennaam
        ,ALLE.Omschrijving
        FROM ProductPerAllergeen as PPA
        INNER JOIN Product AS PROD
        ON PPA.ProductId = PROD.Id
        INNER JOIN Allergeen AS ALLE
        ON PPA.AllergeenId = ALLE.Id
        WHERE PPA.ProductId = GivenProductId

    ORDER BY ALLE.naam ASC;

END //

DELIMITER ;