<?php

class   LeverancierUpdateOverzicht
{
    private $db;

    public function __construct()
    {
        /**
         * Maak een nieuw database object die verbinding maakt met de 
         * MySQL server
         */
        $this->db = new Database();
    }
    

    public function getleverancierupdateOverzicht() {
        try {
            $sql = "CALL spReadLeverancierUpdateOverzicht()";

            $this->db->query($sql);

            return $this->db->resultSet();

        } catch (Exception $e) {
            /**
             * Log de error in de functie logger()
             */
            logger(__LINE__, __METHOD__, __FILE__, $e->getMessage());
        }
    }
    public function getLeverancierById($id) {
        try {
            $sql = "SELECT * FROM Leverancier WHERE Id = :id";

            $this->db->query($sql);
            $this->db->bind(':id', $id, PDO::PARAM_INT);

            return $this->db->single();

        } catch (Exception $e) {
            /**
             * Log de error in de functie logger()
             */
            logger(__LINE__, __METHOD__, __FILE__, $e->getMessage());
        }
    }

    public function getContactById($contactId) {
        try {
            $sql = "SELECT * FROM Contact WHERE Id = :id";

            $this->db->query($sql);
            $this->db->bind(':id', $contactId, PDO::PARAM_INT);

            return $this->db->single();

        } catch (Exception $e) {
            /**
             * Log de error in de functie logger()
             */
            logger(__LINE__, __METHOD__, __FILE__, $e->getMessage());
        }
    }
    public function updateLeverancier($data) {
        try {
            $sql = "CALL sss(:Id, :Naam, :ContactPersoon, :LeverancierNummer, :Mobiel)";
            $this->db->query($sql);
            $this->db->bind(':Id', $data['Id'], PDO::PARAM_INT);
            $this->db->bind(':Naam', $data['Naam'], PDO::PARAM_STR);
            $this->db->bind(':ContactPersoon', $data['ContactPersoon'], PDO::PARAM_STR);
            $this->db->bind(':LeverancierNummer', $data['LeverancierNummer'], PDO::PARAM_STR);
            $this->db->bind(':Mobiel', $data['Mobiel'], PDO::PARAM_STR);
            $this->db->execute();

            $sql = "CALL sss(:ContactId, :Straat, :Huisnummer, :Postcode, :Stad)";
            $this->db->query($sql);
            $this->db->bind(':ContactId', $data['ContactId'], PDO::PARAM_INT);
            $this->db->bind(':Straat', $data['Straat'], PDO::PARAM_STR);
            $this->db->bind(':Huisnummer', $data['Huisnummer'], PDO::PARAM_STR);
            $this->db->bind(':Postcode', $data['Postcode'], PDO::PARAM_STR);
            $this->db->bind(':Stad', $data['Stad'], PDO::PARAM_STR);
            $this->db->execute();

            return true;

        } catch (Exception $e) {
            logger(__LINE__, __METHOD__, __FILE__, $e->getMessage());
            return false;
        }
    }

    public function getTotalLeveranciers() {
        try {
            $sql = "SELECT COUNT(*) as total FROM Leverancier";
            $this->db->query($sql);
            return $this->db->single()->total;
        } catch (Exception $e) {
            logger(__LINE__, __METHOD__, __FILE__, $e->getMessage());
            return 0;
        }
    }
    
    public function getLeveranciersByPage($start, $limit) {
        try {
            $sql = "SELECT * FROM Leverancier LIMIT :start, :limit";
            $this->db->query($sql);
            $this->db->bind(':start', $start, PDO::PARAM_INT);
            $this->db->bind(':limit', $limit, PDO::PARAM_INT);
            return $this->db->resultSet();
        } catch (Exception $e) {
            logger(__LINE__, __METHOD__, __FILE__, $e->getMessage());
            return [];
        }
    }

}