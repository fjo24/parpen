<!DOCTYPE html>
<html>
<body>
	<h2>Autopartes RB</h2>
	<h3>Solicitud de Pedido</h3>
	<p>Enviado desde la web </p>
	<br>
	<br>
	<h3>Datos del Producto</h3>
	<table>
		<thead>
			<tr>
				<th style="text-align: left;">Producto</th>
				<th>Cantidad</th>
				<th style="text-align: right;">Precio unitario</th>
			</tr>
		</thead>
		<tbody>
				<tr>
					<td style="text-align: left;">{{ $producto }}</td>
					<td>{{ $cantidad }}</td>
				</tr>
			<tr>
				
			</tr>
		</tbody>
	</table>
		<h4>Mensaje:</h4>
		<p>{{ $mensaje }}</p>

</body>
</html>