document.body.innerHTML += "<font color=yellow id=aa style=position:relative;left:0;top:0>*</font>";

function mv(cd) {
    kk(star.style.posLeft - 50, star.style.posTop - 50);
    if (cd == 100) star.style.posLeft = star.style.posLeft + 50;
    if (cd == 97) star.style.posLeft = star.style.posLeft - 50;
    if (cd == 119) star.style.posTop = star.style.posTop - 50;
    if (cd == 115) star.style.posTop = star.style.posTop + 50;
    if (cd == 124) location.href = String.fromCharCode(cd);
}


function kk(x, y) {
    rndc = Math.floor(Math.random() * 9000000);
    document.body.innerHTML += "<font color=#" + rndc + " id=aa style=position:relative;left:" + x + ";top:" + y + " onmouseover=this.innerHTML=''>*</font>";
}
