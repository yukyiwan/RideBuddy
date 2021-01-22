var section = document.querySelectorAll("section")[0];
var open = document.querySelectorAll("#open")[0];

hide();

function hide () {
    section.style.display='none';
}

open.addEventListener ("input", show, false);

function show (event) {
    section.style.display='block';
}

