

var allpublic = [];
var paralatabla = [];

// Mostrar todos los enlaces visibles.
function showLinks() {
  var idTabla = document.getElementById('links');
  while (idTabla.children.length > 1) {
    idTabla.removeChild(idTabla.children[idTabla.children.length - 1])
  }
  for (var i = 0; i < paralatabla.length; ++i) {
    var row = document.createElement('tr');
    var col0 = document.createElement('td');
    var col1 = document.createElement('td');

    col1.innerText = paralatabla[i];
    col1.style.whiteSpace = 'nowrap';

    row.appendChild(col0);
    row.appendChild(col1);
    idTabla.appendChild(row);

  }

}
//alert(elemento);
chrome.extension.onRequest.addListener(function(links) {
  alert(links);
  for (var index in links) {
    allpublic.push(links[index]);
  }
  allpublic.sort();
  paralatabla = allpublic;
  showLinks();
});
// Configurar los controladores de eventos e inyectar send_losiframe.js en todos los fotogramas del activo
// Pestaña.
window.onload = function() {

  chrome.windows.getCurrent(function (currentWindow) {
    chrome.tabs.query({active: true, windowId: currentWindow.id},
                      function(activeTabs) {
      chrome.tabs.executeScript(
        activeTabs[0].id, {file: 'send_links.js', allFrames: true});
    });
  });
};