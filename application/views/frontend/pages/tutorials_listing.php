<div class="container s-margin">

<section class="text-center">

<h3 class="font-weight-bold mb-5">Poradniki do gier</h3>

<div class="row mb-5">

  <?php foreach ($tutorials as $v): ?>

  <div class="col-lg-4 col-md-12 mb-lg-0 mb-4">

    <a href="<?= base_url('poradnik/'.slug($v->game_title).'/'.$v->id); ?>">
    <div class="card hoverable">

      <img class="card-img-top" src="<?= base_url('uploads/'.$v->photo); ?>" alt="<?= $v->game_title ?>">

      <div class="card-body">

        <p class="card-title text-muted text-uppercase font-small mt-1 mb-3"><?= $v->game_title ?></p>

        <p class="mb-2 text-dark"><?= $v->book_title ?></p>

      </div>

    </div>

    </a>

  </div>

  <?php endforeach; ?>

</div>


</section>

</div>
