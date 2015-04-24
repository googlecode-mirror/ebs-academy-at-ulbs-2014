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
        $pass=md5($pass);
        $stmt = $this->db->prepare('SELECT
                                    `User`.`ID`,
                                    `User`.`TIP`
                                FROM `ULBSPlatform`.`User`
                                WHERE EMAIL=:email 
				AND PAROLA=:pass
				AND status IN(\'ACTIV\',\'NO_GROUP\');');
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
                    `User`.`STATUS`,
                   ( SELECT `User_Grupa`.`ID_GRUPA`
                                    FROM `ULBSPlatform`.`user_Grupa`
                                    WHERE ID_USER=:id) as ID_GRUPA
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
                                        `User`.`ID`,
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
            `User`.`ID`,
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
     * Set user type <br>
     * @param int $id
     * @param String $type 
     * @return bool
     */
    public function setStatus($id, $status) {

        $stmt = $this->db->prepare('UPDATE `ULBSPlatform`.`User`
                                SET
                                `STATUS` =:status
                                WHERE `ID` =:id;');
        $stmt->bindParam(':status', $status, PDO::PARAM_STR);
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
     * @param String $email
     * @param String $nume
     * @param String $prenume
     * @param String $type
     * @param String $status
     * @return bool
     */
    public function updateUser($id, $email, $nume, $prenume, $type, $status) {

        $stmt = $this->db->prepare('UPDATE `ULBSPlatform`.`User`
                                SET
                                `EMAIL` =:email,
                                `NUME` =:nume,
                                `PRENUME` =:prenume,
                                `TIP` =:type,
                                `STATUS` =:status
                                WHERE `ID` =:id;
                                ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':nume', $nume, PDO::PARAM_STR);
        $stmt->bindParam(':prenume', $prenume, PDO::PARAM_STR);
        $stmt->bindParam(':type', $type, PDO::PARAM_STR);
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
    public function addUser($email, $parola, $nume, $prenume) {
        $parola=md5($parola);
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
                                        \'student\',
                                        now(),
                                        \'new\');');

        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':parola', $parola);
        $stmt->bindParam(':nume', $nume, PDO::PARAM_STR);
        $stmt->bindParam(':prenume', $prenume, PDO::PARAM_STR);
        return $stmt->execute() ? $user_id = $this->db->lastInsertId() : false;
    }
    
    public function addUserByProf($nume, $prenume) {
        $stmt = $this->db->prepare('INSERT INTO `ULBSPlatform`.`User`
                                        (
                                        `NUME`,
                                        `PRENUME`,
                                        `TIP`,
                                        `DATAADAUGARII`,
                                        `STATUS`)
                                        VALUES
                                        (
                                        :nume,
                                        :prenume,
                                        \'student\',
                                        now(),
                                        \'new\');');
        
        $stmt->bindParam(':nume', $nume, PDO::PARAM_STR);
        $stmt->bindParam(':prenume', $prenume, PDO::PARAM_STR);
        return $stmt->execute() ? $user_id = $this->db->lastInsertId() : false;
    }

    /**
     * 
     * Check user email <br>
     * @param String $email
     * @return bool or userID
     */
    public function checkEmail($email) {



        $stmt = $this->db->prepare('SELECT
                                        `User`.`ID`
                                    FROM `ULBSPlatform`.`User`
                                    WHERE `User`.`EMAIL`=:email;');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);

        $stmt->execute();
        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            return $row;
        } else {
            return 'false';
        }
    }
    
  

    /**
     * 
     * Set token for new pass and send email <br>
     * @param int $id
     * @param String $email
     * @return $token or false
     */
    public function setRecover($id, $email) {

        $key1 = uniqid($id,true);
        $key= str_replace(".","",$key1);

        $stmt = $this->db->prepare('UPDATE `ULBSPlatform`.`User`
                                    SET
                                    `STATUS` =\'NEW_PASS\',
                                    `PAROLA` =\'\',
                                    `FORGOT_PASS_TOKEN` =:key,
                                    `FORGOT_PASS_EXPIRATION_DATE` =now()+INTERVAL 2 DAY
                                    WHERE `ID` =:id');

        $stmt->bindParam(':key', $key);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            return $key;
        } else {
            return false;
        }
    }

    /**
     * 
     * Set token for new pass and send email <br>
     * @param int $id
     * @param String $email
     * @return $token or false
     */
    public function newUserToken($id) {

        $key1 = uniqid($id,true);
        $key= str_replace(".","",$key1);

        $stmt = $this->db->prepare('UPDATE `ULBSPlatform`.`User`
                                    SET
                                    `STATUS` =\'NO_CONFIRMATION\',
                                    `FORGOT_PASS_TOKEN` =:key,
                                    `FORGOT_PASS_EXPIRATION_DATE` =now()+INTERVAL 2 DAY
                                    WHERE `ID` =:id');

        $stmt->bindParam(':key', $key);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            return $key;
        } else {
            return false;
        }
    }
    /**
     * 
     * Check if token is corect and not expired <br>
     * @param String $token
     * @return array or bool
     */
    public function checkToken($token) {
        $result = array();

        $stmt = $this->db->prepare('SELECT 
                                        `User`.`ID`,
                                        `User`.`EMAIL`
                                    FROM 
                                        `ULBSPlatform`.`User`
                                    WHERE 
                                        FORGOT_PASS_TOKEN=:token
                                    AND now()<(select FORGOT_PASS_EXPIRATION_DATE from `ULBSPlatform`.`User` where FORGOT_PASS_TOKEN=:token )
                                    AND `User`.`STATUS`=\'NEW_PASS\';
                                    ');
        $stmt->bindParam(':token', $token, PDO::PARAM_STR);



        $stmt->execute();
        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            return $row;
        } else {
            return 'false';
        }
    }

    /**
     * 
     * Check if token is corect and not expired <br>
     * @param String $token
     * @return array or bool
     */
    public function checkConfirmationToken($token) {
        $result = array();

        $stmt = $this->db->prepare('SELECT 
                                        `User`.`ID`,
                                        `User`.`EMAIL`
                                    FROM 
                                        `ULBSPlatform`.`User`
                                    WHERE 
                                        FORGOT_PASS_TOKEN=:token
                                    AND now()<(select FORGOT_PASS_EXPIRATION_DATE from `ULBSPlatform`.`User` where FORGOT_PASS_TOKEN=:token )
                                    AND `User`.`STATUS`=\'NO_CONFIRMATION\';
                                    ');
        $stmt->bindParam(':token', $token, PDO::PARAM_STR);



        $stmt->execute();
        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            return $row;
        } else {
            return 'false';
        }
    }

    
    /**
     * 
     * Set new passwotd <br>
     * @param String $password
     * @return bool
     */
    public function newPassword($password, $id) {
        $password=md5($password);

        $stmt = $this->db->prepare('UPDATE `ULBSPlatform`.`User`
                                            SET
                                            `PAROLA` =:pass,
                                            `STATUS` =\'ACTIV\',
                                            `FORGOT_PASS_TOKEN` =\'\'
                                            WHERE `ID` =:id;');
        $stmt->bindParam(':pass', $password, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id);
       


        return $stmt->execute() ? true : false;
    }

    /**
     * 
     * Delete User <br>
     * @param int $id
     * @return bool
     */
    public function deleteUser($id) {

        $stmt = $this->db->prepare('DELETE from `ULBSPlatform`.`User`
                                    WHERE `ID` =:id;');
           $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute() ? true : false;
 }
 
 
    }