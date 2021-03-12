@extends('layout')

@section('title', "Listado de usuarios")


@section('content')

    <h1 class="text-3xl">Listado de usuarios</h1>

    <div class="my-7">
        <a class="border border-blue-400 bg-blue-600 text-white rounded-md px-4 py-2 transition duration-500 ease select-none hover:bg-blue-400 focus:outline-none focus:shadow-outline" href="{{ route('users.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo usuario</a>
    </div>

    <div class="flex mb-3">
        <label class="flex items-center">
            <input data-column="0" type="checkbox" checked class="form-checkbox toggle-column">
            <span class="ml-2">ID</span>
        </label>

        <label class="flex items-center">
            <input data-column="1" type="checkbox" checked class="form-checkbox toggle-column ml-2">
            <span class="ml-2">Nombre</span>
        </label>

        <label class="flex items-center">
            <input data-column="2" type="checkbox" checked class="form-checkbox toggle-column ml-2">
            <span class="ml-2">Email</span>
        </label>
    </div>
    
    @if(!$users->isEmpty())
        <div class="table-responsive">
            <table class="data-table stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">#</th>
                        <th class="text-center" scope="col">Nombre</th>
                        <th class="text-center" scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>
                <div class="card-container">
                    @foreach ($users as $user)
                            <tr>
                                <td style="width: 33%;" class="text-center align-middle">{{ $user->id }}</td>
                                <td style="width: 33%;" class="text-center align-middle">{{ $user->name }}</td>
                                <td style="width: 33%;" class="text-center align-middle">{{ $user->email }}</td>
                            </tr>
                        @endforeach
                    </div>
                </tbody>
            </table>
        </div>
    @else
        <p class="mt-3">No hay usuarios registrados</p>
    @endif

@endsection

@section('datatable')
<!--Datatables-->
<script>
$(document).ready(function(){

	var table = $('.data-table').DataTable( {
        "order": [0, 'desc'],
        "responsive": true,
		"pageLength": 10,
		"language": {
				"sProcessing":    "Procesando...",
				"sLengthMenu":    "Mostrar _MENU_ registros",
				"sZeroRecords":   "No se encontraron resultados",
				"sEmptyTable":    "Ningún dato disponible en esta tabla",
				"sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
				"sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
				"sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
				"sInfoPostFix":   "",
				"sSearch":        "Buscar:",
				"sUrl":           "",
				"sInfoThousands":  ",",
				"sLoadingRecords": "Cargando...",
				"oPaginate": {
					"sFirst":    "Primero",
					"sLast":    "Último",
					"sNext":    "Siguiente",
					"sPrevious": "Anterior"
				},
				"oAria": {
					"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
					"sSortDescending": ": Activar para ordenar la columna de manera descendente"
				}
			}
	})
    .columns.adjust()
	.responsive.recalc();

    $('input.toggle-column').on( 'change', function (e) {
        e.preventDefault();
 
        // Get the column API object
        var column = table.column( $(this).attr('data-column') );
 
        // Toggle the visibility
        column.visible( ! column.visible() );
    } );

});
</script>
@endsection

