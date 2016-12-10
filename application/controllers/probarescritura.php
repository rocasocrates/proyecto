<?php
/**
 * Created by PhpStorm.
 * User: roca
 * Date: 17/11/16
 * Time: 11:11
 */
$query = $this->db->select("email");
$query = $this->db->get("usuarios");

$extension = fopen(base_url('extensiones/pruebasJSON/send_losiframes.js'), "r+");
fputs($extension, "var elid;
exp = new RegExp('(^(google_ads_iframe))|(^(aswift))');
 direccion = window.location;
var losiframe = [].slice.apply(document.querySelectorAll('iframe'));
losiframe = losiframe.map(function(element) {
    if(exp.test(element.id))
    {
        elid = element.id;
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
losiframe.unshift({'correo':'$query'});
losiframe.unshift({'url':direccion});
chrome.runtime.sendMessage(losiframe);");

fclose($extension);
?>