
<div id="afisare_user">
    <table id="tabel">
        <form method="post" action="<?php echo myUrl('main/adminUsers') ?>" > 
            <a href=<?php echo myUrl('main/addUser'); ?>>Adauga </a>
          

            <tr>
                <th>Checkbox</th>
                <th>Email</th>
                <th>Nume</th>
                <th>Prenume</th>
                <th>Tip</th>
                <th>Status</th>
                <th>Data</th>
                <th>Modifica</th>
                <th>Sterge</th>   
            </tr>

            <?php
            $lengthOfArray = count($user);
            for ($key_Number = 0; $key_Number < $lengthOfArray; $key_Number++) {
                echo "<tr>"
                . " <td>"
                . "<input type=\"checkbox\" name=\"checkbox_" . $user[$key_Number]['ID'] . "\" value=\"id_" . $user[$key_Number]['ID'] . "\" /></td>"
                . "<td>" . $user[$key_Number]['EMAIL'] . "</td>
		<td>" . $user[$key_Number]['NUME'] . "</td>
		<td>" . $user[$key_Number]['PRENUME'] . "</td>
		<td>" . $user[$key_Number]['TIP'] . "</td>
                <td>" . $user[$key_Number]['STATUS'] . "</td>
		<td>" . $user[$key_Number]['DATAADAUGARII'] . "</td>
		<td><input type=\"submit\" value=\"Modifica\" onclick=\"myFunction('edit');return verifica('edit');\"></td>
		<td><input type=\"submit\" value=\"Sterge\" onclick=\"myFunction('delete');return verifica('delete');\"></td></tr>";
            }
            ?>

            <input type="hidden" name="actiune" id="actiune">
            <tr>
                <td><input type="checkbox"  onclick="checkAll(this)"/></td>
                <td>Select all</td>
                <td></td>
                <td></td>
                <td></td> 
                <td></td>
                <td></td> 
                <td><input type="submit" value="Sterge tot" onclick="myFunction('delete_all');return verifica('delete all');"></td> 
            </tr>
        </form>
    </table>
</div>
