
{{-- <div class="container-fluid mapa " id="mapa" style="height: 70vh; " >
    </div> --}}

    <div id="map"></div>
<script>
//   function initMap() {

//       // The location of Uluru
//   const position = { lat: -25.344, lng: 131.031 };

// const map = new google.maps.Map(document.getElementById("mapa"),  {
//   zoom: 4,
//   center: position,
//   mapId: "a947c81ef05926d8", // Map ID is required for advanced markers.
// });

//   // The advanced marker, positioned at Uluru
//   const marker = new google.maps.marker.AdvancedMarkerElement({
//       map,
//       position: position,
//       title: 'Uluru',
//   });
    // Coordenadas de ejemplo (puedes cambiarlas según tu ubicación)
    // var myLatLng = { lat: 23.6345, lng: -102.5528 };

    // // Crear un mapa centrado en las coordenadas especificadas
    //   var map = new google.maps.Map(document.getElementById('mapa'), {
    //   center: myLatLng,
    //   zoom: 5
    // });

    // // Datos pasados directamente desde el servidor
    // var puntos = @json($puntos);

    // var infowindow = new google.maps.InfoWindow();

    // // Iterar sobre los datos recibidos
    // puntos.forEach(function(punto) {
    //   var marker = new google.maps.Marker({
    //     position: { lat: parseFloat(punto.latitud), lng: parseFloat(punto.longitud) },
    //     map: map,
    //     title: punto.nombre_playa
    //   });

    //   // Contenido de la infowindow con los datos del punto
    //   var contenidoInfowindow = `
    //     <div style="color: blue;">Nombre de la playa:${punto.nombre_playa}</div>
    //     <div>Municipio:</div>
    //     <div>muestreos: ${punto.muestreos}</div>
    //     <p style="font-style: italic;">Ver piezas encontradas</p>
    //   `;
    //   // <div>No. muestreo: ${punto.num_muestreo}</div>
    //   //   <div>Año/Fecha: ${punto.fecha}</div>
    //   //   <div>Dia de muestreo: ${punto.dia_muestreo}</div>
    //   //   <div>Zona: ${punto.zona}</div>
    //   //   <div>No. piezas: ${punto.piezas}</div>
    //   // Agregar evento click al marcador
    //   marker.addListener('click', function() {
    //     infowindow.setContent(contenidoInfowindow);
    //     infowindow.open(map, marker);
    //   });
    // });
   

  
    // Crear un infowindow
  //   var infowindow = new google.maps.InfoWindow();
  //   // Marcar puntos desde la base de datos
  //   coordenadas.forEach(function(coordenada) {
  //               var marker = new google.maps.Marker({
  //                   position: coordenada,
  //                   map: map,
  //                   title: 'Mi Marcador',
  //                   icon: {
  //                   scaledSize: new google.maps.Size(40, 40), // Tamaño personalizado
  //                   origin: new google.maps.Point(0, 0), // Punto de origen
  //                   anchor: new google.maps.Point(20, 40) // Punto de anclaje
  //               }
  //               });
          
    

  //   // Agregar un evento de clic al marcador
  //   marker.addListener('click', function() {
  //                   // Contenido de la infowindow
  //                   // Contenido HTML de la infowindow con formato
  //                   var contenidoInfowindow = '<div style="color: blue;">Nombre de la playa </div>' +
  //                                             '<div>No. muestreo: 1 </div>' +
  //                                             '<div>año/fecha: 2018 </div>' +
  //                                             '<div>dia de muestreo: sabado</div>' +
  //                                             '<div>zona: debajo pleamar</div>' +
  //                                             '<div>No. piezas: 3</div>' +
  //                                             '<hr>' +
  //                                             '<p style="font-style: italic;">ver piezas encontradas </p>';

  //                   infowindow.setContent(contenidoInfowindow);
                    
  //                   // Abrir la infowindow cerca del marcador
  //                   infowindow.open(map, marker);
  //               });
  //           });
  //  }


//   async function initMap() {
//   // Request needed libraries.
//   const { Map, InfoWindow } = await google.maps.importLibrary("maps");
//   const { AdvancedMarkerElement, PinElement } = await google.maps.importLibrary(
//     "marker",
//   );
//   const map = new Map(document.getElementById("map"), {
//     zoom: 4,
//     center: { lat: 23.6345, lng: -102.5528 },
//     mapId: "a947c81ef05926d8",
//   });

//   const puntos = @json($puntos);
//   // Create an info window to share between markers.
//   const infoWindow = new InfoWindow();

//   // Create the markers.

//   puntos.forEach(function(punto) {
//       var marker = new google.maps.Marker({
//         position: { lat: parseFloat(punto.latitud), lng: parseFloat(punto.longitud) },
//         map: map,
//         title: punto.nombre_playa
//       });
//   })
//   // tourStops.forEach(({ position, title }, i) => {
//   //   const pin = new PinElement({
//   //     glyph: `${i + 1}`,
//   //     scale: 1.5,
//   //   });
//   //   const marker = new AdvancedMarkerElement({
//   //     position,
//   //     map,
//   //     title: `${i + 1}. ${title}`,
//   //     content: pin.element,
//   //     // gmpClickable: true,
//   //   });

//     // Add a click listener for each marker, and set up the info window.
// //     marker.addListener("click", ({ domEvent, latLng }) => {
// //       const { target } = domEvent;

// //       infoWindow.close();
// //       var contenidoInfowindow = '<div style="color: blue;">Nombre de la playa </div>' +
// //                                               '<div>No. muestreo: 1 </div>' +
// //                                               '<div>año/fecha: 2018 </div>' +
// //                                               '<div>dia de muestreo: sabado</div>' +
// //                                               '<div>zona: debajo pleamar</div>' +
// //                                               '<div>No. piezas: 3</div>' +
// //                                               '<hr>' +
// //                                               '<p style="font-style: italic;">ver piezas encontradas </p>';

// //       infoWindow.setContent(contenidoInfowindow);
// //       infoWindow.open(marker.map, marker);
// //     });
// //   });
// // }
//   }
// initMap();
// </script>




{{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyChZ8O-QhUnh4Q4k4Tbci0jrN0iSpG2XAg&callback=inicializarMapa&libraries=places&v=weekly&loading=async" async></script> --}}
{{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyChZ8O-QhUnh4Q4k4Tbci0jrN0iSpG2XAg&callback=initMap&v=weekly&libraries=marker" defer></script>      --}}

<script>
  window.puntos = @json($puntos);
</script>
    <!-- prettier-ignore -->
    <script>(g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
        ({key: "AIzaSyChZ8O-QhUnh4Q4k4Tbci0jrN0iSpG2XAg", v: "weekly"});</script>
  