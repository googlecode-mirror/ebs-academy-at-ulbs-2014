<?php

class Teme {

    private $db;

    function __construct($db) {

        $this->db = $db;
    }

    public function getTemeStudentCurent($grupaID) {

        $stmt = $this->db->prepare('SELECT 
                                        `Teme_Licenta`.`ID`,
                                        `Teme_Licenta`.`DENUMIRE_TEMA` AS DENUMIRE,
                                        `User`.`NUME` AS NUME,
                                        `User`.`PRENUME` AS PRENUME,
                                        `Materii`.`DENUMIRE` AS MATERIE
                                    FROM `ULBSPlatform`.`Teme_Licenta`,`ULBSPlatform`.`User`,`ULBSPlatform`.`Materii`
                                    WHERE `ULBSPlatform`.`Teme_Licenta`.`ID_USER`=`ULBSPlatform`.`User`.`ID`
                                    AND `ULBSPlatform`.`Teme_Licenta`.`ID_MATERIE`=`ULBSPlatform`.`Materii`.`ID`
                                    AND `ULBSPlatform`.`Teme_Licenta`.`ID_GRUPA`=:id;
                                    ');
        $stmt->bindParam(':id', $grupaID, PDO::PARAM_INT);
        return $stmt->execute() ? $stmt->fetchAll(PDO::FETCH_ASSOC) : FALSE;
    }
    
        public function addTema($idUser, $idGrupa, $idMaterie,$denumire,$descriere, $fisier='') {

        $stmt = $this->db->prepare('INSERT INTO `ULBSPlatform`.`Teme_Licenta`
                                            (
                                            `ID_USER`,
                                            `ID_GRUPA`,
                                            `ID_MATERIE`,
                                            `DENUMIRE_TEMA`,
                                            `DESCRIERE_TEMA`,
                                            `STATUS`,
                                            `ANEXA`)
                                            VALUES
                                            (
                                            :idUser,
                                            :idGrupa,
                                            :IdMaterie,
                                            :denumire,
                                            :descriere,
                                            \'AVAILABLE\',
                                            LOAD_FILE(:fisier));
                                    ');
        $stmt->bindParam(':fisier', $fisier);
        $stmt->bindParam(':idUser', $idUser);
        $stmt->bindParam(':idGrupa', $idGrupa);
        $stmt->bindParam(':IdMaterie', $idMaterie);
        $stmt->bindParam(':denumire', $denumire);
        $stmt->bindParam(':descriere', $descriere);
        return $stmt->execute() ? TRUE: FALSE;
    }
    
}