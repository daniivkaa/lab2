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
				  <a class="navbar-brand" href="<?php echo MVC_uri; ?>/user/logout">Выход</a>
			  </span>
			</nav>
		</div>
		<div class="card text-center container-xxl">
		  <div class="card-header">
			<?php echo $applicationItem['topic'] ?>
		  </div>
		  <div class="card-body">
			<h5 class="card-title"><?php echo $applicationItem['name'] ?></h5>
			<p class="card-text"><?php echo $applicationItem['short_content'] ?></p>
		  </div>
		  <div class="card-footer text-muted">
			<?php echo $applicationItem['info_autor'] ?>
		  </div>
		  <a href = "<?php echo MVC_uri . '/save/' . $applicationItem['id'] . '/1'; ?>" target="_blank">Текст выступления</a>
		  <a href = "<?php echo MVC_uri . '/save/' . $applicationItem['id'] . '/2'; ?>" target="_blank">Презентация</a>
		</div>
		
		<!-- JavaScript Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	</body>
</html>