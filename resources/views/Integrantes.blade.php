@extends('layouts.app')

@section('title', 'Inicio')

@section('navbar')
    @include('layouts.navbar_inicio')
@endsection

@section('content')
<div class="row">
    <div class="col-sm-10  mx-auto text-center card-team" >
        <h2 class="team-title"> ¿Quiénes somos?</h2>
        <p class="team-description">Somos un equipo de investigación
         de la Universidad Autónoma Metropolitana, Unidad Azcapotzalco,
        comprometidos en el estudio de residuos sólidos,
        especialmente plásticos y microplásticos, en las playas de México.<br>
        Nos dedicamos a desarrollar, aplicar y difundir metodologías innovadoras de investigación,
        buscando concientizar sobre las consecuencias ambientales y sociales de la
        contaminación plástica.
        A través de nuestro trabajo, aspiramos a contribuir a la 
        creación de soluciones sostenibles y al fortalecimiento de la educación ambiental.
    </p>
    </div>
</div>
<br><br>
<div class="row mx-auto text-center">
    <div class="col-sm-10 mx-auto text-center">
        <div class="row integrante-card ">
            <div class="col-md-3 text-center mb-5 ">
                <img src="{{asset('images/alethia.jpg')}}" alt="Nombre del integrante" class="border"> 
                
            </div>
            <div class="col-md-9 mb-5 text-center text-md-start ">
                <h2>Dra. Alethia Vázquez Morillas</h2>
                <p class="description">
                    Ing. Química por la UAM-Azcapotzalco <br>
                     Maestra en C. en Integración de Procesos por la Universidad de Manchester <br>
                    Dra. en Ciencias e Ingeniería Ambientales por la UAM-Azcapotzalco.<br>
                    Profesora-investigadora en el Departamento de Energía de la UAM-A, donde imparte asignaturas a nivel
                    licenciatura y posgrado en temas relacionados con la gestión de residuos.
                </p>
                <a href="mailto:example@example.com" class="email">example@example.com</a>
            </div>
            <div class="col-md-9 mb-5 text-center text-md-start ">
                <h2>Dra. Arely Areanely Cruz Salas</h2>
                <p class="description">
                    Ing. Química por la UAM-Azcapotzalco <br>
                    Maestra en C. en Integración de Procesos por la Universidad de Manchester <br>
                    Dra. en Ciencias e Ingeniería Ambientales por la UAM-Azcapotzalco.<br>
                  
                    Profesora-investigadora en el Departamento de Energía de la UAM-A, donde imparte asignaturas a nivel
                    licenciatura y posgrado en temas relacionados con la gestión de residuos.
                </p>
            </div>
            <div class="col-md-3 text-center mb-5 integrante-card ">
                <img src="{{asset('images/Arely.jpeg')}}" alt="Nombre del integrante" class="border"> 
            </div>


            <div class="col-md-3 text-center mb-5 ">
                <img src="{{asset('images/alethia.jpg')}}" alt="Nombre del integrante" class="border"> 
            </div>
            <div class="col-md-9 mb-5 text-center text-md-start ">
                <h2>Dra. Alethia Vázquez Morillas</h2>
                <p class="description">
                    Ing. Química por la UAM-Azcapotzalco <br>
                     Maestra en C. en Integración de Procesos por la Universidad de Manchester <br>
                    Dra. en Ciencias e Ingeniería Ambientales por la UAM-Azcapotzalco.<br>
                    Profesora-investigadora en el Departamento de Energía de la UAM-A, donde imparte asignaturas a nivel
                    licenciatura y posgrado en temas relacionados con la gestión de residuos.
                </p>
            </div>
            
            
        </div>
    </div>
    
    

</div>

@endsection
