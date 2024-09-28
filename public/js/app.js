//alertas



// setTimeout(function() {
//   var alertElement = document.getElementById('myAlert');
//   var alert = new bootstrap.Alert(alertElement);
//   alert.close();
// }, 3000); // 5000 milisegundos = 5 segundos
setTimeout(function() {
  var alertElements = document.querySelectorAll('.myAlert'); // Selecciona todos los elementos con la clase 'mi-clase'
  alertElements.forEach(function(alertElement) {
    var alert = new bootstrap.Alert(alertElement);
    alert.close();
  });
}, 3000); // 3000 milisegundos = 3 segundos

//Resalta el elemento activo
   // Obtén todos los elementos de enlace dentro del navbar
   const navLinks = document.querySelectorAll('.navbar-nav .nav-link');

   // Para cada enlace, agrega un evento de clic
   navLinks.forEach(link => {
     link.addEventListener('click', () => {
       // Elimina la clase 'active' de todos los enlaces
       navLinks.forEach(link => {
         link.classList.remove('active');
       });
       // Agrega la clase 'active' al enlace que se hizo clic
       link.classList.add('active');
     });
   });

   

//modal delete 
document.addEventListener('DOMContentLoaded', (event) => {
  const exampleModal = document.getElementById('deleteModal')
  if(exampleModal){
    exampleModal.addEventListener('show.bs.modal', event => {
      // Button that triggered the modal
      const button = event.relatedTarget
      // Extract info from data-bs-* attributes
      const id = button.getAttribute('data-bs-id')
   
      // Update the modal's content.
      const modalTitle = exampleModal.querySelector('.modal-title')
      modalTitle.textContent = `Se va a eliminar el registro : ${id}`
   
      action= $('#formDelete').attr('data-action').slice(0,-1);
      action+=id;
      $('#formDelete').attr('action',action);
      console.console.log(action);
       })
  }
})


//Cambio de color del navbar al hacer scroll 
window.addEventListener('scroll', function() {
  const navbar = document.getElementById('navbar1');
  const btn=this.document.getElementById('navbutton1');
  if (navbar && btn) {

    if (window.scrollY > 50) {
      navbar.classList.remove('navbar-dark');
      navbar.classList.add('navbar-light', 'border');
      btn.classList.remove('btn-white')
      btn.classList.add('btn-blue')
    } else {
      navbar.classList.remove('navbar-light','border');
      navbar.classList.add('navbar-dark');
      btn.classList.remove('btn-blue')
      btn.classList.add('btn-white')
    }
  }
});



  //Para efectos de textos 
  // Intersection Observer
  document.addEventListener("DOMContentLoaded", function() {
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('show');
            }
        });
    });

    const elements = document.querySelectorAll('.fade-in-text, .slide-in-left, .zoom-in, .rotate-in, .bounce-in, .imagen-fade-in');
    elements.forEach(element => observer.observe(element));
});



