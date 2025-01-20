USE jamin_mohamed_azzouz;

DROP PROCEDURE IF EXISTS spUpdateLeverancierContact;

DELIMITER //

CREATE PROCEDURE spUpdateLeverancierContact(
    IN GIVcontactId INT,
    IN GIVstraat VARCHAR(255),
    IN GIVhuisnummer VARCHAR(10),
    IN GIVpostcode VARCHAR(10),
    IN GIVstad VARCHAR(255)
)
BEGIN
    UPDATE Contact 
    SET 
        Straat = GIVstraat, 
        Huisnummer = GIVhuisnummer, 
        Postcode = GIVpostcode, 
        Stad = GIVstad 
    WHERE Id = GIVcontactId;
END //

DELIMITER ;