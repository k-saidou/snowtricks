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
let currentItem = 3;

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

window.onload = () => {
   // Gestion des boutons "Supprimer"
   let links = document.querySelectorAll("[data-delete]")
   
   // On boucle sur links
   for(link of links){
       // On écoute le clic
       link.addEventListener("click", function(e){
           // On empêche la navigation
           e.preventDefault()

           // On demande confirmation
           if(confirm("Voulez-vous supprimer cette image ?")){
               // On envoie une requête Ajax vers le href du lien avec la méthode DELETE
               fetch(this.getAttribute("href"), {
                   method: "DELETE",
                   headers: {
                       "X-Requested-With": "XMLHttpRequest",
                       "Content-Type": "application/json"
                   },
                   body: JSON.stringify({"_token": this.dataset.token})
               }).then(
                   // On récupère la réponse en JSON
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