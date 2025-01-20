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
            $sql = "CALL spUpdateLeverancier(:id, :naam, :ContactPersoon, :LeverancierNummer, :Mobiel)";
            $this->db->query($sql);
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':naam', $data['naam']);
            $this->db->bind(':ContactPersoon', $data['ContactPersoon']);
            $this->db->bind(':LeverancierNummer', $data['LeverancierNummer']);
            $this->db->bind(':Mobiel', $data['Mobiel']);
            $this->db->execute();

            $sql = "CALL spUpdateContact((SELECT ContactId FROM Leverancier WHERE Id = :id), :Straat, :huisnummer, :postcode, :stad)";
            $this->db->query($sql);
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':Straat', $data['Straat']);
            $this->db->bind(':huisnummer', $data['huisnummer']);
            $this->db->bind(':postcode', $data['postcode']);
            $this->db->bind(':stad', $data['stad']);
            $this->db->execute();

            return true;

        } catch (Exception $e) {
            logger(__LINE__, __METHOD__, __FILE__, $e->getMessage());
            return false;
        }
    }
}