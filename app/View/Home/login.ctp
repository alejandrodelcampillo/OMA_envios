<div class="container" id="login">
	<form id="loginForm" action="/home/verifyLogin" method="post" class="form">
		<div class="row">
			<div class="col-md-offset-3 col-lg-offset-3 col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<label>Email</label>
		        <input type="email" class="form-control" placeholder="Email" name="data[email]">		
			</div>
		</div>
		<div class="row">	
			<div class="col-md-offset-3 col-lg-offset-3 col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<label>Contraseña</label>
		        <input type="password" class="form-control" placeholder="Contraseña" name="data[pass]">		
			</div>
		</div>
		<div class="row">	
			<div class="col-md-offset-3 col-lg-offset-3 col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<input type="submit" class="form-control" value="Enviar">
			</div>
	    </div>
    </form>
</div>