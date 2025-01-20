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
}