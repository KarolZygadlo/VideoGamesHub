<!-- Footer -->
<footer class="page-footer font-small pt-4">

	<!-- Footer Elements -->
	<div class="container">

		<!-- Social buttons -->
		<ul class="list-unstyled list-inline text-center">
			<li class="list-inline-item">
				<?php if ($settings->facebook ?? null) : ?>
					<a href="<?= $settings->facebook ?>" class="btn-floating btn-fb mx-1" target="_BLANK">
						<i class="fab fa-facebook-f"> </i>
					</a>
				<?php endif; ?>
			</li>
			<li class="list-inline-item">
				<?php if ($settings->twitter ?? null) : ?>
					<a href="<?= $settings->twitter ?>" class="btn-floating btn-tw mx-1" target="_BLANK">
						<i class="fab fa-twitter"> </i>
					</a>
				<?php endif; ?>
			</li>
			<li class="list-inline-item">
				<?php if ($settings->github ?? null) : ?>
					<a href="<?= $settings->github ?>" class="btn-floating btn-email mx-1" target="_BLANK">
						<i class="fab fa-github"> </i>
					</a>
				<?php endif; ?>
			</li>
		</ul>
		<!-- Social buttons -->

	</div>
	<!-- Footer Elements -->

	<!-- Copyright -->
	<div class="footer-copyright text-center py-3">© 2021 Copyright:
		<a href="http://videogameshub.karolzygadlo.pl/"> VideoGamesHub</a>
	</div>
	<!-- Copyright -->

</footer>
<!-- Footer -->

<script type="text/javascript" src="<?= assetsUrl() ?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?= assetsUrl() ?>js/popper.min.js"></script>
<script type="text/javascript" src="<?= assetsUrl() ?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= assetsUrl() ?>js/mdb.min.js"></script>
<script type="text/javascript" src="<?= assetsUrl() ?>js/loadPhoto.js"></script>
<script type="text/javascript" src="<?= assetsUrl() ?>js/deletePhoto.js"></script>
<script type="text/javascript" src="<?= assetsUrl() ?>js/addons/datatables2.min.js"></script>
<script type="text/javascript" src="<?= assetsUrl() ?>js/scripts.js"></script>
<script type="text/javascript" src="<?= assetsUrl() ?>js/lightbox.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@17.3.0/dist/lazyload.min.js"></script>

<script>
	$('#hideInfo').delay(5000).fadeOut(1000);
</script>

<script>
	function sendPost(user_id, table) {

		var body = document.getElementById("postBody").value;

		var data = new FormData();
		data.append(photo_1.name, photo_1.files[0]);
		data.append('user_id', user_id);
		data.append('body', body);
		data.append('table', table);

		if (body == '') {

			document.getElementById('validationMsg').innerHTML = "<span class='text-danger'>Pole Wiadomość jest wymagane</span>";

		} else {

			$.ajax({
				type: "post",
				url: "<?php echo base_url(); ?>posts/sendPost",
				data: data,
				contentType: false,
				processData: false,
				complete: function(html) {
					console.log(html);
					$('#refreshPosts').load(document.URL + ' #refreshPosts', function() {
						getPosts();
						$('#hideInfo').delay(5000).fadeOut(1000);
					});
				}
			});

		}

	}
</script>

<script>

	function getPosts() {
		document.getElementById('posts_loader').innerHTML = '<div class="text-center"><span class="text-center h1-responsive" style="font-size: 4rem;"><i class="fas fa-circle-notch fa-spin"></i></span>';
		setTimeout(function() {
			$('#posts_loader').load('<?php echo base_url() . 'posts/loadPost'; ?>');
		}, 1000);
	}

</script>

<script type="text/javascript">

	function changeLang(lang) {
		$.ajax({
			url: "<?php echo base_url(); ?>home/change/" + lang + "",
			success: function() {
				location.reload();
			}
		});
	}

</script>

<?php if (isset($_SESSION['lang']) && $_SESSION['lang'] != 'pl') : ?>
	<script type="text/javascript">
		function googleTranslateElementInit() {
			new google.translate.TranslateElement({
				pageLanguage: 'pl',
				layout: google.translate.TranslateElement.FloatPosition.TOP_LEFT
			}, 'google_translate_element');
		}
		jQuery('.lang-select').click(function() {
			var theLang = jQuery(this).attr('data-lang');
			jQuery('.goog-te-combo').val(theLang);
			window.location = jQuery(this).attr('href');
			location.reload();
		});
	</script>
<?php endif; ?>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</body>

</html>
