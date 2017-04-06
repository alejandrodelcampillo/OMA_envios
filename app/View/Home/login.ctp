<div class="container" id="login">
	<div class="row">
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" id="loginContainer">
			<form id="loginForm" action="/home/verifyLogin" method="post" class="form">
				<div class="row">
					<div class="col-md-offset-2 col-lg-offset-2 col-xs-11 col-sm-11 col-md-11 col-lg-11">
						<h2>Iniciar Sesi&oacute;n</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-offset-2 col-lg-offset-2 col-xs-9 col-sm-9 col-md-9 col-lg-9">
						<div class="form-group">
							<label>Email</label>
					        <input type="email" class="form-control" placeholder="Email" name="data[email]">		
						</div>
					</div>					
				</div>
				<div class="row">	
					<div class="col-md-offset-2 col-lg-offset-2 col-xs-9 col-sm-9 col-md-9 col-lg-9">
						<div class="form-group">
							<label>Contraseña</label>
					        <input type="password" class="form-control" placeholder="Contraseña" name="data[pass]">		
						</div>
					</div>
				</div>
				<div class="row">	
						<div class="col-md-offset-7 col-lg-offset-7 col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<div class="form-group">
							<input type="submit" class="form-control" value="Enviar">
						</div>
				    </div>
			    </div>
		    </form>
	    </div>
	    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" id="registerContainer">
			<form id="registryForm" action="/home/saveRegistry" method="post" class="form">
				<div class="row">
					<div class="col-md-offset-1 col-lg-offset-1 col-xs-11 col-sm-11 col-md-11 col-lg-11">
						<h2>Registrar</h2>
					</div>
				</div>
				<div class="row">	
					<div class="col-md-offset-1 col-lg-offset-1 col-xs-9 col-sm-9 col-md-9 col-lg-9">
						<div class="form-group">
							<label>Nombre</label>
				        	<input type="text" class="form-control" placeholder="Nombre" name="data[name]">
				        </div>
					</div>
				</div>
				<div class="row">	
					<div class="col-md-offset-1 col-lg-offset-1 col-xs-9 col-sm-9 col-md-9 col-lg-9">
						<div class="form-group">
							<label>Apellido</label>
					        <input type="text" class="form-control" placeholder="Apellido" name="data[last_name]">
					    </div>
					</div>
				</div>												
				<div class="row">
					<div class="col-md-offset-1 col-lg-offset-1 col-xs-9 col-sm-9 col-md-9 col-lg-9">
						<div class="form-group">
							<label>Email</label>
					        <input type="email" class="form-control" placeholder="Email" name="data[email]">		
					    </div>
					</div>
				</div>
				<div class="row">	
					<div class="col-md-offset-1 col-lg-offset-1 col-xs-9 col-sm-9 col-md-9 col-lg-9">
						<div class="form-group">
							<label>Contraseña</label>
				        	<input type="password" class="form-control" placeholder="Contraseña" name="data[pass]">		
				        </div>
					</div>
				</div>
				<div class="row">	
					<div class="col-md-offset-1 col-lg-offset-1 col-xs-9 col-sm-9 col-md-9 col-lg-9">
						<div class="form-group">
							<label>Nombre de la empresa</label>
				        	<input type="text" class="form-control" placeholder="Nombre empresa" name="data[company_name]">
				        </div>
					</div>
				</div>
				<div class="row">	
					<div class="col-md-offset-1 col-lg-offset-1 col-xs-9 col-sm-9 col-md-9 col-lg-9">
						<div class="form-group">
							<label>Rif</label>
				        	<input type="text" class="form-control" placeholder="Rif" name="data[rif]">
				        </div>
					</div>
				</div>
				<div class="row">	
					<div class="col-md-offset-1 col-lg-offset-1 col-xs-9 col-sm-9 col-md-9 col-lg-9">
						<div class="form-group">
							<label>Descripci&oacute;n</label>
				        	<textarea class="form-control" placeholder="Descripci&oacute;n" name="data[description]"></textarea>		
				        </div>
					</div>
				</div>					
				<div class="row">	
					<div class="col-md-offset-6 col-lg-offset-6 col-xs-4 col-sm-4 col-md-4 col-lg-4">
						<input type="submit" class="form-control" value="Enviar">
					</div>
			    </div>
		    </form>	    	
	    </div>
    </div>
</div>