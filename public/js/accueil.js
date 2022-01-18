
// accueil text animation

document.addEventListener('DOMContentLoaded', ()=>{
    let listItems = document.querySelectorAll("ol li");

    let depAnime = anime.timeline({
        duration: 2000,
   
    });

    depAnime.add({
        targets: '#description li',
        translateX: '25rem',
        opacity: 0
    });

    depAnime.add({
        targets: '#description li',
        translateX: '0rem',
        opacity: 1,
        delay: anime.stagger(500, {start:1500})
    });


});