
<form method='POST' action="<?php echo myUrl('ops/updateUser'); ?>" >
    <table>
        <tr>
            <td>Email</td>
            <td> <input type="email" name="email" 
                        value="<?php echo isset($user[0]['EMAIL']) ? $user[0]['EMAIL'] : ''; ?>" /></td>
        </tr>

        <tr>
            <td>Nume</td>
            <td><input type="text" name="nume" 
                       value="<?php echo isset($user[0]['NUME']) ? $user[0]['NUME'] : ''; ?>" /></td>
        </tr>

        <tr>
            <td>Prenume</td>
            <td><input type="text" name="prenume" 
                       value="<?php echo isset($user[0]['PRENUME']) ? $user[0]['PRENUME'] : ''; ?>" /></td>
        </tr>

        <tr>
            <td>Tip</td>
            <td>
                
                <select name="type">
                    <?php
                    
                    $type = $user[0]['TIP'];
                    if ($type == 'student') {
                        echo '<option selected="selected" value="student">Student</option>';
                    } else {
                        echo '<option value="student">Student</option>';
                    }

                    if ($type == 'profesor') {
                        echo '<option selected="selected" value="profesor">Profesor</option>';
                    } else {
                        echo '<option  value="profesor">Profesor</option>';
                    }

                    if ($type == 'admin') {
                        echo '<option selected="selected" value="admin">Admin</option>';
                    } else {
                        echo '<option  value="admin">Admin</option>';
                    }
                    ?>
                </select>
            </td>
        </tr>

        <tr>
            <td>Status</td>
            <td>
                <select name="status">
                    <?php
                   $select=$user[0]['STATUS'];
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
            <td>Grupa
            </td>
            <td><select name="grupa">
                    <?php
                    $currentGroup= $select=$user[0]['ID_GRUPA'];
                    $lengthOfArray = count($grupa);
                    for ($key_Number = 0; $key_Number < $lengthOfArray; $key_Number++) {
                        $select = $grupa[$key_Number]['ID'];
                        if ($select == $currentGroup) {
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
                <input type="hidden" name="currentGroup"
                       value="<?php echo isset($user[0]['ID_GRUPA']) ? $user[0]['ID_GRUPA'] : ''; ?>"
            <td><input type="submit" value="Submit" /></td>
            <td><input type="reset" value="Reset" /></td>
        </tr>
    </table>
</form>
