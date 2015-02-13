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
                    `Grupa`.`NUME`,
                    `Grupa`.`AN`,
                    `Grupa`.`SEF_GRUPA`,
                    `Grupa`.`PROFIL`,
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
                                        `Grupa`.`NUME`,
										`Grupa`.`AN`,
										`Grupa`.`SEF_GRUPA`,
										`Grupa`.`PROFIL`,
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
                                `SEF_GRUPA`` =:sef_grupa
								`PROFIL` =:profil
                                WHERE `ID` =:id;');
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
    public function addGrupa($id, $nume, $an, $sef_grupa, $profil) {

        $stmt = $this->db->prepare('INSERT INTO `ULBSPlatform`.`Grupa`
                                        (
                                        `NUME`,
                                        `AN`,
                                        `SEF_GRUPA``,
                                        `PROFIL`)
                                        VALUES
                                        (
                                        :nume,
                                        :an,
                                        :sef_grupa,
                                        :profil);');

        $stmt->bindParam(':nume', $nume, PDO::PARAM_STR);
        $stmt->bindParam(':an', $an, PDO::PARAM_INT);
        $stmt->bindParam(':sef_grupa', $sef_grupa, PDO::PARAM_STR);
        $stmt->bindParam(':profil', $profil, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->execute() ? $GrupaId = $this->db->lastInsertId() : false;
    }
	
}