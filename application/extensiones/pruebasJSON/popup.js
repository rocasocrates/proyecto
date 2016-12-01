var allpublic = [];
var paralatabla = [];
//Array.prototype.unique=function(a){
// return function(){return this.filter(a)}}(function(a,b,c){return c.indexOf(a,b+1)<0
//});
var arr = [];
var interval;
var contador = 0;

var login;
var pass;
var pruebaser = "";

var cookie;

//Mostrar todos los iframes visibles.
/*la url*/
/*para recuperar la capa de fondo*/


function mostrarlosiframe() {

    var idTabla = document.getElementById('losiframe');
    // var nodo = document.getElementById('losiframe');
    while (idTabla.children.length > 1) {
        idTabla.removeChild(idTabla.children[idTabla.children.length - 1])
    }
    for (var i = 0; i < paralatabla.length; ++i) {
        var row = document.createElement('tr');
        var col1 = document.createElement('td');

        // col1.innerText = paralatabla[i];
        col1.innerText = paralatabla.length;
        col1.style.whiteSpace = 'nowrap';

        row.appendChild(col1);
        //idTabla.appendChild(row);

        if (idTabla.firstChild != null)
            idTabla.replaceChild(row, idTabla.firstChild);
        else
            idTabla.appendChild(row);
    }
    /* for (var i = 0; i < paralatabla.length; i++) {

     hijo = document.createTextNode(paralatabla[i]);
     if(divs[i].firstChild != null)
     nodo[i].replaceChild(hijo, nodo[i].firstChild);
     else
     nodo[i].appendChild(hijo);

     }*/

}

// Configurar los controladores de eventos e inyectar send_losiframe.js en todos los fotogramas del activo
// Pestaña.1479729061
chrome.runtime.onMessage.addListener(
    function (losiframe) {
        if (getCookie("token") != "") {
            //document.cookie = "token = holacaracola";
            var dn = getCookie("token");
            losiframe.unshift({'nick_usuario': dn});
            $.ajax({
                type: 'POST',
                url: 'http://localhost/publicidad/index.php/Extensiones/publicidad_consumida',
                async: true,
                data: {accion: JSON.stringify(losiframe)},
                dataType: 'json'
                //success: function(response) {
                //console.log(response);
                // alert("hola");
                //pruebaser = response[0];
//http://librosweb.es/libro/ajax/capitulo_7/la_primera_aplicacion.html
                //}
            });
            // function pru(respuesta) {
            //      alert("hola");
            //  }
            //losiframe.unshift({'laprueba':dn});

            losiframe.shift();
            losiframe.shift();


            for (var index in losiframe) {
                if (allpublic.indexOf(losiframe[index]) == -1) {
                    allpublic.push(losiframe[index]);
                }
            }

            alert(allpublic);

            paralatabla = allpublic;

            mostrarlosiframe();
        } else {
            if (contador <= 0) {
                var body = document.getElementById('cuerpo');
                /*correo*/
                campocorreo = document.createElement('input');
                labelcorreo = document.createElement('label');
                nodocorreo = document.createTextNode('Correo');
                labelcorreo.appendChild(nodocorreo);
                body.appendChild(labelcorreo);
                body.appendChild(campocorreo);
                /*password*/
                campopass = document.createElement('input');
                labelpass = document.createElement('label');
                nodopass = document.createTextNode('Password');
                labelpass.appendChild(nodopass);
                body.appendChild(labelpass);
                body.appendChild(campopass);
                /*submit*/
                boton = document.createElement('button');
                boton.addEventListener("click", enviar);
                nodoboton = document.createTextNode('empezar');
                boton.appendChild(nodoboton);
                body.appendChild(boton);

                /*aqui empiezo el ajax de libros web*/
                var READY_STATE_COMPLETE = 4;
                var peticion_http = null;

                function inicializa_xhr() {
                    if (window.XMLHttpRequest) {
                        return new XMLHttpRequest();
                    }
                    else if (window.ActiveXObject) {
                        return new ActiveXObject("Microsoft.XMLHTTP");
                    }
                }

                function crea_query_string() {
                    var correo = campocorreo.value;
                    var contrasena = campopass.value;

                    return "c=" + encodeURIComponent(correo) +
                        "&p=" + encodeURIComponent(contrasena);
                }

                function enviar() {
                    peticion_http = inicializa_xhr();
                    if (peticion_http) {
                        peticion_http.onreadystatechange = procesaRespuesta;
                        peticion_http.open("POST", "http://localhost/publicidad/index.php/Extensiones/publicidad_consumida", true);

                        peticion_http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                        var query_string = crea_query_string();
                        peticion_http.send(query_string);
                    }
                }

                function procesaRespuesta() {
                    if (peticion_http.readyState == READY_STATE_COMPLETE) {
                        if (peticion_http.status == 200) {
                            cookie = peticion_http.responseText;
                            //cookie = JSON.parse(cookie);
                            // alert(cookie);
                            cookie = cookie.substring(1, cookie.length - 1);
                            document.cookie = "token = " + cookie;
                        }
                    }
                }

                /*aqui termina el ajax de libros web*/
                // }

                contador++;

            }
        }
    });
window.onload = function () {
    //El getCurrent es para obtener la ventana actual
    /* chrome.windows.getCurrent(function (currentWindow) {
     chrome.tabs.query({active: true, windowId: currentWindow.id},
     function (activeTabs) {
     chrome.tabs.executeScript(
     activeTabs[0].id, {file: 'send_losiframe.js', allFrames: false});

     });
     });*/
    chrome.windows.getCurrent(function (currentWindow) {
        chrome.tabs.query({active: true, windowId: currentWindow.id},
            function (activeTabs) {
                chrome.tabs.executeScript(
                    activeTabs[0].id, {file: 'send_losiframe.js', allFrames: false});

            });
    });

};