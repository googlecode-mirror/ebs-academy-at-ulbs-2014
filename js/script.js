function myFunction(value) {
    document.getElementById("actiune").value = value;
}
function checkAll(bx) {
    var cbs = document.getElementsByTagName('input');
    for (var i = 0; i < cbs.length; i++) {
        if (cbs[i].type == 'checkbox') {
            cbs[i].checked = bx.checked;
        }
    }
}


function checkPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if (pass1.value == pass2.value) {
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        pass2.style.backgroundColor = goodColor;

    } else {
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;

    }
}
function checkPassSubmit() {
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    if (pass1.value.length < 6) {
        alert("The password must be at least 6 characters long!");
        return false;
    }

    if (pass1.value == pass2.value) {

        return true;
    } else {
        alert("Parola trebuie sa coincida")
        return false;
    }

}
function verifica(actiune)
{
    var checkedNum = $('input[name*="checkbox_"]:checked').length;
    if (checkedNum > 0) {
        if (actiune == 'edit') {
            if (checkedNum == 1) {
                return true;
            }
            else
            {
                alert('Ai ales mai mult de o inregistrare pentru editare');
                return false;
            }
        }

        if (actiune == 'delete') {
            if (checkedNum == 1) {
                return true;
            }
            else
            {
                alert('Ai ales mai mult de o inregistrare pentru stergere. te rog alege optiune delete all');
                return false;
            }
        }
        if (actiune == 'delete all') {
            if (confirm('Esti sigur ca  vrei sa sterge aceste ' + checkedNum + ' inregistrari?') == true) {
                return true;
            }
            return false;

        }
        else {
            return false;
        }
    }
    else {
        alert('Alege pentru o inregistrare pentru editare/stergere');
        return false;
    }


}
