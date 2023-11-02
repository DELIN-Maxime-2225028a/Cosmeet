const modalContainer = document.querySelector(".modal-container");
const modalTriggers = document.querySelectorAll(".modal-trigger");

modalTriggers.forEach(trigger => trigger.addEventListener("click", toggleModal))

function toggleModal(){
  modalContainer.classList.toggle("active")
}

document.querySelectorAll('.toggle-comments-button').forEach(function(button) {
  button.addEventListener('click', function() {
      var commentaires = this.nextElementSibling;
      if (commentaires.style.display == 'none') {
          commentaires.style.display = 'block';
      } else {
          commentaires.style.display = 'none';
      }
  });
});

function askForDescription(e) {
  e.preventDefault();
  var description = prompt("Veuillez entrer une description pour la nouvelle catégorie :");
  document.getElementById('description_categorie').value = description;
  e.target.form.submit();
}