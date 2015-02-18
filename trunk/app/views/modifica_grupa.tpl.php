
<form method='POST' action="<?php echo myUrl('ops/updateGrupa'); ?>" >    

    <table>

        <tr>
            <td>Numele Grupei</td>
            <td><input type="text" name="nume" style="width:150px"
                       value="<?php echo isset($grupa[0]['NUME']) ? $grupa[0]['NUME'] : ''; ?>"></td>
        </tr>
        <tr>
            <td>An</td>
            <td><input type="text" name="an" style="width:150px"
                       value="<?php echo isset($grupa[0]['AN']) ? $grupa[0]['AN'] : ''; ?>"></td>
        </tr>
        <tr>
            <td>Sef grupa</td>

            <td>
                <select name="sef_grupa">
                    <?php
                    $lengthOfArray = count($studenti);
                    for ($key_Number = 0; $key_Number < $lengthOfArray; $key_Number++) {
                        $select = $studenti[$key_Number]['NUME'] . ' ' . $studenti[$key_Number]['PRENUME'];
                        if ($select == $grupa[0]['SEF_GRUPA']) {
                            echo '<option selected="selected" value="' . $studenti[$key_Number]['NUME'] . ' ' . $studenti[$key_Number]['PRENUME'] . '">' . $studenti[$key_Number]['NUME'] . ' ' . $studenti[$key_Number]['PRENUME'] . '</option>';
                        } else {
                            echo '<option value="' . $studenti[$key_Number]['NUME'] . ' ' . $studenti[$key_Number]['PRENUME'] . '">' . $studenti[$key_Number]['NUME'] . ' ' . $studenti[$key_Number]['PRENUME'] . '</option>';
                        }
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Profil</td>
            <td><input type="text" name="profil" style="width:150px"
                       value="<?php echo isset($grupa[0]['PROFIL']) ? $grupa[0]['PROFIL'] : ''; ?>"></td>
        </tr>
        <tr>    

            <td><input type="hidden" name="idGrupa"
                       value="<?php echo isset($grupa[0]['ID']) ? $grupa[0]['ID'] : ''; ?>" >
                <input type="submit" value="Submit"></td>
            <td><input type="reset" value="Reset"></td>
        </tr>


    </table>
</form>
