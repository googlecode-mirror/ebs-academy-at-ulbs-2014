<?php

class Teme {

    private $db;

    function __construct($db) {

        $this->db = $db;
    }

    public function fetchTemeStudent() {

        $stmt = $this->db->prepare('SELECT 
                                        `Teme_Licenta`.`ID`,
                                        `Teme_Licenta`.`DENUMIRE_TEMA` AS DENUMIRE,
                                        `User`.`NUME` AS NUME,
                                        `User`.`PRENUME` AS PRENUME,
                                        `Materii`.`DENUMIRE` AS MATERIE
                                    FROM `ULBSPlatform`.`Teme_Licenta`,`ULBSPlatform`.`User`,`ULBSPlatform`.`Materii`
                                    WHERE `ULBSPlatform`.`Teme_Licenta`.`ID_USER`=`ULBSPlatform`.`User`.`ID`
                                    AND `ULBSPlatform`.`Teme_Licenta`.`ID_MATERIE`=`ULBSPlatform`.`Materii`.`ID`
                                    ');

        return $stmt->execute() ? $stmt->fetchAll(PDO::FETCH_ASSOC) : FALSE;
    }
    
}