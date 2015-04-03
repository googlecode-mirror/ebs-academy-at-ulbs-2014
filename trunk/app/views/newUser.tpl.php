<form action="<?php echo myUrl('ops/newUser') ?>" method="POST" onsubmit="return checkPassSubmit();"  role="form" >
        <h2> Va rugam introduceti datele dumneavoastra! </h2>
<div class="col-lg-8 col-md-6 col-xs-4 col-sm-2">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" placeholder="Introduce-ti E-mailul">
        </div>
        
        <div class="form-group">
            <label for="email">Nume:</label>
            <input type="text" class="form-control" placeholder="Introduce-ti Numele">
        </div>
        
        <div class="form-group">
            <label for="email">Prenume:</label>
            <input type="text" class="form-control" placeholder="Introduce-ti Prenumele">
        </div>
        
          <div class="form-group">
            <label for="pwd">Parola:</label>
            <input type="password" class="form-control" placeholder="Intoduce-ti parola">          
          </div>
        
          <div class="form-group">
            <label for="pwd">Parola:</label>
            <input type="password" class="form-control" required="required" onkeyup="checkPass(); return false;" id="pwd" placeholder="Reintrduce-ti parola">          
        </div>

      
        <div class="g-recaptcha" data-sitekey="6Le0WQITAAAAACNfglWRATe3peeP3Q6MPUO34a-s"></div>
        <button type="submit" class="btn btn-default">Submit</button>
        <button type="reset" class="btn btn-default">Reset</button>
        
    </div>
</div>
</form>