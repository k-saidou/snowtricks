function masquer_div(a_masquer)
{ console.log("step1");
  if (document.getElementById(a_masquer).style.display == 'none')
  {  console.log("step2");
       document.getElementById(a_masquer).style.display = 'block';
  }
  else
  { console.log("step3");
       document.getElementById(a_masquer).style.display = 'none';
  }
}


let loadMoreBtn = document.querySelector('#load-more');
let currentItem = 6;

loadMoreBtn.onclick = () =>{
   let boxes = [...document.querySelectorAll('.container .box-container .box')];
   for (var i = currentItem; i < currentItem + 3; i++){
      boxes[i].style.display = 'inline-block';
   }
   currentItem += 3;

   if(currentItem >= boxes.length){
      loadMoreBtn.style.display = 'none';
   }
} 


/*
window.onload = () => {
   let links = document.querySelectorAll("[data-delete]")
   
   for(link of links){
       link.addEventListener("click", function(e){
           e.preventDefault()
console.log(this.getAttribute("data-token"))

           if(confirm("Voulez-vous supprimer cette image ?")){
               fetch(this.getAttribute("href"), {
                method: "POST",
                headers: {
                    "X-Requested-With": "XMLHttpRequest",
                    "Content-Type": "application/json",
                    "X-CSRF-Token": this.getAttribute("data-token") 
                },
            }).then(                   
                  response => response.json()
               ).then(data => {
                   if(data.success)
                       this.parentElement.remove()
                   else
                       alert(data.error)
               }).catch(e => alert(e))
           }
       })
   }
}
*/
// window.onload = () => {
//   let links = document.querySelectorAll("[data-delete]");

//   for (link of links) {
//       link.addEventListener("click", function (e) {
//           e.preventDefault();
//           console.log(this.getAttribute("data-token"));

//           if (confirm("Voulez-vous supprimer cette image ?")) {
//               fetch(this.getAttribute("href"), {
//                   method: "POST",
//                   headers: {
//                       "X-Requested-With": "XMLHttpRequest",
//                       "Content-Type": "application/json",
//                       "X-CSRF-Token": this.getAttribute("data-token")
//                   },
//               })
//               .then(response => {
//                   if (!response.ok) {
//                       throw new Error('Network response was not ok');
//                   }
//                   return response.json();
//               })
//               .then(data => {
//                   console.log(data);
//                   if (data.success) {
//                       // Vérifiez si parentElement existe avant de tenter de le supprimer
//                       if (this.parentElement) {
//                           this.parentElement.remove();
//                       } else {
//                           console.error('Parent element does not exist.');
//                       }
//                   } else {
//                       alert(data.error);
//                   }
//               })
//               .catch(error => {
//                   console.error('There was a problem with the fetch operation:', error);
//               });
//           }
//       });
//   }
// };



  // Fonction pour faire défiler la page vers le haut
  function scrollToTop() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  }

  // Fonction pour faire défiler la page vers le bas
  function scrollToBottom() {
    window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
  }

  // Afficher ou masquer le bouton "Haut de page" en fonction de la position de défilement
  window.onscroll = function() {
    var scrollToTopButton = document.getElementById("scrollToTopButton");
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      scrollToTopButton.style.display = "block";
    } else {
      scrollToTopButton.style.display = "none";
    }
  };

  // script.js
document.addEventListener("DOMContentLoaded", function() {
  const voirPlusButton = document.getElementById("voir-plus");
  const content = document.querySelector(".content");

  voirPlusButton.addEventListener("click", function() {
      if (content.style.display === "none" || content.style.display === "") {
          content.style.display = "block";
          voirPlusButton.textContent = "Voir moins";
      } else {
          content.style.display = "none";
          voirPlusButton.textContent = "Voir plus";
      }
  });
});

function openModal() {
  $('#myModal').modal('show'); // Utilisez l'ID de votre fenêtre modale
}

// Fonction pour fermer la fenêtre modale
function closeModal() {
  $('#myModal').modal('hide'); // Utilisez l'ID de votre fenêtre modale
}