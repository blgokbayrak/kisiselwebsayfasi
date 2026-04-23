let resimler = [
    "img/kocaeli1.jpeg",
    "img/degirmendere.webp",
    "img/bilimmerkezi.png",
    "img/masukiye2.jpg"
];

let sira = 0;

function sonrakiResim() {
    sira++;

    if (sira >= resimler.length) {
        sira = 0;
    }

    document.getElementById("sliderResim").src = resimler[sira];
}

function oncekiResim() {
    sira--;

    if (sira < 0) {
        sira = resimler.length - 1;
    }

    document.getElementById("sliderResim").src = resimler[sira];
}