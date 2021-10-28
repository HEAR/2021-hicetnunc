

// On ajoute un QR CODE dans le NAV QR
const navQR = document.querySelector('#nav_QRCODE');
const qrcode = new QRCode(navQR, {
    text: "10-02-2020",
    // width: 128,
    // height: 128,
    colorDark : "#000000",
    colorLight : "#ffffff",
    correctLevel : QRCode.CorrectLevel.H
});


// Pour chaque date on ajoute une fonction au click qui produit un QRCODE (touchStart)
document.querySelectorAll('.date').forEach( date => {
    date.addEventListener('click', generateQRCODE, false)
})


function generateQRCODE() {
    //  On recupère l'attribue de la date ie: 20-10-2020 pour produire le QRCODE
    let attribute = this.getAttribute("attr");
    // Modifie le QRCODE
    qrcode.makeCode(attribute)
    // Affiche le QRcode en bas de l'écran 
    navQR.classList.add("show")
}


// Gestion du Scroll (le navQR disparait lorsque l'on scroll)

var last_pos = 0;
var ticking = false;


window.addEventListener('scroll', () =>  {
  if (!ticking) {
    window.requestAnimationFrame(() => {
        // Si le scroll a une certaine vitesse alors on desactive la balise NAVQR (partie en bas de l'écran contenant le QRCODE)
        if(Math.abs(window.scrollY - last_pos) > 10) {
            navQR.classList.remove("show")
        }
        ticking = false;
        last_pos = window.scrollY;
    });


  }

  ticking = true;
});