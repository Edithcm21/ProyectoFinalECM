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
  }
})


//Cambio de color del navbar al hacer scroll 
window.addEventListener('scroll', function() {
  const navbar = document.getElementById('navbar');
  const btn=this.document.getElementById('navbutton');
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


// async function initMap() {
// console.log('entro a cargar la funcion ');

//   // Request needed libraries.
//   const { Map } = await google.maps.importLibrary("maps");
//   const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");
//   const map = new Map(document.getElementById("map"), {
//     center: { lat: 37.4239163, lng: -122.0947209 },
//     zoom: 14,
//     mapId: "a947c81ef05926d8",
//   });
//   console.log('Genero el mapa ');
//   const marker = new AdvancedMarkerElement({
//     map,
//     position: { lat: 37.4239163, lng: -122.0947209 },
//     title: "Ejemplo",
//   });
// }

// initMap();

// async function initMap() {
//   // Request needed libraries.
//   const { Map, InfoWindow } = await google.maps.importLibrary("maps");
//   const { AdvancedMarkerElement, PinElement } = await google.maps.importLibrary(
//     "marker",
//   );
//   const map = new Map(document.getElementById("map"), {
//     zoom: 12,
//     center: { lat: 34.84555, lng: -111.8035 },
//     mapId: "4504f8b37365c3d0",
//   });
//   // Set LatLng and title text for the markers. The first marker (Boynton Pass)
//   // receives the initial focus when tab is pressed. Use arrow keys to move
//   // between markers; press tab again to cycle through the map controls.
//   const tourStops = [
//     {
//       position: { lat: 34.8791806, lng: -111.8265049 },
//       title: "Boynton Pass",
//     },
//     {
//       position: { lat: 34.8559195, lng: -111.7988186 },
//       title: "Airport Mesa",
//     },
//     {
//       position: { lat: 34.832149, lng: -111.7695277 },
//       title: "Chapel of the Holy Cross",
//     },
//     {
//       position: { lat: 34.823736, lng: -111.8001857 },
//       title: "Red Rock Crossing",
//     },
//     {
//       position: { lat: 34.800326, lng: -111.7665047 },
//       title: "Bell Rock",
//     },
//   ];
//   // Create an info window to share between markers.
//   const infoWindow = new InfoWindow();

//   // Create the markers.
//   tourStops.forEach(({ position, title }, i) => {
//     const pin = new PinElement({
//       glyph: `${i + 1}`,
//       scale: 1.5,
//     });
//     const marker = new AdvancedMarkerElement({
//       position,
//       map,
//       title: `${i + 1}. ${title}`,
//       content: pin.element,
//       // gmpClickable: true,
//     });

//     // Add a click listener for each marker, and set up the info window.
//     marker.addListener("click", ({ domEvent, latLng }) => {
//       const { target } = domEvent;

//       infoWindow.close();
//       infoWindow.setContent(marker.title);
//       infoWindow.open(marker.map, marker);
//     });
//   });
// }

// initMap();




async function initMap() {
  // Request needed libraries.
  const { Map, InfoWindow } = await google.maps.importLibrary("maps");
  const { AdvancedMarkerElement, PinElement } = await google.maps.importLibrary(
    "marker",
  );
  const puntos = window.puntos;
  console.log(puntos);
  
  const map = new Map(document.getElementById("map"), {
    zoom: 4,
    center: { lat: 23.6345, lng: -102.5528 },
    mapId: "a947c81ef05926d8",
  });

  
  // Create an info window to share between markers.
  const infoWindow = new InfoWindow();

  // Create the markers.
  puntos.forEach(({ nombre_playa,latitud, longitud}, i) => {

    const marker = new AdvancedMarkerElement({
      position:{lat:parseFloat(latitud), lng: parseFloat(longitud)},
      map,
      title: `${nombre_playa}`,
    });

    // Add a click listener for each marker, and set up the info window.
    marker.addListener("click", ({ domEvent, latLng }) => {
      const { target } = domEvent;

      infoWindow.close();
      var contenidoInfowindow = '<div style="color: blue;">Nombre de la playa </div>' +
                                              '<div>No. muestreo: 1 </div>' +
                                              '<div>año/fecha: 2018 </div>' +
                                              '<div>dia de muestreo: sabado</div>' +
                                              '<div>zona: debajo pleamar</div>' +
                                              '<div>No. piezas: 3</div>' +
                                              '<hr>' +
                                              '<p style="font-style: italic;">ver piezas encontradas </p>';

      infoWindow.setContent(contenidoInfowindow);
      infoWindow.open(marker.map, marker);
    });
  });
}

initMap();


