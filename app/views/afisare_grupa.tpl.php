<div id="afisare_grupa">
<table id="tabel">
    <form method="post" action="<?php echo myUrl('main/adminGrupa'); ?>">
        
        <a href=<?php echo myUrl('administrare/addGrupa'); ?> >Adauga </a>
        <tr>
            <th></th>
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
                    </td><td>" . $grupa[$key_Number]['NUME'] . "</td>
                    <td>" . $grupa[$key_Number]['AN'] . "</td>
                    <td>" . $grupa[$key_Number]['SEF_GRUPA'] . "</td>
                    <td>" . $grupa[$key_Number]['PROFIL'] . "</td>
                    <td><input type=\"submit\" value=\"Modifica\" onclick=\"myFunction('edit')\"></td>
                    <td><input type=\"submit\" value=\"Sterge\" onclick=\"myFunction('delete')\"></td></tr>";
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
        </tr>
    </form>
</table>
</div>
