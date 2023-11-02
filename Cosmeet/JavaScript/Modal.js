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