<table class="table table-bordered">
    <form method="post" action="<?php echo myUrl('main/adminGrupa'); ?>">
        
        <a href=<?php echo myUrl('administrare/addGrupa'); ?> >Adauga </a>
        <tr>
            <th>Select all</th>
            <th>Nume</th>
            <th>An</th>
            <th>Sef grupa</th>
            <th>Profil</th> 
            <th>Modifica</th>
            <th>Sterge</th> 
        </tr>

        <?php
        $lengthOfArray = count($grupa);
        for ($key_Number = 0; $key_Number < $lengthOfArray; $key_Number++) {
            echo "<tr><td><input type=\"checkbox\" name=\"  checkbox_" . $grupa[$key_Number]['ID'] . "\" value=\"id_" . $grupa[$key_Number]['ID']."\">
                    </td><td> <a href=".  myUrl('administrare/showGrupaDetails')."/". $grupa[$key_Number]['ID'] ."/".$grupa[$key_Number]['NUME'] ." >" . $grupa[$key_Number]['NUME'] . "</a></td>
                        
                    <td>" . $grupa[$key_Number]['AN'] . "</td>
                    <td>" . $grupa[$key_Number]['SEF_GRUPA'] . "</td>
                    <td>" . $grupa[$key_Number]['PROFIL'] . "</td>
                    <td><input type=\"submit\"  value=\"Modifica\" onclick=\"myFunction('edit');return checkForm('edit');\"></td>
                    <td><input type=\"submit\"  value=\"Sterge\" onclick=\"myFunction('delete');return checkForm('delete');\"></td></tr>";
        }
        ?>

        <input type="hidden" name="actiune" id="actiune">
        <tr>
            <td><input type="checkbox"  onclick="checkAll(this)"/></td>
            <td><input type="submit" name="Sterge_tot" value="Sterge tot" onclick="myFunction('delete_all');return checkForm('delete all')"></td> 
        </tr>
    </form>
</table>