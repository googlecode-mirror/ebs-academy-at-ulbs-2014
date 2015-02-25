<form method='POST' action="<?php echo myUrl('ops/updateUser'); ?>" >
    <table>
        <tr>
            <td>Email</td>
            <td> <input type="email" name="email" style="width:150px"
			            value="<?php echo isset($user[0]['EMAIL']) ? $user[0]['EMAIL'] : '';?>" /></td>
        </tr>

        <tr>
            <td>Nume</td>
            <td><input type="text" name="nume" style="width:150px"
                       value="<?php echo isset($user[0]['NUME']) ? $user[0]['NUME'] : '';?>" /></td>
        </tr>

        <tr>
            <td>Prenume</td>
            <td><input type="text" name="prenume" style="width:150px"
                       value="<?php echo isset($user[0]['PRENUME']) ? $user[0]['PRENUME'] : '';?>" /></td>
        </tr>

        <tr>
            <td>Tip</td>
            <td><input type="text" name="type" style="width:150px"
                       value="<?php echo isset($user[0]['TIP']) ? $user[0]['TIP'] : '';?>" /></td>
        </tr>

        <tr>
            <td>Data</td>
            <td><input type="date" name="data" style="width:150px"
                       value="<?php echo isset($user[0]['DATAADAUGARII']) ? $user[0]['DATAADAUGARII'] : '';?>" /></td>
        </tr>

        <tr>
            <td>Status</td>
            <td><input type="text" name="data" style="width:150px"
                       value="<?php echo isset($user[0]['STATUS']) ? $user[0]['STATUS'] : '';?>" /></td>
        </tr>

        <tr>
            <td><input type="hidden" name="idUser"
                       value="<?php echo isset($user[0]['ID']) ? $user[0]['ID'] : ''; ?>" >
            <td><input type="submit" value="Submit" /></td>
            <td><input type="reset" value="Reset" /></td>
        </tr>
    </table>
</form>
