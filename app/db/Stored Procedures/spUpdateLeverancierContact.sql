USE jamin_mohamed_azzouz;

DROP PROCEDURE IF EXISTS spUpdateLeverancierContact;

DELIMITER //

CREATE PROCEDURE spUpdateLeverancierContact(
    IN contactId INT,
    IN straat VARCHAR(255),
    IN huisnummer VARCHAR(10),
    IN postcode VARCHAR(10),
    IN stad VARCHAR(255)
)
BEGIN
    UPDATE Contact 
    SET 
        Straat = straat, 
        Huisnummer = huisnummer, 
        Postcode = postcode, 
        Stad = stad 
    WHERE Id = contactId;
END //

DELIMITER ;