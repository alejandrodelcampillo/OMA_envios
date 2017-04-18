<div class="container padding-bottom-double">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<h2 class="text-center">Calcular tarifa de env&iacute;o</h2>
		</div>
	</div>
	<div class="row margin-top-double" id="formContent">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<form class="form" id="taxForm" action="/shipments/returnRate" method="POST">
				<div class="row">
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						<div class="form-group">
							<label>Municipio Origen</label>
					        <select class="form-control" id="origin" name="data[origin]">
					        	<option id="0" selected disabled="">Seleccione</option>
					        	<?php foreach ($zones as $key => $zone): ?>
					        		<option id="<?php echo $zone['Zone']['id'] ?>" value="<?php echo $zone['Zone']['id'] ?>"><?php echo $zone['Zone']['description'] ?></option>
					        	<?php endforeach ?>
					        </select>		
						</div>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						<div class="form-group">
							<label>Municipio Destino</label>
					        <select class="form-control" id="destiny" name="data[destiny]">
					        	<option id="0" selected disabled="">Seleccione</option>
					        	<?php foreach ($zones as $key => $zone): ?>
					        		<option id="<?php echo $zone['Zone']['id'] ?>" value="<?php echo $zone['Zone']['id'] ?>"><?php echo $zone['Zone']['description'] ?></option>
					        	<?php endforeach ?>
					        </select>		
						</div>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						<div class="form-group">
							<label>Peso (kg.)</label>
							<input type="number" class="form-control" id="weight" name="data[weight]" min="0">	
						</div>
					</div>
					<div class="col-md-offset-5 col-lg-offset-5 col-xs-6 col-sm-6 col-md-6 col-lg-6 margin-top-double">
						<div class="form-group">
							<button type="submit" id="sendData" class="btn btn-lg btn-success">Calcular</button>
						</div>
					</div>					
				</div>			
			</form>
		</div>
	</div>
	<div class="loader hide-content"></div>
	<div class="row margin-top-double hide-content" id="responseContent">
		
	</div>
</div>

