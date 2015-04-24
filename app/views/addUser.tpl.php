<form action="<?php echo myUrl('administrare/adaugareUser') ?>" method="POST">
        <h2> Va rugam introduceti datele noului student! </h2>
<div class="col-lg-8 col-md-6 col-xs-4 col-sm-2">
        
        <div class="form-group">
            <label for="email">Nume:</label>
            <input type="text" name="nume" class="form-control" placeholder="Introduce-ti Numele">
        </div>
        
        <div class="form-group">
            <label for="email">Prenume:</label>
            <input type="text" name="prenume" class="form-control" placeholder="Introduce-ti Prenumele">
        </div>
        
        <div class="g-recaptcha" data-sitekey="6Le0WQITAAAAACNfglWRATe3peeP3Q6MPUO34a-s"></div>
        <button type="submit" class="btn btn-default">Submit</button>
        <button type="reset" class="btn btn-default">Reset</button>
        
    </div>
</div>
</form>