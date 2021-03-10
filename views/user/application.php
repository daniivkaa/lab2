<?php include(ROOT . '/views/layouts/header.php'); ?>
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
<?php include(ROOT . '/views/layouts/footer.php'); ?>