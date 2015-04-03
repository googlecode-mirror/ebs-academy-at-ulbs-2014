<table class="table table-bordered">
    <form method="post" action="<?php echo myUrl('main/adminMaterii'); ?>">
        
        <a href=<?php echo myUrl('administrare/addMaterii'); ?> >Adauga </a><br/>
        <a href=<?php echo myUrl('administrare/showAllMat'); ?> >Afiseaza toate materiile </a>
        <tr>
            <th></th>
            <th>Grupa</th>
            <th>Denumire</th>
            <th>Credite</th>
            <th>Modifica</th>
            <th>Sterge</th> 
        </tr>

        <?php
        
        $lengthOfArray = count($materii);
        for ($key_Number = 0; $key_Number < $lengthOfArray; $key_Number++) {
            echo "<tr><td><input type=\"checkbox\" name=\"  checkbox_" . $materii[$key_Number]['ID'] . "\" value=\"id_" . $materii[$key_Number]['ID']."\">
                    </td><td> <a href=".  myUrl('administrare/showGrupaDetails')."/". $materii[$key_Number]['ID'] ."/".$materii[$key_Number]['NUME'] ." >" . $materii[$key_Number]['NUME'] . "</a></td>
                                       
                    <td>" . $materii[$key_Number]['DENUMIRE'] . "</td>
                    <td>" . $materii[$key_Number]['CREDITE'] . "</td>
                    <td><input type=\"submit\"  value=\"Modifica\" onclick=\"myFunction('edit');return checkForm(\'edit\');\"></td>
                    <td><input type=\"submit\"  value=\"Sterge\" onclick=\"myFunction('delete');return checkForm(\'delete\');\"></td></tr>";
        }
        ?>

        <input type="hidden" name="actiune" id="actiune">
        <tr>
            <td><input type="checkbox"  onclick="checkAll(this)"/></td>
            <td>Select all</td>
            <td></td>
            <td></td> 
            <td></td>
            <td><input type="submit" name="Sterge_tot" value="Sterge tot" onclick="myFunction('detele_all'); checkForm('delete_all')"></td> 
        </tr>
    </form>
</table>

