<?php

class Materii {

    private $db;

    function __construct($db) {

        $this->db = $db;
    }
      public function fetchGrupaMaterii($idGrupa) {

        $stmt = $this->db->prepare('SELECT `ULBSPlatform`.`Materii`.`ID`, `ULBSPlatform`.`Materii`.`DENUMIRE`, `ULBSPlatform`.`Materii`.`ID_USER`
                                        FROM `ULBSPlatform`.`Materii_Grupe`,`ULBSPlatform`.`Materii`,`ULBSPlatform`.`Grupa`
                                       where `Materii_Grupe`.`ID_MATERIE`=`Materii`.`ID`
                                       and `Grupa`.`ID`=`Materii_Grupe`.`ID_GRUPA`
                                       and `Materii_Grupe`.`ID_GRUPA`=:id;');
        $stmt->bindParam(':id', $idGrupa);
        
        return $stmt->execute() ? $stmt->fetchAll(PDO::FETCH_ASSOC) : FALSE;
    }

    /**
     * 
     * Return materii details <br>
     * Campuri: <br>
     * USER <br>
     * CREDITE <br>
     * DENUMIRE <br>
     * @param int $materiiId <br>
     * @return array
     */
    public function getMateriiDetails($materiiId) {

        $result = array();

        $stmt = $this->db->prepare('SELECT
                    
                    `Materii`.`ID`,
                     `Materii`.`ID_USER`,
                    `Materii`.`CREDITE`,
                    `Materii`.`DENUMIRE`
                FROM `ULBSPlatform`.`Materii`
               
                    where `Materii`.`ID`=:id;');
        $stmt->bindParam(':id', $materiiId, PDO::PARAM_INT);
       

        return $stmt->execute() ? $stmt->fetch(PDO::FETCH_ASSOC) : FALSE;
    }

    /**
     * 
     * Return materii details <br>
     * Campuri: <br>
     * USER <br>
     * CREDITE <br>
     * DENUMIRE <br>
     * @return array
     */
    public function fetchGroupaAndMateria() {

        $stmt = $this->db->prepare('SELECT
                    `Grupa`.`NUME`,
                    `Materii`.`ID`,
                    `Materii`.`CREDITE`,
                    `Materii`.`DENUMIRE`
                FROM `ULBSPlatform`.`Materii`
                inner join `ULBSPlatform`.`Materii_grupe`  
                    on materii.ID = materii_grupe.ID_MATERIE
		inner join `ULBSPlatform`.`Grupa`  
                    on materii_grupe.ID_GRUPA = grupa.ID');

        return $stmt->execute() ? $stmt->fetchAll(PDO::FETCH_ASSOC) : FALSE;
    }
    
    
    public function fetchMaterii() {

        $stmt = $this->db->prepare('SELECT
                    
                    `Materii`.`ID`,
                    `Materii`.`CREDITE`,
                    `Materii`.`DENUMIRE`
                FROM `ULBSPlatform`.`Materii`
                ;');

        return $stmt->execute() ? $stmt->fetchAll(PDO::FETCH_ASSOC) : FALSE;
    }

    /**
     * 
     * Update Materii <br>
     * @param int $id
     * @param String $id_user
     * @param int $credite
     * @param String $denumire
     * @return bool
     */
    public function updateMaterii($id, $credite, $denumire, $idProf) {

        $stmt = $this->db->prepare('UPDATE `ULBSPlatform`.`Materii`
                                    SET
                                    `ID_USER` =:profesor,
                                    `CREDITE` =:credite,
                                    `DENUMIRE` =:denumire
                                     WHERE `ID` =:id;
                                    ');
        $stmt->bindParam(':profesor', $idProf, PDO::PARAM_INT);
        $stmt->bindParam(':credite', $credite, PDO::PARAM_INT);
        $stmt->bindParam(':denumire', $denumire, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute() ? true : false;
    }

    /**
     *
     * Add new materii <br>
     * @param String $id_user
     * @param int $credite
     * @param String $denumire
     * @return GrupaId or false
     */
    public function addMaterii($id,$credite, $denumire) {

        $stmt = $this->db->prepare('INSERT INTO `ULBSPlatform`.`Materii`
                                        (
                                        `ID_USER`,
                                        `CREDITE`,
                                        `DENUMIRE`)
                                        VALUES
                                        (
                                        :idUser,
                                        :credite,
                                        :denumire);');

        $stmt->bindParam(':credite', $credite, PDO::PARAM_INT);
         $stmt->bindParam(':idUser', $id, PDO::PARAM_INT);
        $stmt->bindParam(':denumire', $denumire, PDO::PARAM_STR);
       
        return $stmt->execute() ? $MateriiId = $this->db->lastInsertId() : false;
    }

    /**
     * 
     * Delete materi <br>
     * @param int $id
     * @return bool
     */
    public function deleteMaterii($id) {

        $stmt = $this->db->prepare('DELETE from `ULBSPlatform`.`Materii`
                                    WHERE `ID` =:id;');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute() ? true : false;
    }

    
  

}
