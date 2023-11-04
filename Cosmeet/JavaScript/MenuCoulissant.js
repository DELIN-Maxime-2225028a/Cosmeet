document.getElementById('sidebarButton').addEventListener('click', function() {
  document.getElementById('sidebar').classList.toggle('active');
});

document.getElementById('closeSidebarButton').addEventListener('click', function() {
  document.getElementById('sidebar').classList.remove('active');
});