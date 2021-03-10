<?php include(ROOT . '/views/layouts/header.php'); ?>
		<div class = "container-xxl">
			<form class="row g-3" action = "<?php echo MVC_uri; ?>/application" method = "POST" enctype="multipart/form-data">
			  <div class="col-md-12">
				<label for="inputState" class="form-label">Тематика</label>
				<select id="inputState" class="form-select" name = "topic">
				  <option selected>HTML</option>
				  <option>CSS</option>
				  <option>JavaScript</option>
				  <option>PHP</option>
				</select>
			  </div>
			  <div class="col-md-12">
				<label for="inputName4" class="form-label">Название доклада</label>
				<input type="text" class="form-control" id="inputName4" placeholder="Что лучше flexbox или grid?" name = "name">
			  </div>
			  <div class="form-group col-md-12">
				<label for="exampleFormControlTextarea1">Краткое Описание</label>
				<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Моя тема о..." name = "short_content" style = "resize: none;"></textarea>
			  </div>
			  <div class="col-md-12">
				<label for="inputInfoAutor4" class="form-label">Расскажите о себе</label>
				<input type="text" class="form-control" id="inputInfoAutor4" placeholder="Профессор МГУ или студент лгту" name = "info_autor">
			  </div>
			  <label for="file1">Не более 10 мегобайт в форматах doc, docx, pdf</label>
			  <input type="file" name="file1" id = "file1">
			  <label for="file1">Не более 30 мегобайт в форматах ppt, pptx, pdf</label>
			  <input type="file" name="file2">
			  <div class="col-12">
				<button type="submit" class="btn btn-primary">Отправить на проверку</button>
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
<?php include(ROOT . '/views/layouts/footer.php'); ?>