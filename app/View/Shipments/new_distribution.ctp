<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h2 class="text-center">Solicitar distribuci&oacute;n</h2>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<p>Ingrese los datos de env&iacute;o</p>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<form class="form" id="taxForm" action="/shipments/requestDistribution" method="POST">
			<div class="row">
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<div class="form-group">
						<label>Nombre del destinatario</label>
						<input class="form-control" type="text" required="required" name="data[name]" placeholder="Nombre" >
					</div>
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<div class="form-group">
						<label>Tel&eacute;fono</label>
						<input class="form-control" type="text" required="required" name="data[phone]" placeholder="Tel&eacute;fono" >
					</div>
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<div class="form-group">
						<label>Cantidad</label>
						<input class="form-control" type="number" required="required" name="data[quantity]" placeholder="Cantidad" >
					</div>
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<div class="form-group">
						<label>Peso (en GRAMOS.)</label>
						<input type="number" class="form-control" id="weight" name="data[weight]" min="0" placeholder="Peso">	
					</div>
				</div>																
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<div class="form-group">
						<label>Código Postal Origen</label>
						<input value ="<?php if (isset($zip_code)) echo $zip_code['Company']['zip_code']; else echo '1010'; ?>" class = "form-control" type="number" maxlength="4" required="required" name="data[origin]" placeholder="Zip Origen">
					</div>
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<div class="form-group">
						<label>Código Postal Destino</label>
						<input class = "form-control" type="number" maxlength="4" required="required" name="data[destiny]" placeholder="Zip Destino">
					</div>
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<div class="form-group">
						<label>Direcci&oacute;n</label>
						<textarea class="form-control" required="required" name="data[address]" placeholder="Direcci&oacute;n"></textarea>
					</div>
				</div>
				<div class="col-md-offset-5 col-lg-offset-5 col-xs-6 col-sm-6 col-md-6 col-lg-6 margin-top-double">
					<div class="form-group">
						<button type="submit" id="sendData" class="btn btn-lg btn-success">Solicitar</button>
						<a href="/admin" role="button" id="cancel" class="btn btn-lg btn-danger">Cancelar</a>
					</div>
				</div>				
			</div>			
		</form>	
	</div>
</div>