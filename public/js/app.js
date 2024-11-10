//alertas

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
    console.log('entro a reslatar');
    
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
      console.log(action);
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
  console.log('entro al navbar1');
  const navbar3 = document.getElementById('navbar3');
  // const btn=this.document.getElementById('navbutton1');
  if (navbar3) {
    console.log('entro al navbar');

    if (window.scrollY > 110) {
      console.log('agrego la clase')
      navbar3.classList.add('navbar-top');
    } else {
      navbar3.classList.remove('navbar-top');
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


document.addEventListener('DOMContentLoaded', function(){
  // Detecta cuando se selecciona una playa
  document.getElementById('playaSelect').addEventListener('change', function(){
    var playa_id = this.value;

    // Hace la llamada con fetch
    fetch('/getMuestreo/' + playa_id)
      .then(response => {
        if (!response.ok) {
          throw new Error('Error en la respuesta de la red');
        }
        return response.json();
      })
      .then(data => {
        // Limpiar el selector de muestreo y zona
        const muestreoSelected = document.getElementById('muestreoSelected');
        const zonaSelected = document.getElementById('zonaSelected');
        muestreoSelected.innerHTML = '<option value="0">Selecciona Muestreo</option>';
        zonaSelected.innerHTML = '<option value="0">Selecciona Zona</option>';
        console.log(data.num_muestreo);
        // Añade nuevas opciones
        data.num_muestreo.forEach(muestreo => {
          muestreoSelected.innerHTML += '<option value="' + muestreo.num_muestreo + '"> ' + muestreo.num_muestreo + '</option>';
        });
        data.zonas.forEach(zonas => {
          zonaSelected.innerHTML += '<option value="' + zonas.zona + '"> ' + zonas.zona + '</option>';
        });

        muestreoSelected.innerHTML += '<option value="0">Todos</option>';
        zonaSelected.innerHTML += '<option value="0">Todas</option>';
      })
      .catch(error => {
        console.error('Error:', error);
      });
  });
});



