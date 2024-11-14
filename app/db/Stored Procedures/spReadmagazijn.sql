use jamin_mohamed_azzouz;

-- Verwijder de bestaande stored procedure
DROP PROCEDURE IF EXISTS spReadmagazijn;

DELIMITER //

CREATE PROCEDURE spReadmagazijn()
BEGIN

    SELECT       MAGA.Id                    AS      MagazijnId
                ,MAGA.ProductId             AS      MagazijnProductId
                ,MAGA.Verpakkingseenheid
                ,MAGA.AantalAanwezig
                ,PROD.Id                    AS      ProductId
                ,PROD.Naam
                ,PROD.Barcode

    FROM        Magazijn AS MAGA

    INNER JOIN Product AS PROD
            ON PROD.Id = MAGA.ProductId

    ORDER BY PROD.Barcode ASC;


END //
DELIMITER ;