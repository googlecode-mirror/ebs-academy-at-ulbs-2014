<h3>Adauga document:</h3>

<div id="suportCurs">
<form action="<?php echo myUrl('administrare/addGrupaMember') ?>" method="POST">

        <div class="col_login2"> Grupa: </div>
        <div class="col_login1">
            <select name="grupaID">
                <?php
                $max = count($grupa);

                for ($key_Number = 0; $key_Number < $max; $key_Number++) {
                    echo '<option value="' . $grupa[$key_Number]['ID'] . '">' . $grupa[$key_Number]['NUME'] . '</option>\n';
                }
                ?>
            </select><br>
            <input type="hidden" name="grupaID" value="<?php echo $grupaID;?>" >
        </div> 
        
        <div class="col_login2"> Materie: </div>
        <div class="col_login1">
            <select name="materieID">
                <?php
                $length = count($materie);

                for ($key_Number = 0; $key_Number < $length; $key_Number++) {
                    echo '<option value="' . $materie[$key_Number]['ID'] . '">' . $materie[$key_Number]['DENUMIRE'] . '</option>\n';
                }
                ?>
            </select><br>
            <input type="hidden" name="grupaID" value="<?php echo $materieID;?>" >
        </div>
    
            
            
        <div>    
            
            <input type="file" name="pic" accept="image/*"><br>
            <input type="file" name="pic" accept="image/*"><br>
            <input type="file" name="pic" accept="image/*"><br>
        </div>
        
       
        <div class="col_login2" style="margin-left: 30px;"> <input type="submit" value="Save"> </div>
</div>    
        
        <div id="documente">
            <h3>Documente:</h3> 
        </div>
</form>