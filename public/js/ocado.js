

// card animation

document.addEventListener("DOMContentLoaded", ()=>{

    let cards = document.querySelectorAll(".card");


    let cardAnime = anime.timeline({
        duration: 2000
    });

    cardAnime.add({
        targets: cards,
        scale: [0,1],
        rotate: [-60,0],
        delay: anime.stagger(200, {start:1000})
    });
});