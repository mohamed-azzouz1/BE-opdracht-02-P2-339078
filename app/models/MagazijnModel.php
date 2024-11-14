<?php

class MagazijnModel
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

    public function getMagazijn()
    {
        try {
            $sql = "CALL spReadmagazijn()";

            $this->db->query($sql);

            return $this->db->resultSet();

        } catch (Exception $e) {
            /**
             * Log de error in de functie logger()
             */
            logger(__LINE__, __METHOD__, __FILE__, $e->getMessage());            
        }
    }
    public function getLeverantieinfo($Pid)
    {
        try {
            $sql = "CALL spReadLeverancier(
                :Pid
            )";

            $this->db->query($sql);

            $this->db->bind(':Pid', $Pid, PDO::PARAM_STR);
          


            return $this->db->resultSet();

        } catch (Exception $e) {
            /**
             * Log de error in de functie logger()
             */
            logger(__LINE__, __METHOD__, __FILE__, $e->getMessage());            
        }
    }

    public function getallergeninfo($GivenProductId)
    {
        try {
            $sql = "CALL spReadAllergenen(
                :GivenProductId
            )";

            $this->db->query($sql);

            $this->db->bind(':GivenProductId', $GivenProductId, PDO::PARAM_INT);
          


            return $this->db->resultSet();

        } catch (Exception $e) {
            /**
             * Log de error in de functie logger()
             */
            logger(__LINE__, __METHOD__, __FILE__, $e->getMessage());            
        }
    }

}