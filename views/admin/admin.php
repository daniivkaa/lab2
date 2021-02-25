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
			  <a class="navbar-brand" href="<?php echo MVC_uri; ?>/admin">Модератор: <?php echo $name; ?></a>
			  <span class="navbar-text">
				  <a class="navbar-brand" href="<?php echo MVC_uri; ?>/admin/logout">Выход</a>
			  </span>
			</nav>
		</div>
		<div class = "container-xxl text-center">
			<h1 style = "margin-bottom: 20px;">Все конференции</h1>
			<h2 style = "margin-bottom: 50px;">На проверке</h2>
			<div class="row">
			<?php foreach($listCheck as $applicationItem): ?>
				  <div class="col-sm-4" style = "margin-bottom: 50px;">
					<div class="card">
					  <div class="card-body">
						<div style = "background:<?php echo $applicationItem['background']; ?>; color: #fff;"><?php echo $applicationItem['status']; ?></div>
						<h5 class="card-title"><?php echo $applicationItem['name'] ?></h5>
						<h5 class="card-title">Тематика: <?php echo $applicationItem['topic']; ?></h5>
						<p class="card-text"><?php echo $applicationItem['short_content']; ?></p>
						<p class="card-text">Email: <?php echo $applicationItem['email']; ?></p>
						<p class="card-text">Имя: <?php echo $applicationItem['autor']; ?></p>
						<a href="<?php echo MVC_uri; ?>/admin/<?php echo $applicationItem['id']; ?>" class="btn btn-primary">Подробнее</a>
					  </div>
					</div>
				  </div>
			<?php endforeach; ?>
			</div>
			
			<h2 style = "margin-bottom: 50px;">Одобрено</h2>
			<div class="row">
			<?php foreach($listGood as $applicationItem): ?>
				  <div class="col-sm-4" style = "margin-bottom: 50px;">
					<div class="card">
					  <div class="card-body">
						<div style = "background:<?php echo $applicationItem['background']; ?>; color: #fff;"><?php echo $applicationItem['status']; ?></div>
						<h5 class="card-title"><?php echo $applicationItem['name'] ?></h5>
						<h5 class="card-title">Тематика: <?php echo $applicationItem['topic']; ?></h5>
						<p class="card-text"><?php echo $applicationItem['short_content']; ?></p>
						<p class="card-text">Email: <?php echo $applicationItem['email']; ?></p>
						<p class="card-text">Имя: <?php echo $applicationItem['autor']; ?></p>
						<a href="<?php echo MVC_uri; ?>/admin/<?php echo $applicationItem['id']; ?>" class="btn btn-primary">Подробнее</a>
					  </div>
					</div>
				  </div>
			<?php endforeach; ?>
			</div>
			
			<h2 style = "margin-bottom: 50px;">Отклонено</h2>
			<div class="row">
			<?php foreach($listBad as $applicationItem): ?>
				  <div class="col-sm-4" style = "margin-bottom: 50px;">
					<div class="card">
					  <div class="card-body">
						<div style = "background:<?php echo $applicationItem['background']; ?>; color: #fff;"><?php echo $applicationItem['status']; ?></div>
						<h5 class="card-title"><?php echo $applicationItem['name'] ?></h5>
						<h5 class="card-title">Тематика: <?php echo $applicationItem['topic']; ?></h5>
						<p class="card-text"><?php echo $applicationItem['short_content']; ?></p>
						<p class="card-text">Email: <?php echo $applicationItem['email']; ?></p>
						<p class="card-text">Имя: <?php echo $applicationItem['autor']; ?></p>
						<a href="<?php echo MVC_uri; ?>/admin/<?php echo $applicationItem['id']; ?>" class="btn btn-primary">Подробнее</a>
					  </div>
					</div>
				  </div>
			<?php endforeach; ?>
			</div>
		</div>
			
		<!-- JavaScript Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	</body>
</html>