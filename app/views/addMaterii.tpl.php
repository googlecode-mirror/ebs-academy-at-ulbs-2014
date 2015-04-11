
 <form action="<?php echo myUrl('main/adminMaterii'); ?>" method="POST">
     <div class="form-group">
                <h3> Va rugam introduceti noua materie </h3>

                <div>
                    <label>Numele Materiei:</label>
                    <input type="text" name="nume" class="form-control">
                </div>
                              
                <div>
                    <label>Credite:</label>
                    <input type="text" name="profil" class="form-control">
                </div>
      
                <label>Profesor:</label>   <br>
                <select class="selectpicker">
                    
                           <?php
                            $lengthOfArray = count($profesori);
                             for ($key_Number = 0; $key_Number < $lengthOfArray; $key_Number++) {
                                 
                                 echo '<option value='.$profesori[$key_Number]['ID'].'>'.$profesori[$key_Number]['NUME'].' '.$profesori[$key_Number]['PRENUME'].'</option>';
                             }
                           ?>
                           
                  </select>
                <br>
                <br>
                    <button type="submit" class="btn btn-default">Submit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
           
            </div>
        </form>