<?php include(ROOT . '/views/layouts/header.php'); ?>
	
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
<?php include(ROOT . '/views/layouts/footer.php'); ?>