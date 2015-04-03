<div class="col-lg-8 col-md-6 col-xs-4 col-sm-2">
<h2>Adauga document:</h2>
    <form enctype="multipart/form-data" action="<?php echo myUrl('main/upload_files') ?>" method="POST">
        <h4> Grupa: </h4>
        
            <select class="form-control">
                <?php
                $max = count($grupa);

                for ($key_Number = 0; $key_Number < $max; $key_Number++) {
                    echo '<option value="' . $grupa[$key_Number]['ID'] . '">' . $grupa[$key_Number]['NUME'] . '</option>\n';
                }
                ?>
            </select>
            <input type="hidden" name="grupaID" value="<?php echo $grupaID;?>" >
        
        
        <h4> Materie: </h4>
        
            <select class="form-control">
                <?php
                $length = count($materie);

                for ($key_Number = 0; $key_Number < $length; $key_Number++) {
                    echo '<option value="' . $materie[$key_Number]['ID'] . '">' . $materie[$key_Number]['DENUMIRE'] . '</option>\n';
                }
                ?>
            </select><br>
            <input type="hidden" name="grupaID" value="<?php echo $materieID;?>" >
     
        <div>    
            
            <input type="file" name="fileToUpload[]" multiple="multiple"><br>
            <input type="file" name="fileToUpload[]" multiple="multiple"><br>
            <input type="file" name="fileToUpload[]" multiple="multiple"><br>
        </div>
        
    </form>  
        <input class="btn btn-default" type="submit" value="Submit">
    
        <div id="documente">
            <h2>Documente:</h2> 
        </div>
</div>