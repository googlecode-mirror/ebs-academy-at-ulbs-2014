
        <form method="POST" action="<?php echo myUrl('main/adminMaterii'); ?>" >
            <tr>       
                <th> <a href=<?php echo myUrl('administrare/addMaterii'); ?> >Adauga materie </a><br/></th>       
            <tr>
 <table class="table table-bordered">               
            <tr>
                <th>Select all</th>
                <th>Numele materiei</th>
                <th>Credite</th>
               <th>Sterge</th>
               <th>Editeaza</th>
            </tr>
            
            <?php
            $lengthOfArray = count($materii);
            for ($key_Number = 0; $key_Number < $lengthOfArray; $key_Number++) {
                echo 
                "<tr>
                    <td><input type=\"checkbox\" name=\"checkbox_" . $materii[$key_Number]['ID'] . "\" value=\"id_" . $materii[$key_Number]['ID'] . "\"></td>
                    <td>" . $materii[$key_Number]['DENUMIRE'] . "</td>
                        <td>" . $materii[$key_Number]['CREDITE']."</td>
                    <td><input type=\"submit\" value=\"Sterge\" onclick=\"myFunction('delete');return checkForm('delete');\"></td>
                    <td><input type=\"submit\" value=\"Edit\" onclick=\"myFunction('edit');return checkForm('edit');\"></td>
                </tr>";
            }
            ?>
            <tr>
                <td><input type="checkbox" onclick="checkAll(this)"/></td>
                <td><input type="submit" name="Sterge_tot" value="Sterge tot" onclick="myFunction('delete_all');return checkForm('delete all')"></td>
            </tr>
            <input type="hidden" name="actiune" id="actiune">
        </form>
    </table>
