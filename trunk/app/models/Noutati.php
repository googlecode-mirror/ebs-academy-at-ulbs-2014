<?php

class Noutati {

    private $db;

    function __construct($db) {

        $this->db = $db;
    }

    /**
     * 
     * add new news <br>
     * @param String $autor
     * @param String $mesaj
     * @return mesage id or false
     */
    public function addNews($autor, $mesaj) {

        $stmt = $this->db->prepare('INSERT INTO `ULBSPlatform`.`Noutati`
                                        (`AUTOR`,
                                        `DATA`,
                                        `MESAJ`)
                                        VALUES
                                        (
                                        :autor,
                                        now(),
                                        :mesaj);');
        $stmt->bindParam(':autor', $autor, PDO::PARAM_STR);
        $stmt->bindParam(':mesaj', $mesaj, PDO::PARAM_STR);


        return $stmt->execute() ? $newsID = $this->db->lastInsertId() : FALSE;
    }

    /**
     * 
     * Select all news <br>
     * @return array
     */
    public function fetchAll() {

        $stmt = $this->db->prepare('SELECT 
                                       *
                                    FROM `ULBSPlatform`.`Noutati`');

        return $stmt->execute() ? $stmt->fetchAll(PDO::FETCH_ASSOC) : FALSE;
    }

    /**
     * 
     * Select one news <br>
     * @return array
     */
    public function fetchNews($id) {

        $stmt = $this->db->prepare('SELECT 
                                       *
                                    FROM `ULBSPlatform`.`Noutati`
                                    WHERE `ID` =:id;');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute() ? $stmt->fetchAll(PDO::FETCH_ASSOC) : FALSE;
    }

    /**
     * 
     * Delete one news <br>
     * @param int $id
     * @return bool
     */
    public function deleteNews($id) {

        $stmt = $this->db->prepare('DELETE from `ULBSPlatform`.`Noutati`
                                    WHERE `ID` =:id;');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute() ? true : false;
    }

    /**
     * 
     * Update news <br>
     * @param int $id
     * @param String $mesaj
     * @return bool
     */
    public function updateNews($id, $mesaj) {

        $stmt = $this->db->prepare('UPDATE `ULBSPlatform`.`Noutati`
                                    SET
                                    `MESAJ` =:mesaj
                                    WHERE `ID` =:id;');
        $stmt->bindParam(':mesaj', $mesaj);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute() ? true : false;
    }

}
