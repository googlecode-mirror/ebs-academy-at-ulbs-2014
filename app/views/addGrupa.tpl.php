
 <form action="<?php echo myUrl('main/adminGrupa'); ?>" method="POST">
     <div class="form-group">
                <h3> Va rugam introduceti noua grupa </h3>

                <div>
                    <label>Numele Grupei:</label>
                    <input type="text" name="nume" class="form-control">
                </div>
                    
                <div>
                    <label>Anul:</label>
                    <input type="number" name="an" min="1" max="6" class="form-control">
                </div>
                               
                <div>
                    <label>Profil:</label>
                    <input type="text" name="profil" class="form-control">
                </div>

                <br>
                    <button type="submit" class="btn btn-default">Submit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
           
            </div>
        </form>
