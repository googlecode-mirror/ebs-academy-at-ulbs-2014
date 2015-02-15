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
				AND status = \'AC\'
                                AND status = \'NEW_PASS\';');
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
     * @return bool 
     */
    public function setRecover($id, $email) {

        $key = uniqid($id, true);


        $stmt = $this->db->prepare('UPDATE `ULBSPlatform`.`User`
                                    SET
                                    `STATUS` =\'NEW_PASS\',
                                    `FORGOT_PASS_TOKEN` =:key,
                                    `FORGOT_PASS_EXPIRATION_DATE` =now()+INTERVAL 2 DAY,
                                    WHERE `ID` =:id');

        $stmt->bindParam(':key', $key);
        $stmt->bindParam(':id', $id);

        require_once APP_PATH . '/PHPMailer-master/class.phpmailer.php';
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPDebug = 1;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'tls://smtp.gmail.com';
        $mail->Port = '465';
        $mail->isMail(true);
        $mail->Username = 'icontiu@gmail.com';
        $mail->Password = 'pass';
        $mail->setFrom($email);
        $mail->Subject = 'Recuperare parola';
        $mail->Body = 'Pentru a schimba parola acceseaza acest link  href="' . WEB_DOMAIN . '/' . APP_PATH . 'controllers/ops/recover_password.php?token=' . $key . '"';
        $mail->addAddress($email);

        if (!$mail->send()) {

            echo 'nu a fost trimis';
        } else {

            echo 'a fost trimis';
        }



        if ($stmt->execute()) {
            return true;
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
     * Set new passwotd <br>
     * @param String $password
     * @return bool
     */
    public function newPassword($password) {


        $stmt = $this->db->prepare('UPDATE `ULBSPlatform`.`User`
                                            SET
                                            `PAROLA` =:pass,
                                            `STATUS` =\'AC\'
                                            WHERE `ID` =:id
                                            AND `EMAIL`= :email ;');
        $stmt->bindParam(':pass', $password, PDO::PARAM_STR);
        $stmt->bindParam(':id', $_SESSION['NEW_ID']);
        $stmt->bindParam(':id', $_SESSION['NEW_EMAIL']);


        return $stmt->execute() ? true : false;
    }

    /**
     * 
     * Delete User <br>
     * @param int $id
     * @return bool
     */
    public function deleteUser($id) {

        $stmt = $this->db->prepare('DELETE `ULBSPlatform`.`User`
                                    WHERE `ID` =:id;');
           $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute() ? true : false;
 }
 
 
    }