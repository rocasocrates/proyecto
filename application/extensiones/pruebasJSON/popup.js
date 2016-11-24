

var allpublic = [];
var paralatabla = [];
var interval;
var contador = 0;
//delCookie("token");
   //setCookie("user", "manuel");
   // dn =  getCookie("user");
var login;
var pass;
var pruebaser = "" ;
//setCookie("dni", "pepe", 2);

var cookie;
//var url = window.location;
//Mostrar todos los iframes visibles.
/*la url*/
/*para recuperar la capa de fondo*/


    function mostrarlosiframe() {

        var idTabla = document.getElementById('losiframe');
        while (idTabla.children.length > 1) {
            idTabla.removeChild(idTabla.children[idTabla.children.length - 1])
        }
        for (var i = 0; i < paralatabla.length; ++i) {
            var row = document.createElement('tr');
            var col1 = document.createElement('td');

            col1.innerText = paralatabla[i];
            col1.style.whiteSpace = 'nowrap';

            row.appendChild(col1);
            idTabla.appendChild(row);
        }

    }

// Configurar los controladores de eventos e inyectar send_losiframe.js en todos los fotogramas del activo
// Pestaña.1479729061
chrome.runtime.onMessage.addListener(
    function (losiframe) {
        if(getCookie("token") != "") {
            //document.cookie = "token = holacaracola";
            var dn =  getCookie("token")
           // alert(dn);
            //dn = 'juan';
            $.ajax({
                type: 'POST',
                url: 'http://localhost/publicidad/index.php/Extensiones/publicidad_consumida',
                async: true,
                data: {accion: JSON.stringify(losiframe), lala: dn},
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
            for (var index in losiframe) {
                allpublic.push(losiframe[index]);
            }
            allpublic.sort();
            paralatabla = allpublic;

            mostrarlosiframe();
        }else
        {
            if(contador <= 0)
            {
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
               // function enviar() {
                 //   correo =  campocorreo.value;
                  //  contrasena = campopass.value;

                   // $.ajax({
                  //      type: 'POST',
                   //     url: 'http://localhost/publicidad/index.php/Extensiones/publicidad_consumida',
                //        async: true,
               //         data: {c: correo, p: contrasena},
               //         dataType: 'json',
                //        success: function (response) {
              //              //console.log("hola");
              //              //alert("hola");
              //             cookie = response;
              //              document.cookie = "token = "+cookie;
              //              //setCookie("token", cookie);
             //           }
              //      });
                    /*aqui empiezo el ajax de libros web*/
                    var READY_STATE_COMPLETE=4;
                    var peticion_http = null;

                    function inicializa_xhr() {
                        if(window.XMLHttpRequest) {
                            return new XMLHttpRequest();
                        }
                        else if(window.ActiveXObject) {
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
                        if(peticion_http) {
                            peticion_http.onreadystatechange = procesaRespuesta;
                            peticion_http.open("POST", "http://localhost/publicidad/index.php/Extensiones/publicidad_consumida", true);

                            peticion_http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                            var query_string = crea_query_string();
                            peticion_http.send(query_string);
                        }
                    }

                    function procesaRespuesta() {
                        if(peticion_http.readyState == READY_STATE_COMPLETE) {
                            if(peticion_http.status == 200) {
                                cookie = peticion_http.responseText;
                                //cookie = JSON.parse(cookie);
                               // alert(cookie);
                                cookie = cookie.substring(1, cookie.length-1);
                                document.cookie = "token = "+cookie;
                            }
                        }
                    }
/*aqui termina el ajax de libros web*/
               // }

                contador++;

                //aqui hacer un ajax para enviar el formulario y recojer la respuesta y guardarla en una cookie
                //darle la vuelta y quitarle el else o poner en un do while
                //setCookie("token", "zxcvbnm");
            }}
    });
    window.onload = function () {

        chrome.windows.getCurrent(function (currentWindow) {
            chrome.tabs.query({active: true, windowId: currentWindow.id},
                function (activeTabs) {
                    chrome.tabs.executeScript(
                        activeTabs[0].id, {file: 'send_losiframe.js', allFrames: true});

                });
        });

    };