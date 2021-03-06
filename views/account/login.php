<!DOCTYPE html>
<html lang = "ru">
	<head>
		<meta charset = "utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Document</title>
		<!-- CSS only -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	</head>
	<body>
		<div class = "container-xxl">
			<form class="row g-3" action = "<?php echo MVC_uri; ?>/login" method = "POST">
			  <div class="col-md-12">
				<label for="inputEmail4" class="form-label">Email</label>
				<input type="email" class="form-control" id="inputEmail4" placeholder="daniivkaakon@gmail.com" name = "email">
			  </div>
			  <div class="col-md-12">
				<label for="inputPassword4" class="form-label">Пароль</label>
				<input type="password" class="form-control" id="inputPassword4" name = "password">
			  </div>
			  <div class="col-12">
				<button type="submit" class="btn btn-primary">Войти</button>
			  </div>
			  <div class="col-12">
				<a href = "<?php echo MVC_uri; ?>/register">Зарегестрироваться</a>
			  </div>
			  <div class="col-12">
				<a href = "<?php echo MVC_uri; ?>/user">Главная</a>
			  </div>
			</form>
			<?php if($message != ""): ?>
				<div class="alert alert-danger" role="alert" style = "margin-top: 50px;">
					<?php echo $message; ?>
				</div>
			<?php endif; ?>
		</div>
		
		<!-- JavaScript Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	</body>
</html>