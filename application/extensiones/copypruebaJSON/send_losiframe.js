
// El emergente inyecta este script en todos los fotogramas de la pestaña activa.
//var losid = [].slice.apply(document.getElementsByTagName('a'));
//HACERLO CON UNA EXPRESION REGULAR
var elid;
exp = new RegExp("(^(google_ads_iframe))|(^(aswift))");
//exp = /^() /
//selector para el iframe
 direccion = window.location;
var losiframe = [].slice.apply(document.querySelectorAll('iframe'));

losiframe = losiframe.map(function(element) {
//se le aplica la funcion(element) a todos los elementos de array losiframe

    //voy a filtrar con un if
    if(exp.test(element.id))
    {
        elid = element.id;

        // alert("hola");
    }

    return elid;
});
    losiframe.sort();


var kBadPrefix = 'javascript';
for (var i = 0; i < losiframe.length;) {
    if(losiframe[i] == null || losiframe[i] == undefined) {
        continue;
    }
    if (((i > 0) && (losiframe[i] == losiframe[i - 1])) ||
        (losiframe[i] == '') ||
        (kBadPrefix == losiframe[i].toLowerCase().substr(0, kBadPrefix.length))) {
        losiframe.splice(i, 1);
    } else {
        ++i;
    }
}
losiframe.unshift({'url':direccion});
//alert(losiframe[0].url);

chrome.runtime.sendMessage(losiframe);