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
			<?php if($is_user): ?>
				<a class="navbar-brand" href="<?php echo MVC_uri; ?>/user/logout">Выход</a>
			<?php else: ?>
			  <a class="navbar-brand" href="<?php echo MVC_uri; ?>/login">Войти</a>
			  <a class="navbar-brand" href="<?php echo MVC_uri; ?>/register">Зарегестрироваться</a>
			<?php endif; ?>
		  </span>
		</nav>
		</div>
	
		<?php if($is_user): ?>
			<div class = "container-xxl text-center">
				<h1 style = "margin-bottom: 50px;">Мои конференции</h1>
				<div class="row">
				<?php foreach($list as $applicationItem): ?>
					  <div class="col-sm-4" style = "margin-bottom: 50px;">
						<div class="card">
						  <div class="card-body">
							<div style = "background:<?php echo $applicationItem['background']; ?>; color: #fff;"><?php echo $applicationItem['status']; ?></div>
							<h5 class="card-title"><?php echo $applicationItem['name'] ?></h5>
							<h5 class="card-title">Тематика: <?php echo $applicationItem['topic']; ?></h5>
							<p class="card-text"><?php echo $applicationItem['short_content']; ?></p>
							<a href="<?php echo MVC_uri; ?>/application/<?php echo $applicationItem['id']; ?>" class="btn btn-primary">Подробнее</a>
						  </div>
						</div>
					  </div>
				<?php endforeach; ?>
				</div>
			</div>
		<?php endif; ?>
			
		<!-- JavaScript Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	</body>
</html>