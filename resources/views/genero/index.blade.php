@extends('layouts.erp')

@section('title','Crear genero')

@section('content')
	<table class="table">
		<thead>
			<th>Nombre</th>
			<th>Operaciones</th>
		</thead>
		<tbody id="datos">
		</tbody>
	</table>
@endsection

@section('scriptsextra')
@endsection

@push('scriptchosen')
    <script src="{{asset('/js/listarGeneroAjax.js')}}"></script>
@endpush