
<form method='POST' action="<?php echo myUrl('ops/updateMaterii'); ?>" >    

    <table>

        <tr>
            <td>Numele Grupei</td>
            <td>
                <select name="sef_materii">
                    <?php
                    $lengthOfArray = count($materii);
                    for ($key_Number = 0; $key_Number < $lengthOfArray; $key_Number++) {
                        $select = $materii[$key_Number]['GRUPA'];
                        if ($select == $materii[0]['GRUPA']) {
                            echo '<option selected="selected" value="' . $materii[$key_Number]['GRUPA'] .'">' . $materii[$key_Number]['GRUPA'] . '</option>';
                        } else {
                            echo '<option value="' . $materii[$key_Number]['GRUPA'] . '">' . $materii[$key_Number]['GRUPA'] . '</option>';
                        }
                    }
                    ?>
                </select>
            </td>
            
        </tr>
        <tr>
            <td>Credite</td>
            <td><input type="text" name="credite" style="width:150px"
                       value="<?php echo isset($materii[0]['CREDITE']) ? $materii[0]['CREDITE'] : ''; ?>"></td>
        </tr>
        <tr>
            <td>Denumire Materie</td>
                <td><input type="text" name="denumire" style="width:150px"
                       value="<?php echo isset($materii[0]['DENUMIRE']) ? $materii[0]['DENUMIRE'] : ''; ?>"></td>
            
        </tr>
        <tr>
            <td>Semestru</td>
            <td><input type="text" name="profil" style="width:150px"
                       value="<?php echo isset($materii[0]['SEMESTRU']) ? $materii[0]['SEMESTRU'] : ''; ?>"></td>
        </tr>
        <tr>    

            <td><input type="hidden" name="idGrupa"
                       value="<?php echo isset($materii[0]['ID']) ? $materii[0]['ID'] : ''; ?>" >
                <input type="submit" value="Submit"></td>
            <td><input type="reset" value="Reset"></td>
        </tr>


    </table>
</form>
