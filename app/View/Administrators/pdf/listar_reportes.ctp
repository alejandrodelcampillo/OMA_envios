 <p>Reporte desde: <?php echo $firstDate; ?> hasta: <?php echo $secondDate; ?></p> 
<h3>
		Solicitudes
</h3>
<div>
	<table>
	<thead>
		<tr>
			<th>Estatus</th>
			<th>Cantidad</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Enviados</td>
			<td><?php echo $envios_enviados; ?></td>
		</tr>	
		<tr>
			<td>En Proceso</td>
			<td><?php echo $envios_enproceso; ?></td>
		</tr>	
		<tr>
			<td>Sin Procesar</td>
			<td><?php echo $envios_solicitados; ?></td>
		</tr>
	</tbody>
		
	</table>
</div>
<br>
<br>
<h3>
	Clientes
</h3>
<div>
	<table>
	<tr>
		<th>Compañía</th>
		<th>RIF</th>
		<th>Cantidad de Solicitudes</th>
	</tr>
	<?php foreach ($clientes as $cliente): ?>
	<tr>
		<td><?php echo $cliente['companies']['company_name']; ?></td>
		<td><?php echo $cliente['companies']['rif']; ?></td>
		<td><?php echo $cliente['0']['CantEnvios']; ?></td>
	</tr>
	<?php endforeach; ?>	
</table>
</div>
