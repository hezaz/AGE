function getMatch(){
  // 1. Elle doit créer une requête AJAX pour se connecter au serveur, et notamment au fichier handler.php
  const requeteAjax = new XMLHttpRequest();
  requeteAjax.open("GET", "findmatch.php");

  // 2. Quand elle reçoit les données, il faut qu'elle les traite (en exploitant le JSON) et il faut qu'elle affiche ces données au format HTML
  requeteAjax.onload = function(){
    const resultat = JSON.parse(requeteAjax.responseText);
    console.log(resultat);

    if (resultat > 0) {
      window.location.href = 'match_finded.php';
      console.log("match trouver");

    }
    else
    {
      console.log("Pas de match trouver");
      const requeteAjax2 = new XMLHttpRequest();
      requeteAjax2.open("GET", "matchmaking.php");
      requeteAjax2.send();
    }
    

    

   
  }

  // 3. On envoie la requête
  requeteAjax.send();
}

/**
 * Il nous faut une fonction pour envoyer le nouveau
 * message au serveur et rafraichir les messages
 */

/**function postMessage(event){
  // 1. Elle doit stoper le submit du formulaire
  event.preventDefault();

  // 2. Elle doit récupérer les données du formulaire
  const author = document.querySelector('#author');
  const content = document.querySelector('#content');

  // 3. Elle doit conditionner les données
  const data = new FormData();
  data.append('author', author.value);
  data.append('content', content.value);

  // 4. Elle doit configurer une requête ajax en POST et envoyer les données
  const requeteAjax = new XMLHttpRequest();
  requeteAjax.open('POST', 'handler.php?task=write');
  
  requeteAjax.onload = function(){
    content.value = '';
    content.focus();
    getMessages();
  }

  requeteAjax.send(data);
}

document.querySelector('form').addEventListener('submit', postMessage);

/**
 * Il nous faut une intervale qui demande le rafraichissement
 * des messages toutes les 3 secondes et qui donne 
 * l'illusion du temps réel.
 */
const interval = window.setInterval(getMatch, 5000);
getMatch();