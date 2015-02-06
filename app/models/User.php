<?php

class User {

    private $db;

    function __construct($db) {

        $this->db = $db;
    }

    /**
     * 
     * Return ID and TIP if password is corect <br>

     * @param string $email <br>
     * @param string $password <br>
     * @return array or bool
     */
    public function checkPassword($email, $pass) {
        $result = array();

        $stmt = $this->db->prepare('SELECT
                                    `User`.`ID`,
                                    `User`.`TIP`
                                FROM `ULBSPlatform`.`User`
                                WHERE EMAIL=:email 
				AND PAROLA=:pass
				AND status = \'AC\';');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);

        if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $result[] = $row;
            }
            return $result;
        } else {
            return false;
        }
    }

    /**
     * 
     * Return user details <br>
     * Campuri: <br>
     * NUME <br>
     * PRENUME <br>
     * EMAIL <br>
     * TIP <br>
     * DATAADAUGARII <br>
     * STATUS 
     * @param int $user_id <br>
     * @return array
     */
    public function getUserDetails($user_id) {

        $result = array();

        $stmt = $this->db->prepare('SELECT 
                    `User`.`EMAIL`,
                    `User`.`NUME`,
                    `User`.`PRENUME`,
                    `User`.`TIP`,
                    `User`.`DATAADAUGARII`,
                    `User`.`STATUS`
                FROM `ULBSPlatform`.`User`
                WHERE ID=:id;');
        $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }
        if (count($result) == 1) {
            return $result;
        } else {
            //logare fisier eroare, prea multe rezultate pt un id
            redirect('error/404');
            return false;
        }
    }

    /**
     * 
     * Return all users details <br>
     * Campuri: <br>
     * NUME <br>
     * PRENUME <br>
     * EMAIL <br>
     * TIP <br>
     * DATAADAUGARII <br>
     * STATUS 
     * @return array
     */
    public function fetchAll() {

        $stmt = $this->db->prepare('SELECT 
                                        `User`.`EMAIL`,
                                        `User`.`NUME`,
                                        `User`.`PRENUME`,
                                        `User`.`TIP`,
                                        `User`.`DATAADAUGARII`,
                                        `User`.`STATUS`
                                    FROM `ULBSPlatform`.`User`');

        return $stmt->execute() ? $stmt->fetchAll(PDO::FETCH_ASSOC) : FALSE;
    }

    /**
     * 
     * Return users with selected status <br>
     * Campuri: <br>
     * NUME <br>
     * PRENUME <br>
     * EMAIL <br>
     * TIP <br>
     * DATAADAUGARII <br>
     * STATUS 
     * @param String $status <br>
     * @return array
     */
    public function fetchByStatus($status) {

        $stmt = $this->db->prepare('SELECT 
                                                `User`.`EMAIL`,
                                                `User`.`NUME`,
                                                `User`.`PRENUME`,
                                                `User`.`TIP`,
                                                `User`.`DATAADAUGARII`,
                                                `User`.`STATUS`
                                            FROM `ULBSPlatform`.`User`
                                            WHERE STATUS=:status;');
        $stmt->bindParam(':status', $status, PDO::PARAM_STR);

        return $stmt->execute() ? $stmt->fetchAll(PDO::FETCH_ASSOC) : FALSE;
    }

    /**
     * 
     * Return user by type <br>
     * Campuri: <br>
     * NUME <br>
     * PRENUME <br>
     * EMAIL <br>
     * TIP <br>
     * DATAADAUGARII <br>
     * STATUS 
     * @param String $type 
     * @return array
     */
    public function fetchByType($type) {

        $stmt = $this->db->prepare('SELECT 
                                        `User`.`EMAIL`,
                                        `User`.`NUME`,
                                        `User`.`PRENUME`,
                                        `User`.`TIP`,
                                        `User`.`DATAADAUGARII`,
                                        `User`.`STATUS`
                                    FROM `ULBSPlatform`.`User`
                                    WHERE TIP=:type;');
        $stmt->bindParam(':type', $type, PDO::PARAM_STR);

        return $stmt->execute() ? $stmt->fetchAll(PDO::FETCH_ASSOC) : FALSE;
    }

    /**
     * 
     * Set user type <br>
     * @param int $id
     * @param String $type 
     * @return bool
     */
    public function setType($id, $type) {

        $stmt = $this->db->prepare('UPDATE `ULBSPlatform`.`User`
                                SET
                                `TIP` =:type
                                WHERE `ID` =:id;');
        $stmt->bindParam(':type', $type, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute() ? true : false;
    }

    /**
     * 
     * Set user email <br>
     * @param int $id
     * @param String $email
     * @return bool
     */
    public function setEmail($id, $email) {
        
        $stmt = $this->db->prepare('UPDATE `ULBSPlatform`.`User`
                                SET
                                `EMAIL` =:email
                                WHERE `ID` =:id;');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute() ? true : false;
    }

    /**
     * 
     * Set user email <br>
     * @param int $id
     * @param String $nume
     * @param String $prenume
     * @param String $status
     * @return bool
     */
    public function updateUser($id, $nume, $prenume, $status) {
        
        $stmt = $this->db->prepare('UPDATE `ULBSPlatform`.`User`
                                SET
                                `NUME` =:nume,
                                `PRENUME` =:prenume,
                                `STATUS` =:status
                                WHERE `ID` =:id;');
        $stmt->bindParam(':nume', $nume, PDO::PARAM_STR);
        $stmt->bindParam(':prenume', $prenume, PDO::PARAM_STR);
        $stmt->bindParam(':status', $status, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute() ? true : false;
    }

    /**
     *
     * Add new user <br>
     * @param String $email
     * @param String $password
     * @param String $nume
     * @param String $prenume
     * @param String $tip
     * @return user_id or false
     */
    public function addUser($email, $parola, $nume, $prenume, $tip) {

        $stmt = $this->db->prepare('INSERT INTO `ULBSPlatform`.`User`
                                        (
                                        `EMAIL`,
                                        `PAROLA`,
                                        `NUME`,
                                        `PRENUME`,
                                        `TIP`,
                                        `DATAADAUGARII`,
                                        `STATUS`)
                                        VALUES
                                        (
                                        :email,
                                        :parola,
                                        :nume,
                                        :prenume,
                                        :tip,
                                        now(),
                                        \'new\');');

        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':parola', $parola, PDO::PARAM_STR);
        $stmt->bindParam(':nume', $nume, PDO::PARAM_STR);
        $stmt->bindParam(':prenume', $prenume, PDO::PARAM_STR);
        $stmt->bindParam(':tip', $tip, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->execute() ? $user_id = $this->db->lastInsertId() : false;
    }

    /**
     * 
     * Check user email <br>
     * @param String $email
     * @return bool
     */
    public function isEmailAvaible($email) {



        $stmt = $this->db->prepare('SELECT
                                        `User`.`EMAIL`
                                    FROM `ULBSPlatform`.`User`
                                    WHERE `User`.`EMAIL`=:email;');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);

        $stmt->execute();
        if ($stmt->fetch(PDO::FETCH_ASSOC)) {
            return 'false';
        } else {
            return 'true';
        }
    }

}
