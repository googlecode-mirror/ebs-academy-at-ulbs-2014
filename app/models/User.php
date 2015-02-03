<?php

class User {

    function __construct($db) {

        $this->db = $db;
    }

    /**
     * 
     * Return true is password is corect <br>

     * @param int $email <br>
     * @param int $password <br>
     * @return bool
     */
    public function checkPasswd($email, $pass) {
        $db = $GLOBALS['dbh'];
        $stmt = $db->prepare('SELECT
                                    `user`.`EMAIL`,
                                    `user`.`PAROLA`
                                FROM `ulbsplatform`.`user`
                                WHERE EMAIL=:email AND PAROLA=:pass;');
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':pass', $pass, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->fetch()) {
            return true;
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
        getdbh();
        $db = $GLOBALS['dbh'];

        $stmt = $db->prepare('SELECT
                                `user`.`EMAIL`,
                                `user`.`NUME`,
                                `user`.`PRENUME`,
                                `user`.`TIP`,
                                `user`.`DATAADAUGARII`,
                                `user`.`STATUS`
                            FROM `ulbsplatform`.`user`
                            WHERE ID=:id;');
        $stmt->bindValue(':id', $user_id, PDO::PARAM_INT);
        $stmt->execute(array('id' => $user_id));

        while ($row = $stmt->fetch()) {
            return $row;
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
        getdbh();
        $db = $GLOBALS['dbh'];

        $stmt = $db->prepare('SELECT
                                `user`.`EMAIL`,
                                `user`.`NUME`,
                                `user`.`PRENUME`,
                                `user`.`TIP`,
                                `user`.`DATAADAUGARII`,
                                `user`.`STATUS`
                            FROM `ulbsplatform`.`user`;');

        $stmt->execute();


        return $stmt->execute() ? $stmt->fetchAll() : FALSE;
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
        getdbh();
        $db = $GLOBALS['dbh'];

        $stmt = $db->prepare('SELECT
                                `user`.`EMAIL`,
                                `user`.`NUME`,
                                `user`.`PRENUME`,
                                `user`.`TIP`,
                                `user`.`DATAADAUGARII`,
                                `user`.`STATUS`
                            FROM `ulbsplatform`.`user`
                            WHERE tip=:type;');
        $stmt->bindValue(':type', $type, PDO::PARAM_STR);

        return $stmt->execute() ? $stmt->fetchAll() : FALSE;
    }

    /**
     * 
     * Set user type <br>
     * @param String $id
     * @param String $type 
     * @return bool
     */
    public function setType($id, $type) {

        getdbh();
        $db = $GLOBALS['dbh'];

        $stmt = $db->prepare('UPDATE `ulbsplatform`.`user`
                                SET
                                `TIP` =:type
                                WHERE `ID` =:id;');
        $stmt->bindValue(':type', $type, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

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

        getdbh();
        $db = $GLOBALS['dbh'];

        $stmt = $db->prepare('UPDATE `ulbsplatform`.`user`
                                SET
                                `EMAIL` =:email
                                WHERE `ID` =:id;');
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

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

        getdbh();
        $db = $GLOBALS['dbh'];

        $stmt = $db->prepare('UPDATE `ulbsplatform`.`user`
                                SET
                                `NUME` =:nume,
                                `PRENUME` =:prenume,
                                `STATUS` =:status
                                WHERE `ID` =:id;');
        $stmt->bindValue(':nume', $nume, PDO::PARAM_STR);
        $stmt->bindValue(':prenume', $prenume, PDO::PARAM_STR);
        $stmt->bindValue(':status', $status, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

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
    public function addUser($email, $parola, $nume, $prenume, $tip, $status) {

        getdbh();
        $db = $GLOBALS['dbh'];
        $data = date("Y-m-d");
        $stmt = $db->prepare('INSERT INTO `ulbsplatform`.`user`
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
                                :data,
                                :status);');
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':parola', $parola, PDO::PARAM_STR);
        $stmt->bindValue(':nume', $nume, PDO::PARAM_STR);
        $stmt->bindValue(':prenume', $prenume, PDO::PARAM_STR);
        $stmt->bindValue(':status', $status, PDO::PARAM_STR);
        $stmt->bindValue(':tip', $tip, PDO::PARAM_STR);
        $stmt->bindValue(':data', $data, PDO::PARAM_STR);

        return $stmt->execute() ? true : false;
    }

    /**
     * 
     * Check user email <br>
     * @param String $email
     * @return bool
     */
    public function isAvaibleEmail($email) {

        getdbh();
        $db = $GLOBALS['dbh'];

        $stmt = $db->prepare('SELECT
                                `user`.`EMAIL`
                            FROM `ulbsplatform`.`user`
                            WHERE `user`.`EMAIL`=:email;');
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);

        $stmt->execute();
        if ($stmt->fetch()) {
            return 'false';
        } else {
            return 'true';
        }
    }

}
