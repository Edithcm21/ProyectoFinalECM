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
  exampleModal.addEventListener('show.bs.modal', event => {
    // Button that triggered the modal
    const button = event.relatedTarget
    // Extract info from data-bs-* attributes
    const id = button.getAttribute('data-bs-id')
    // If necessary, you could initiate an AJAX request here
    // and then do the updating in a callback.
    //
    // Update the modal's content.
    const modalTitle = exampleModal.querySelector('.modal-title')
    modalTitle.textContent = `Se va a eliminar el registro : ${id}`
 
    action= $('#formDelete').attr('data-action').slice(0,-1);
    action+=id;
    $('#formDelete').attr('action',action);
    // console.console.log(action);
     })
})