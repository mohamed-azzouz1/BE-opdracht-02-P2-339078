<?php

class Levarancier
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

    public function getLeverancierOverzicht()
    {
        try {
            $sql = "CALL spReadLeverancierOverzicht()";

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
    public function getLeverantieProductinfo($Pid)
    {
        try {
            $sql = "CALL spReadleveracierByLeveracierId(
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

    public function getnieuwelevering($LevId)
    {
        try {
            $sql = "CALL spReadNieuwlevering(:LevId)";
    
            $this->db->query($sql);
    
            // Bind de parameter
            $this->db->bind(':LevId', $LevId, PDO::PARAM_INT);
    
            // Voer de query uit en retourneer het resultaat
            return $this->db->resultSet();
    
        } catch (Exception $e) {
            // Log de error in de functie logger()
            logger(__LINE__, __METHOD__, __FILE__, $e->getMessage());
            return false;
        }
    }


    public function createnieuwelevering($aantal, $datumEerstVolgendeLevering)
    {
        try {
            $sql = "CALL spAddLeverancier(:Aantal, :DatumEerstVolgendeLevering)";
    
            $this->db->query($sql);
    
            // Bind de parameters
            $this->db->bind(':Aantal', $aantal, PDO::PARAM_INT);
            $this->db->bind(':DatumEerstVolgendeLevering', $datumEerstVolgendeLevering, PDO::PARAM_STR);
    
            // Voer de query uit
            $this->db->execute();
    
            // Retourneer het resultaat
            return $this->db->resultSet();
    
        } catch (Exception $e) {
            // Log de error in de functie logger()
            logger(__LINE__, __METHOD__, __FILE__, $e->getMessage());
            return false;
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