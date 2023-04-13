<div class="container s-margin">
<section class="my-5">

<h3 class="font-weight-bold black-text mb-5 pb-2 text-center">Najnowsze wpisy na blogu</h3>

<?php foreach ($news as $v): ?>
<div class="row">

  <!-- Grid column -->
  <div class="col-lg-5 col-xl-4">

    <!-- Featured image -->
    <div class="view overlay rounded z-depth-1-half mb-lg-0 mb-4">
      <img class="img-fluid" src="<?= base_url('uploads/'.$v->photo); ?>" alt="<?= $v->alt ?>">
      <a>
        <div class="mask rgba-white-slight"></div>
      </a>
    </div>

  </div>
  <!-- Grid column -->

  <!-- Grid column -->
  <div class="col-lg-7 col-xl-8">

    <!-- Post title -->
    <h3 class="font-weight-bold mb-3"><strong><?= $v->title ?></strong></h3>
    <!-- Excerpt -->
    <p class="dark-grey-text"><?= substr($v->body, 0, 150); ?>...</p>
    <!-- Post data -->
    <p>Autor: <a class="font-weight-bold"><?= $v->user_name ?></a>, <?= date("d/m/Y", strtotime($v->created)) ?></p>
    <!-- Read more button -->
    <a href="<?= base_url('wpis/'.slug($v->title).'/'.$v->id); ?>" class="btn btn-elegant btn-md">Czytaj więcej</a>

  </div>
  <!-- Grid column -->

</div>
<!-- Grid row -->

<hr class="my-5">

<?php endforeach; ?>


</section>
<!-- Section: Blog v.3 -->
</div>