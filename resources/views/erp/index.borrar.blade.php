	<!doctype html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<title>Listado de Empresass</title>
		</head>
	<body>
			<table>
				<thead>
					<th>ID</th>
					<th>Empresa</th>
					<th>Tipo</th>
				</thead>
				<tbody>
				@foreach ($empresas as $empresa)
					<tr>
						<td>{{ $empresa->id }}</td>
						<td>{{ $empresa->name}}</td>
						<td>
							@can('destroy_empresas')
								<a href="{{route('empresas.destroy',$note->id) }}">Eliminar nota</a>
							@else
								Usted no puede eliminar esta nota
							@endcan
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
	</body>
</html>
