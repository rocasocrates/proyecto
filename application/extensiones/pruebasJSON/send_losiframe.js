var elid;
exp = new RegExp('(^(google_ads_iframe))|(^(aswift))');//|^(google_osd_static_frame_)'
 direccion = window.location;
var losiframe = [].slice.apply(document.getElementsByTagName('iframe'));
losiframe = losiframe.map(function(element) {
    if(exp.test(element.id))
    {

        elid = element.id;
    }
    return elid;
});
losiframe.unshift({'url':direccion});
chrome.runtime.sendMessage(losiframe);