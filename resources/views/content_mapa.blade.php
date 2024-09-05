
<div class="container-fluid mapa " id="mapa" style="height: 70vh; " >
    </div>

   
  
<script>
  function inicializarMapa() {
    // Coordenadas de ejemplo (puedes cambiarlas según tu ubicación)
    var myLatLng = { lat: 23.6345, lng: -102.5528 };

    // Crear un mapa centrado en las coordenadas especificadas
      var map = new google.maps.Map(document.getElementById('mapa'), {
      center: myLatLng,
      zoom: 5
    });

    // Datos pasados directamente desde el servidor
    var puntos = @json($puntos);

    var infowindow = new google.maps.InfoWindow();

    // Iterar sobre los datos recibidos
    puntos.forEach(function(punto) {
      var marker = new google.maps.Marker({
        position: { lat: parseFloat(punto.latitud), lng: parseFloat(punto.longitud) },
        map: map,
        title: punto.nombre_playa
      });

      // Contenido de la infowindow con los datos del punto
      var contenidoInfowindow = `
        <div style="color: blue;">${punto.nombre_playa}</div>
        <div>No. muestreo: ${punto.muestreos}</div>
        <hr>
        <p style="font-style: italic;">Ver piezas encontradas</p>
      `;
      // <div>No. muestreo: ${punto.num_muestreo}</div>
      //   <div>Año/Fecha: ${punto.fecha}</div>
      //   <div>Dia de muestreo: ${punto.dia_muestreo}</div>
      //   <div>Zona: ${punto.zona}</div>
      //   <div>No. piezas: ${punto.piezas}</div>
      // Agregar evento click al marcador
      marker.addListener('click', function() {
        infowindow.setContent(contenidoInfowindow);
        infowindow.open(map, marker);
      });
    });
   

  
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
   }
</script>




<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyChZ8O-QhUnh4Q4k4Tbci0jrN0iSpG2XAg&callback=inicializarMapa&libraries=places&v=weekly&loading=async" async></script>
                                                                            