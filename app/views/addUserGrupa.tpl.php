

<div>
    <form action="<?php echo myUrl('administrare/addGrupaMember') ?>" method="POST">
        <div class="col_login2"> Numele Studentului </div>

        <div class="col_login1">
            <select name="userID">
                <?php
                $max = count($user);

                for ($key_Number = 0; $key_Number < $max; $key_Number++) {
                    echo '<option value="' . $user[$key_Number]['ID'] . '">' . $user[$key_Number]['NUME'] . ' ' . $user[$key_Number]['PRENUME'] . '</option>\n';
                }
                ?>
            </select>
            <input type="hidden" name="grupaID" value="<?php echo $grupaID;?>" >
        </div>
       
        <div class="col_login2" style="margin-left: 30px;"> <input type="submit" value="Trimite"> </div>
        
        
    </form>
</div>