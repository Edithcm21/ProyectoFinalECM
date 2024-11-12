@extends('layouts.app')

@section('title', 'Residuos en playas')

@section('navbar')
    @include('layouts.navbar_prueba')
@endsection

@section('content')
<br>
<div class="espaciado">

</div>
<div class="row container-fluid p-4">
    <div class=" col-sm-10 mx-auto ">
        <div class="row">
           <div class="col-md-8 ">
                <h1 class="fw-bold text-red">RESIDUOS EN PLAYAS</h1>
                <p class="text-normal">El crecimiento poblacional, la urbanización de la zona costera y la alta demanda del turismo
                de playa traen consigo el incremento de infraestructura, que conduce a la transformación
                de los ecosistemas naturales. Esto, a su vez, provoca que las playas experimenten
                problemas de contaminación por distintos factores, entre los cuales destaca la presencia de
                residuos sólidos como uno de los más predominantes 
                </p>
            </div> 
        </div><br><br>
        
        <div class="referencias">
            <h2 style="color: #333;">Referencias</h2>
            <ul style="line-height: 1.6; padding-left: 20px;">
                <li>Braskem Idesa, <em>Monitoreo y manejo de residuos en playas</em>. 2020. https://www.researchgate.net/profile/Arely-Cruz-Salas/publication/343486111_Monitoreo_y_manejo_de_residuos_en_playas/links/5f2c9a21458515b7290ace73/Monitoreo-y-manejo-de-residuos-en-playas.pdf.</li>
                <li>SEMARNAT, <em>¿A dónde van los desechos que terminan en las playas y mares?</em>. 2020. https://www.gob.mx/semarnat/articulos/a-donde-van-los-desechos-que-terminan-en-las-playas-y-mares</li>

            </ul>
        </div>
        
    </div>
</div>
<br><br><br>


@endsection
