
<form method='POST' action="<?php echo myUrl('ops/updateMaterii'); ?>" >    

    <table>

        <tr>
            <td>Numele Grupei</td>
            <td>
                
                <select name="idProf">
                    <?php
                    $lengthOfArray = count($profesori);
                    $select = $materii['ID_USER'];
                    
                    for ($key_Number = 0; $key_Number < $lengthOfArray; $key_Number++) {
                        
                       
                        if ($select == $profesori[$key_Number]['ID']) {
                            echo '<option selected="selected" value=' . $profesori[$key_Number]['ID'] . '>' . $profesori[$key_Number]['NUME'] . ' ' . $profesori[$key_Number]['PRENUME'] . '</option>';
                        } else {
                             echo '<option value=' . $profesori[$key_Number]['ID'] . '>' . $profesori[$key_Number]['NUME'] . ' ' . $profesori[$key_Number]['PRENUME'] . '</option>';
                        }
                    }
                    ?>
                </select>
            </td>

        </tr>
        <tr>
            <td>Credite</td>
            <td><input type="text" name="credite" style="width:150px"
                       value="<?php echo isset($materii['CREDITE']) ? $materii['CREDITE'] : ''; ?>"></td>
        </tr>
        <tr>
            <td>Denumire Materie</td>
            <td><input type="text" name="denumire" style="width:150px"
                       value="<?php echo isset($materii['DENUMIRE']) ? $materii['DENUMIRE'] : ''; ?>"></td>

        </tr>

        <tr>    

            <td><input type="hidden" name="idMaterie"
                       value="<?php echo isset($materii['ID']) ? $materii['ID'] : ''; ?>" >
                <input type="submit" value="Submit"></td>
            <td><input type="reset" value="Reset"></td>
        </tr>


    </table>
</form>
