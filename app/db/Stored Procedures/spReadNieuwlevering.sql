USE jamin_mohamed_azzouz;

DROP PROCEDURE IF EXISTS spReadNieuwlevering;

DELIMITER //

CREATE PROCEDURE spReadNieuwlevering(
    IN LevId INT
)
BEGIN

    SELECT
         PROD.naam AS ProductNaam
        ,L.naam AS LeverancierNaam
        ,L.ContactPersoon
        ,L.Mobiel
    FROM 
        product AS PROD
    LEFT JOIN 
        Leverancier AS L
        ON PROD.Id = L.Id
    WHERE
        L.Id = LevId
    GROUP By ProductNaam;
END //

DELIMITER ;
