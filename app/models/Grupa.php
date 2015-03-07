<?php

class Grupa {

    private $db;

    function __construct($db) {

        $this->db = $db;
    }
	
	 /**
     * 
     * Return grupe details <br>
     * Campuri: <br>
     * NUME <br>
     * AN <br>
     * SEF GRUPA <br>
     * PROFIL <br>
     * @param int $grupaId <br>
     * @return array
     */
	
	public function getGrupaDetails($grupaId) {

        $result = array();

        $stmt = $this->db->prepare('SELECT 
                  *
                FROM `ULBSPlatform`.`Grupa`
                WHERE ID=:id;');
        $stmt->bindParam(':id', $grupaId, PDO::PARAM_INT);
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
     * Return grupe details <br>
     * Campuri: <br>
     * NUME <br>
     * AN <br>
     * SEF GRUPA <br>
     * PROFIL <br>
     * @return array
     */
	
	public function fetchAll() {

        $stmt = $this->db->prepare('SELECT 
                                       *
                                    FROM `ULBSPlatform`.`Grupa`');

        return $stmt->execute() ? $stmt->fetchAll(PDO::FETCH_ASSOC) : FALSE;
    }
	
	/**
     * 
     * Set grupa sef_grupa <br>
     * @param int $id
     * @param String $sef_grupa
     * @return bool
     */
    public function setSefGrupa($id, $sef_grupa) {

        $stmt = $this->db->prepare('UPDATE `ULBSPlatform`.`Grupa`
                                SET
                                `SEF_GRUPA` =:sef_grupa
                                WHERE `ID` =:id;');
        $stmt->bindParam(':sef_grupa', $sef_grupa, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute() ? true : false;
    }
	
	
    /**
     * 
     * Update Grupa <br>
     * @param int $id
     * @param String $nume
     * @param int $an
     * @param String $sef_grupa
	 * @param String $profil
     * @return bool
     */
    public function updateGrupa($id, $nume, $an, $sef_grupa, $profil) {
        
        $stmt = $this->db->prepare('UPDATE `ULBSPlatform`.`Grupa`
                                    SET
                                    `NUME` =:nume,
                                    `AN` =:an,
                                    `SEF_GRUPA` =:sef_grupa,
                                    `PROFIL` =:profil
                                    WHERE `ID` =:id;
                                    ');
        $stmt->bindParam(':nume', $nume, PDO::PARAM_STR);
        $stmt->bindParam(':an', $an, PDO::PARAM_INT);
        $stmt->bindParam(':sef_grupa', $sef_grupa, PDO::PARAM_STR);
		$stmt->bindParam(':profil', $profil, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute() ? true : false;
    }
	
	/**
     *
     * Add new grupa <br>
     * @param String $nume
     * @param int $an
     * @param String $sef_grupa
     * @param String $profil
     * @return GrupaId or false
     */
    public function addGrupa($nume, $an, $profil) {

        $stmt = $this->db->prepare('INSERT INTO `ULBSPlatform`.`Grupa`
                                        (
                                        `NUME`,
                                        `AN`,
                                        `PROFIL`)
                                        VALUES
                                        (
                                        :nume,
                                        :an,
                                        :profil);');

        $stmt->bindParam(':nume', $nume, PDO::PARAM_STR);
        $stmt->bindParam(':an', $an, PDO::PARAM_INT);
        $stmt->bindParam(':profil', $profil, PDO::PARAM_STR);
       
        return $stmt->execute() ? $GrupaId = $this->db->lastInsertId() : false;
    }
    
    /**
     * 
     * Fetch grupa users <br>
     * @param int $id
     * @return array or false
     */
    public function fetchGrupaUsers($id) {
        
        $stmt = $this->db->prepare('SELECT `User`.`ID`,
                                        `User`.`NUME`,
                                        `User`.`PRENUME`,
                                        `User_Grupa`.ID as IDGrupaUsers
                                    FROM `ULBSPlatform`.`User`,`ULBSPlatform`.`User_Grupa`,`ULBSPlatform`.`Grupa`
                                    WHERE `ULBSPlatform`.`User_Grupa`.`ID_USER`=`ULBSPlatform`.`User`.`ID`
                                    AND `ULBSPlatform`.`User_Grupa`.`ID_GRUPA`=`ULBSPlatform`.`Grupa`.`ID`
                                    AND `ULBSPlatform`.`Grupa`.`ID`=:id;
                                    ');
           $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute() ? $stmt->fetchAll(PDO::FETCH_ASSOC) : FALSE;
 }
 
	   /**
     * 
     * Delete grupa <br>
     * @param int $id
     * @return bool
     */
    public function deleteGrupa($id) {
        
        $stmt = $this->db->prepare('DELETE from `ULBSPlatform`.`Grupa`
                                    WHERE `ID` =:id;');
           $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute() ? true : false;
 }
    
    /**
     * 
     * add grupa member<br>
     * @param int $idGrupa
     * @param int $idUser
     * @return bool
     */
    public function addGrupaMember($idGrupa,$idUser) {
        
        $stmt = $this->db->prepare('INSERT INTO `ULBSPlatform`.`User_Grupa`
                                        (
                                        `ID_USER`,
                                        `ID_GRUPA`)
                                        VALUES
                                        (:idUser,
                                        :idGrupa);
                                        ');
           $stmt->bindParam(':idGrupa', $idGrupa, PDO::PARAM_INT);
            $stmt->bindParam(':idUser', $idUser, PDO::PARAM_INT);

        return $stmt->execute() ? true : false;
 }
 
    /**
     * 
     * Delete membru grupa <br>
     * @param int $id
     * @return bool
     */
    public function deleteGrupaMember($id) {
        
        $stmt = $this->db->prepare('DELETE from `ULBSPlatform`.`User_Grupa`
                                    WHERE `ID` =:id;');
           $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute() ? true : false;
 }
 
   /**
     * 
     * verificare daca studentul e inscris la materia respectiva<br>
     * @param int $idGrupa
     * @param int $idUser
     * @return bool
     */
    public function checkRegister($idGrupa,$idUser) {
        
        $stmt = $this->db->prepare('SELECT * from `ULBSPlatform`.`User_Grupa`
                                        (
                                        `ID_USER`= :idUser
                                        `ID_GRUPA`=:idGrupa;
                                      ');
           $stmt->bindParam(':idGrupa', $idGrupa, PDO::PARAM_INT);
            $stmt->bindParam(':idUser', $idUser, PDO::PARAM_INT);

        return $stmt->execute() ? false : true;
 }
 
 
}