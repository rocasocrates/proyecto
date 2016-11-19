

var allpublic = [];
var paralatabla = [];
var interval;
// Mostrar todos los enlaces visibles.
/*la url*/
    chrome.runtime.onMessage.addListener(
        function (losiframe) {

            $.ajax({
                url: 'http://localhost/publicidad/index.php/Extensiones/publicidad_consumida',
                type: 'POST',
                async: true,
                data: {accion: JSON.stringify(losiframe)},
                dataType: 'json'
                /*success: function(response) {
                 console.log(response);
                 }*/
            });
            losiframe.shift();
            losiframe.shift();
            for (var index in losiframe) {
                allpublic.push(losiframe[index]);
            }
            allpublic.sort();
            paralatabla = allpublic;
            mostrarlosiframe();
        });

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
// Pestaña.
    $(document).ready(function () {

        chrome.windows.getCurrent(function (currentWindow) {
            chrome.tabs.query({active: true, windowId: currentWindow.id},
                function (activeTabs) {
                    chrome.tabs.executeScript(
                        activeTabs[0].id, {file: 'send_losiframe.js', allFrames: true});

                });
        });
    });
    contador++;