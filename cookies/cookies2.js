

function setCookie(cname,cvalue,exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname+"="+cvalue+"; "+expires;
}

function getCookie(name){
    var cname = name + "=";
    var dc = document.cookie;
    if (dc.length > 0) {
        begin = dc.indexOf(cname);
        if (begin != -1) {
            begin += cname.length;
            end = dc.indexOf(";", begin);
            if (end == -1) end = dc.length;
            return decodeURIComponent(dc.substring(begin, end));
        }
    }
    return null;
}

function checkCookie() {
    var user=getCookie("username");
    if (user != "") {
        alert("Welcome again " + user);
    } else {
       user = prompt("Please enter your name:","");
       if (user != "" && user != null) {
           setCookie("username", user, 30);
       }
    }
}
