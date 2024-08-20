{{-- @extends('layouts.app')

@section('title', 'Inicio')

@section('navbar')
    @include('layouts.navbar_capturista')
@endsection

@section('content')

  <div>
    @include('content_info')
  </div>
  <div class="row ">
    <div class="col-md-4 p-4" style="height: 100vh;">
      @include('content_consultas')
    </div>
    <div class="col-md-8 p-4"  style="height: 100vh;">
      @include('content_mapa')
    </div>
  </div>


@endsection --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Fila</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><span class="editable">John Doe</span><input type="text" class="edit-input form-control"  style="display: none;"></td>
                    <td><span class="editable">john.doe@example.com</span><input type="email" class="edit-input form-control"  style="display: none;"></td>
                    <td>
                        <button class="btn btn-primary edit-btn">Editar</button>
                        <button class="btn btn-success save-btn" style="display: none;">Guardar</button>
                        <button class="btn btn-danger cancel-btn" style="display: none;">Cancelar</button>
                        <button class="btn btn-danger delete-btn">Eliminar</button>
                    </td>
                </tr>
                <!-- Más filas aquí -->
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.edit-btn').click(function(){
                var row = $(this).closest('tr');
                row.find('.editable').hide();
                row.find('.edit-input').show();
                row.find('.edit-btn').hide();
                row.find('.delete-btn').hide();
                row.find('.save-btn').show();
                row.find('.cancel-btn').show();
            });

            $('.cancel-btn').click(function(){
                var row = $(this).closest('tr');
                row.find('.editable').show();
                row.find('.edit-input').hide();
                row.find('.edit-btn').show();
                row.find('.delete-btn').show();
                row.find('.save-btn').hide();
                row.find('.cancel-btn').hide();
            });

            $('.save-btn').click(function(){
                var row = $(this).closest('tr');
                row.find('.editable').each(function(){
                    var input = $(this).next('.edit-input');
                    $(this).text(input.val());
                });
                row.find('.editable').show();
                row.find('.edit-input').hide();
                row.find('.edit-btn').show();
                row.find('.delete-btn').show();
                row.find('.save-btn').hide();
                row.find('.cancel-btn').hide();
            });

           
        });
    </script>
</body>
</html>
