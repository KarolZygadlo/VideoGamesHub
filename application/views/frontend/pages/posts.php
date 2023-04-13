<div class="container s-margin">
<section class="my-5">

<h3 class="font-weight-bold black-text mb-5 pb-2 text-center">Najnowsze posty użytkowników</h3>

<?php $i = 0;
foreach ($posts as $v) : $i++;
	$data['user'] = $this->backend->get_one_record('users', $v->user_id);
?>

	<div class="card news-card mb-5">

		<div class="card-body">
			<div class="content">
				<div class="right-side-meta"><?= date("Y-m-d H:i:s", strtotime($v->created)) ?></div>
				<a title="Przejdź do profilu" class="text-dark" href="<?= base_url('profil-uzytkownika/' . $data['user']->first_name . '-' . $data['user']->last_name . '/' . $data['user']->id); ?>"><img src="<?= base_url('uploads/' . $data['user']->photo); ?>" class="rounded-circle avatar-img z-depth-1-half"><?= $data['user']->first_name . ' ' . $data['user']->last_name ?></a>
			</div>
		</div>


		<?php if ($v->photo ?? null) : ?>
			<div class="feed_background_image" style="background-image: url('<?= base_url('uploads/' . $v->photo); ?>');"></div>
		<?php endif; ?>

		<div class="card-body">

			<div class="social-meta">
				<div class="mt-5 mb-5"><?= $v->body ?></div>
				<a href="<?= base_url('post/' . $v->id); ?>">
					<p><i class="fas fa-comment"></i><?= $this->backend->count_comments('post_comments', $v->id); ?> komentarz-y</p>
				</a>
			</div>
			<hr>

		</div>

	</div>

<?php endforeach; ?>


<div class="paging text-center mt-5">
    <?php echo $this->pagination->create_links(); ?>
</div>

</section>

</div>
