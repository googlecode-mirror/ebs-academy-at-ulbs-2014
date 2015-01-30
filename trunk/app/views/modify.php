
<HTML>
    <HEAD>
        <TITLE>Modifica user</TITLE>
    </HEAD>

    <body>
        <?php
        session_start();
        if (empty($_SESSION['prezenta'])) {
            header("Location:afis_prezente_prof.tpl.php");
        } else {
            include 'connect.php';
            // echo count($_SESSION['prezenta']);
            // echo current($_SESSION['prezenta']);

            if (count($_SESSION['prezenta']) > 1) {//pentru a pune valoare diferita in butonul de send
                $next = "Save and Next";
            } else {

                $next = "Save";
            }
            $id_prezenta = $_SESSION['prezenta'][0];

            $sql = "SELECT  `materii`.`DENUMIRE`, `prezenta`.`DATA`, `prezenta`.`TIP_PREZENTA`
                FROM ulbsplatform.prezenta_user, ulbsplatform.prezenta, ulbsplatform.materii
                WHERE `prezenta`.`ID` = `prezenta_user`.`ID_PREZENTA`
                and `materii`.`ID` = `prezenta`.`ID_MATERIE`
                and `prezenta_user`.`ID`=$id_prezenta";
            $result = $conn->query($sql);
            $row = mysqli_fetch_array($result);

            echo '<form action="update_prezenta.php" method="POST">
            Nume materie: ' . $row["DENUMIRE"] . '<br />
            Prezenta:
            <select name="tip_prezenta">';
            if ($row['TIP_PREZENTA'] == 'p') {
                echo '<option value="p" selected="selected">Prezent</option>';
            } else {
                echo '<option value="p">Prezent</option>';
            }
            if ($row['TIP_PREZENTA'] == 'a') {
                echo '<option value="a" selected="selected">Absent</option>';
            } else {
                echo '<option value="a">Absent</option>';
            }
            if ($row['TIP_PREZENTA'] == 'i') {
                echo '<option value="i" selected="selected">Invoit</option>';
            } else {
                echo '<option value="i">Invoit</option>';
            }
            echo '
            </select>
            <br />
            <input type="date" name="data" value="' . date('Y-m-d') . '" /><br />
            <input type="hidden" name="id" value="' . $id_prezenta . '"/> 
            <input type="submit" value="' . $next . '" /><br />
            <input type="reset" value="Reset" /><br />
        </form>';
        }
        array_shift($_SESSION['prezenta']); // stergem prima valoare din variabila de sesiune
        ?>
    </body>
</HTML>

