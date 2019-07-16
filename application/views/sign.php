<div class="container signup"> 	<!--авторизация-->
	
	<div class="row justify-content-center">
		
		<div class="col-4">

			<form action="index" method="POST" role="form" class="form_sign">
				<legend class="text-center text-h">Авторизация</legend>
				<?php echo '<p class="error-text">'.$message.'</p>'; ?>
				<div class="form-group">
					<input type="text" class="form-control" id="login" name="login" placeholder="Введите логин">
				</div>
				<div class="form-group">
					<input type="password" class="form-control" id="inputPassword2" name="password" placeholder="Введите пароль">
				</div>
			
				<button type="submit" name="go" class="btn btn-primary btn-block">Войти</button>
			</form>
			
		</div>
		
	</div>
	
</div>		<!--авторизация-->
