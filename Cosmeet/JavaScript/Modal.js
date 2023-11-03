const modalContainer = document.querySelector(".modal-container");
const modalTriggers = document.querySelectorAll(".modal-trigger");

modalTriggers.forEach(trigger => trigger.addEventListener("click", toggleModal))

function toggleModal(){
  modalContainer.classList.toggle("active")
}

document.getElementById('sidebarButton').addEventListener('click', function() {
  document.getElementById('sidebar').classList.toggle('active');
});

document.getElementById('closeSidebarButton').addEventListener('click', function() {
  document.getElementById('sidebar').classList.remove('active');
});