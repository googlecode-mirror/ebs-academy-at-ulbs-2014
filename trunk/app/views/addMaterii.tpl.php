
 <form action="<?php echo myUrl('main/adminMaterii'); ?>" method="POST">
            <div>
                <div class="login_text"> Va rugam introduceti noua materie </div>
                <br />
                
          
                
                 <div style="clear:both;">
                    <div class="col_grupa1">Nume Materie</div>
                    <div class="col_grupa2"><input type="text" name="denumire"/></div>

                </div>
                 <div style="clear:both;">
                    <div class="col_grupa1">Credite</div>
                    <div class="col_grupa2"><input type="number" name="credite"/></div>

                </div>
                <div style="clear:both;">
                    <div class="col_grupa1">Profesor</div>
                    <div class="col_grupa2">
                        <select name="profesor" required="required">
                          
                           <?php
                            $lengthOfArray = count($profesori);
                             for ($key_Number = 0; $key_Number < $lengthOfArray; $key_Number++) {
                                 
                                 echo '<option value='.$profesori[$key_Number]['ID'].'>'.$profesori[$key_Number]['NUME'].' '.$profesori[$key_Number]['PRENUME'].'</option>';
                             }
                           ?>
                           
                        </select>
                    </div>

                </div>

                <div style="clear:both;">
                       <input type="hidden" name="actiune" value="add"/>
                    <div class="col_grupa1"><input type="submit" value="Trimite"/></div>
                    <div class="col_grupa2"><input type="reset" value="Reseteaza"/></div>

                </div>
                
            </div>
        </form>
