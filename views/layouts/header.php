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
		<div class = "container-xxl text-center">
		<nav class="navbar navbar-dark bg-dark" style = "background: #f7ecdc;">
		  <a class="navbar-brand" href="<?php echo MVC_uri; ?>/user"><?php echo $name; ?></a>
		  <a class="nav-link active" aria-current="page" href="<?php echo MVC_uri; ?>/application">Добавить конференцию</a>
		  <span class="navbar-text">
			<?php if(isset($is_user)): ?>
				<?php if($is_user): ?>
					<a class="navbar-brand" href="<?php echo MVC_uri; ?>/user/logout">Выход</a>
				<?php else: ?>
				  <a class="navbar-brand" href="<?php echo MVC_uri; ?>/login">Войти</a>
				  <a class="navbar-brand" href="<?php echo MVC_uri; ?>/register">Зарегестрироваться</a>
				<?php endif; ?>
			<?php else: ?>
				<a class="navbar-brand" href="<?php echo MVC_uri; ?>/user/logout">Выход</a>
			<?php endif; ?>
		  </span>
		</nav>
		</div>