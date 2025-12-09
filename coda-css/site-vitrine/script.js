document.addEventListener('DOMContentLoaded', () => { //attendre que l'element soit charger sur le site
  const curseur = document.querySelector('.curseur');

    function hideMouseCursor() {  //fonction trouver sur reddit : https://www.reddit.com/r/css/comments/nlfouo/need_help_on_how_to_hide_the_mouse_cursor_when_a/?tl=fr
      if (document.body.style.cursor !== 'none') {
        document.body.style.cursor = 'none' ;  
      }
    }

  let souris_x = 0; let souris_y = 0;
  let div_x = 0; let div_y = 0;

  const vitesse = 0.3;

  const position_souris = (x, y) => {
    souris_x = x; souris_y = y;   
  };

  hideMouseCursor();

  document.addEventListener('mousemove', (e) => { //quand la souris bouge la position de la souris est actualisé
    position_souris(e.clientX, e.clientY);
  });

  const boucle_animation = () => {
    div_x += (souris_x - div_x) * vitesse; div_y += (souris_y - div_y) * vitesse;
    curseur.style.left = `${div_x}px`; curseur.style.top = `${div_y}px`; //changement de la position sur le css
    requestAnimationFrame(boucle_animation);
  };

  requestAnimationFrame(boucle_animation); //lance la boucle d'anniamtion
});