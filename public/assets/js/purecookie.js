// --- Config --- //
var purecookieTitle = "Gizliliğinize değer veriyoruz"; // Title
var purecookieDesc = "Çerezleri size daha iyi bir hizmet sağlamak için kullanıyoruz."; // Description
var purecookieLink = '<a href="https://exxefy.com/politikalar" target="_blank">Çerez Kullanımı</a>'; // Cookiepolicy link
var purecookieButton = "Onayla"; // Button text
// ---        --- //


function pureFadeIn(elem, display){
  var el = document.getElementById(elem);
  el.style.opacity = 0;
  el.style.display = display || "block";

  (function fade() {
    var val = parseFloat(el.style.opacity);
    if (!((val += .02) > 1)) {
      el.style.opacity = val;
      requestAnimationFrame(fade);
    }
  })();
};
function pureFadeOut(elem){
  var el = document.getElementById(elem);
  el.style.opacity = 1;

  (function fade() {
    if ((el.style.opacity -= .02) < 0) {
      el.style.display = "none";
    } else {
      requestAnimationFrame(fade);
    }
  })();
};

function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
function eraseCookie(name) {
    document.cookie = name+'=; Max-Age=-99999999;';
}

function cookieConsent() {
    document.body.innerHTML += '<div class="cookieConsentContainer" id="cookieConsentContainer"><div class="cookieTitle"><a>' + purecookieTitle + '</a></div><div class="cookieDesc"><p>' + purecookieDesc + ' ' + purecookieLink + '</p></div><div class="cookieButton"><a onClick="purecookieDismiss();">' + purecookieButton + '</a></div></div>';
    pureFadeIn("cookieConsentContainer");
}

  function cookieConsent1() {
    if (!getCookie('purecookieDismiss')) {
        $("#exampleModal").modal({backdrop: false})
        $('body').css('overflow-y', 'auto');
        $(".cookie-modal").css({'position': 'fixed', 'bottom': '0', 'right': '0', 'margin': '0'});

        purecookieDismiss();
    }
  }

function purecookieDismiss() {
  setCookie('purecookieDismiss','1',7);
  pureFadeOut("cookieConsentContainer");
}

window.onload = setTimeout(cookieConsent(), 2001);
