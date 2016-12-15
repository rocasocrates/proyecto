function validar_nick(nick) {
    var elementonick = document.getElementById('errornick');
    if(!/^\w+$/.test(nick)) {
        throw new Error("Nick incorrecto. Debe tener algun caracter.");
    }else
    {
        if(elementonick.childNodes != null)
        {
            elementonick.style.visibility = 'hidden';
        }
    }

}
function validar_email(email) {
    var elementoemail = document.getElementById('erroremail');
    if(!/^.*@.*\..*$/.test(email)) {
        throw new Error("Email incorrecto. Debe ser del tipo xxx@yyy.zzz");
    }else
    {
        if(elementoemail.childNodes != null)
        {
            elementoemail.style.visibility = 'hidden';
        }
    }
}
function validar_password(password) {
    var elementopassword = document.getElementById('errorpassword');
    if(!/^\w{8,10}$/.test(password)) {
        throw new Error("Password incorrecta. Debe tener entre 8 y 10 caracteres.");
    }else
    {
        if(elementopassword.childNodes != null)
        {
            elementopassword.style.visibility = 'hidden';
        }
    }

}
function validar_repassword(password, repassword) {
    var elementorepassword = document.getElementById('errorrepassword');
    if(!/^\w{8,10}$/.test(password)) {
        throw new Error("Password incorrecta. Debe tener entre 8 y 10 caracteres.");
    }
    if (password != repassword) {
        throw new Error("Las contraseñas no coinciden");
    }else
    {
        if(elementorepassword.childNodes != null)
        {
            elementorepassword.style.visibility = 'hidden';
        }
    }
}
window.onload= function () {
//$(document).ready(function(){
     document.getElementById('nickr').addEventListener('blur',function (event) {
        var evento = event || window.event;
        try {
            validar_nick(document.getElementById('nickr').value);

           // document.getElementById('errornick').style.visibility = 'hidden';
        } catch (error) {
            evento.preventDefault();
            document.getElementById('errornick').innerHTML = error;
            document.getElementById('errornick').style.visibility = 'visible';
            document.getElementById('errornick').style.color = '#BB0E0D';

        }
    });
    document.getElementById('emailr').addEventListener('blur',function (event) {
        var evento = event || window.event;
        try {
            validar_email(document.getElementById('emailr').value);

        } catch (error) {
            evento.preventDefault();
            document.getElementById('erroremail').innerHTML = error;
            document.getElementById('erroremail').style.visibility = 'visible';
            document.getElementById('erroremail').style.color = '#BB0E0D';
        }
    });
    document.getElementById('passwordr').addEventListener('blur',function (event) {
        var evento = event || window.event;
        try {
            validar_password(document.getElementById('passwordr').value);
        } catch (error) {
            evento.preventDefault();
            document.getElementById('errorpassword').innerHTML = error;
            document.getElementById('errorpassword').style.visibility = 'visible';
            document.getElementById('errorpassword').style.color = '#BB0E0D';
        }
    });
    document.getElementById('repasswordr').addEventListener('blur',function (event) {
        var evento = event || window.event;
        try {
            validar_repassword(document.getElementById('passwordr').value), document.getElementById('repasswordr').value;
        } catch (error) {
            evento.preventDefault();
            document.getElementById('errorrepassword').innerHTML = error;
            document.getElementById('errorrepassword').style.visibility = 'visible';
            document.getElementById('errorrepassword').style.color = '#BB0E0D';
        }
    });

}
//});


