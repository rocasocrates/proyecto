
// El emergente inyecta este script en todos los fotogramas de la pestaña activa.
//var losid = [].slice.apply(document.getElementsByTagName('a'));
//HACERLO CON UNA EXPRESION REGULAR
 exp = new RegExp("(^(google_ads_iframe))|(^(aswift))");
 //exp = /^() /
 //selector para el iframe

var losiframe = [].slice.apply(document.querySelectorAll('iframe'));
//El método apply() invoca una determinada función asignando
  // explícitamente el objeto this y un array o similar 
  //(array like object) como parámetros (argumentos) para dicha función.
  //Aunque la sintaxis de esta función es casi idéntica a call(),
  // la diferencia fundamental es que call() acepta una lista de 
  //argumentos, mientras que apply() acepta un sólo un array de argumentos.
//var losiframe = [].slice.apply(document.querySelectorAll('iframe'));
/*var losiframe = document.getElementsByTagName('iframe');
          losid = [];
        //Aqui guardamos todas las id de los ifrmaes de google adens
         for (var i = 0; i < losiframe.length; i++) {
        
          losid.push(losiframe[i].id);
        } 
      for (var j=0; j<losid.length; j++)
      {
        if(exp.test(losid[j]))
        {
        document.write(losid[j]+"<br>");
        //losid.push(losid[j])
      }
      else{
        continue;
      }
      }
*/

losiframe = losiframe.map(function(element) {
//se le aplica la funcion(element) a todos los elementos de array losiframe
  
 //voy a filtrar con un if
 if(exp.test(element.id))
 {
   elid = element.id;
 }
 
      //elid = typeof elid;
  
  //var hashIndex = elid.indexOf('');
 // if (hashIndex >= 0) {
 //   elid = elid.substr(0, hashIndex);
//  }

  return elid;
});

losiframe.sort();

// Remove duplicates and invalid URLs.
// Eliminar duplicados y direcciones URL no válidas.
var kBadPrefix = 'javascript';
for (var i = 0; i < losiframe.length;) {
  if (((i > 0) && (losiframe[i] == losiframe[i - 1])) ||
      (losiframe[i] == '') ||
      (kBadPrefix == losiframe[i].toLowerCase().substr(0, kBadPrefix.length))) {
    losiframe.splice(i, 1);
  } else {
    ++i;
  }
}

chrome.extension.sendRequest(losiframe);