
<form method='POST' action="<?php echo myUrl('ops/updateUser'); ?>" >
    <table>
        <tr>
            <td>Email</td>
            <td> <input type="email" name="email" style="width:150px"
                        value="<?php echo isset($user[0]['EMAIL']) ? $user[0]['EMAIL'] : ''; ?>" /></td>
        </tr>

        <tr>
            <td>Nume</td>
            <td><input type="text" name="nume" style="width:150px"
                       value="<?php echo isset($user[0]['NUME']) ? $user[0]['NUME'] : ''; ?>" /></td>
        </tr>

        <tr>
            <td>Prenume</td>
            <td><input type="text" name="prenume" style="width:150px"
                       value="<?php echo isset($user[0]['PRENUME']) ? $user[0]['PRENUME'] : ''; ?>" /></td>
        </tr>

        <tr>
            <td>Tip</td>
            <td><input type="text" name="type" style="width:150px"
                       value="<?php echo isset($user[0]['TIP']) ? $user[0]['TIP'] : ''; ?>" /></td>
        </tr>

        <tr>
            <td>Status</td>
            <td>
                <select name="status">
                    <?php
                    $select = $user[0]['STATUS'];
                    if ($select == 'ACTIV') {
                        echo '<option selected="selected" value="ACTIV">ACTIV</option>';
                    } else {
                        echo '<option value="ACTIV">ACTIV</option>';
                    }

                    if ($select == 'DEL') {
                        echo '<option selected="selected" value="DEL">DEL</option>';
                    } else {
                        echo '<option  value="DEL">DEL</option>';
                    }

                    if ($select == 'SUS') {
                        echo '<option selected="selected" value="SUS">SUSPENDAT</option>';
                    } else {
                        echo '<option  value="SUS">SUSPENDAT</option>';
                    }

                    if ($select == 'NEW') {
                        echo '<option selected="selected" value="NEW">NEW USER</option>';
                    } else {
                        echo '<option  value="NEW">NEW USER</option>';
                    }

                    if ($select == 'DEL') {
                        echo '<option selected="selected" value="DEL">DEL</option>';
                    } else {
                        echo '<option  value="DEL">DEL</option>';
                    }

                    if ($select == 'NEW_PASS') {
                        echo '<option selected="selected" value="NEW_PASS">PAROLA NOUA</option>';
                    } else {
                        echo '<option value="NEW_PASS">PAROLA NOUA</option>';
                    }

                    if ($select == 'NO_CONFIRMATION') {
                        echo '<option selected="selected" value="NO_CONFIRMATION">CONT INACTIV</option>';
                    } else {
                        echo '<option  value="NO_CONFIRMATION">CONT INACTIV</option>';
                    }
                    ?>
                </select>
            </td>
        </tr>

        <tr>
            <td>Grupa</td>
            <td><select name="grupa">
                    <?php
                    $lengthOfArray = count($grupa);
                    for ($key_Number = 0; $key_Number < $lengthOfArray; $key_Number++) {
                        $select = $grupa[$key_Number]['NUME'];
                        if ($select == $grupa[0]['SEF_GRUPA']) {
                            echo '<option selected="selected" value="' . $grupa[$key_Number]['ID'] . '">' . $grupa[$key_Number]['NUME'] . '</option>';
                        } else {
                            echo '<option value="' . $grupa[$key_Number]['ID'] . '">' . $grupa[$key_Number]['NUME'] . '</option>';
                        }
                    }
                    ?>
                </select>
            </td>
        </tr>

        <tr>
            <td><input type="hidden" name="idUser"
                       value="<?php echo isset($ID) ? $ID : ''; ?>" >
            <td><input type="submit" value="Submit" /></td>
            <td><input type="reset" value="Reset" /></td>
        </tr>
    </table>
</form>
