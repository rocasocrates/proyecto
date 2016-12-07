function validar_email(email) {
    if(!/^.*@.*\..*$/.test(email)) {
        throw new Error("Email incorrecto. Debe ser del tipo xxx@yyy.zzz");
    }
}
function validar_password(password) {
    if(!/^\w{8,10}$/.test(password)) {
        throw new Error("Password incorrecta. Debe tener entre 8 y 10 caracteres.");
    }

}
function validar_repassword(password, repassword) {
    if(!/^\w{8,10}$/.test(password)) {
        throw new Error("Password incorrecta. Debe tener entre 8 y 10 caracteres.");
    }
    if (password != repassword) {
        throw new Error("Las contraseñas no coinciden");
    }
}
window.onload= function () {

//$(document).ready(function(){

    document.getElementById('emailr').addEventListener('blur',function (event) {
        var evento = event || window.event;
        try {
            validar_email(document.getElementById('emailr').value);

        } catch (error) {
            evento.preventDefault();
            document.getElementById('error').innerHTML = error;

        }
    });
    document.getElementById('passwordr').addEventListener('blur',function (event) {
        var evento = event || window.event;
        try {
            validar_password(document.getElementById('passwordr').value);
        } catch (error) {
            evento.preventDefault();
            document.getElementById('error').innerHTML = error;
        }
    });
    document.getElementById('repasswordr').addEventListener('blur',function (event) {
        var evento = event || window.event;
        try {
            validar_repassword(document.getElementById('passwordr').value), document.getElementById('repasswordr').value;
        } catch (error) {
            evento.preventDefault();
            document.getElementById('error').innerHTML = error;
        }
    });

}
//});


