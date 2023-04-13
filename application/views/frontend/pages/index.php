<div class="container s-margin">

	<h3 class="font-weight-bold black-text mb-5 pb-2 text-center">Aktualności</h3>
	<!--Grid row-->
	<div class="row">

		<?php $i = 0;
		foreach ($news as $v) : $i++; ?>


			<?php if ($i == '1') : ?>

				<div class="col-lg-8 col-md-12">

					<!--News tile -->
					<div class="news-tile view zoom z-depth-1 rounded mb-4">

						<a href="<?= base_url('wpis/' . slug($v->title) . '/' . $v->id); ?>" class="text-white">
							<img src="<?= base_url('uploads/' . $v->photo); ?>" class="img-fluid rounded-bottom" alt="<?= $v->alt ?>">
							<div class="mask rgba-stylish-strong">
								<div class="text-white text-center py-lg-5 py-0 my-0">
									<div>
										<h2 class="card-title font-weight-bold pt-2">
											<strong><?= $v->title ?></strong>
										</h2>

										<p class="mx-5 clearfix d-none d-md-block"></p>
									</div>
								</div>
							</div>
						</a>

					</div>
					<!--News tile -->

				</div>
				<!-- Grid column -->

			<?php else : ?>

				<!-- Grid column -->
				<div class="col-lg-4 col-md-12">

					<!--News tile -->
					<div class="news-tile view zoom z-depth-1 rounded mb-4">

						<a href="<?= base_url('wpis/' . slug($v->title) . '/' . $v->id); ?>" class="text-white">
							<img src="<?= base_url('uploads/' . $v->photo); ?>" class="img-fluid rounded-bottom" alt="<?= $v->alt ?>">
							<div class="mask rgba-stylish-strong">
								<div class="text-white text-center py-lg-5 py-0 my-0">
									<div>
										<h4 class="card-title font-weight-bold pt-2">
											<strong><?= $v->title ?></strong>
										</h4>

										<p class="mx-5 clearfix d-none d-md-block"></p>
									</div>
								</div>
							</div>
						</a>

					</div>
					<!--News tile -->

				</div>
				<!-- Grid column -->

			<?php endif ?>
		<?php endforeach; ?>

	</div>
	<!--Grid row-->

	<div class="col-md-12 mt-5 mb-5">

		<h3 class="font-weight-bold black-text mb-5 pb-2 text-center">Dodaj wpis</h3>

		<div id="refreshPosts">

			<?php if (isset($_SESSION['post_flashdata_false'])) : ?>
				<div id="hideInfo" class="alert alert-danger"><?php echo $_SESSION['post_flashdata_false']; ?></div>
			<?php elseif (isset($_SESSION['post_flashdata_success'])) : ?>
				<div id="hideInfo" class="alert alert-success"><?php echo $_SESSION['post_flashdata_success']; ?></div>
			<?php endif; ?>
			<div class="container mb-5">
				<div class="file-field text-center">
					<div id="photoViewer_1" class="mb-4 delete_photo cursor" onclick="clear_box(1);">
						<img class="z-depth-1-half avatar-pic" src="http://via.placeholder.com/64x64" alt="placeholder img">
					</div>

					<div class="md-form">
						<div class="file-field d-flex justify-content-center">
							<div class="btn btn-dark btn-md">
								<span>Dodaj zdjęcie</span>
								<input type="file" name="photo_1" id="photo_1">
							</div>
							<div class="file-path-wrapper">
								<input name="name_photo_1" id="name_photo_1" class="file-path validate" type="text" placeholder="Dodaj zdjęcie" required readonly>
							</div>
						</div>
					</div>
				</div>
				<div id="validationMsg"></div>
				<div class="md-form">
					<textarea id="postBody" class="md-textarea form-control" rows="5" name="body"></textarea>
					<label for="postBody">O czym myślisz, <?= $user->first_name ?> ?</label>
				</div>

				<button type="button" class="btn btn-dark align-right" onclick="sendPost('<?= $user->id ?>', 'posts')">Wyślij</button>
			</div>

			<h3 class="font-weight-bold black-text mb-5 pb-2 text-center">Najnowsze wpisy użytkowników</h3>

			<div id="posts_loader">

			</div>

		</div>

	</div>

	<div class="text-center">

		<a href="<?= base_url('wszystkie-posty') ?>"><button type="button" class="btn btn-dark align-right mb-5">Sprawdź wszystkie posty</button></a>

	</div>


</div>
