<?php

class Materii {

    private $db;

    function __construct($db) {

        $this->db = $db;
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
                    `Grupa`.`NUME`,
                    `Materii`.`ID`,
                    `Materii`.`CREDITE`,
                    `Materii`.`DENUMIRE`
                FROM `ULBSPlatform`.`Materii`
                inner join `ULBSPlatform`.`materii_grupe`  
                    on materii.ID = materii_grupe.ID_MATERIE
		inner join `ULBSPlatform`.`Grupa`  
                    on materii_grupe.ID_GRUPA = Grupa.ID');
        $stmt->bindParam(':id', $materiiId, PDO::PARAM_INT);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }
        if (count($result) == 1) {
            return $result;
        } else {
            return false;
        }
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
	
	public function fetchAll() {

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
    /**
     * 
     * Update Materii <br>
     * @param int $id
     * @param String $id_user
     * @param int $credite
     * @param String $denumire
     * @return bool
     */
	 public function updateMaterii($id, $credite, $denumire) {
        
        $stmt = $this->db->prepare('UPDATE `ULBSPlatform`.`Materii`
                                    SET
                                    `CREDITE` =:credite,
                                    `DENUMIRE` =:denumire,
                                     WHERE `ID` =:id;
                                    ');
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
    public function addMaterii($credite, $denumire) {

        $stmt = $this->db->prepare('INSERT INTO `ULBSPlatform`.`Materii`
                                        (
                                        `CREDITE`,
                                        `DENUMIRE`)
                                        VALUES
                                        (
                                        :credite,
                                        :denumire);');
       
        $stmt->bindParam(':credite', $credite, PDO::PARAM_INT);
        $stmt->bindParam(':denumire', $denumire, PDO::PARAM_STR);
        $stmt->execute();
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