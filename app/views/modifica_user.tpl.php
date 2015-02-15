
<form method="post" action="#">
    <table>
        <tr>
            <td>Email</td>
            <td> <input type="text" name="username" 
			value="<?php echo isset($user[0]['EMAIL']) ? $user[0]['EMAIL'] : '';?>" /></td>
        </tr>
        <tr>
            <td>Nume</td>
            <td><input type="text" name="nume" /></td>
        </tr>
        <tr>
            <td>Prenume</td>
            <td><input type="text" name="prenume" /></td>
        </tr>
        <tr>
            <td>Tip</td>
            <td><input type="text" name="type" /></td>
        </tr>
        <tr>
            <td>Data</td>
            <td><input type="date" name="data" /></td>
        </tr>
        <tr>
            <td><input type="submit" value="Submit" /></td>
            <td><input type="reset" value="Reset" /></td>
        </tr>
    </table>
</form>
